<?php
require_once 'Model/db_config.php';
require_once 'Notification.php';
require_once 'Transfer.php';

$error = [];
$values = [];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // استلام وتنظيف البيانات
    $amount = filter_var(trim($_POST['amount'] ?? ''), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $from = trim($_POST['from_account'] ?? '');
    $to = trim($_POST['to_account'] ?? '');
    $contact_number = trim($_POST['contact_number'] ?? '');

    // حفظ القيم للعرض في النموذج في حالة الخطأ
    $values = [
        'amount' => $amount,
        'from_account' => $from,
        'to_account' => $to,
        'contact_number' => $contact_number
    ];

    // التحقق من المدخلات
    if (empty($amount) || $amount <= 0) {
        $error[] = "يجب إدخال مبلغ صحيح وموجب";
    }
    if (empty($from)) {
        $error[] = "يجب تحديد حساب المرسل";
    }
    if (empty($to)) {
        $error[] = "يجب تحديد حساب المستلم";
    }
    if ($from === $to) {
        $error[] = "لا يمكن التحويل لنفس الحساب";
    }
    if (!empty($contact_number) && !preg_match('/^01[0-9]{9}$/', $contact_number)) {
        $error[] = "رقم الهاتف غير صحيح";
    }

    if (empty($error)) {
        try {
            // تهيئة كائن Transfer
            $transfer = new Transfer();

            // إضافة عملية التحويل
            $result = $transfer->addTransfer($from, $to, $amount, $contact_number);

            if ($result['success']) {
                // نجاح العملية
                $message = "<div class='alert alert-success'>
                            <h4>تمت العملية بنجاح</h4>
                            <p>{$result['notification']}</p>
                            <p>رقم العملية: {$result['transaction_details']['id']}</p>
                            <p>التاريخ: {$result['transaction_details']['date']}</p>
                           </div>";
                
                // تفريغ القيم بعد نجاح العملية
                $values = [];
                
                // إعادة توجيه بعد 3 ثواني
                header("refresh:3;url=transfer_history.php");
            } else {
                // فشل العملية
                $message = "<div class='alert alert-danger'>
                            <h4>فشلت العملية</h4>
                            <p>{$result['message']}</p>
                           </div>";
            }
        } catch (Exception $e) {
            $message = "<div class='alert alert-danger'>
                        <h4>حدث خطأ</h4>
                        <p>حدث خطأ غير متوقع. الرجاء المحاولة مرة أخرى.</p>
                       </div>";
            // تسجيل الخطأ للمطورين
            error_log("Transfer Error: " . $e->getMessage());
        }
    } else {
        // عرض أخطاء التحقق
        $message = "<div class='alert alert-danger'><ul>";
        foreach ($error as $err) {
            $message .= "<li>$err</li>";
        }
        $message .= "</ul></div>";
    }
}

// استرجاع قائمة الحسابات للاختيار
try {
    $db = new DBController();
    $accounts_query = "SELECT ID, owner_name, account_type, balance FROM bank_account ORDER BY owner_name";
    $accounts = $db->select($accounts_query);
} catch (Exception $e) {
    $accounts = [];
    error_log("Error loading accounts: " . $e->getMessage());
}
?>

<!-- نموذج التحويل -->
<div class="container mt-4">
    <h2>تحويل الأموال</h2>
    
    <?php if (!empty($message)): ?>
        <?php echo $message; ?>
    <?php endif; ?>

    <form method="POST" action="" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="from_account">من حساب</label>
            <select name="from_account" id="from_account" class="form-control" required>
                <option value="">اختر الحساب</option>
                <?php foreach ($accounts as $account): ?>
                    <option value="<?php echo htmlspecialchars($account['owner_name']); ?>"
                            <?php echo ($values['from_account'] ?? '') === $account['owner_name'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($account['owner_name']); ?> 
                        (<?php echo htmlspecialchars($account['account_type']); ?>) - 
                        الرصيد: <?php echo number_format($account['balance'], 2); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="to_account">إلى حساب</label>
            <select name="to_account" id="to_account" class="form-control" required>
                <option value="">اختر الحساب</option>
                <?php foreach ($accounts as $account): ?>
                    <option value="<?php echo htmlspecialchars($account['owner_name']); ?>"
                            <?php echo ($values['to_account'] ?? '') === $account['owner_name'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($account['owner_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="amount">المبلغ</label>
            <input type="number" name="amount" id="amount" class="form-control" 
                   step="0.01" min="0.01" required 
                   value="<?php echo htmlspecialchars($values['amount'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="contact_number">رقم الهاتف (اختياري)</label>
            <input type="tel" name="contact_number" id="contact_number" class="form-control" 
                   pattern="01[0-9]{9}" placeholder="01xxxxxxxxx"
                   value="<?php echo htmlspecialchars($values['contact_number'] ?? ''); ?>">
            <small class="form-text text-muted">أدخل رقم هاتف صحيح يبدأ بـ 01</small>
        </div>

        <button type="submit" class="btn btn-primary">إتمام التحويل</button>
    </form>
</div>

<script>
// التحقق من صحة النموذج
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// منع اختيار نفس الحساب
document.getElementById('from_account').addEventListener('change', function() {
    var toAccount = document.getElementById('to_account');
    Array.from(toAccount.options).forEach(function(option) {
        option.disabled = option.value === this.value;
    }, this);
});
</script> 
CREATE TABLE IF NOT EXISTS `transaction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `source_account_id` int(11) NOT NULL,
  `destination_account_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `source_account_id` (`source_account_id`),
  KEY `destination_account_id` (`destination_account_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`source_account_id`) REFERENCES `bank_account` (`ID`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`destination_account_id`) REFERENCES `bank_account` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
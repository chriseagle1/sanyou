DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`(
	`id` INT(11) UNSIGNED NOT NULL auto_increment,
	`product_no` VARCHAR(15) NOT NULL DEFAULT '',
	`product_name` VARCHAR(100) NOT NULL DEFAULT '',
	`brand` VARCHAR(30) NOT NULL DEFAULT '',
	`unit` VARCHAR(50) NOT NULL DEFAULT '',
  `specification` VARCHAR(30) NOT NULL DEFAULT '',
	`retail_price` DECIMAL(7, 2) NOT NULL DEFAULT 0.00,
	`vip_price` DECIMAL(7, 2) NOT NULL DEFAULT 0.00,
	`remarks` TEXT,
	`create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_prod_no` (`product_no`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_stock`;
CREATE TABLE `product_stock`(
	`id` INT(11) UNSIGNED NOT NULL auto_increment,
	`product_no` VARCHAR(15) NOT NULL DEFAULT '',
	`stock` INT(5) UNSIGNED NOT NULL DEFAULT 0,
	`cost_price` DECIMAL(7,2) NOT NULL DEFAULT 0.00,
	`create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_prod_no` (`product_no`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
	`id` INT(11) UNSIGNED NOT NULL auto_increment,
	`order_id` VARCHAR(64) NOT NULL DEFAULT '',
	`order_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`status` TINYINT(4) NOT NULL DEFAULT 0,
	`product_num` INT(11) NOT NULL DEFAULT 0,
	`order_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00,
	`create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_order_id` (`order_id`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`(
	`id` INT(11) UNSIGNED NOT NULL auto_increment,
	`order_id` VARCHAR(64) NOT NULL DEFAULT '',
	`product_no` VARCHAR(15) NOT NULL DEFAULT '',
	`product_num` INT(11) NOT NULL DEFAULT 0,
	`product_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00,
	`profits` DECIMAL(11, 2) NOT NULL DEFAULT 0.00,
	`create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pay_list`;
CREATE TABLE `pay_list` (
	`id` INT(11) UNSIGNED NOT NULL auto_increment,
	`trade_no` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '֧�������׺�',
	`out_trade_no` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '�̻�������',
	`buyer_logon_id` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '���֧�����˺�',
	`total_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00 COMMENT '���׽��',
	`receipt_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00 COMMENT 'ʵ�ս��',
	`buyer_pay_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00 COMMENT '��Ҹ���Ľ��',
	`point_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00 COMMENT 'ʹ�û��ֱ�����Ľ��',
	`invoice_amount` DECIMAL(11, 2) NOT NULL DEFAULT 0.00 COMMENT '�����пɸ��û����߷�Ʊ�Ľ��',
	`gmt_payment`	TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '����֧��ʱ��',
	`fund_bill_list` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '����֧��ʹ�õ��ʽ�����',
	`card_balance` DECIMAL(11, 2) NOT NULL DEFAULT 0.00 COMMENT '֧���������',
	`store_name` VARCHAR(512) NOT NULL DEFAULT '' COMMENT	'����֧�����׵��̻��ŵ�����',
	`buyer_user_id`	VARCHAR(28)	NOT NULL DEFAULT '' COMMENT	'�����֧�������û�id',
	`discount_goods_detail` TEXT,
	`create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_trade_no` (`trade_no`),
	INDEX `idx_order_no` (`out_trade_no`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;
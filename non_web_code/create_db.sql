
/* Delete and Create everything new from scratch */ 
drop schema `codemagic`;
CREATE SCHEMA `codemagic` ; 


/* Usertable */ 
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `active` VARCHAR(45) NULL,
  `accepted` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC));


/* Customer Company - Company Info */ 
CREATE TABLE `customer_company` ( 
 `id` INT NOT NULL, 
 `name` VARCHAR(45) NULL, 
 `adr_street` VARCHAR(45) NULL, 
 `adr_street_nr` VARCHAR(45) NULL, 
 `adr_postal_code` VARCHAR(45) NULL, 
 `adr_city` VARCHAR(45) NULL, 
 `adr_country` VARCHAR(45) NULL, 
 `adr_email` VARCHAR(45) NULL, 
 `project` VARCHAR(45) NULL, 
 `is_contacted` TINYINT NULL, 
 `is_customer` TINYINT(1) NULL, 
 `adr_state` VARCHAR(45) NULL, 
 `customer_company` VARCHAR(45) NULL, 
 `cusetomer_companycol` VARCHAR(45) NULL, 
 `is_locked` TINYINT(1) NULL, 
   `billing_type` VARCHAR(45) NULL, 
   `billing_info` VARCHAR(45) NULL, 
 `id_first_contact_to_use` VARCHAR(45) NULL, 
 `contact_commentar` VARCHAR(45) NULL, 
 `customer_commentar` VARCHAR(45) NULL, 
 PRIMARY KEY (`id`), 
 UNIQUE INDEX `id_UNIQUE` (`id` ASC)); 



/* Customer company - contact person info - */ 
create table `customer_contactperson`(
 `id` INT NOT NULL, 
 `name` VARCHAR(45) NULL, 
 `adr_phone` VARCHAR(45) NULL, 
 `adr_email` VARCHAR(45) NULL, 
 `id_company` VARCHAR(45) NULL, 
 `contact_commentar` VARCHAR(45) NULL, 
 PRIMARY KEY (`id`), 
 UNIQUE INDEX `id_UNIQUE` (`id` ASC)); 



/* Single contact notes */ 
create table `customer_contactnote`   `id` INT NOT NULL, 

`document_id` VARCHAR(45) NULL, 
`company_id` VARCHAR(45) NULL, 
`person_id` VARCHAR(45) NULL, 
`content` VARCHAR(45) NULL, 
`keyword1` VARCHAR(45) NULL, 
`keyword2` VARCHAR(45) NULL, 
`keyword3` VARCHAR(45) NULL, 
`keyword4` VARCHAR(45) NULL, 
PRIMARY KEY (`id`), 
 UNIQUE INDEX `id_UNIQUE` (`id` ASC)); 



/* document store / document management */ 
CREATE TABLE `customer_documents` ( 
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
`name` VARCHAR(255) NULL, `contact_id` VARCHAR(255) NULL, 
`customer_id` VARCHAR(255) NULL, 
`object` VARCHAR(255) NULL, 
`path` VARCHAR(255) NULL, 
`type` VARCHAR(255) NULL, 
`size` VARCHAR(255) NULL, 
`keywords` VARCHAR(255) NULL)

 

/* own company -  data for documents created */ 
CREATE TABLE `company_documents` (
  `id` INT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(45) NULL,
`creation_date` VARCHAR(45) NULL,
 `customer_id` VERCHARTERT(45) NULL,
 `document_type` VERCHARTERT(45) NULL,
 `document_customtext` VARCHAR(45) NULL,
 `finance_value` VARCHAR(45) NULL,
PRIMARY KEY (`id`), 
 UNIQUE INDEX `id_UNIQUE` (`id` ASC)); 

/* table for support emails send via contact formular*/ 
CREATE TABLE `support` ( 
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
`name` VARCHAR(255) NULL, `contact_id` VARCHAR(255) NULL, 
`email` VARCHAR(255) NULL, 
`subject` VARCHAR(255) NULL, 
`status` VARCHAR(255) NULL, 
`message` VARCHAR(255) NULL)


/* table for employee office time entrys*/ 
CREATE TABLE `employee_time` ( 
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
`date` VARCHAR(255) NULL,
 `contact_id` VARCHAR(255) NULL, 
`employee` VARCHAR(255) NULL, 
`customer` VARCHAR(255) NULL, 
`task_id` VARCHAR(255) NULL, 
`start_time` VARCHAR(255) NULL, 
`end_time` VARCHAR(255) NULL)


/* table for employee office time entry Spezifikation employee */ 
CREATE TABLE `employee_task` ( 
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
`description` VARCHAR(255) NULL, 
`category` VARCHAR(255) NULL)

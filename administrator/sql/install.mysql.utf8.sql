CREATE TABLE IF NOT EXISTS `#__jdbuildermanager_sections` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`categories` TEXT NOT NULL ,
`thumbnail` VARCHAR(255)  NOT NULL ,
`content` TEXT NOT NULL ,
`minversion` DOUBLE,
`views` DOUBLE,
`status` DOUBLE,
`updatedon` DATETIME NOT NULL ,
`createdon` DATETIME NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;


-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'users'
-- 
-- ---

DROP TABLE IF EXISTS `users`;
		
CREATE TABLE `users` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `pass` MEDIUMTEXT NULL DEFAULT NULL,
  `display_name` VARCHAR(100) NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT NULL,
  `registered` TIMESTAMP NULL DEFAULT NULL,
  `registered_gmt` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  `updated_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'new table'
-- 
-- ---

DROP TABLE IF EXISTS `new table`;
		
CREATE TABLE `new table` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'posts'
-- 
-- ---

DROP TABLE IF EXISTS `posts`;
		
CREATE TABLE `posts` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `author` INTEGER NULL DEFAULT NULL,
  `title` MEDIUMTEXT NULL DEFAULT NULL,
  `excerpt` MEDIUMTEXT NULL DEFAULT NULL,
  `content` MEDIUMTEXT NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT 0 COMMENT '0 - review, 1 - publish, 2 - delete',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `modified_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'keywords'
-- 
-- ---

DROP TABLE IF EXISTS `keywords`;
		
CREATE TABLE `keywords` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `key` CHAR(255) NULL DEFAULT NULL,
  `value` MEDIUMTEXT NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'keyword_items'
-- 
-- ---

DROP TABLE IF EXISTS `keyword_items`;
		
CREATE TABLE `keyword_items` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `keyword_id` INTEGER NULL DEFAULT NULL,
  `content_type` CHAR(250) NULL DEFAULT NULL COMMENT 'model name',
  `object_id` INTEGER NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'catalogues'
-- 
-- ---

DROP TABLE IF EXISTS `catalogues`;
		
CREATE TABLE `catalogues` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` MEDIUMTEXT NULL DEFAULT NULL,
  `slug` CHAR(250) NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'post_catalogue'
-- 
-- ---

DROP TABLE IF EXISTS `post_catalogue`;
		
CREATE TABLE `post_catalogue` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `catalogue_id` INTEGER NULL DEFAULT NULL,
  `post_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'roles'
-- 
-- ---

DROP TABLE IF EXISTS `roles`;
		
CREATE TABLE `roles` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` MEDIUMTEXT NULL DEFAULT NULL,
  `slug` CHAR(250) NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'permissions'
-- 
-- ---

DROP TABLE IF EXISTS `permissions`;
		
CREATE TABLE `permissions` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `role_id` INTEGER NULL DEFAULT NULL,
  `group_id` INTEGER NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `modified_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'groups'
-- 
-- ---

DROP TABLE IF EXISTS `groups`;
		
CREATE TABLE `groups` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` INTEGER NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `modified_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'user_group'
-- 
-- ---

DROP TABLE IF EXISTS `user_group`;
		
CREATE TABLE `user_group` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `group_id` INTEGER NULL DEFAULT NULL,
  `status` INTEGER NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `created_gmt` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `modified_gmt` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `posts` ADD FOREIGN KEY (author) REFERENCES `users` (`id`);
ALTER TABLE `keyword_items` ADD FOREIGN KEY (keyword_id) REFERENCES `keywords` (`id`);
ALTER TABLE `post_catalogue` ADD FOREIGN KEY (catalogue_id) REFERENCES `posts` (`id`);
ALTER TABLE `post_catalogue` ADD FOREIGN KEY (post_id) REFERENCES `catalogues` (`id`);
ALTER TABLE `permissions` ADD FOREIGN KEY (role_id) REFERENCES `roles` (`id`);
ALTER TABLE `permissions` ADD FOREIGN KEY (group_id) REFERENCES `groups` (`id`);
ALTER TABLE `user_group` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `user_group` ADD FOREIGN KEY (group_id) REFERENCES `groups` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `new table` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `posts` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `keywords` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `keyword_items` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `catalogues` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `post_catalogue` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `roles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `permissions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `groups` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_group` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `users` (`id`,`name`,`email`,`pass`,`display_name`,`status`,`registered`,`registered_gmt`,`updated`,`updated_gmt`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `new table` (`id`) VALUES
-- ('');
-- INSERT INTO `posts` (`id`,`author`,`title`,`excerpt`,`content`,`status`,`created`,`created_gmt`,`modified`,`modified_gmt`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `keywords` (`id`,`key`,`value`,`created`,`created_gmt`) VALUES
-- ('','','','','');
-- INSERT INTO `keyword_items` (`id`,`keyword_id`,`content_type`,`object_id`,`created`,`created_gmt`) VALUES
-- ('','','','','','');
-- INSERT INTO `catalogues` (`id`,`name`,`slug`,`status`,`created`,`created_gmt`) VALUES
-- ('','','','','','');
-- INSERT INTO `post_catalogue` (`id`,`catalogue_id`,`post_id`) VALUES
-- ('','','');
-- INSERT INTO `roles` (`id`,`name`,`slug`,`status`,`created`,`created_gmt`) VALUES
-- ('','','','','','');
-- INSERT INTO `permissions` (`id`,`role_id`,`group_id`,`status`,`created`,`created_gmt`,`modified`,`modified_gmt`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `groups` (`id`,`name`,`status`,`created`,`created_gmt`,`modified`,`modified_gmt`) VALUES
-- ('','','','','','','');
-- INSERT INTO `user_group` (`id`,`user_id`,`group_id`,`status`,`created`,`created_gmt`,`modified`,`modified_gmt`) VALUES
-- ('','','','','','','','');
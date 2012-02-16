DROP TABLE IF EXISTS `?options` ;

CREATE  TABLE IF NOT EXISTS `?options` (
  `option_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `option_group_id` INT(11) NOT NULL DEFAULT '0' ,
  `option_name` VARCHAR(64) NOT NULL DEFAULT '' ,
  `option_value` LONGTEXT NOT NULL ,
  `option_autoload` VARCHAR(20) NOT NULL DEFAULT 'yes' ,
  PRIMARY KEY (`option_id`) ,
  UNIQUE INDEX `option_name` (`option_name` ASC) )
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;

DROP TABLE IF EXISTS `?postmeta` ;
CREATE  TABLE IF NOT EXISTS `dd_postmeta` (
  `postmeta_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `postmeta_post_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0' ,
  `postmeta_key` VARCHAR(255) NULL DEFAULT NULL ,
  `postmeta_value` LONGTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`postmeta_id`) ,
  INDEX `post_id` (`postmeta_post_id` ASC) ,
  INDEX `meta_key` (`postmeta_key` ASC) )
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;

DROP TABLE IF EXISTS `?posts` ;
CREATE  TABLE IF NOT EXISTS `?posts` (
  `post_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `post_author` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0' ,
  `post_date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `post_date_gmt` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `post_content` LONGTEXT NOT NULL ,
  `post_title` TEXT NOT NULL ,
  `post_excerpt` TEXT NOT NULL ,
  `post_status` VARCHAR(20) NOT NULL DEFAULT 'publish' ,
  `post_comment_status` VARCHAR(20) NOT NULL DEFAULT 'open' ,
  `post_ping_status` VARCHAR(20) NOT NULL DEFAULT 'open' ,
  `post_password` VARCHAR(20) NOT NULL DEFAULT '' ,
  `post_name` VARCHAR(200) NOT NULL DEFAULT '' ,
  `post_to_ping` TEXT NOT NULL ,
  `post_pinged` TEXT NOT NULL ,
  `post_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `post_modified_gmt` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `post_content_filtered` TEXT NOT NULL ,
  `post_parent` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0' ,
  `post_guid` VARCHAR(255) NOT NULL DEFAULT '' ,
  `post_menu_order` INT(11) NOT NULL DEFAULT '0' ,
  `post_type` VARCHAR(20) NOT NULL DEFAULT 'post' ,
  `post_mime_type` VARCHAR(100) NOT NULL DEFAULT '' ,
  `post_comment_count` BIGINT(20) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`post_id`) ,
  INDEX `post_name` (`post_name` ASC) ,
  INDEX `type_status_date` (`post_type` ASC, `post_status` ASC, `post_date` ASC, `post_id` ASC) ,
  INDEX `post_parent` (`post_parent` ASC) ,
  INDEX `post_author` (`post_author` ASC) )
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;


DROP TABLE IF EXISTS `?usermeta` ;
CREATE  TABLE IF NOT EXISTS `?usermeta` (
  `usermeta_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `usermeta_user_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0' ,
  `usermeta_key` VARCHAR(255) NULL DEFAULT NULL ,
  `usermeta_value` LONGTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`usermeta_id`) ,
  INDEX `user_id` (`usermeta_user_id` ASC) ,
  INDEX `meta_key` (`usermeta_key` ASC) )
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;


DROP TABLE IF EXISTS `?users` ;
CREATE  TABLE IF NOT EXISTS `?users` (
  `user_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_name_id` VARCHAR(60) NOT NULL DEFAULT '' ,
  `user_name` VARCHAR(250) NOT NULL DEFAULT '' ,
  `user_password` VARCHAR(64) NOT NULL DEFAULT '' ,
  `user_email` VARCHAR(100) NOT NULL DEFAULT '' ,
  `user_url` VARCHAR(100) NOT NULL DEFAULT '' ,
  `user_registered` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `user_key` VARCHAR(60) NOT NULL DEFAULT '' ,
  `user_status` INT(11) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`user_id`) ,
  INDEX `user_login_key` (`user_name_id` ASC) )
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;

DROP TABLE IF EXISTS `?session` ;
CREATE  TABLE IF NOT EXISTS `?session` (
  `session_id` INT NOT NULL ,
  `session_token` VARCHAR(150) NOT NULL ,
  `session_host` VARCHAR(80) NOT NULL ,
  `session_ip` VARCHAR(45) NOT NULL ,
  `session_agent` TEXT NOT NULL ,
  `session_expires` TIME NOT NULL ,
  `session_lastactive` TIME NOT NULL ,
  `session_registry` TEXT NOT NULL ,
  `session_key` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`session_id`) ,
  UNIQUE INDEX `session_key_UNIQUE` (`session_key` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8


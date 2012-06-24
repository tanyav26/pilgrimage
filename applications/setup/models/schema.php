<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * storage.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\Setup\Models;

use Platform;
use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Model
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Schema extends Platform\Model {
    
    /**
     * An instance of the schema model object
     * @var type 
     */
    static $instance;
    
    /**
     * The database object
     * @var type 
     */
    static $database ;

    /**
     * This model has no data to display
     * @return boolean
     */
    public function display(){
        return false;
    }
    
    /**
     * Creates the authority table
     * 
     */
    private static function createAuthorityTable(){
        
        //Drop the authority table if exists, create if doesn't
        static::$database->query("DROP TABLE IF EXISTS `?authority`");
        static::$database->query(          
           "CREATE TABLE IF NOT EXISTS `?authority` (
                `authority_id` bigint(20) NOT NULL AUTO_INCREMENT,
                `authority_title` varchar(100) NOT NULL,
                `authority_parent_id` bigint(20) NOT NULL,
                `authority_name` varchar(45) NOT NULL COMMENT '	',
                `authority_description` varchar(255) DEFAULT NULL,
                `lft` int(11) NOT NULL,
                `rgt` int(11) NOT NULL,
                PRIMARY KEY (`authority_id`),
                UNIQUE KEY `authority_name_UNIQUE` (`authority_name`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;"
        );
        //Dumping data for table authority?
        static::$database->query(
           "INSERT INTO `?authority` (`authority_id`, `authority_title`, `authority_parent_id`, `authority_name`, `authority_description`, `lft`, `rgt`) VALUES
            (1, 'PUBLIC', 0, 'PUBLIC', 'All unregistered nodes, users and applications', 1, 8),
            (2, 'Registered Users', 1, 'REGISTEREDUSERS', 'All registered nodes with a known unique identifier', 2, 7),
            (3, 'Moderators', 2, 'MODERATORS', 'System moderators, Users allowed to manage user generated import', 3, 6),
            (4, 'Master Administrators', 3, 'MASTERADMINISTRATORS', 'Special users with awesome powers', 4, 5);"
        );
    }
    
    private static function createAuthorityPermissionsTable(){
        
        //Drop the authority table if exists, create if doesn't
        static::$database->query("DROP TABLE IF EXISTS `?authority_permissions`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?authority_permissions` (
                `authority_permission_key` bigint(20) NOT NULL AUTO_INCREMENT,
                `authority_id` bigint(20) NOT NULL,
                `permission_area_uri` varchar(255) NOT NULL,
                `permission` varchar(45) NOT NULL DEFAULT '1',
                `permission_type` varchar(45) NOT NULL,
                `permission_title` varchar(45) NOT NULL,
                PRIMARY KEY (`authority_permission_key`),
                UNIQUE KEY `UNIQUE` (`permission_area_uri`,`permission_type`,`authority_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createMenutable(){
        
        //Drop the menu table if it already exists;
        static::$database->query("DROP TABLE IF EXISTS `?menu`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?menu` (
                `menu_id` int(11) NOT NULL AUTO_INCREMENT,
                `menu_parent_id` int(11) NOT NULL DEFAULT '0',
                `menu_title` varchar(45) NOT NULL,
                `menu_url` varchar(100) NOT NULL,
                `menu_classes` varchar(45) DEFAULT NULL,
                `menu_order` int(11) NOT NULL DEFAULT '0',
                `menu_group_id` int(11) NOT NULL,
                `menu_type` varchar(45) NOT NULL DEFAULT 'link',
                `menu_callback` varchar(255) DEFAULT NULL,
                `lft` int(11) NOT NULL,
                `rgt` int(11) NOT NULL,
                PRIMARY KEY (`menu_id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;
            "
        );
        //Default menu data input;
        static::$database->query(
             "INSERT INTO `?menu` (`menu_id`, `menu_parent_id`, `menu_title`, `menu_url`, `menu_classes`, `menu_order`, `menu_group_id`, `menu_type`, `menu_callback`, `lft`, `rgt`) VALUES
                (1, 0, 'Dashboard', '/system/admin/index', ' ', 1, 1, 'link', NULL, 1, 2),
                (2, 0, 'Content Manager', '/system/admin/content/lists', '', 2, 1, 'link', NULL, 3, 12),
                (3, 2, 'All Stories', '/system/admin/content/lists/stories', ' ', 3, 1, 'link', NULL, 4, 11),
                (4, 2, 'All Photos', '/system/admin/content/lists/photos', ' ', 4, 1, 'link', NULL, 5, 10),
                (5, 2, 'All Locations', '/system/admin/content/lists/locations', ' ', 5, 1, 'link', NULL, 6, 9),
                (6, 2, '%{ext:contentlist}', '/system/admin/content/lists/:application', ' ', 6, 1, 'method', 'lookup', 7, 8),
                (7, 0, 'Network Manager', '/system/admin/network/index', '', 7, 1, 'link', '', 13, 24),
                (8, 7, 'All Members', '/system/admin/network/members/lists', '', 8, 1, 'link', '', 14, 23),
                (9, 7, 'Access control', '/system/admin/network/authorities', '', 9, 1, 'link', '', 15, 22),
                (10, 7, 'Relationships', '/system/admin/network/relationships', '', 10, 1, 'link', '', 16, 21),
                (11, 7, 'Analytics', '/system/admin/network/analytics', '', 11, 1, 'link', '', 17, 20),
                (12, 7, '%{ext:network}', '/system/admin/network', '', 12, 1, 'method', 'lookup', 18, 19),
                (13, 0, 'Platform Manager', '/system/admin/manage', NULL, 13, 1, 'link', '', 25, 36),
                (14, 13, 'Manage Categories', '/system/admin/manage/categories', '', 14, 1, 'link', '', 26, 35),
                (15, 13, 'Manager Groups', '/system/admin/manage/groups', '', 15, 1, 'link', '', 27, 34),
                (16, 13, 'Edit Custom Types', '/system/admin/manage/fields', '', 16, 1, 'link', '', 28, 33),
                (17, 13, 'Edit Emails', '/system/admin/manage/emails', '', 17, 1, 'link', '', 29, 32),
                (18, 13, '%{ext:extensionlist}', '/system/admin/manage/:extensions', '', 18, 1, 'method', 'lookup', 30, 31),
                (19, 0, 'Settings & Configurations', '/system/admin/settings/configuration', '', 19, 1, 'link', '', 37, 48),
                (20, 19, 'System Preferences', '/system/admin/settings/configuration', '', 20, 1, 'link', '', 38, 47),
                (21, 19, 'Appearance Settings', '/system/admin/settings/appearance', '', 21, 1, 'link', '', 39, 46),
                (22, 19, 'Maintenance Settings', '/system/admin/settings/maintenance', '', 22, 1, 'link', '', 40, 45),
                (23, 19, 'Access Control Settings', '/system/admin/settings/privacy', '', 23, 1, 'link', '', 41, 44),
                (24, 19, '%{ext:settings}', '/system/admin/settings/:application', '', 24, 1, 'method', 'lookup', 42, 43),
                (25, 0, 'Extensions Manager', '/system/admin/extensions/index', '', 25, 1, 'link', '', 49, 56),
                (26, 25, 'Installed extensions', '/system/admin/extensions/installed', '', 26, 1, 'link', '', 50, 55),
                (27, 25, 'Extension repositories', '/system/admin/extensions/repositories', '', 27, 1, 'link', '', 51, 54),
                (28, 25, 'Add extension', '/system/admin/extensions/add', '', 28, 1, 'link', '', 52, 53),
                (29, 0, 'Enabled Applications', '/system/admin/applications/index', '', 29, 1, 'link', '', 56, 61),
                (30, 29, 'System', '/system/admin/applications/master', '', 30, 1, 'link', '', 57, 60),
                (31, 29, '%{ext:applications}', '/system/admin/applications/', '', 31, 1, 'method', 'lookup', 58, 59),
                (32, 0, 'Account Information', '/member/settings/account', '', 0, 2, 'link', NULL, 1, 2),
                (33, 0, 'Profile Data', '/member/settings/profile', NULL, 0, 2, 'link', NULL, 3, 4),
                (36, 0, 'Notifications', '/member/settings/notifications', NULL, 0, 2, 'link', NULL, 5, 6),
                (37, 0, 'Privacy', '/member/settings/privacy', NULL, 0, 2, 'link', NULL, 7, 8),
                (38, 0, 'Activity', '/member/profile/view/activity', NULL, 0, 5, 'link', NULL, 1, 2),
                (39, 0, 'About Me', '/member/profile/view/about', NULL, 0, 5, 'link', NULL, 3, 4),
                (40, 0, 'Achievements', 'member/profile/view/achievements', NULL, 0, 5, 'link', NULL, 5, 6),
                (41, 0, 'Pilgrimage', 'member/profile/view/pilgrimage', NULL, 0, 5, 'link', NULL, 9, 10),
                (42, 0, 'Dashboard', '/system/start/dashboard', NULL, 0, 3, 'link', NULL, 1, 2),
                (43, 0, 'Activity', '/system/start/dashboard/activity', NULL, 0, 3, 'link', NULL, 3, 4),
                (44, 0, 'Photos', '/system/start/dashboard/photos', NULL, 0, 3, 'link', NULL, 5, 6),
                (45, 0, 'Notifications', '/system/start/dashboard/notifications', NULL, 0, 3, 'link', NULL, 7, 8),
                (46, 0, 'Analytics & Trends', '/system/start/dashboard/analytics', NULL, 0, 3, 'link', NULL, 9, 10),
                (47, 0, 'Inbox', '/member/messages/inbox', NULL, 0, 4, 'link', NULL, 1, 2),
                (48, 0, 'Sent Messages', '/member/messages/sent', NULL, 0, 4, 'link', NULL, 3, 4),
                (49, 0, 'Live Chat', '/member/messages/live', NULL, 0, 4, 'link', NULL, 5, 6),
                (50, 0, 'Deleted Messages', '/member/messages/trash', NULL, 0, 4, 'link', NULL, 7, 8),
                (51, 0, 'Drafts', '/member/messages/drafts', NULL, 0, 4, 'link', NULL, 9, 10);"
         );
    }
    
    private static function createMenuGroupTable(){
        
        static::$database->query("DROP TABLE IF EXISTS `?menu_group`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?menu_group` (
                `menu_group_id` int(11) NOT NULL AUTO_INCREMENT,
                `menu_group_title` varchar(45) NOT NULL,
                `menu_group_order` int(11) NOT NULL DEFAULT '0',
                `menu_group_uid` varchar(45) NOT NULL,
                PRIMARY KEY (`menu_group_id`),
                UNIQUE KEY `menu_group_id_UNIQUE` (`menu_group_id`),
                UNIQUE KEY `menu_group_uid_UNIQUE` (`menu_group_uid`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
        ");
        static::$database->query(
            "INSERT INTO `?menu_group` (`menu_group_id`, `menu_group_title`, `menu_group_order`, `menu_group_uid`) VALUES
            (1, 'Admin Navigation', 1, 'adminmenu'),
            (2, 'Settings Menu', 2, 'settingsmenu'),
            (3, 'Dashboard Menu', 0, 'dashboardmenu'),
            (4, 'Messages menu', 0, 'messagesmenu'),
            (5, 'Profile menu', 0, 'profilemenu');"
        );
    }
    
    private static function createOptionsTable(){
        static::$database->query("DROP TABLE IF EXISTS `?options`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?options` (
                `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `option_group_id` varchar(64) NOT NULL DEFAULT  '',
                `option_name` varchar(64) NOT NULL DEFAULT '',
                `option_value` longtext NOT NULL,
                `option_autoload` varchar(20) NOT NULL DEFAULT 'yes',
                PRIMARY KEY (`option_id`),
                UNIQUE KEY `option_name` (`option_name`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createPostmetaTable(){
        static::$database->query("DROP TABLE IF EXISTS `?postmeta`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?postmeta` (
                `postmeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `postmeta_post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
                `postmeta_key` varchar(255) DEFAULT NULL,
                `postmeta_value` longtext,
                PRIMARY KEY (`postmeta_id`),
                KEY `post_id` (`postmeta_post_id`),
                KEY `meta_key` (`postmeta_key`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createPostsTable(){
        static::$database->query("DROP TABLE IF EXISTS `?posts`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?posts` (
                `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
                `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `post_date_gmt` datetime NOT NULL,
                `post_content` longtext NOT NULL,
                `post_title` text NOT NULL,
                `post_excerpt` text NOT NULL,
                `post_status` varchar(20) NOT NULL DEFAULT 'publish',
                `post_comment_status` varchar(20) NOT NULL DEFAULT 'open',
                `post_ping_status` varchar(20) NOT NULL DEFAULT 'open',
                `post_password` varchar(20) NOT NULL DEFAULT '',
                `post_name` varchar(200) NOT NULL DEFAULT '',
                `post_to_ping` text NOT NULL,
                `post_pinged` text NOT NULL,
                `post_modified` datetime NOT NULL,
                `post_modified_gmt` datetime NOT NULL,
                `post_content_filtered` text NOT NULL,
                `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
                `post_guid` varchar(255) NOT NULL DEFAULT '',
                `post_menu_order` int(11) NOT NULL DEFAULT '0',
                `post_type` varchar(20) NOT NULL DEFAULT 'post',
                `post_mime_type` varchar(100) NOT NULL DEFAULT '',
                `post_comment_count` bigint(20) NOT NULL DEFAULT '0',
                PRIMARY KEY (`post_id`),
                KEY `post_name` (`post_name`),
                KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`post_id`),
                KEY `post_parent` (`post_parent`),
                KEY `post_author` (`post_author`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createSessionTable(){
        static::$database->query("DROP TABLE IF EXISTS `?session`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?session` (
                `session_id` bigint(20) NOT NULL AUTO_INCREMENT,
                `session_token` varchar(150) NOT NULL,
                `session_host` varchar(80) NOT NULL,
                `session_ip` varchar(45) NOT NULL,
                `session_agent` text NOT NULL,
                `session_expires` int(11) NOT NULL,
                `session_lastactive` int(11) NOT NULL,
                `session_registry` text NOT NULL,
                `session_key` varchar(100) NOT NULL,
                PRIMARY KEY (`session_id`),
                UNIQUE KEY `session_key_UNIQUE` (`session_key`),
                UNIQUE KEY `session_token_UNIQUE` (`session_token`),
                UNIQUE KEY `session_key_token` (`session_token`,`session_key`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createUsermetaTable(){
        static::$database->query("DROP TABLE IF EXISTS `?usermeta`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?usermeta` (
                `usermeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `usermeta_user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
                `usermeta_key` varchar(255) DEFAULT NULL,
                `usermeta_value` longtext,
                PRIMARY KEY (`usermeta_id`),
                KEY `user_id` (`usermeta_user_id`),
                KEY `meta_key` (`usermeta_key`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createUsersTable(){
        
        static::$database->query("DROP TABLE IF EXISTS `?users`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?users` (
                `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                `user_name_id` varchar(60) NOT NULL DEFAULT '',
                `user_name` varchar(250) NOT NULL DEFAULT '',
                `user_password` varchar(255) NOT NULL,
                `user_email` varchar(100) NOT NULL DEFAULT '',
                `user_url` varchar(100) NOT NULL DEFAULT '',
                `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `user_key` varchar(60) NOT NULL DEFAULT '',
                `user_status` int(11) NOT NULL DEFAULT '0',
                PRIMARY KEY (`user_id`),
                UNIQUE KEY `user_unique` (`user_name_id`,`user_email`),
                UNIQUE KEY `user_email_unique` (`user_email`),
                UNIQUE KEY `user_name_unique` (`user_name_id`),
                KEY `user_login_key` (`user_name_id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        );
    }
    
    private static function createUsersAuthorityTable(){
        static::$database->query("DROP TABLE IF EXISTS `?users_authority`");
        static::$database->query(
            "CREATE TABLE IF NOT EXISTS `?users_authority` (
                `user_authority_key` varchar(45) NOT NULL,
                `authority_id` bigint(20) NOT NULL,
                `user_id` varchar(45) NOT NULL,
                PRIMARY KEY (`user_authority_key`),
                UNIQUE KEY `UNIQUE_authority` (`authority_id`,`user_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
        );
    }
    
    
    public static function createTables(){
        
        static::createAuthorityTable();
        static::createAuthorityPermissionsTable();
        static::createMenutable();
        static::createMenuGroupTable();
        static::createOptionsTable();
        static::createPostmetaTable();
        static::createPostsTable();
        static::createSessionTable();
        static::createUsermetaTable();
        static::createUsersTable();
        static::createUsersAuthorityTable();
        
        if(!static::$database->commitTransaction()){
            static::setError( static::$database->getError() );
            return false;
        }
        
        return true;
    }
    

    public static function getInstance() {

        //If the class was already instantiated, just return it
        if (isset(static::$instance))
            return static::$instance;

        static::$instance = new self;
        static::$database = Library\Database::getInstance(Library\Config::getParamSection("database"), TRUE );
        
        //Begin trnasation
        static::$database->startTransaction();
        
        
        return static::$instance;
    }

}


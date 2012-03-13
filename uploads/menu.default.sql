/*
-- Query: 
-- Date: 2012-03-11 11:33
*/
INSERT INTO `dd_menu` (`menu_id`,`menu_parent_id`,`menu_title`,`menu_url`,`menu_classes`,`menu_order`,`menu_group_id`,`menu_type`,`menu_callback`,`lft`,`rgt`) VALUES (1,0,'Dashboard','/system/admin/index',' ',1,1,'link',NULL,1,2);
INSERT INTO `dd_menu` (`menu_id`,`menu_parent_id`,`menu_title`,`menu_url`,`menu_classes`,`menu_order`,`menu_group_id`,`menu_type`,`menu_callback`,`lft`,`rgt`) VALUES (2,0,'Content','/system/admin/content/lists','',2,1,'link',NULL,3,12);
INSERT INTO `dd_menu` (`menu_id`,`menu_parent_id`,`menu_title`,`menu_url`,`menu_classes`,`menu_order`,`menu_group_id`,`menu_type`,`menu_callback`,`lft`,`rgt`) VALUES (3,2,'Stories','/system/admin/content/lists/stories',' ',3,1,'link',NULL,4,11);
INSERT INTO `dd_menu` (`menu_id`,`menu_parent_id`,`menu_title`,`menu_url`,`menu_classes`,`menu_order`,`menu_group_id`,`menu_type`,`menu_callback`,`lft`,`rgt`) VALUES (4,2,'Photos','/system/admin/content/lists/photos',' ',4,1,'link',NULL,5,10);
INSERT INTO `dd_menu` (`menu_id`,`menu_parent_id`,`menu_title`,`menu_url`,`menu_classes`,`menu_order`,`menu_group_id`,`menu_type`,`menu_callback`,`lft`,`rgt`) VALUES (5,2,'Locations','/system/admin/content/lists/location',' ',5,1,'link',NULL,6,9);
INSERT INTO `dd_menu` (`menu_id`,`menu_parent_id`,`menu_title`,`menu_url`,`menu_classes`,`menu_order`,`menu_group_id`,`menu_type`,`menu_callback`,`lft`,`rgt`) VALUES (6,8,'${Extensions}','/system/admin/content/lists/:application',' ',6,1,'method','lookup',7,8);

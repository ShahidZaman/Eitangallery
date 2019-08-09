<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-21 10:03:35 --> Query error: Column 'property_description' cannot be null - Invalid query: INSERT INTO `property` (`property_name`, `cat_id`, `property_description`, `property_price`) VALUES ('Nature Images', '2', NULL, '9.99')
ERROR - 2019-03-21 10:26:02 --> Severity: Warning --> include(admin/size.php): failed to open stream: No such file or directory D:\xamp\htdocs\eitan\application\views\backend\index.php 54
ERROR - 2019-03-21 10:26:02 --> Severity: Warning --> include(): Failed opening 'admin/size.php' for inclusion (include_path='D:\xamp\php\PEAR') D:\xamp\htdocs\eitan\application\views\backend\index.php 54
ERROR - 2019-03-21 14:28:44 --> Query error: Table 'adminpanel.size' doesn't exist - Invalid query: SELECT * FROM `size`
ERROR - 2019-03-21 10:35:50 --> Severity: Notice --> Undefined index: name D:\xamp\htdocs\eitan\application\views\backend\admin\modal_edit_size.php 23
ERROR - 2019-03-21 10:35:50 --> Severity: Notice --> Undefined index: description D:\xamp\htdocs\eitan\application\views\backend\admin\modal_edit_size.php 41
ERROR - 2019-03-21 11:54:29 --> Severity: Warning --> move_uploaded_file(uploads/property_image/property_10.jpg): failed to open stream: No such file or directory D:\xamp\htdocs\eitan\application\controllers\Admin.php 191
ERROR - 2019-03-21 11:54:29 --> Severity: Warning --> move_uploaded_file(): Unable to move 'D:\xamp\tmp\phpA695.tmp' to 'uploads/property_image/property_10.jpg' D:\xamp\htdocs\eitan\application\controllers\Admin.php 191
ERROR - 2019-03-21 11:54:29 --> Query error: Table 'adminpanel.uploads' doesn't exist - Invalid query: INSERT INTO `uploads` (`property_id`, `upload_path`) VALUES (1, 'http://localhost/eitan/uploads/property_image/property_10.jpg')
ERROR - 2019-03-21 11:55:39 --> Query error: Table 'adminpanel.uploads' doesn't exist - Invalid query: INSERT INTO `uploads` (`property_id`, `upload_path`) VALUES (2, 'http://localhost/eitan/uploads/property_image/property_20.jpg')
ERROR - 2019-03-21 11:58:59 --> Severity: Warning --> include(admin/viewproperty.php): failed to open stream: No such file or directory D:\xamp\htdocs\eitan\application\views\backend\index.php 54
ERROR - 2019-03-21 11:58:59 --> Severity: Warning --> include(): Failed opening 'admin/viewproperty.php' for inclusion (include_path='D:\xamp\php\PEAR') D:\xamp\htdocs\eitan\application\views\backend\index.php 54
ERROR - 2019-03-21 12:31:58 --> Severity: Notice --> Undefined variable: navigation D:\xamp\htdocs\eitan\application\views\backend\admin\edit_property.php 182
ERROR - 2019-03-21 12:31:58 --> Severity: Notice --> Undefined variable: navigation D:\xamp\htdocs\eitan\application\views\backend\admin\edit_property.php 186
ERROR - 2019-03-21 12:31:58 --> Severity: Notice --> Undefined variable: navigation D:\xamp\htdocs\eitan\application\views\backend\admin\edit_property.php 188
ERROR - 2019-03-21 12:31:58 --> Severity: Notice --> Undefined variable: navigation D:\xamp\htdocs\eitan\application\views\backend\admin\edit_property.php 190
ERROR - 2019-03-21 12:31:58 --> Severity: Notice --> Undefined variable: navigation D:\xamp\htdocs\eitan\application\views\backend\admin\edit_property.php 192
ERROR - 2019-03-21 12:31:58 --> Severity: Notice --> Undefined variable: navigation D:\xamp\htdocs\eitan\application\views\backend\admin\edit_property.php 193
ERROR - 2019-03-21 12:31:58 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: SELECT *
FROM `property`
WHERE `id` = '1'

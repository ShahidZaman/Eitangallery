<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-09 14:07:14 --> Severity: Parsing Error --> syntax error, unexpected '}', expecting ';' or '{' C:\xampp\htdocs\ubereats\application\controllers\Api.php 24
ERROR - 2017-10-09 14:07:35 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) C:\xampp\htdocs\ubereats\application\controllers\Api.php 730
ERROR - 2017-10-09 14:09:29 --> Severity: Notice --> Undefined index: user_id C:\xampp\htdocs\ubereats\application\controllers\Api.php 118
ERROR - 2017-10-09 14:19:50 --> Severity: Error --> Call to undefined method CI_DB_mysqli_result::join() C:\xampp\htdocs\ubereats\application\controllers\Api.php 96
ERROR - 2017-10-09 14:20:12 --> Severity: Parsing Error --> syntax error, unexpected '->' (T_OBJECT_OPERATOR) C:\xampp\htdocs\ubereats\application\controllers\Api.php 96
ERROR - 2017-10-09 14:20:32 --> Severity: Parsing Error --> syntax error, unexpected ',' C:\xampp\htdocs\ubereats\application\controllers\Api.php 95
ERROR - 2017-10-09 14:22:40 --> Query error: Table 'ubereats.oders' doesn't exist - Invalid query: SELECT *
FROM `ride`
JOIN `oders` ON `ride`.`user_id`=`orders`.`user_id`
JOIN `resturant` ON `orders`.`resturant_id`=`resturant`.`resturant_id`
WHERE `ride`.`user_id` = '2'

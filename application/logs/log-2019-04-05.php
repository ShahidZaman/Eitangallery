<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-05 10:54:02 --> Severity: Notice --> Undefined variable: returnURL D:\xamp\htdocs\eitan\application\controllers\Site.php 188
ERROR - 2019-04-05 10:54:02 --> Severity: Notice --> Undefined variable: cancelURL D:\xamp\htdocs\eitan\application\controllers\Site.php 189
ERROR - 2019-04-05 10:54:02 --> Severity: Notice --> Undefined variable: notifyURL D:\xamp\htdocs\eitan\application\controllers\Site.php 190
ERROR - 2019-04-05 10:54:17 --> Severity: Notice --> Undefined variable: returnURL D:\xamp\htdocs\eitan\application\controllers\Site.php 188
ERROR - 2019-04-05 10:54:17 --> Severity: Notice --> Undefined variable: cancelURL D:\xamp\htdocs\eitan\application\controllers\Site.php 189
ERROR - 2019-04-05 10:54:17 --> Severity: Notice --> Undefined variable: notifyURL D:\xamp\htdocs\eitan\application\controllers\Site.php 190
ERROR - 2019-04-05 10:55:07 --> Severity: Notice --> Undefined variable: returnURL D:\xamp\htdocs\eitan\application\controllers\Site.php 188
ERROR - 2019-04-05 10:55:07 --> Severity: Notice --> Undefined variable: cancelURL D:\xamp\htdocs\eitan\application\controllers\Site.php 189
ERROR - 2019-04-05 10:55:07 --> Severity: Notice --> Undefined variable: notifyURL D:\xamp\htdocs\eitan\application\controllers\Site.php 190
ERROR - 2019-04-05 12:18:04 --> Severity: Parsing Error --> syntax error, unexpected end of file D:\xamp\htdocs\eitan\application\views\site\recipet.php 118
ERROR - 2019-04-05 13:28:37 --> Severity: Parsing Error --> syntax error, unexpected '.' D:\xamp\htdocs\eitan\application\views\site\cart.php 102
ERROR - 2019-04-05 15:19:04 --> Query error: Unknown column 'property.shipping_price' in 'field list' - Invalid query: SELECT `order`.`order_id`, `order`.`guest_id`, `order_product`.`product_id`, `order_product`.`price`, `materials`.`materials_price`, `materials`.`materials_name`, `order_product`.`order_product_id`, `size`.`size_price`, `size`.`size_name`, `property`.`shipping_price`, `property`.`expenses_price`, `property`.`property_name`, `property`.`property_name`, `image_url`
FROM `order`
JOIN `order_product` ON `order`.`order_id` = `order_product`.`order_id`
JOIN `property` ON `property`.`property_id` = `order_product`.`product_id`
JOIN `size` ON `size`.`size_id` = `order_product`.`size_id`
JOIN `materials` ON `materials`.`materials_id` = `order_product`.`material_id`
WHERE `order`.`order_status` =0
AND `order`.`guest_id` = 'L2FNHZzkfejRw4iMl8GVPmrsCqQTxXgd'
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: size_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: materials_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: size_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: materials_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: size_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: materials_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: size_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76
ERROR - 2019-04-05 16:10:43 --> Severity: Notice --> Undefined index: materials_price D:\xamp\htdocs\eitan\application\views\site\recipet.php 76

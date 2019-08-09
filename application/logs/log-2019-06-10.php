<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-10 08:54:48 --> Query error: Unknown column 'materials.materials_price' in 'field list' - Invalid query: SELECT `order`.`order_id`, `order`.`guest_id`, `order_product`.`product_id`, `order_product`.`shipping_price_int`, `order_product`.`shipping_price_il`, `order_product`.`price`, `materials`.`materials_price`, `materials`.`materials_name`, `order_product`.`order_product_id`, `property`.`expenses_price`, `property`.`property_name`, `property`.`property_name`, `image_url`
FROM `order`
JOIN `order_product` ON `order`.`order_id` = `order_product`.`order_id`
JOIN `property` ON `property`.`property_id` = `order_product`.`product_id`
WHERE `order`.`order_id` = '42'
ERROR - 2019-06-10 10:21:10 --> Severity: Notice --> Undefined index: name /home/i9hq69vrxxmp/public_html/application/controllers/Admin.php 753

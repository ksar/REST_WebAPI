<?php
/**
 * Created by PhpStorm.
 * User: Ksar
 * Date: 06.12.2018
 * Time: 15:11
 */

// include database and object files
include_once 'config/database.config.php';
include_once 'config/address.config.php';

include_once 'class/database.class.php';
include_once 'class/address.class.php';
require_once 'class/functions.php';

include_once 'model/address.model.php';

$database = new Database();
$db_connection = $database->getConnection();
$address = new Address($db_connection);
$addresses_list = $address->getData('country=\'Poland\'');
print_r($addresses_list);
print("koniec");

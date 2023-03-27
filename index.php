<?php
require('model/database.php');
require('model/typeDB.php');
require('model/makeDB.php');
require('model/classDB.php');
require('model/inventoryDB.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
 {

    $action = filter_input(INPUT_GET, 'action');

    if ($action == NULL)
     {
        $action = 'list_products';
    }
}


if ($action == 'list_products') {
        $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
        $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
        $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
        $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
        
    
        $type_name = get_type_name($typeID);
        $types = get_type();
        $make_name = get_make_name($makeID);
        $makes = get_makes();
        $class_name = get_class_name($classID);
        $classes = get_classes();
        $inventories = get_inventory($typeID, $makeID, $classID, $sort);
    
        include('view/inventory_list.php');
    }


?>
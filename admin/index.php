<?php
require('../model/database.php');
require('../model/typeDB.php');
require('../model/makeDB.php');
require('../model/classDB.php');
require('../model/inventoryDB.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL)
 {

    $action = filter_input(INPUT_GET, 'action');

    if ($action == NULL)
     {
        $action = 'list_inventory';
    }
}


if ($action == 'list_inventory') 
{
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

else if($action == 'delete_inventory')
{
        $itemNum = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
        $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
        $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
        $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
    
        
            delete_inventory($itemNum);
            header("Location: .?itemNum=$itemNum");
        
}

else if($action == 'list_makes')
{
    $makes = get_makes();
    include('view/make_list.php');
}

else if ($action == 'delete_makes') 
{
    $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    delete_make($makeID);
    header('Location: .?action=list_makes');      
}

else if ($action == 'add_make') 
{
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) 
    {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } 
    else 
    {
        add_make($name);
        header('Location: .?action=list_makes');  
    }
}

else if($action == 'list_types')
{
    $types = get_type();
    include('view/types_list.php');
}

else if ($action == 'delete_type') 
{
    $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
    delete_type($typeID);
    header('Location: .?action=list_types');     
}

else if ($action == 'add_type') 
{
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) 
    {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } 
    else 
    {
        add_type($name);
        header('Location: .?action=list_types');  
    }
}

else if($action == 'list_classes')
{
    $classes = get_classes();
    include('view/class_list.php');
}

else if ($action == 'delete_class') 
{
    $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
    delete_class($classID);
    header('Location: .?action=list_classes');     
}

else if ($action == 'add_class') 
{
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) 
    {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } 
    else 
    {
        add_class($name);
        header('Location: .?action=list_classes');  
    }
}


else if ($action == 'show_add_form') 
{
    $types = get_type();
    $makes = get_makes();
    $classes = get_classes();
    include('view/add_vehicle_form.php');    
}

else if($action == 'add_vehicle')
{
    $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
    $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);

    if($typeID == NULL || $typeID == FALSE || $makeID == NULL || $makeID == FALSE || $classID == NULL || $classID == FALSE ||
        $year == NULL || $model == NULL || $price == NULL)
    {
        $error = "Invalid vehicle data. Check all fields and try again.";
        include('view/error.php');
    }
    else
    {
        add_to_inventory($typeID, $makeID, $classID, $year, $model, $price);
        header("Location: .?itemNum=$itemNum");
    }
}


?>
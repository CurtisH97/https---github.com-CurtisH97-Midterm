<?php

function get_type() {
    global $db;
    $query = 'SELECT * FROM types
              ORDER BY typeID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_type_name($typeID) {
    if(!$typeID){
        return "All Types";
    }


    global $db;
    $query = 'SELECT * FROM types
              WHERE typeID = :typeID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();    
    $type = $statement->fetch();
    $statement->closeCursor();    
    $type_name = $type['typeName'];
    return $type_name;
}

function add_type($name) 
{
    global $db;
    $query = 'INSERT INTO types (typeName)
              VALUES (:typeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeName', $name);
    $statement->execute();
    $statement->closeCursor();    
}


function delete_type($typeID) 
{
    global $db;
    $query = 'DELETE FROM types
              WHERE typeID = :typeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $statement->closeCursor();
}
?>
<?php

function get_classes() {
    global $db;
    $query = 'SELECT * FROM class
              ORDER BY classID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_class_name($classID) {
    if(!$classID){
        return "All Classes";
    }


    global $db;
    $query = 'SELECT * FROM class
              WHERE classID = :classID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $statement->execute();    
    $class = $statement->fetch();
    $statement->closeCursor();    
    $class_name = $class['className'];
    return $class_name;
}

function add_class($name) 
{
    global $db;
    $query = 'INSERT INTO class (className)
              VALUES (:className)';
    $statement = $db->prepare($query);
    $statement->bindValue(':className', $name);
    $statement->execute();
    $statement->closeCursor();    
}


function delete_class($classID) 
{
    global $db;
    $query = 'DELETE FROM class
              WHERE classID = :classID';
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $statement->execute();
    $statement->closeCursor();
}

?>
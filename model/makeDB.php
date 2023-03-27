<?php

function get_makes() 
{
    global $db;
    $query = 'SELECT * FROM make
              ORDER BY makeID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_make_name($makeID) 
{
    if(!$makeID){
        return "All Makes";
    }

    global $db;
    $query = 'SELECT * FROM make
              WHERE makeID = :makeID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();    
    $make = $statement->fetch();
    $statement->closeCursor();    
    $make_name = $make['makeName'];
    return $make_name;
}

function add_make($name) 
{
    global $db;
    $query = 'INSERT INTO make (makeName)
              VALUES (:makeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeName', $name);
    $statement->execute();
    $statement->closeCursor();    
}


function delete_make($makeID) 
{
    global $db;
    $query = 'DELETE FROM make
              WHERE makeID = :makeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $statement->closeCursor();
}

?>
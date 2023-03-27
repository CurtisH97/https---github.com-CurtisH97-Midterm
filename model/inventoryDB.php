<?php


function get_inventory($typeID, $makeID, $classID, $sort) {
    global $db;

    $query = 'SELECT itemNum, year, model, price, typeName, makeName, className
              FROM inventory as i
              INNER JOIN make as m ON i.makeID = m.makeID
              INNER JOIN types as t on i.typeID = t.typeID
              INNER JOIN class as c on i.classID = c.classID';

    // Add WHERE clause to filter results based on user's selection
    $conditions = array();
    if (!empty($typeID)) {
        $conditions[] = 'i.typeID = :typeID';
    }
    if (!empty($makeID)) {
        $conditions[] = 'i.makeID = :makeID';
    }
    if (!empty($classID)) {
        $conditions[] = 'i.classID = :classID';
    }
    if (!empty($conditions)) {
        $query .= ' WHERE ' . implode(' AND ', $conditions);
    }

    // Add ORDER BY clause to sort results based on user's choice
    if ($sort == 'price') {
        $query .= ' ORDER BY price DESC';
    } else if ($sort == 'year') {
        $query .= ' ORDER BY year DESC';
    }

    $statement = $db->prepare($query);

    if (!empty($typeID)) {
        $statement->bindValue(':typeID', $typeID);
    }
    if (!empty($makeID)) {
        $statement->bindValue(':makeID', $makeID);
    }
    if (!empty($classID)) {
        $statement->bindValue(':classID', $classID);
    }

    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();

    return $inventory;
}


function add_to_inventory($typeID, $makeID, $classID, $year, $model, $price)
{
    global $db;

    $query = 'INSERT INTO inventory
    (typeID, makeID, classID, year, model, price)
 VALUES
    (:typeID, :makeID, :classID, :year, :model, :price)';

    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->bindValue(':makeID', $makeID);
    $statement->bindValue(':classID', $classID);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

}

function delete_inventory($itemNum)
 {
    global $db;
    $query = 'DELETE FROM inventory
              WHERE itemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->execute();
    $statement->closeCursor();
}
?>
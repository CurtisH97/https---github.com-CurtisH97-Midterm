<?php include 'view/header.php'; ?>
<main>

    <h2>View by Make, Type, or Class:</h2>

    <form action="index.php" method="get">

    <select id="typeID" name="typeID">

        <option value="">View All Types</option>
        <?php foreach ($types as $type) : ?>

        <option value="<?php echo $type['typeID']; ?>" <?php if ($type['typeID'] == $typeID) echo 'selected'; ?>>

        <?php echo $type['typeName']; ?>
        
        </option>
        <?php endforeach; ?>
    </select>           
    <br>
    <select id="makeID" name="makeID">
    <option value="">View All Makes</option>

    <?php foreach ($makes as $make) : ?>

    <option value="<?php echo $make['makeID']; ?>" <?php if ($make['makeID'] == $makeID) echo 'selected'; ?>>

    <?php echo $make['makeName']; ?>

    </option>
    <?php endforeach; ?>
    </select> 
    <br>
    <select id="classID" name="classID">
    <option value="">View All Classes</option>

    <?php foreach ($classes as $class) : ?>

    <option value="<?php echo $class['classID']; ?>" <?php if ($class['classID'] == $classID) echo 'selected'; ?>>

    <?php echo $class['className']; ?>

    </option>
    <?php endforeach; ?>
    </select> 
    <br>
    <input type="radio" id="price" name="sort" value="price" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price') echo 'checked'; ?>>
    <label for="price">Price</label>
    <input type="radio" id="year" name="sort" value="year" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'year') echo 'checked'; ?>>
    <label for="year">Year</label>
    

    <input type="submit" value="submit">
    </form>




    <section>
        <!-- display a table of Inventory Items -->
        
        <table>
            <tr>
                <th>Year</th>
                <th>Model</th>
                <th>Price</th>
                <th>Type</th>
                <th>Make</th>
                <th>Class</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($inventories as $inventory) : ?>
            <tr>
                <td><?php echo $inventory['year']; ?></td>
                <td><?php echo $inventory['model']; ?></td>
                <td>$<?php echo $inventory['price']; ?>.00</td>
                <td><?php echo $inventory['typeName']; ?></td>
                <td><?php echo $inventory['makeName']; ?></td>
                <td><?php echo $inventory['className']; ?></td>
                <td><form action="." method="post">
                <input type="hidden" name="action"
                           value="delete_inventory">
                <input type="hidden" name="itemNum" value="<?php echo $inventory['itemNum']; ?>">
                <input type="hidden" name="typeName" value="<?php echo $typeID; ?>">
                <input type="hidden" name="makeName" value="<?php echo $makeID; ?>">
                <input type="hidden" name="className" value="<?php echo $classID; ?>">
                <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table> 
            
    <p><a href="?action=list_makes">Add/Delete Makes</a></p>
    <p><a href="?action=list_types">Add/Delete Types</a></p>
    <p><a href="?action=list_classes">Add/Delete Classes</a></p> 
    <p><a href="?action=show_add_form">Add Vehicle</a></p>


    </section>
    
    


</main>


<?php include 'footer.php'; ?>
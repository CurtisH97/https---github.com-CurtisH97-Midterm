<?php include 'header.php'; ?>

<main>
    <h1>Add Vehicle:</h1>
    <form action="index.php" method="post" id="add_vehicle_form">
    <input type="hidden" name="action" value="add_vehicle">

        <label>Type:</label>
        <select name="typeID">
            <option value="">View All Types</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['typeName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Make:</label>
        <select name="makeID">
            <option value="">View All Makes</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['makeID']; ?>">
                    <?php echo $make['makeName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Class:</label>
        <select name="classID">
            <option value="">View All Classes</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['classID']; ?>">
                    <?php echo $class['className']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Year:</label>
        <input type="text" name="year"><br>

        <label>Model:</label>
        <input type="text" name="model"><br>

        <label>Price:</label>
        <input type="text" name="price"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vehicle"><br>

    </form>

</main>

<p><a href="index.php?action=list_inventory">List of All Vehicles</a></p>
<p><a href="?action=list_makes">Add/Delete Makes</a></p>
<p><a href="?action=list_types">Add/Delete Types</a></p>
<p><a href="?action=list_classes">Add/Delete Classes</a></p> 


<?php include 'footer.php'; ?>
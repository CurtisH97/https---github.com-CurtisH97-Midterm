<?php include 'header.php'; ?>
<main>
    <table>

        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr> 

        <?php foreach ($types as $type) : ?>
        <tr>
            <td><?php echo $type['typeName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_type" />
                    <input type="hidden" name="typeID"
                           value="<?php echo $type['typeID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>   

    </table>

    <h2>Add Type</h2>

    <form action="index.php" method="post" id="add_type_form">
        <input type="hidden" name="action" value="add_type" />
        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

</main>

<p><a href="index.php?action=list_inventory">List of All Vehicles</a></p>
<p><a href="index.php?action=list_makes">Add/Delete Makes</a></p>
<p><a href="index.php?action=list_classes">Add/Delete Classes</a></p> 
<p><a href="?action=show_add_form">Add Vehicle</a></p>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>
<main>
    <table>

        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr> 

        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['className']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_class" />
                    <input type="hidden" name="classID"
                           value="<?php echo $class['classID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>   

    </table>

    <h2>Add Type</h2>

    <form action="index.php" method="post" id="add_class_form">
        <input type="hidden" name="action" value="add_class" />
        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

</main>

<p><a href="index.php?action=list_inventory">List of All Vehicles</a></p>
<p><a href="index.php?action=list_makes">Add/Delete Makes</a></p>
<p><a href="index.php?action=list_types">Add/Delete Types</a></p>
<p><a href="?action=show_add_form">Add Vehicle</a></p>

<?php include 'footer.php'; ?>
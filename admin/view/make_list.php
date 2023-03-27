<?php include 'header.php'; ?>
<main>
    <table>

        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr> 

        <?php foreach ($makes as $make) : ?>
        <tr>
            <td><?php echo $make['makeName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_makes" />
                    <input type="hidden" name="makeID"
                           value="<?php echo $make['makeID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>   

    </table>

    <h2>Add Make</h2>

    <form action="index.php" method="post" id="add_make_form">
        <input type="hidden" name="action" value="add_make" />
        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

</main>

<p><a href="index.php?action=list_inventory">List of All Vehicles</a></p>
<p><a href="index.php?action=list_types">Add/Delete Types</a></p>
<p><a href="index.php?action=list_classes">Add/Delete Classes</a></p> 
<p><a href="?action=show_add_form">Add Vehicle</a></p>

<?php include 'footer.php'; ?>
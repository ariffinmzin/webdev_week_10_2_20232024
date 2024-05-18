<?php
include 'Database.php';
include 'User.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Fetch each row from the result set
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["matric"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["role"]; ?></td>
                    <td><a href="update_form.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
                    <td><a href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>

                </tr>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        // Close connection
        $db->close();
        ?>
    </table>
</body>

</html>
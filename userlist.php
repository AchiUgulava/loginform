<?php

require_once 'database.class.php';
$db = new DB();

// Fetch the users data 
$users = $db->getRows('users', array('order_by' => 'id DESC'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="nav">
        <div class="nav-link">
            <a href="userlist.php" class="">
                <h1 class="plus">Users</h1>
            </a>
        </div>
        <div class="nav-link">
            <a href="index.php" class="">
                <h1 class="plus">Sign up</h1>
            </a>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) {
                    $i = 0;
                    foreach ($users as $row) {
                        $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <form method="post" action="actions.php">
                                    <input type="hidden" name="action_type" value="delete" />
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                    <button type="submit" class="btn" onclick="return confirm('Are you sure to delete data?');">delete</button>
                                </form>
                            </td>
                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td colspan="5">No user(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
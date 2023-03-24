<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = 'SELECT * FROM friend';
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>

<body>
    <h1>Friends</h1>
   <?php 
    echo '<ul>';
    foreach ($friends as $friend) {
    echo ' <li>' . $friend['firstname'] . ' ' . $friend['lastname'] . '</li>';
    }
    echo '</ul>';
    ?>

    <form method="post" action="pdo.php">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$errors = [];

if(empty($firstname) || empty($lastname))
{
    $errors[] = 'Firstname and lastname fields are required.';
}
if (strlen($firstname > 45 || strlen($lastname)) > 45)
{
    $errors[] = 'Firstname and lastname fields must be less than 45 characters.';
}

if (empty($errors)) {
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    
    $statement = $pdo->prepare($query);
    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement->execute();
    echo 'Welcome '. $firstname. ' '. $lastname. " !<br>";
}

echo 'Redirecting to the home page...';
header("refresh:5,url='index.php'");
?>
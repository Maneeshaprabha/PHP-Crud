<?php
require_once('config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tasks WHERE id = $id";
    mysqli_query($con, $query);

    header('Location: index.php');
}
?>

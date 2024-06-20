<?php
require_once('config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $date = $_POST['date'];

    $query = "INSERT INTO tasks (username, task_title, task_description, Date) VALUES ('$username', '$task_title', '$task_description', '$date')";
    mysqli_query($con, $query);

    header('Location: index.php');
}
?>

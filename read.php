<?php
require_once('config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($con, $query);
    $task = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Read Task</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6">Read Task</h2>
                    </div>
                    <div class="modal-body">
    <div class="row mb-3">
        <div class="col-4 text-right">
            <i class="bi bi-person-circle h2 text-primary"></i>
        </div>
        <div class="col-8">
            <h4 class="font-weight-bold mb-0">Username</h4>
            <p class="text-muted"><?php echo $task['username']; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-4 text-right">
            <i class="bi bi-card-checklist h2 text-success"></i>
        </div>
        <div class="col-8">
            <h4 class="font-weight-bold mb-0">Task Title</h4>
            <p class="text-muted"><?php echo $task['task_title']; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-4 text-right">
            <i class="bi bi-card-text h2 text-info"></i>
        </div>
        <div class="col-8">
            <h4 class="font-weight-bold mb-0">Task Description</h4>
            <p class="text-muted"><?php echo $task['task_description']; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-4 text-right">
            <i class="bi bi-calendar h2 text-warning"></i>
        </div>
        <div class="col-8">
            <h4 class="font-weight-bold mb-0">Date</h4>
            <p class="text-muted"><?php echo $task['date']; ?></p>
        </div>
    </div>
</div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
require_once('config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($con, $query);
    $task = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $date = $_POST['date'];

    $query = "UPDATE tasks SET username = '$username', task_title = '$task_title', task_description = '$task_description', date = '$date' WHERE id = $id";
    mysqli_query($con, $query);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Update Task</title>
</head>
<body class="bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        <h2 class="display-6">Update Task</h2>
                    </div>
                    <div class="card-body bg-secondary text-light">
                        <form action="update.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" value="<?php echo $task['username']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="task_title" class="form-control" value="<?php echo $task['task_title']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea name="task_description" class="form-control" required><?php echo $task['task_description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="date" class="form-control" value="<?php echo $task['date']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Task</button>
                            <a href="index.php" class="btn btn-secondary">close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

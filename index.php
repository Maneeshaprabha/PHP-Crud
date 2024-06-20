<?php 
require_once('config/db.php');

// Fetch tasks
$query = "SELECT * FROM tasks";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Crud Operation</title>
</head>
<body class="bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        <h2 class="display-6">Crud Operation</h2>
                    </div>
                    <div class="card-body bg-secondary text-light">
                        <form action="create.php" method="POST" class="mb-4">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="task_title" class="form-control" placeholder="Task Title" required>
                            </div>
                            <div class="form-group">
                                <textarea name="task_description" class="form-control" placeholder="Task Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add Task</button>
                        </form>

                        <table class="table table-bordered text-center table-dark table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Task Title</th>
                                    <th>Task Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['task_title']; ?></td>
                                    <td><?php echo $row['task_description']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        <button class="btn btn-info view-btn" 
                                                data-id="<?php echo $row['id']; ?>"
                                                data-username="<?php echo $row['username']; ?>"
                                                data-title="<?php echo $row['task_title']; ?>"
                                                data-description="<?php echo $row['task_description']; ?>"
                                                data-date="<?php echo $row['date']; ?>"
                                                >Read</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Task Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>User ID:</strong> <span id="modal-user-id"></span></p>
                    <p><strong>Username:</strong> <span id="modal-username"></span></p>
                    <p><strong>Task Title:</strong> <span id="modal-task-title"></span></p>
                    <p><strong>Task Description:</strong> <span id="modal-task-description"></span></p>
                    <p><strong>Date:</strong> <span id="modal-date"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.view-btn').click(function(){
                var id = $(this).data('id');
                var username = $(this).data('username');
                var title = $(this).data('title');
                var description = $(this).data('description');
                var date = $(this).data('date');

                $('#modal-user-id').text(id);
                $('#modal-username').text(username);
                $('#modal-task-title').text(title);
                $('#modal-task-description').text(description);
                $('#modal-date').text(date);

                $('#viewModal').modal('show');
            });
        });
    </script>
</body>
</html>

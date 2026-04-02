<?php
session_start();
$page = $_GET['page'] ?? ['register'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row full-height p-3">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-flex">
            <div class="card shadow sidebar-card flex-fill">
                <?php require_once('sidebar.php'); ?>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 d-flex">
            <div class="card shadow content-area flex-fill">
                <?php
                if ($page == 'list') {
                    include('student-list.php');
                } else {
                    include('register.php');
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
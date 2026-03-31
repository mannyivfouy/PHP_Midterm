<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="row">
  <div class="col-2 p-2">
    <?php 
      require_once('sidebar.php'); 
    ?>
  </div>

  <div class="col-10 p-4">
    <?php
      require_once('student-list.php');
      // require_once('register.php');
    ?>
  </div>
</div>
</body>
</html>
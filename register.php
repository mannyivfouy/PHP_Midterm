<?php
if (!isset($_SESSION['students'])) {
  $_SESSION['students'] = [];
}

$firstName = $lastName = $email = $phone = "";
$gender = "Male";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];

  if (!preg_match("/^[a-zA-Z]{2,}$/", $firstName)) {
    $errors['firstName'] = "Only letters (min 2)";
  }

  if (!preg_match("/^[a-zA-Z]{2,}$/", $lastName)) {
    $errors['lastName'] = "Only letters (min 2)";
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email";
  }

  if (!preg_match("/^[0-9]{8,15}$/", $phone)) {
    $errors['phone'] = "Invalid phone";
  }

  if (empty($errors)) {
    $_SESSION['students'][] = [
      "firstName" => $firstName,
      "lastName" => $lastName,
      "email" => $email,
      "phone" => $phone,
      "gender" => $gender
    ];

    $firstName = $lastName = $email = $phone = "";
  }
}
?>

<div class="card p-4 shadow">
  <h4>Register Student</h4>

  <form method="POST">

    <div class="mb-3">
      <label>First Name</label>
      <input type="text" name="firstName" class="form-control" value="<?= $firstName ?>">
      <small class="text-danger"><?= $errors['firstName'] ?? "" ?></small>
    </div>

    <div class="mb-3">
      <label>Last Name</label>
      <input type="text" name="lastName" class="form-control" value="<?= $lastName ?>">
      <small class="text-danger"><?= $errors['lastName'] ?? "" ?></small>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="text" name="email" class="form-control" value="<?= $email ?>">
      <small class="text-danger"><?= $errors['email'] ?? "" ?></small>
    </div>

    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="<?= $phone ?>">
      <small class="text-danger"><?= $errors['phone'] ?? "" ?></small>
    </div>

    <div class="mb-3">
      <label>Gender</label><br>
      <input type="radio" name="gender" value="Male" <?= $gender == "Male" ? "checked" : "" ?>> Male
      <input type="radio" name="gender" value="Female" <?= $gender == "Female" ? "checked" : "" ?>> Female
    </div>

    <button class="btn btn-primary">Register</button>
  </form>
</div>
<?php
$success = false;
$errors = [];

$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$gender = "male";
$dateOfBirth = "";

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];

    if (!preg_match("/^[A-Za-z]{2,20}$/", $firstName)) {
        $errors['firstName'] = "First name must be 2-20 letters only";
    }

    if (!preg_match("/^[A-Za-z]{2,20}$/", $lastName)) {
        $errors['lastName'] = "Last name must be 2-20 letters only";
    }

    if (empty($errors)) {
        $success = true;
    }
}
?>

<div class="container-fluid position-relative">
    <h3>Student Registration</h3>
    <hr>

    <?php if ($success): ?>
        <div class="alert alert-success">
            Student Registration Successfully
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="firstName" class="form-label fw-medium">First Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $firstName ?>">
            <small class="text-danger fw-medium"><?= $errors['firstName'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label fw-medium">Last Name</label>
            <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $lastName ?>">
            <small class="text-danger fw-medium"><?= $errors['lastName'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-medium">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <small class="text-danger"></small>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-medium">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control">
            <small class="text-danger"></small>
        </div>

        <div class="mt-5">
            <button class="btn btn-danger me-2" type="reset">
                Reset
            </button>
            <button class="btn btn-primary" type="submit" name="submit">
                Submit
            </button>
        </div>
    </form>
</div>

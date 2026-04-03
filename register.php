<?php
$success = false;
$errors = [];

$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$gender = "male";
$dateOfBirth = "";
$address = "";

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $address = $_POST['address'];

    if (!preg_match("/^[A-Za-z]{2,20}$/", $firstName)) {
        $errors['firstName'] = "First name must be 2-20 letters only";
    }

    if (!preg_match("/^[A-Za-z]{2,20}$/", $lastName)) {
        $errors['lastName'] = "Last name must be 2-20 letters only";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address";
    }

    if (!preg_match("/^[0-9]{9,15}$/", $phone)) {
        $errors['phone'] = "Phone number must be 9-15 digits only";
    }

    if (!in_array($gender, ['male', 'female'])) {
        $errors['gender'] = "Please select a valid gender";
    }

    if (empty($dateOfBirth)) {
        $errors['dateOfBirth'] = "Date of birth is required";
    }

    if (empty($address)) {
        $errors['address'] = "Address is required";
    }

    if (empty($errors)) {
        $success = true;

        $firstName = "";
        $lastName = "";
        $email = "";
        $phone = "";
        $gender = "male";
        $dateOfBirth = "";
        $address = "";
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
            <label for="firstName" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>First
                Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $firstName ?>">
            <small class="text-danger fw-medium"><?= $errors['firstName'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Last
                Name</label>
            <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $lastName ?>">
            <small class="text-danger fw-medium"><?= $errors['lastName'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>">
            <small class="text-danger"><?= $errors['email'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Phone
                Number</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= $phone ?>">
            <small class="text-danger"><?= $errors['phone'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label fw-medium">Gender</label> <br>
            <input type="radio" name="gender" id="gender" value="male" checked <?= $gender ?>> Male
            <input type="radio" name="gender" id="gender" value="female" class="ms-3" <?= $gender ?>> Female
            <small class="text-danger"><?= $errors['gender'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="dateOfBirth" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Date of Birth</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" value="<?= $dateOfBirth ?>">
            <small class="text-danger"><?= $errors['dateOfBirth'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Address</label>
            <textarea name="address" id="address" rows="5" class="form-control"><?= $address ?></textarea>
            <small class="text-danger"><?= $errors['address'] ?? ""?></small>
        </div>

        <div class="mt-5">
            <button class="btn btn-danger me-2" type="reset" name="reset">
                Reset
            </button>
            <button class="btn btn-primary" type="submit" name="submit">
                Submit
            </button>
        </div>
    </form>
</div>

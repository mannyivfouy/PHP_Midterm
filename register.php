<?php

$success = false;

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

$firstName = $lastName = $email = $phone = $dob = "";
$gender = "Male";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    if (!preg_match("/^[a-zA-Z]{3,}$/", $firstName)) {
        $errors['firstName'] = "First Name Must At Least 3 Characters, and Contains Only Letters";
    }

    if (!preg_match("/^[a-zA-Z]{3,}$/", $lastName)) {
        $errors['lastName'] = "Last Name Must At Least 3 Characters, and Contains Only Letters";
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
            "gender" => $gender,
            "dob" => $dob
        ];

        $success = true;

        $firstName = $lastName = $email = $phone = $dob = "";
    }
}
?>

<?php if($success): ?>
    <div class="alert alert-success text-center" role="alert">
        Student Registration Successfully
    </div>
<?php endif; ?>

<div class="card p-4 shadow">
    <h4 class="mb-4 fw-bold">Register Student</h4>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label fw-bold" for="firstName">First Name</label>
            <small class="text-danger fw-medium">* Required</small>
            <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $firstName ?>">
            <small class="text-danger"><?= $errors['firstName'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold" for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $lastName ?>">
            <small class="text-danger"><?= $errors['lastName'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold" for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>">
            <small class="text-danger"><?= $errors['email'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold" for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= $phone ?>">
            <small class="text-danger"><?= $errors['phone'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Gender</label><br>
            <input type="radio" name="gender" value="Male" <?= $gender == "Male" ? "checked" : "" ?>> Male
            <input type="radio" name="gender" value="Female" <?= $gender == "Female" ? "checked" : "" ?>> Female
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold" for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" value="<?= $dob ?>">
            <small class="text-danger"><?= $errors['dob'] ?? "" ?></small>
        </div>


        <button class="btn btn-primary">Register</button>
    </form>
</div>
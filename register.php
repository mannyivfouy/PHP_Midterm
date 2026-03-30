<?php
$firstName = $lastName = $emailID = $mobileNumber = $address = "";
$gender = "male";
$dayOfBirth = $monthOfBirth = $yearOfBirth = "0";
$errors = [];

if (isset($_POST["submitButton"])) {

  $firstName = trim($_POST["firstName"]);
  $lastName = trim($_POST["lastName"]);
  $emailID = trim($_POST["emailID"]);
  $mobileNumber = trim($_POST["mobileNumber"]);
  $gender = $_POST["gender"] ?? "male";
  $dayOfBirth = $_POST["dayOfBirth"];
  $monthOfBirth = $_POST["monthOfBirth"];
  $yearOfBirth = $_POST["yearOfBirth"];
  $address = trim($_POST["address"]);

  // Validation
  if (empty($firstName)) {
    $errors['firstName'] = "First name is required";
  } elseif (!preg_match("/^[a-zA-Z\s]+$/", $firstName)) {
    $errors['firstName'] = "Only letters allowed";
  }

  if (empty($lastName)) {
    $errors['lastName'] = "Last name is required";
  }

  if (empty($emailID)) {
    $errors['emailID'] = "Email is required";
  } elseif (!filter_var($emailID, FILTER_VALIDATE_EMAIL)) {
    $errors['emailID'] = "Invalid email";
  }

  if (empty($mobileNumber)) {
    $errors['mobileNumber'] = "Phone required";
  } elseif (!preg_match("/^[0-9]{8,15}$/", $mobileNumber)) {
    $errors['mobileNumber'] = "Invalid phone";
  }

  if ($dayOfBirth == "0" || $monthOfBirth == "0" || $yearOfBirth == "0") {
    $errors['dob'] = "Select full date";
  }

  if (empty($address)) {
    $errors['address'] = "Address required";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>

  <!-- ✅ Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<?php if (isset($_POST["submitButton"]) && empty($errors)) { ?>

  <!-- ✅ RESULT UI -->
  <div class="card shadow p-4">
    <h3 class="text-success text-center">✅ Registration Successful</h3>

    <hr>

    <h5>👤 Personal Info</h5>
    <p><b>Name:</b> <?= $firstName . " " . $lastName ?></p>
    <p><b>Email:</b> <?= $emailID ?></p>
    <p><b>Gender:</b> <?= ucfirst($gender) ?></p>

    <h5 class="mt-3">📞 Contact</h5>
    <p><b>Phone:</b> <?= $mobileNumber ?></p>

    <h5 class="mt-3">🎂 DOB</h5>
    <p><?= $dayOfBirth ?> / <?= $monthOfBirth ?> / <?= $yearOfBirth ?></p>

    <h5 class="mt-3">🏠 Address</h5>
    <p><?= $address ?></p>

    <div class="text-center mt-4">
      <a href="" class="btn btn-success">Register New</a>
    </div>
  </div>

<?php } else { ?>

  <!-- 🧾 FORM UI -->
  <div class="card shadow p-4">
    <h3 class="text-center mb-4">🎓 Student Registration</h3>

    <form method="POST">

      <div class="row">
        <div class="col-md-6 mb-3">
          <label>First Name</label>
          <input type="text" name="firstName" class="form-control <?= isset($errors['firstName']) ? 'is-invalid' : '' ?>" value="<?= $firstName ?>">
          <div class="invalid-feedback"><?= $errors['firstName'] ?? '' ?></div>
        </div>

        <div class="col-md-6 mb-3">
          <label>Last Name</label>
          <input type="text" name="lastName" class="form-control <?= isset($errors['lastName']) ? 'is-invalid' : '' ?>" value="<?= $lastName ?>">
          <div class="invalid-feedback"><?= $errors['lastName'] ?? '' ?></div>
        </div>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="text" name="emailID" class="form-control <?= isset($errors['emailID']) ? 'is-invalid' : '' ?>" value="<?= $emailID ?>">
        <div class="invalid-feedback"><?= $errors['emailID'] ?? '' ?></div>
      </div>

      <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="mobileNumber" class="form-control <?= isset($errors['mobileNumber']) ? 'is-invalid' : '' ?>" value="<?= $mobileNumber ?>">
        <div class="invalid-feedback"><?= $errors['mobileNumber'] ?? '' ?></div>
      </div>

      <div class="mb-3">
        <label>Gender</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="male" <?= $gender == 'male' ? 'checked' : '' ?>>
          <label class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="female" <?= $gender == 'female' ? 'checked' : '' ?>>
          <label class="form-check-label">Female</label>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <select name="dayOfBirth" class="form-select">
            <option value="0">Day</option>
            <?php for ($i=1;$i<=31;$i++): ?>
              <option value="<?= $i ?>" <?= $dayOfBirth == $i ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <div class="col">
          <select name="monthOfBirth" class="form-select">
            <option value="0">Month</option>
            <?php for ($i=1;$i<=12;$i++): ?>
              <option value="<?= $i ?>" <?= $monthOfBirth == $i ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <div class="col">
          <select name="yearOfBirth" class="form-select">
            <option value="0">Year</option>
            <?php for ($i=1990;$i<=2026;$i++): ?>
              <option value="<?= $i ?>" <?= $yearOfBirth == $i ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <div class="text-danger mb-3"><?= $errors['dob'] ?? '' ?></div>

      <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>"><?= $address ?></textarea>
        <div class="invalid-feedback"><?= $errors['address'] ?? '' ?></div>
      </div>

      <div class="text-center">
        <button type="submit" name="submitButton" class="btn btn-success px-4">Register</button>
        <button type="reset" class="btn btn-secondary px-4">Reset</button>
      </div>

    </form>
  </div>

<?php } ?>

</div>

</body>
</html>
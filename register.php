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
$country = "";
$city = "";
$state = "";
$pinCode = "";
$image = "";
$hobbies = [];
$hobbyOtherText = "";
$qualification = [];
$course = [];

if (isset($_POST['submit'])) {
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $gender = trim($_POST['gender'] ?? 'male');
    $dateOfBirth = trim($_POST['dateOfBirth'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $country = trim($_POST['country'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $state = trim($_POST['state'] ?? '');
    $pinCode = trim($_POST['pinCode'] ?? '');
    $imageName = '';
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir);
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
    }
    $image = $imageName;
    $hobbies = $_POST['hobbies'] ?? [];
    $hobbyOtherText = trim($_POST['hobbyOtherText'] ?? '');
    $qualification = $_POST['qualification'] ?? [];
    $course = $_POST['course'] ?? '';

    if (!preg_match("/^[A-Za-z]{2,20}$/", $firstName)) {
        $errors['firstName'] = "First name must be 2-20 letters only";
    }

    if (!preg_match("/^[A-Za-z]{2,20}$/", $lastName)) {
        $errors['lastName'] = "Last name must be 2-20 letters only";
    }

    if (!preg_match("/^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/", $email)) {
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

    if (empty($country)) {
        $errors['country'] = "Country is required";
    }

    if (empty($city)) {
        $errors['city'] = "City is required";
    }

    if (empty($state)) {
        $errors['state'] = "State is required";
    }

    if (!preg_match("/^[0-9]{4,10}$/", $pinCode)) {
        $errors['pinCode'] = "Pin Code must be 4-10 digits only";
    }

    if (empty($errors)) {
        $success = true;

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'dateOfBirth' => $dateOfBirth,
            'address' => $address,
            'country' => $country,
            'city' => $city,
            'state' => $state,
            'pinCode' => $pinCode,
            'image' => $image,
            'hobbies' => $hobbies,
            'hobbyOther' => $hobbyOtherText,
            'qualification' => $qualification,
            'course' => $course,
        ];

        $file = 'students.json';
        $existing = [];

        if (file_exists($file)) {
            $existing = json_decode(file_get_contents($file), true) ?? [];
        }

        $existing[] = $data;
        file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));

        $firstName = $lastName = $email = $phone = '';
        $dateOfBirth = $address = $country = $city = '';
        $state = $pinCode = $image = $hobbyOtherText = '';
        $gender = 'male';
        $hobbies = [];
        $qualification = [];
    }
}
?>

<div class="overflow-y-auto overflow-x-hidden position-absolute top-0 start-0 end-0 bottom-0 p-3">
    <h3>Student Registration</h3>
    <hr>

    <?php if ($success): ?>
        <div class="alert alert-success">
            Student Registration Successfully
        </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
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
            <small class="text-danger fw-medium"><?= $errors['email'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Phone
                Number</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= $phone ?>">
            <small class="text-danger fw-medium"><?= $errors['phone'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label fw-medium">Gender</label> <br>
            <input type="radio" name="gender" value="male" <?= $gender === 'male' ? 'checked' : '' ?>> Male
            <input type="radio" name="gender" value="female" <?= $gender === 'female' ? 'checked' : '' ?>> Female
            <small class="text-danger fw-medium"><?= $errors['gender'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="dateOfBirth" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Date of Birth</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" value="<?= $dateOfBirth ?>">
            <small class="text-danger fw-medium"><?= $errors['dateOfBirth'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Address</label>
            <textarea name="address" id="address" rows="5" class="form-control"><?= $address ?></textarea>
            <small class="text-danger fw-medium"><?= $errors['address'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Country</label>
            <input type="text" name="country" id="country" class="form-control" value="<?= $country ?>">
            <small class="text-danger fw-medium"><?= $errors['country'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>City</label>
            <input type="text" name="city" id="city" class="form-control" value="<?= $city ?>">
            <small class="text-danger fw-medium"><?= $errors['city'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="state" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>State</label>
            <input type="text" name="state" id="state" class="form-control" value="<?= $state ?>">
            <small class="text-danger fw-medium"><?= $errors['state'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="pinCode" class="form-label fw-bold"><span class="text-danger fw-bold">* </span>Pin Code</label>
            <input type="text" name="pinCode" id="pinCode" class="form-control" value="<?= $pinCode ?>">
            <small class="text-danger fw-medium"><?= $errors['pinCode'] ?? "" ?></small>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-bold"><span class="text-danger fw-bold"></span>Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <small class="text-danger fw-medium"></small>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Hobbies</label>

            <div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobbies[]" id="hobbyDrawing" value="Drawing" class="form-check-input"
                        <?= in_array('Drawing', $hobbies) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="hobbyDrawing">Drawing</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobbies[]" id="hobbySinging" value="Singing" class="form-check-input"
                        <?= in_array('Singing', $hobbies) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="hobbySinging">Singing</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobbies[]" id="hobbySketching" value="Sketching"
                           class="form-check-input"
                        <?= in_array('Sketching', $hobbies) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="hobbySketching">Sketching</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobbies[]" id="hobbyGaming" value="Gaming" class="form-check-input"
                        <?= in_array('Gaming', $hobbies) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="hobbyGaming">Gaming</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobbies[]" id="hobbyOther" value="Other" class="form-check-input"
                        <?= in_array('Other', $hobbies) ? 'checked' : '' ?>
                           onclick="document.getElementById('otherHobbyWrapper').style.display = this.checked ? 'block' : 'none'">
                    <label class="form-check-label" for="hobbyOther">Other</label>
                </div>
            </div>

            <div id="otherHobbyWrapper" style="display: <?= in_array('Other', $hobbies) ? 'block' : 'none' ?>;"
                 class="mt-2">
                <input type="text" name="hobbyOtherText" id="hobbyOtherText" class="form-control"
                       placeholder="Please specify your hobby"
                       value="<?= htmlspecialchars($hobbyOtherText ?? '') ?>">
            </div>

            <small class="text-danger fw-medium"></small>
        </div>

        <div class="mb-3">
            <label for="qualification" class="form-label fw-bold">Qualification</label>
            <div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="qualification[]"
                           value="High School (10th)" <?= in_array('High School (10th)', $qualification) ? 'checked' : '' ?>>
                    <label for="High School (10th)">High School (10th)</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="qualification[]"
                           value="Higher School (12th)" <?= in_array('Higher School (12th)', $qualification) ? 'checked' : '' ?>>
                    <label for="Higher School (12th)">Higher School (12th)</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="qualification[]"
                           value="Graduation (Bachelor)" <?= in_array('Graduation (Bachelor)', $qualification) ? 'checked' : '' ?>>
                    <label for="Graduation (Bachelor)">Graduation (Bachelor)</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="qualification[]"
                           value="Post Graduation (Master)" <?= in_array('Post Graduation (Master)', $qualification) ? 'checked' : '' ?>>
                    <label for="Post Graduation (Master)">Post Graduation (Master)</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="qualification[]"
                           value="PHD" <?= in_array('PHD', $qualification) ? 'checked' : '' ?>>
                    <label for="PHD">PHD</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Course Apply For</label>
            <div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_bca"
                           value="BCA(Bachelor of Computer Applications)" <?= $course === 'BCA(Bachelor of Computer Applications)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_bca">BCA(Bachelor of Computer Applications)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_bcom"
                           value="B.Com(Bachelor of Commerce)" <?= $course === 'B.Com(Bachelor of Commerce)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_bcom">B.Com(Bachelor of Commerce)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_bsc"
                           value="B.Sc(Bachelor of Science)" <?= $course === 'B.Sc(Bachelor of Science)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_bsc">B.Sc(Bachelor of Science)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_ba"
                           value="BA(Bachelor of Arts)" <?= $course === 'BA(Bachelor of Arts)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_ba">BA(Bachelor of Arts)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_mca"
                           value="MCA(Master of Computer Applications)" <?= $course === 'MCA(Master of Computer Applications)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_mca">MCA(Master of Computer Applications)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_mcom"
                           value="M.Com(Master of Commerce)" <?= $course === 'M.Com(Master of Commerce)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_mcom">M.Com(Master of Commerce)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_msc"
                           value="M.Sc(Master of Science)" <?= $course === 'M.Sc(Master of Science)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_msc">M.Sc(Master of Science)</label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="course" id="course_ma"
                           value="MA(Master of Arts)" <?= $course === 'MA(Master of Arts)' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="course_ma">MA(Master of Arts)</label>
                </div>
            </div>
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

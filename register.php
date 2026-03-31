<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid vh-100 p-5">
    <div class="row">
      <div class="form-container col-6 card shadow-sm">
        <form action="" method="post" class="p-3 rounded">
          <div class="mb-3">
            <label for="firstname" class="form-label fw-bold">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="lastname" class="form-label fw-bold">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email Address</label>
            <input type="text" name="email" id="email" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="phoneNumber" class="form-label fw-bold">Phone Number</label>
            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label class="form-label d-block fw-bold" for="gender">Gender</label>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="Male">
              <label class="form-check-label">Male</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="Female">
              <label class="form-check-label">Female</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="dob" class="form-label fw-bold">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
          </div>

          <div class="mb-3">
            <label for="address" class="form-label fw-bold">Address</label>
            <textarea name="address" id="address" rows="3" class="form-control"></textarea>
          </div>
<!-- 
          <div class="mb-3">
            <label for="country" class="form-label fw-bold">Country</label>
            <input type="text" name="country" id="country" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="city" class="form-label fw-bold">City</label>
            <input type="text" name="city" id="city" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="phoneNumber" class="form-label fw-bold">Phone Number</label>
            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
            <small class="text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="phoneNumber" class="form-label fw-bold">Phone Number</label>
            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
            <small class="text-danger"></small>
          </div> -->


        </form>
      </div>
      <div class="list-container col-6">


      </div>
    </div>
  </div>
</body>

</html>
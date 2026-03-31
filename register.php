<div class="container-fluid">
  <div class="row justify-content-center">

    <!-- Add column -->
    <div class="col-md-6 ">

      <!-- Card -->
      <div class="card shadow-sm mt-4">

        <!-- Make scrollable -->
        <div class="card-body" style="max-height: 90vh; overflow-y: auto;">

          <form method="post">

            <div class="mb-3">
              <label class="form-label fw-bold">First Name</label>
              <input type="text" name="firstname" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Last Name</label>
              <input type="text" name="lastname" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Email</label>
              <input type="text" name="email" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Phone</label>
              <input type="text" name="phoneNumber" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold d-block">Gender</label>

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
              <label class="form-label fw-bold">Date of Birth</label>
              <input type="date" name="dob" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Address</label>
              <textarea name="address" class="form-control"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Country</label>
              <input type="text" name="country" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">City</label>
              <input type="text" name="city" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Pin Code</label>
              <input type="text" name="pincode" id="pincode" class="form-control">
            </div>

            <div class="mt-3">
              <button class="btn btn-danger">
                Reset
              </button>
  
              <button class="btn btn-primary">
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
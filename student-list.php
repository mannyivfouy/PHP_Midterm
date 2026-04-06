<?php
$jsonFile = file_get_contents('students.json');
$students = json_decode($jsonFile, true) ?? [];
?>

<div class="container-fluid mt-4">
    <h3>Student List</h3>
    <hr>
    <table class="table table-hover">
        <thead class="table-light text-dark">
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($students)): ?>
            <?php foreach ($students as $index => $student): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($student['firstName'] . ' ' . $student['lastName']) ?></td>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                    <td><?= htmlspecialchars($student['phone']) ?></td>
                    <td><?= ucfirst($student['gender']) ?></td>
                    <td>
                        <button class="btn btn-sm border"
                                data-bs-toggle="modal"
                                data-bs-target="#studentModal"
                                onclick="showDetail(<?= $index ?>)">
                            <i class="bi bi-eye me-2"></i> View Details
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No students found</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Student Detail</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="modalBody">
                <!-- Filled by JavaScript -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    const students = <?= json_encode($students) ?>;

    function showDetail(index) {
        const s = students[index];

        document.getElementById('modalBody').innerHTML = `
            <div class="row g-3">

                <div class="col-12">
                    <h6 class="text-muted border-bottom pb-1">Personal Info</h6>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">First Name</small>
                    <p class="fw-bold mb-0">${s.firstName}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Last Name</small>
                    <p class="fw-bold mb-0">${s.lastName}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Email</small>
                    <p class="fw-bold mb-0">${s.email}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Phone</small>
                    <p class="fw-bold mb-0">${s.phone}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Gender</small>
                    <p class="fw-bold mb-0">${s.gender}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Date of Birth</small>
                    <p class="fw-bold mb-0">${s.dateOfBirth}</p>
                </div>

                <div class="col-12">
                    <h6 class="text-muted border-bottom pb-1 mt-2">Address Info</h6>
                </div>
                <div class="col-12">
                    <small class="text-muted">Address</small>
                    <p class="fw-bold mb-0">${s.address}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Country</small>
                    <p class="fw-bold mb-0">${s.country}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">City</small>
                    <p class="fw-bold mb-0">${s.city}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">State</small>
                    <p class="fw-bold mb-0">${s.state}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Pin Code</small>
                    <p class="fw-bold mb-0">${s.pinCode}</p>
                </div>

                <div class="col-12">
                    <h6 class="text-muted border-bottom pb-1 mt-2">Other Info</h6>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Hobbies</small>
                    <p class="fw-bold mb-0">${s.hobbies.length ? s.hobbies.join(', ') : 'None'}</p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Qualification</small>
                    <p class="fw-bold mb-0">${s.qualification.length ? s.qualification.join(', ') : 'None'}</p>
                </div>
                <div class="col-12">
                    <small class="text-muted">Course Apply For</small>
                    <p class="fw-bold mb-0">${s.course ?? 'None'}</p>
                </div>
            </div>
        `;
    }
</script>
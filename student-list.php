<div class="card mt-4 p-4 shadow">
    <h4 class="fw-bold mb-3">Student List</h4>

    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($_SESSION['students'])): ?>
            <?php foreach ($_SESSION['students'] as $index => $student): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $student['firstName'] ?></td>
                    <td><?= $student['lastName'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['phone'] ?></td>
                    <td><?= $student['gender'] ?></td>
                    <td><?= $student['dob'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-muted">No students registered yet</td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>
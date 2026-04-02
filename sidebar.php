<?php
$page = $_GET['page'] ?? ['register'];
?>

<h3 class="fw-bold mb-3 text-center">Student Management</h3>
<hr>
<ul class="nav flex-column">
    <div class="mb-2">
        <a href="?page=register" class="d-block p-2 text-decoration-none
            <?= $page == 'register' ? 'bg-primary text-white rounded' : 'text-secondary' ?>">
            <i class="bi bi-person-fill-add me-2"></i> Register Student
        </a>
    </div>

    <div class="mb-2">
        <a href="?page=list" class="d-block p-2 text-decoration-none
            <?= $page == 'list' ? 'bg-primary text-white rounded' : 'text-secondary' ?>">
            <i class="bi bi-table me-2"></i> Student List
        </a>
    </div>
</ul>
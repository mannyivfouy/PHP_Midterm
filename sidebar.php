<?php $page = $_GET['page'] ?? 'register'; ?>

<div class="mb-5">
  <h4 class="text-center mb-4">Student Management</h4>
  <hr>
</div>

<div class="mb-2">
  <a href="?page=register" class="d-block p-2 text-decoration-none 
     <?= $page == 'register' ? 'bg-primary text-white rounded' : 'text-secondary' ?>">
    <i class="bi bi-person-plus me-2"></i> Register Student
  </a>
</div>

<div class="mb-2">
  <a href="?page=list" class="d-block p-2 text-decoration-none 
     <?= $page == 'list' ? 'bg-primary text-white rounded' : 'text-secondary' ?>">
    <i class="bi bi-table me-2"></i> Student List
  </a>
</div>
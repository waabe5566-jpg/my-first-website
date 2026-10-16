<?php require 'includes/header.php'; require 'config/db.php';
$students=$conn->query("SELECT COUNT(*) c FROM students")->fetch_assoc()['c'];
$teachers=$conn->query("SELECT COUNT(*) c FROM teachers")->fetch_assoc()['c'];
$classes=$conn->query("SELECT COUNT(*) c FROM classes")->fetch_assoc()['c'];
$subjects=$conn->query("SELECT COUNT(*) c FROM subjects")->fetch_assoc()['c'];
?>
<h3 class="mb-4">Dashboard</h3><div class="row g-4">
<?php foreach([['Students',$students,'people-fill'],['Teachers',$teachers,'person-badge-fill'],['Classes',$classes,'building'],['Subjects',$subjects,'book-fill']] as $x):?>
<div class="col-sm-6 col-lg-3"><div class="card card-stat p-4"><div class="text-muted"><?=$x[0]?></div><div class="d-flex justify-content-between align-items-center"><h2><?=$x[1]?></h2><i class="bi bi-<?=$x[2]?> fs-1 text-primary"></i></div></div></div>
<?php endforeach;?></div>
<div class="card mt-4 p-4"><h5>System Overview</h5><p class="text-muted">Use the menu to manage students, teachers, classes, subjects, attendance, results, fees and timetable.</p></div>
<?php require 'includes/footer.php'; ?>
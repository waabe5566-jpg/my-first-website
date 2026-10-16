<?php require_once __DIR__.'/auth.php'; ?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>School Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
body{background:#f4f7fb;font-family:Arial,sans-serif}.sidebar{min-height:100vh;background:#0757b8;color:#fff}
.sidebar a{color:#fff;text-decoration:none;display:block;padding:11px 18px;border-radius:8px;margin:3px 8px}
.sidebar a:hover{background:rgba(255,255,255,.16)}.brand{font-size:21px;font-weight:bold;padding:20px}
.content{padding:25px}.card-stat{border:0;border-radius:15px;box-shadow:0 5px 20px #0000000d}
.navbar{background:#fff;box-shadow:0 2px 10px #0000000b}
</style></head><body>
<div class="container-fluid"><div class="row">
<div class="col-md-2 col-lg-2 px-0 sidebar">
<div class="brand"><i class="bi bi-mortarboard-fill"></i> School System</div>
<a href="index.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
<a href="students.php"><i class="bi bi-people"></i> Students</a>
<a href="teachers.php"><i class="bi bi-person-badge"></i> Teachers</a>
<a href="classes.php"><i class="bi bi-building"></i> Classes</a>
<a href="subjects.php"><i class="bi bi-book"></i> Subjects</a>
<a href="attendance.php"><i class="bi bi-check2-square"></i> Attendance</a>
<a href="results.php"><i class="bi bi-bar-chart"></i> Results</a>
<a href="fees.php"><i class="bi bi-cash-stack"></i> Fees</a>
<a href="timetable.php"><i class="bi bi-calendar3"></i> Timetable</a>
<a href="reports.php"><i class="bi bi-file-earmark-text"></i> Reports</a>
<a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div><div class="col-md-10 col-lg-10 px-0">
<nav class="navbar p-3"><span class="fw-bold">School Management</span><span>Welcome, <?=htmlspecialchars($_SESSION['name']??'Admin')?></span></nav>
<div class="content">

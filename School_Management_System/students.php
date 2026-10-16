<?php require 'includes/header.php'; require 'config/db.php';
if(isset($_GET['delete'])){$id=(int)$_GET['delete'];$conn->query("DELETE FROM students WHERE id=$id");header('Location:students.php');exit;}
if($_SERVER['REQUEST_METHOD']==='POST'){
 $sid=trim($_POST['student_id']);$fn=trim($_POST['first_name']);$ln=trim($_POST['last_name']);$gender=$_POST['gender'];$dob=$_POST['date_of_birth']?:null;$phone=trim($_POST['phone']);$parent=trim($_POST['parent_name']);$pp=trim($_POST['parent_phone']);$address=trim($_POST['address']);$class_id=(int)$_POST['class_id'];
 $st=$conn->prepare("INSERT INTO students(student_id,first_name,last_name,gender,date_of_birth,phone,parent_name,parent_phone,address,class_id) VALUES(?,?,?,?,?,?,?,?,?,?)");
 $st->bind_param('sssssssssi',$sid,$fn,$ln,$gender,$dob,$phone,$parent,$pp,$address,$class_id);$st->execute();header('Location:students.php');exit;
}
$classes=$conn->query("SELECT * FROM classes ORDER BY class_name");$rows=$conn->query("SELECT s.*,c.class_name FROM students s LEFT JOIN classes c ON c.id=s.class_id ORDER BY s.id DESC");
?>
<div class="d-flex justify-content-between align-items-center mb-3"><h3>Students</h3><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">+ Add Student</button></div>
<div class="card p-3"><div class="table-responsive"><table class="table table-hover align-middle"><thead><tr><th>ID</th><th>Name</th><th>Gender</th><th>Phone</th><th>Class</th><th>Parent</th><th>Action</th></tr></thead><tbody>
<?php while($r=$rows->fetch_assoc()):?><tr><td><?=$r['student_id']?></td><td><?=htmlspecialchars($r['first_name'].' '.$r['last_name'])?></td><td><?=$r['gender']?></td><td><?=$r['phone']?></td><td><?=$r['class_name']?:'-'?></td><td><?=htmlspecialchars($r['parent_name'])?></td><td><a class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete student?')" href="?delete=<?=$r['id']?>">Delete</a></td></tr><?php endwhile;?>
</tbody></table></div></div>
<div class="modal fade" id="add"><div class="modal-dialog modal-lg"><div class="modal-content"><form method="post"><div class="modal-header"><h5>Add Student</h5><button class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="row g-3">
<div class="col-md-4"><label>Student ID</label><input name="student_id" class="form-control" required></div><div class="col-md-4"><label>First Name</label><input name="first_name" class="form-control" required></div><div class="col-md-4"><label>Last Name</label><input name="last_name" class="form-control"></div>
<div class="col-md-4"><label>Gender</label><select name="gender" class="form-select"><option>Male</option><option>Female</option></select></div><div class="col-md-4"><label>Date of Birth</label><input type="date" name="date_of_birth" class="form-control"></div><div class="col-md-4"><label>Phone</label><input name="phone" class="form-control"></div>
<div class="col-md-6"><label>Parent Name</label><input name="parent_name" class="form-control"></div><div class="col-md-6"><label>Parent Phone</label><input name="parent_phone" class="form-control"></div>
<div class="col-md-6"><label>Class</label><select name="class_id" class="form-select"><option value="0">Select class</option><?php while($c=$classes->fetch_assoc()):?><option value="<?=$c['id']?>"><?=htmlspecialchars($c['class_name'].' '.$c['section'])?></option><?php endwhile;?></select></div>
<div class="col-md-6"><label>Address</label><input name="address" class="form-control"></div>
</div></div><div class="modal-footer"><button class="btn btn-primary">Save Student</button></div></form></div></div></div>
<?php require 'includes/footer.php'; ?>
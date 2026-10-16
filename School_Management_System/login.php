<?php
session_start(); require_once 'config/db.php';
if(isset($_SESSION['user_id'])){header('Location:index.php');exit;}
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $u=trim($_POST['username']??''); $p=md5($_POST['password']??'');
 $stmt=$conn->prepare("SELECT id,name,username,role FROM users WHERE username=? AND password=? LIMIT 1");
 $stmt->bind_param('ss',$u,$p); $stmt->execute(); $r=$stmt->get_result()->fetch_assoc();
 if($r){$_SESSION['user_id']=$r['id'];$_SESSION['name']=$r['name'];$_SESSION['role']=$r['role'];header('Location:index.php');exit;}
 $error='Username or password is incorrect.';
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login - School System</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{background:#0757b8}.box{max-width:420px;margin:10vh auto;background:#fff;padding:35px;border-radius:18px}</style></head>
<body><div class="box"><h3 class="text-center mb-4">🎓 School Management</h3>
<?php if($error):?><div class="alert alert-danger"><?=$error?></div><?php endif;?>
<form method="post"><input class="form-control mb-3" name="username" placeholder="Username" required>
<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
<button class="btn btn-primary w-100">Login</button></form>
<p class="text-center text-muted mt-3 mb-0">Admin: admin / admin123</p></div></body></html>
<?php
$con = mysqli_connect("localhost","root","", "cov_db") or die(mysql_error());
 ?>

<?php
session_start();
function result ($query) {
  global $con;
  if ($result = mysqli_query($con, $query) or die ('gagal menampilkan data')){
  return $result;
  }
}

function run($query) {
  global $con;
  if (mysqli_query ($con, $query)) return true;
  else return false;
  }

function user($username) {
  $query = "SELECT * FROM users WHERE username='$username'";
  return result ($query);
}

function update_pass($param_password,$username) {
$query = "UPDATE users SET password='$param_password' WHERE username='$username'";
return run ($query);
}
 ?>

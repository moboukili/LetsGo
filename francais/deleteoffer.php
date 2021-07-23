<?php
  include_once 'db.php';

if (isset($_GET['idride'])) {
   $idride=$_GET['idride'];
   $iduser = $_SESSION['id'];

   $query_delete = "DELETE FROM ride WHERE idride = '$idride' AND id = '$iduser' ";
   $result_delete = $con->query($query_delete);


header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  echo "error";;
}
?>

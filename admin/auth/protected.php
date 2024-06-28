<?php
if (isset($_SESSION['Role']) && $_SESSION['Role']!='1'){
  header('location:../customer/index.php');
}
?>
<?php
require('../config/config.php');
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username != "" && $password != "") {
        $select = "SELECT * from admin where username = '$username' AND password= '$password' ";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            
           
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['username'] = $data['username'];

            $_SESSION['Role']= $data['role'];
            $_SESSION['IS_Login']='yes';
            if($data['role']==1){

                header("Refresh:0; url = ../dashboard.php?msg=success");
            }
            if($data['role']==2){

                header("Refresh:0; url = ../dashboard.php?msg=success");
            }
            if ($data['role']==0){
                header("Refresh:3; url = ../../index.php?msg=notverified");
            ?>
            <div class="alert alert-danger" role="alert">
                <h1 class="alert-heading">Not verified!</h1>
                <h3>You are not verified as a seller. Wait for the verification process to be complete </h3>
                <hr>
            </div>
            <?php
                // echo"You are not verified as a Seller ";
            }
        
        }
        else{

            header("Refresh:0; url = ../index.php?error");

        }
    }
    else{
        echo "all field are required";
    }
}


// ==================================================
//              Customer Login
// ==================================================
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if ($email != "" && $password != "") {
        $select = "SELECT * from customer where email = '$email' AND password= '$password' AND password= '$password'";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];

            
        
            header("Refresh:1; url = ../../index.php?msg=success");
        }
        else{

            header("Refresh:0; url = ../../login.php?error");

        }
    }
    else{
        echo "all field are required";
    }
}

// ==================================================
//              Seller Login
// ==================================================
if (isset($_POST['seller'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ( $username != "" && $password != "") {
        $select = "SELECT * from seller where  username= '$username' AND password= '$password'";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['username'] = $data['username'];
            // $_SESSION['email'] = $data['email'];

            $_SESSION['Role']=$data['role'];
            $_SESSION['IS_Login']='yes';
            if ($data['role']==1){

                header("Refresh:0; url = ../dashboard.php?msg=success");
            }
            if ($data['role']==2){
                header("Refresh:0; url = ../dashboard.php?msg=success");
            }
            if ($data['role']==0){
                header("Refresh:3; url = ../../index.php?msg=notverified");
            ?>
            <div class="alert alert-danger" role="alert">
                <h1 class="alert-heading">Not verified!</h1>
                <h3>You are not verified as a seller. Wait for the verification process to be complete </h3>
                <hr>
            </div>
            <?php
                // echo"You are not verified as a Seller ";
            }
        
        }
        else{

            header("Refresh:0; url = ../../seller_login.php?error");

        }
    }
    else{
        echo "all field are required";
    }
}

?>
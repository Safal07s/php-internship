<?php
require('../config/config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password =md5 ($_POST['password']);

    if ($name != "" && $email != "" && $username != "") {
        $select= "SELECT * FROM admin where email = '$email' ";
        $result = mysqli_query ($con, $select );

        if (mysqli_num_rows($result) >0){
            echo"This email already exists";
            header("Refresh:2; URL=../register.php");

        }
        else{

            $insert= "INSERT INTO admin(name,email,username, password)
            VALUES('$name', '$email','$username', '$password')";
            $result=mysqli_query($con, $insert);
    
            if($result){
                $_SESSION['message']="Sign Up Successful";
                // $_SESSION['msg-type']="success";
                header("Refresh:0; URL=../dashboard.php?success");
            }
            else{
                header("Refresh:0; URL=../register.php?error");
            }
        }

        // $insert= $con->query("INSERT INTO users(name, address, phone, email, password)
        // VALUES('$name', '$address', '$phone', '$email', '$password')");
    } else {

        header("Refresh:0; URL=../register.php?empty");
    }
}

// require('../config/config.php');
// require('admin/config/config.php');

// 
//  =========================================================
//                     Register Process
//  =========================================================
//  
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password =md5 ($_POST['password']);

    if ($name != "" && $email != "" && $username != "") {
        $select= "SELECT * FROM customer where email = '$email' ";
        $result = mysqli_query ($con, $select );

        if (mysqli_num_rows($result) >0){
            echo"This email already exists";
            header("Refresh:2; URL=../../signup.php");

        }
        else{

            $insert= "INSERT INTO customer(name,email,username, password)
            VALUES('$name', '$email','$username', '$password')";
            $result=mysqli_query($con, $insert);
    
            if($result){
                $_SESSION['message']="SignUp Successful. Welcome To Quick Mart.";
                $_SESSION['msg_type']="success";
                header("Refresh:2; URL=../../login.php?login");
            }
            else{
                header("Refresh:0; URL=../../signup.php?error");
            }
        }

        // $insert= $con->query("INSERT INTO users(name, address, phone, email, password)
        // VALUES('$name', '$address', '$phone', '$email', '$password')");
    } else {

        header("Refresh:0; URL=../../signup.php?empty");
    }
}

// 
//  =========================================================
//                    Seller Register Process
//  =========================================================
//  
if (isset($_POST['seller'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password =md5 ($_POST['password']);

    if ($name != "" && $email != "" && $username != "") {
        $select= "SELECT * FROM seller where email = '$email' ";
        $result = mysqli_query ($con, $select );

        if (mysqli_num_rows($result) >0){
            echo"This email already exists";
            header("Refresh:2; URL=../../seller_registration.php");

        }
        else{

            $insert= "INSERT INTO seller(name,email,username, password)
            VALUES('$name', '$email','$username', '$password')";
            $result=mysqli_query($con, $insert);
    
            if($result){
                $_SESSION['message']="SignUp Successful. Welcome To Quick Mart.";
                $_SESSION['msg_type']="success";
                header("Refresh:2; URL=../../seller_login.php?login");
            }
            else{
                header("Refresh:0; URL=../../seller_registration.php?error");
            }
        }

        // $insert= $con->query("INSERT INTO users(name, address, phone, email, password)
        // VALUES('$name', '$address', '$phone', '$email', '$password')");
    } else {

        header("Refresh:0; URL=../../signup.php?empty");
    }
}

?>

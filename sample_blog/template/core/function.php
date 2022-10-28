<?php

//common start
function alert($data,$color="danger"){
    return "<p class='alert alert-$color'>$data</p>";
}
function runQuery($sql){
    if(mysqli_query(conn(),$sql)){
        return true;
    }
    else{
        die('Fail connection !');
    }
}
function redirect($location){
    header("location:$location");
}
//common end

//auth start
function register(){
    $userName=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $securePassword=password_hash($password,PASSWORD_DEFAULT);
    if($password==$confirmPassword){
        $sql="INSERT INTO users (name,email,password) VALUES ('$userName','$email','$securePassword')";
        
        if(runQuery($sql)){
            redirect("login.php");
        }
    }
    else{
        return alert("Password don't match");
    }
}
//auth end

//login start
function login(){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM users WHERE email='$email'";
    $query=mysqli_query(conn(),$sql);
    $row=mysqli_fetch_assoc($query);
    if(!$row){
        return alert("Email or password don't match!");
    }
    else{
        if(!password_verify($password,$row['password'])){
            return alert("Email or password don't match!");
        }
        else{
            session_start();
            $_SESSION['user']=$row;
            redirect("dashboard.php");
        }
    }
}

//login end
?>
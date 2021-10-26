<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbConnect.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"]; 
    
    $sql = "Select * from users where username='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        $userConfirm = $row['confirm'];
        if (password_verify($password, $row['password']) && ($userConfirm == 1)){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            header("location: /PW_UTS_Ecomm/index.php?loginsuccess=true");
            exit();
        } 
        else{
            header("location: /PW_UTS_Ecomm/index.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /PW_UTS_Ecomm/index.php?loginsuccess=false");
    }
}    
?>
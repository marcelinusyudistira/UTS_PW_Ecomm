<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbConnect.php';

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/OAuth.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/POP3.php';
    require 'PHPMailer/src/SMTP.php';

    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username sudah pernah digunakan";
        header("Location: /PW_UTS_Ecomm/index.php?signupsuccess=false&error=$showError");
    }
    else{
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $timestamp = current_timestamp();
            $sql = "INSERT INTO `users` ( `username`, `firstName`, `lastName`, `email`, `phone`, `password`, `joinDate`) VALUES ('$username', '$firstName', '$lastName', '$email', '$phone', '$hash', '$timestamp')";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                $cmail = new PHPMailer;
                $cmail->setFrom('from@example.com', 'TUMBAS E-Commerce System Mail');
                $cmail->addAddress(email, username);
                $cmail->Subject  = 'Konfirmasi Registrasi Akun';
                $cmail->Body = '<p>Silahkan verifikasi melalui link ini <a href="'.$_SERVER['SERVER_NAME'].'/partials/handleMailConfirm.php?confirm='.$timestamp.'">'.$_SERVER['SERVER_NAME'].'/partials/handleMailConfirm.php?confirm='.$timestamp.'</a></p>';
                if(!$cmail->send()) {
                    echo 'Mailer error: ' . $cmail->ErrorInfo;
                } else {
                    echo 'Register sukses silahkan login.';
                }

                $showAlert = true;
                header("Location: /PW_UTS_Ecomm/index.php?signupsuccess=true");
            }
        }
        else{
            $showError = "Passwords do not match";
            header("Location: /PW_UTS_Ecomm/index.php?signupsuccess=false&error=$showError");
        }
    }
}
    
?>
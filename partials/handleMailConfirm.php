<?php
include 'dbConnect.php';
if(isset($_GET['confirm'])){
    $confirmCode = $_GET['confirm'];
    $sql = "SELECT FROM `users` WHERE joinDate = '$confirmCode'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        $sql = "UPDATE `users` SET confirm=1 WHERE id = '$userId'";
        header("Location: /PW_UTS_Ecomm/index.php?confirmsuccess=true");
    }else{
        header("Location: /PW_UTS_Ecomm/index.php?confirmsuccess=false");
    }
}
?>
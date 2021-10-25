<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Item List</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
            }
    </style>
</head>
<body>
    <?php include 'partials/dbConnect.php';?>
    <?php require 'partials/navbar.php' ?>

    <div class="container my-4" id="cont">
        <div class="row jumbotron">
        <?php
            $itemId = $_GET['itemId'];
            $sql = "SELECT * FROM `item` WHERE itemId = $itemId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $itemName = $row['itemName'];
            $itemPrice = $row['itemPrice'];
            $itemDesc = $row['itemDesc'];
            $itemCategoryId = $row['itemCategoryId'];
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $itemName; ?>"; </script> 
        <?php
        echo  '<div class="col-md-4">
                <img src="img/item-'.$itemId. '.jpg" width="249px" height="262px">
            </div>
            <div class="col-md-8 my-4">
                <h3>' . $itemName . '</h3>
                <h5 style="color: #ff0000">Rp. '.$itemPrice. '/-</h5>
                <p class="mb-0">' .$itemDesc .'</p>';

                if($loggedin){
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE itemId = '$itemId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    if($quaExistRows == 0) {
                        echo '<form action="partials/_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="'.$itemId. '">
                              <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
                    }else {
                        echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                    }
                }
                else{
                    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Add to Cart</button>';
                }
                echo '</form>
                <h6 class="my-1"> View </h6>
                <div class="mx-4">
                    <a href="viewItemList.php?catid=' . $itemCategoryId . '" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Item</span>
                    </a>
                </div>
                <div class="mx-4">
                    <a href="index.php" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Category</span>
                    </a>
                </div>
            </div>
            
            <div class="footer container-fluid bg-dark text-light">
                <p class="text-center py-2 mb-0">Copyright © 2021 Designed by Dek Yoga</a></p>
            </div>'
        ?>
        </div>
    </div>

    <?php require 'partials/footer.php' ?>
    <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>

  <!-- Template Main JS File -->
</body>
</html>
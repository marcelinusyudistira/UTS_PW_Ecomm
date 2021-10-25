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

    <style>
        .jumbotron {
            padding: 2rem 1rem;
        }
        #cont {
            min-height: 570px;
        }
    </style>
</head>
<body>
    <?php include 'partials/dbConnect.php';?>
    <?php require 'partials/navbar.php' ?>

    <div>&nbsp;
        <a href="index.php" class="active text-dark">
            <i class="fas fa-qrcode"></i>
            <span>All Category</span>
        </a>
    </div>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE categoryId = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categoryName'];
            $catdesc = $row['categoryDesc'];
        }
    ?>

    <!-- Item container starts here -->
    <div class="container my-3" id="cont">
        <br><br>
        <div class="col-lg-4 text-center bg-light my-3"
            style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">
            <h2 class="text-center"><span id="catTitle">Items</span></h2>
        </div>
        <div class="row">
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `item` WHERE itemCategoryId = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $itemId = $row['itemId'];
                $itemName = $row['itemName'];
                $itemPrice = $row['itemPrice'];
                $itemDesc = $row['itemDesc'];
            
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="img/item-'.$itemId. '.jpg" class="card-img-top" alt="image for this item" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title">' . substr($itemName, 0, 20). '...</h5>
                                <h6 style="color: #ff0000">Rp. '.$itemPrice. '/-</h6>
                                <p class="card-text">' . substr($itemDesc, 0, 29). '...</p> 
                                    <div class="d-grid gap-2 d-md-flex">';
                                    if($loggedin){
                                        $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE itemId = '$itemId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult);
                                        if($quaExistRows == 0) {
                                            echo '<form action="partials/manageCart.php" method="POST">
                                                <input type="hidden" name="itemId" value="'.$itemId. '">
                                                <button type="submit" name="addToCart" class="btn btn-primary" >Add to Cart</button>';
                                        }else {
                                            echo '<a href="viewCart.php"><button class="btn btn-primary">Go to Cart</button></a>';
                                        }
                                    }
                                    else{
                                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Add to Cart</button>';
                                    }
                                echo '</form><a href="viewItem.php?itemId=' . $itemId . '" ><button class="btn btn-primary">Quick View</button></a>
                                    </div>
                            </div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Belum ada barang yang tersedia pada kategori ini.</p>
                        <p class="lead">Kami akan mengupdatenya dikemudian hari.</p>
                    </div>
                </div> ';
            }
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
    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 

</body>

</html>
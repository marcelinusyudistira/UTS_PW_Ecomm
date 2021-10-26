<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Search</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <style>
    #cont {
        min-height : 515px;
    }
    </style>
</head>
<body>
    <?php include 'partials/dbConnect.php';?>
    <?php include 'partials/navbar.php'; ?>

    <br><br>

    <div class="container my-3">
        <h2 class="py-2">Search Result for <em>"<?php echo $_GET['search']?>"</em> :</h2>
        <h3><span id="cat" class="py-2"></span></h3>
        <div class="row">
        <?php 
            $noResult = true;
            $query = $_GET["search"];
            $sql = "SELECT * FROM `categories` WHERE MATCH(categoryName, categoryDesc) against('$query')";
 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?><script> document.getElementById("cat").innerHTML = "Category: ";</script> <?php 
                $noResult = false;
                $catId = $row['categoryId'];
                $catname = $row['categoryName'];
                $catdesc = $row['categoryDesc'];
                
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="img/card-'.$catId. '.jpg" class="card-img-top" alt="image for this item" width="249px" height="270px">
                        <div class="card-body">
                            <h5 class="card-title"><a href="viewItemList.php?catid=' . $catId . '">' . $catname . '</a></h5>
                            <p class="card-text">' . substr($catdesc, 0, 29). '...</p>
                            <a href="viewItemList.php?catid=' . $catId . '" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>

    <div class="container my-3" id="cont">
        <h3><span id="iteam" class="py-2"></span></h3>
        <div class="row">
        <?php 
            $query = $_GET["search"];
            $sql = "SELECT * FROM `item` WHERE MATCH(itemName, itemDesc) against('$query')"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?><script> document.getElementById("iteam").innerHTML = "Items: ";</script> <?php
                $noResult = false;
                $itemId = $row['itemId'];
                $itemName = $row['itemName'];
                $itemPrice = $row['itemPrice'];
                $itemDesc = $row['itemDesc'];
                $itemCategorieId = $row['itemCategoryId'];
                
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
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                                    }else {
                                        echo '<a href="viewCart.php"><button class="btn btn-primary mx-2">Go to Cart</button></a>';
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
                        <h1>Your search - <em>"' .$_GET['search']. '"</em> - No Result Found.</h1>
                        <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li></ul>
                        </p>
                    </div>
                </div> ';
            }
        ?>
        </div>
    </div>
    <br><br><br><br><br>

    <?php require 'partials/footer.php' ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>
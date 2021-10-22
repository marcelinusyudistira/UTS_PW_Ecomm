<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
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
  
    <!-- Pizza container starts here -->
    <div class="container my-3" id="cont">
        <br><br>
        <div class="col-lg-4 text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
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
                            <img src="img/pizza-'.$itemId. '.jpg" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title">' . substr($itemName, 0, 20). '...</h5>
                                <h6 style="color: #ff0000">Rp. '.$itemPrice. '/-</h6>
                                <p class="card-text">' . substr($itemDesc, 0, 29). '...</p> 
                                <div class="container">  
                                    <div class="row">';
                                    if($loggedin){
                                        $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE itemId = '$itemId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult);
                                        if($quaExistRows == 0) {
                                            echo '<form action="partials/_manageCart.php" method="POST">
                                                <input type="hidden" name="itemId" value="'.$itemId. '">
                                                <div class="col-6">
                                                    <button type="submit" name="addToCart" class="btn btn-primary" >Add to Cart</button>
                                                </div>';
                                        }else {
                                            echo '<a href="viewCart.php"><button class="btn btn-primary">Go to Cart</button></a>';
                                        }
                                    }
                                    else{
                                        echo '<div class="col-6">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Add to Cart</button>
                                        </div>';
                                    }
                                echo '</form>   
                                        <div class="col-6">                         
                                            <a href="viewItem.php?itemId=' . $itemId . '" ><button class="btn btn-primary">Quick View</button></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
            }
            ?>
        </div>
    </div>


    <?php require 'partials/footer.php' ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

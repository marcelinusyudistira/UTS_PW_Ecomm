<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Your Order</title>
    <link rel = "icon" href ="img/logo.png" type = "image/x-icon">
    <link href="assets/css/style.css" rel="stylesheet">
    

    <style>
        .footer {
        position: fixed;
        bottom: 0;
        }
        .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }
        .table-wrapper .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
        }
        .table-wrapper .btn.btn-primary:hover {
            background: #03a3e7;
        }
        .table-title .btn {		
            font-size: 13px;
            border: none;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        .table-title {
            color: #fff;
            background: #4b5366;		
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 80px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.view {        
            width: 30px;
            height: 30px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 30px;
            text-align: center;
        }
        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }   
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        table {
            counter-reset: section;
        }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }
    </style>
</head>
<body>
    <?php include 'partials/dbConnect.php';?>
    <?php include 'partials/navbar.php';?>
    <br><br><br>
    <?php 
    if($loggedin){
    ?>

    <div class="container">
        <br><br>
        <div class="table-wrapper" id="empty">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Address</th>
                        <th>Phone No</th>
                        <th>Amount</th>						
                        <th>Payment Mode</th>
                        <th>Order Date</th>
                        <th>Status</th>						
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `orders` WHERE `userId`= $userId";
                        $result = mysqli_query($conn, $sql);
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $orderId = $row['orderId'];
                            $address = $row['address'];
                            $zipCode = $row['zipCode'];
                            $phoneNo = $row['phone'];
                            $amount = $row['amount'];
                            $orderDate = $row['orderDate'];
                            $paymentMode = $row['payment'];
                            if($paymentMode == 0) {
                                $paymentMode = "Cash on Delivery";
                            }
                            else {
                                $paymentMode = "Online";
                            }
                            $orderStatus = $row['orderStatus'];
                            
                            $counter++;
                            
                            echo '<tr>
                                    <td>' . $orderId . '</td>
                                    <td>' . substr($address, 0, 20) . '...</td>
                                    <td>' . $phoneNo . '</td>
                                    <td>' . $amount . '</td>
                                    <td>' . $paymentMode . '</td>
                                    <td>' . $orderDate . '</td>
                                    <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                                    <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                                    
                                </tr>';
                        }
                        
                        if($counter==0) {
                            ?><script> document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Anda Belum Memiliki Order</strong></h3><h4>Silahkan melakukan order terlebih dahulu :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Kembali Berbelanja</a> </div></div></div></div>';</script> <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 

    <?php 
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Untuk memeriksa daftar order, anda harus <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>

    <?php 
    include 'partials/orderItemModal.php';
    include 'partials/orderStatusModal.php';
    require 'partials/footer.php';?> 

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
  <script src="assets/js/main.js"></script>


</body>
</html>
<?php
    include 'dbConnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `item` (`itemName`, `itemPrice`, `itemDesc`, `itemCategoryId`, `itemDate`) VALUES ('$name', '$price', '$description', '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $itemId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'item-'.$itemId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/PW_UTS_Ecomm/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>Berhasil menambah item('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Gagal upload foto');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Silahkan pilih foto untuk diupload");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('Gagal membuat item');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `item` WHERE `itemId`='$itemId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/PW_UTS_Ecomm/img/item-".$itemId.".jpg";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Berhasil menghapus item');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('Gagal menghapus item');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
        $itemId = $_POST["itemId"];
        $itemName = $_POST["name"];
        $itemDesc = $_POST["desc"];
        $itemPrice = $_POST["price"];
        $itemCategoryId = $_POST["catId"];

        $sql = "UPDATE `item` SET `itemName`='$itemName', `itemPrice`='$itemPrice', `itemDesc`='$itemDesc', `itemCategoryId`='$itemCategoryId' WHERE `itemId`='$itemId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Berhasil mengupdate item');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Gagal mengupdate item');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateItemPhoto'])) {
        $itemId = $_POST["itemId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'item-'.$itemId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/PW_UTS_Ecomm/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Berhasil mengupdate foto');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Gagal mengupdate foto');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Silahkan pilih gambar untuk diupload");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>
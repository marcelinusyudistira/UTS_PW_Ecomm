<?php
    include 'dbConnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createCategory'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "INSERT INTO `categories` (`categoryName`, `categoryDesc`, `categoryCreateDate`) VALUES ('$name', '$desc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $catId = $conn->insert_id;
        if($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newfilename = "card-".$catId.".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/PW_UTS_Ecomm/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('berhasil menambahkan kategori');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Gagal mengupload foto');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Silahkan memilih foto untuk diupload");
                    </script>';
            }
        }
    }
    if(isset($_POST['removeCategory'])) {
        $catId = $_POST["catId"];
        $filename = $_SERVER['DOCUMENT_ROOT']."/PW_UTS_Ecomm/img/card-".$catId.".jpg";
        $sql = "DELETE FROM `categories` WHERE `categoryId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Berhasil menghapus kategori');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Gagal menghapus kategori');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCategory'])) {
        $catId = $_POST["catId"];
        $catName = $_POST["name"];
        $catDesc = $_POST["desc"];

        $sql = "UPDATE `categories` SET `categoryName`='$catName', `categoryDesc`='$catDesc' WHERE `categoryId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Berhasil mengupdate kategori');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Gagal mengupdate kategori');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCatPhoto'])) {
        $catId = $_POST["catId"];
        $check = getimagesize($_FILES["catimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'card-'.$catId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/PW_UTS_Ecomm/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadfile)) {
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
            echo '<script>alert("Silahkan memilih foto untuk diupload");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>
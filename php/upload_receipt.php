<?php
session_start();
require_once 'utils.php'; 
$user_id = $_SESSION['userID']; // current user id

if(isset($_POST['submit']))
{
    $C = connect();

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    $tittle = $_POST['tittle'];
    $tax_type = $_POST['tax_type'];
    $description = $_POST['description'];
    $receipt_date = $_POST['receipt_date'];
    $amount = $_POST['amount'];

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError===0) {
            if ($fileSize < 10000000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../image_uploads/'.$fileNameNew;
                
                // Compress size and upload image 
                // $compressedImage = compressImage($fileTmpName, $fileDestination, 75); 
                // if($compressedImage){ 
                //     $compressedImageSize = filesize($compressedImage); 
                //     $compressedImageSize = convert_filesize($compressedImageSize); 
                     
                //     $status = 'success'; 
                //     $statusMsg = "Image compressed successfully."; 
                //     move_uploaded_file($fileTmpName, $fileDestination);

                // }else{
                //     $statusMsg = "Image compress failed!";
                // }
                // move image to folder
                move_uploaded_file($fileTmpName, $fileDestination);
                
                // Insert image file name into database
                $query = "INSERT into images (tittle,tax_type,description,file_name, receipt_date,uploaded_on,user_id,amount) VALUES ('$tittle','$tax_type','$description','$fileNameNew', '$receipt_date', NOW(), '$user_id','$amount')";
                $sql = sqlInsert($C, $query);
                if($sql){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    echo '<script type="text/javascript">  { alert("File uploaded"); } </script>';
                    header('Location: ../upload_receipt.php');
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }
            else {
                echo "your file is too big";
            }
        }
        else {
            echo "There was an error uploading your file";
        }
    }
    else {
        echo "you cannot upload files of this type!";
    }
}

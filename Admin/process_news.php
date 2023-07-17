<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        

        if ($file['error'] === UPLOAD_ERR_OK) {
            $tempFilePath = $file['tmp_name'];
            $fileName = $file['name'];
            $uploadPath = 'uploads/' . $fileName;
 
            if (move_uploaded_file($tempFilePath, $uploadPath)) {
                echo 'Image uploaded successfully.';
            } else {
                echo 'Failed to upload image.';
            }
        } else {
            echo 'Error uploading image.';
        }
    }
}
?>

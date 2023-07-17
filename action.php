<?php
 require_once ("databaseconnect.php");

if(($_GET['form']=='register')AND ($_GET['btn_register']=="Register")){
    $username = $_post['username'];

    $query = "select email form userlog where email ='$username'";

    $queryrun= mysqli_query($conn,$query);
    if ($queryrun->$queryrun !=0){
 $email = $_post['email'];
 $password = $_post['password'];


}
$queryi = "insert into userlog,(email,password)values('$email','$password')";
$queryr = mysqli_query($conn,$queryi);
if($queryr){
    $alter="account created successfully";
}

}


if($_GET['form']=='login'){

    $email = $_POST['email'];
    $password = $_POST['password'];

$query = "select * from user_tbl where email = '$email'";

$qr = mysqli_query($conn,$query);


if($qr->num_rows !=0){

    $Q = "select * from user_tbl where email = '$email' AND  password ='$password'";
    $rq = mysqli_query($conn, $Q);

  
    if($rq->num_rows !=0){
      
        $message = "welcome-Dashboard-logged-In";
        header("location:admin/delete_news.php?res=".$message);
    }else {

      
        $msg ="email-Password-Invalid";
        header("location:login.php?res=".$msg);
        die();

    }
}else{
    $msg ="user-Not-Found ";
    header("location:login.php?res=".$msg);
    die();
}

}
    

if(($_GET['form'])=='addnews'){


$content = $_POST['content'];
$title = $_POST['title'];
$cid = $_POST['cid'];

// Check if a file was uploaded successfully
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];

    // Upload the image to a folder
    $upload_directory = "Admin/uploads/";
    $destination = $upload_directory . $name;
    if (move_uploaded_file($tmp_name, $destination)) {
        echo "Image uploaded successfully.";

        // Insert the image name into the database
        $sql = "INSERT INTO news (title, content, image , category_id) VALUES ('$title','$content','$name',$cid)";
        if ($conn->query($sql) === TRUE) {
            $nid= mysqli_insert_id($conn);
            $message = "Insert-Query-Performed";
            header("location:admin/delete_news.php?res=".$message.'&&newsid='.$nid);
        } else {
            echo " Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the image.";
    }
}

// Close the database connection
$conn->close();


}


if(isset($_GET['newsid']) && $_GET['form']=='delete_news'){

    $nid = $_GET['newsid'];
  $query = "delete from news where id = $nid";
  if(mysqli_query($conn,$query)){

    $message = "delete-Query-Performed";
    header("location:admin/delete_news.php?res=".$message.'&&newsid='.$nid);
  }else{
    $message = "Database issue";
    header("location:admin/delete_news.php?res=".$message);
  }
 }

?>
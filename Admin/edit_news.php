<?php
require_once '../databaseconnect.php';

if (isset($_POST['submit']) && $_GET['form']=='update_news') {

  
    $newsid = $_POST['newsid'];
    $newImage = $_FILES['image']['name'];
    $newTitle = $_POST['title'];
    $newContent = $_POST['content'];

    // Update the database with the new values
 

    // Upload the new image if it is provided
    if (!empty($_FILES['image']['tmp_name'])) {
        $updateQuery = "UPDATE news SET image = '$newImage', title = '$newTitle', content = '$newContent' WHERE id = $newsid";
        mysqli_query($conn, $updateQuery);
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
      
        if(mysqli_query($conn, $updateQuery)){
            $message = "update-Query-Performed";
            header("location:delete_news.php?res=".$message.'&&newsid='.$newsid);
        }

    }else {
        $updateQuery = "UPDATE news SET  title = '$newTitle', content = '$newContent' WHERE id = $newsid";
        
        if(mysqli_query($conn, $updateQuery)){
            $message = "update-Query-Performed";
            header("location:delete_news.php?res=".$message.'&&newsid='.$newsid);
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 800px;
            padding: 1000px;
            background-color: #f1f1f1;
            border-radius: 4px;
        }

        h2 {
            text-align: center;
        }

        .image-upload {
            text-align: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form method="POST" action="edit_news.php?form=update_news" enctype="multipart/form-data">
        <h2>Add News</h2>
        <label>News Type</label>
      <select name="cid">
        <?php 
         $cid = $_GET['cid'];
        $query = "select *from category where category_id = $cid ";
            $rq = mysqli_query($conn,$query);
            while($r = $rq->fetch_assoc()) { ?> 
            <option value="<?php echo $r['category_id'];?>"><?php  echo $r['type'];?></option>
            <?php }?>
     
      </select>
      <?php
$newid = $_GET['newsid'];
$q = "SELECT * FROM news WHERE id = $newid";
$qr = mysqli_query($conn, $q);

while ($r = $qr->fetch_assoc()) {

    ?>
    <input type="number" name= "newsid" value ="<?php echo $newid?>" hidden>
    <div class="image-upload" style="margin-top: 25px;">
        <label for="image">Image:</label><br>
        <input type="file" name="image" value="<?php echo htmlspecialchars($r['image']); ?>" id="image"><br><br>
        <?php if (!empty($r['image'])) : ?>
            <img src="uploads/<?php echo $r['image']; ?>" alt="News Image" style="max-width: 200px;"><br><br>
        <?php endif; ?>
    </div>
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo $r['title']; ?>" required><br><br>
    <label for="content">Content:</label><br>
    <textarea name="content" id="content" rows="4" cols="50" required><?php echo htmlspecialchars($r['content']); ?></textarea><br><br>

    <?php
}
?>

        <input type="submit" name="submit" value="Add News">
  </form>  
</body>
</html>

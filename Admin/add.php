<?php
require_once '../databaseconnect.php';
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
    <form method="POST" action="../action.php?form=addnews" enctype="multipart/form-data">
        <h2>Add News</h2>
        <label>News Type</label>
      <select name="cid">
        <?php $query = "select *from category";
            $rq = mysqli_query($conn,$query);
            while($r = $rq->fetch_assoc()) { ?> 
            <option value="<?php echo $r['category_id'];?>"><?php  echo $r['type'];?></option>
            <?php }?>
     
      </select>
   
        <div class="image-upload" style= "margin-top :25px;">
            <label for="image">Image:</label><br>
            <input type="file" name="image" id="image"><br><br>
        </div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea name="content" id="content" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" name="submit" value="Add News">
  </form>  
</body>
</html>

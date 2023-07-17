
<?php 
 require_once '../databaseconnect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        nav {
            background-color: #555;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px;
        }

        main {
            padding: 20px;
        }

        .news-container {
            margin-bottom: 20px;
        }

        .news-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-content {
            font-size: 16px;
        }

      

        .box {
            width: calc(33.33% - 20px);
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
        }

        .box h2 {
            font-size: 18px;
            margin-top: 0;
        }

        .box p {
            margin-bottom: 0;
        }
      
    </style>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>News Portal</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../home.php"></a></li>
            <li><a href="home.php">View News</a></li>
            <li> <a href="add.php">Add News </a></li>
            <li>
            <?php

$newsCategories = array(
    'Politics',
    'Sports',
    'Entertainment',
    'Technology',
    'Health',
    'Science',
);

// Displaying the select dropdown
echo " Category: ";
echo "<select name='category'>";
foreach ($newsCategories as $category) {
    echo "<option value='$category'>$category</option>";
}
echo "</select>";
?>
</li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <div class="container ">
    <div class="row">
      <div class="col-sm-8 offset-2" >
              
<div class="card-deck">
          <!-- News Card 1 -->
          <div class="card" style="margin-top:30px;">
          <?php if(isset($_GET['res']) && isset($_['newsid'])){ ?> 
            <p style= "color: green;"> Message :  <?php  echo $_GET['res'];?> <?php echo 'On News ID : '. $_GET['newsid']?> </p>
            <?php }else{ ?> 
                <p style= "color: green;"> Message :  <?php  echo $_GET['res'];?> </p> 
                <?php } ?>
            <table class="table table-bordered">
                <tr>
                    <th>News no</th>
                    <th>Title </th>
                    <th> Content</th>
                    <th>Date </th>
                    <th style="width:150px;">Action</th>
                </tr>
            <?php
           
           $sql = "select *from  news"; 
           $query = mysqli_query($conn,$sql);

           while($row = $query->fetch_assoc()) {?>

<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['content'];?></td>
<td><?php echo $row['date'];?></td>
<td><span> <a href="edit_news.php?newsid=<?php echo $row['id'];?>&&cid=<?php echo $row['category_id'];?>">Edit</a> |<a href="../action.php?form=delete_news&&newsid=<?php echo $row['id'];?>"> Delete </a> </span></td>
</tr>

      
        <?php }?>

           </table>
        </div>
    </div>
        
    </div>
        
        </div>
        
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>News View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .news-container {
            display: flex;
            align-items: center;
        }

        .news-image {
            margin-right: 20px;
        }

        .news-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-content {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "news";
    
    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error !=0){
        die("Connection failed". $conn->connect_error);
    }

   $id = $_POST['id']; 

    $sql = 'SELECT * FROM anews WHERE id = ' . $id;
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="news-container">';
        echo '<div class="news-image"><img src="' . $row['image'] . '" alt="News Image" width="200"></div>';
        echo '<div class="news-details">';
        echo '<h2 class="news-title">' . $row['title'] . '</h2>';
        echo '<p class="news-content">' . $row['content'] . '</p>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>No news found.</p>';
    }

   
    $conn->close();
    ?>
</body>
</html>







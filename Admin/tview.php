<!DOCTYPE html>
<html>
<head>
    <title>News Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>News Table</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        <?php
        // Connect to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "news";
        
        $conn = new mysqli($servername,$username,$password,$database);
        if($conn->connect_error !=0){
            die("Connection failed". $conn->connect_error);
        }
        

        // Fetch data from the database
        $sql = 'SELECT * FROM anews';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
              
                echo '<td><img src="' . $row['image'] . '" alt="Image" width="100"></td>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['content'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="3">No news found</td></tr>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>

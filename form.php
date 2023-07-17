<!DOCTYPE html>
<html>
<head>
  <title>News Form</title>
</head>
<body>
  <h1>News Form</h1>
  
  <form action="/submit_news" method="POST">
    <label for="newsId">News ID:</label>
    <input type="text" id="newsId" name="newsId" required><br>
    
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>
    
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
    
    <label for="time">Time:</label>
    <input type="time" id="time" name="time" required><br>
    
    <label for="newsDesc">Description:</label>
    <textarea id="newsDesc" name="newsDesc" rows="4" cols="50" required></textarea><br>
    
    <label for="categoryId">Category ID:</label>
    <input type="text" id="categoryId" name="categoryId" required><br>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>

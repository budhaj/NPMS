<!DOCTYPE html>
<html>
<head>
  <title>Add News</title>
</head>
<body>
  <h2>Add News</h2>
  <form action="action.php?form=addnews" method="POST">
    <label for="news_id">News ID:</label>
    <input type="text" id="news_id" name="news_id"><br>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date"><br>

    <label for="time">Time:</label>
    <input type="time" id="time" name="time"><br>

    <label for="news_desc">News Description:</label><br>
    <textarea id="news_desc" name="news_desc" rows="4" cols="50"></textarea><br>

    <label for="category_id">Category ID:</label>
    <input type="text" id="category_id" name="category_id"><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>

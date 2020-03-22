<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <form action="/comments" method="POST">
    {{ csrf_field() }}
    <h3>Name:</h3>
    <input name="name" type="text">
    <h3>Comments</h3>
    <textarea name="text"></textarea>
    <br>
    <input type="submit">
  </form>
</body>
</html>
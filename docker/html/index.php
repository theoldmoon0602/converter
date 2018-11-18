<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <h1>Image Converter</h1>

  <p>Convert any image to JPG.</p>

  <form action="convert.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <input type="submit" value="upload">
  </form>

  <h1>Special Thanks</h1>
  <p>Many thanks to these people. They will get defense point!</p>

  <?php echo nl2br(htmlspecialchars(file_get_contents('defenseflag.txt'))); ?>

</body>
</html>

<?php

if (!isset($_FILES['image'])) {
  die("image not uploaded.");
}

if (strpos($_FILES['image']['name'], "..") !== FALSE) {
  die("path traversal attack detected");
}

$userdir = "sandbox".DIRECTORY_SEPARATOR.md5("__salt__" . $_SERVER['REMOTE_ADDR']);
if (!file_exists($userdir)) {
  mkdir($userdir);
}
$name = $_FILES['image']['name'];
$path = $userdir.DIRECTORY_SEPARATOR.$name;
$converted_path = md5($path).".jpg";

if (is_uploaded_file($_FILES['image']['tmp_name'])){
  if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){
    chdir($userdir);
    $mimetype = mime_content_type($name);
    if (strpos($mimetype, "image") === FALSE) {
      unlink($name);
      die("not an image");
    }
    else {
      exec("/usr/local/bin/gm convert ".escapeshellarg($name)." $converted_path 2>&1", $output, $return);
      file_put_contents($name, "deleted");
      echo "<img src='$userdir/$converted_path' />";
    }
  }else{
    die("internal error");
  }
} else{
  die("image not uploaded.");
}

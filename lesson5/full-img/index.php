<?php
  require('../db.php');
  require('../functions.php');

  $images = sendSelectQuery('SELECT * FROM `gallery`');

  $imgId = getImgId();
  
  foreach($images as $item) {
    if ($item['id'] === $imgId) {
      $currentImg = $item;
    } 
  }
  if ($_SERVER['HTTP_REFERER'] === 'http://php.gb/lesson5/') {
    sendUpdateQuery("UPDATE `gallery` SET `visits`=`visits`+1 WHERE `id`=$imgId");
  }
  $countVisits = sendSelectQuery("SELECT `visits` FROM `gallery` WHERE `id`=$imgId")[0]['visits'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
    <div> ПРОСМОТРОВ: <?= $countVisits ?> </div>
    <img src="../<?= $currentImg['url'] ?>" alt="" width="100%">
  </div>
</body>
</html>
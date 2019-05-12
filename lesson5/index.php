<?php
  require('db.php');
  $images = sendSelectQuery('SELECT * FROM `gallery` ORDER BY `visits` DESC');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Фотогалерея</title>
</head>

<body>
  <div class="gallery">
    <?php foreach($images as $item): ?>
    <a class="gallery-link" href="./full-img?id=<?= $item['id'] ?>" target="_blank">
      <img class="gallery-img" src="<?= $item['url'] ?>" alt="<?= $item['name'] ?>">
    </a>
    <? endforeach ?>
  </div>
  <style>
    .gallery-link {
      display: inline-block;
    }
    .gallery-img {
      width: 150px;
    }
  </style>
</body>
</html>
<?php
  $pictures = preg_grep("/.*\.(jpg|jpeg|png)$/", scandir('./img'));

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
    <?php foreach($pictures as $item) { ?>
    <a class="gallery-link" href="./img/<?=$item?>" target="_blank">
      <img class="gallery-img" src="./img/<?=$item?>" alt="">
    </a>
    <?php } ?>
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
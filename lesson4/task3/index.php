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
    <div class="gallery-link" data-img="<?=$item?>">
      <img class="gallery-img" src="./img/<?=$item?>" alt="">
    </div>
    <?php } ?>
  </div>

  <div class="modal" style="display:none">
    <div class="modal__window">
      <img class="modal__img" src="" alt="">
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
    $('.gallery-link').on('click', function() {
      const changedImg = $(this).data('img');
      $('.modal').fadeIn(200);
      $('.modal__img').attr('src', `./img/${changedImg}`);
    })
    $('.modal').on('click', function() {
      $('.modal').fadeOut(200);
    });
  </script>

  <style>
    html, body {
      padding: 0;
      margin: 0;
    }
    .gallery-link {
      display: inline-block;
      cursor: pointer;
    }
    .gallery-img {
      width: 150px;
    }
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(238, 244, 254, 0.9);
    }

    .modal__window {
      position: absolute;
      left: 50vw;
      transform: translateX(-50%);
      margin-top: 10vh;
      -webkit-box-shadow: 0 3px 8px -2px #dedada;
              box-shadow: 0 3px 8px -2px #dedada;
    }

    .modal__img {
      max-width: 80vw;
      max-height: 80vh;
    }
  </style>
</body>
</html>
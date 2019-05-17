<?php 
  
?>

<form method="get">
  <label>Значение 1
    <input value="<?=$_GET['arg1']?>" type="number" name="arg1" id="">
  </label>
  <label>Значение 2
    <input value="<?=$_GET['arg2']?>" type="number" name="arg2" id="">
  </label>

  <button type="submit" name="action" value="plus">Сложить</button>
  <button type="submit" name="action" value="minus">Вычесть</button>
  <button type="submit" name="action" value="multiplication">Умножить</button>
  <button type="submit" name="action" value="division">Разделить</button>
</form>
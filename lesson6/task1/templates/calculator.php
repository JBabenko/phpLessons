<?php 
  
?>

<form method="get">
  <input value="<?=$_GET['arg1']?>" type="number" name="arg1" id="">
  <select name="action" id="">
    <option value="plus" <?=$_GET['action'] === 'plus' ? 'selected' : '' ?>>Плюс</option>
    <option value="minus" <?=$_GET['action'] === 'minus' ? 'selected' : '' ?>>Минус</option>
    <option value="multiplication" <?=$_GET['action'] === 'multiplication' ? 'selected' : '' ?>>Умножить</option>
    <option value="division" <?=$_GET['action'] === 'division' ? 'selected' : '' ?>>Разделить</option>
  </select>
  <input value="<?=$_GET['arg2']?>" type="number" name="arg2" id="">
  <input type="submit" value="Выполнить">
</form>
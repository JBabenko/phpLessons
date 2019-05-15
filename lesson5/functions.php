<?php 

function getImgId() {
  parse_str($_SERVER['QUERY_STRING'], $params);
  return $params['id'];
}
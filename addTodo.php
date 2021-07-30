<?php

$todo = $_POST['title'] ?? '';
$todo = trim($todo);

if ($todo) {
  if (file_exists("todos.json")) {
    $json = file_get_contents("todos.json");
    $jsonArray = json_decode($json, true);
  } else {
    $jsonArray = [];
  }

  $jsonArray[$todo] = ['compeleted' => false];
  file_put_contents('todos.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
  header("Location: index.php");
} else {
  header("Location: index.php");
}
<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bdpoolman'
) or die(mysqli_erro($mysqli));

?>

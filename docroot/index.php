<?php
$projroot = '../';
require $projroot.'settings.php';
?><!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>Hello world</h1>
  <p><?php echo htmlentities(SEPTA_API_BASE_URL); ?></p>
</body>
</html>
<?php
$projroot = '../';
require $projroot.'settings.php';
require $projroot.'SEPTA.class.php';
$septa = new SEPTA();
?><!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>Hello world</h1>
  <p>Walk time between City Hall and Wharton/12th (minimal lon change, so should be nearly equal)</p>
  <ul>
    <li>Crow-flies: <?php echo $septa->walkTime(ORIGIN_LAT,ORIGIN_LON,39.933626,-75.163811,'crowflies'); ?> minutes</li>
    <li>Street grid: <?php echo $septa->walkTime(ORIGIN_LAT,ORIGIN_LON,39.933626,-75.163811,'streetgrid'); ?> minutes</li>
  </ul>
  <p>Walk time between City Hall and 400 Arch (minimal lat change, so should be nearly equal)</p>
  <ul>
    <li>Crow-flies: <?php echo $septa->walkTime(ORIGIN_LAT,ORIGIN_LON,39.952340,-75.146842,'crowflies'); ?> minutes</li>
    <li>Street grid: <?php echo $septa->walkTime(ORIGIN_LAT,ORIGIN_LON,39.952340,-75.146842,'streetgrid'); ?> minutes</li>
  </ul>
  <p>Walk time between 2nd and Laurel (diagonal, should be different)</p>
  <ul>
    <li>Crow-flies: <?php echo $septa->walkTime(ORIGIN_LAT,ORIGIN_LON,39.965188,-75.140473,'crowflies'); ?> minutes</li>
    <li>Street grid: <?php echo $septa->walkTime(ORIGIN_LAT,ORIGIN_LON,39.965188,-75.140473,'streetgrid'); ?> minutes</li>
  </ul>
</body>
</html>
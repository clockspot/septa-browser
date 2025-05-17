<?php
class SEPTA {
  //Requires settings.php
  
  public function __construct($session=false) {}

  public function walkTime($lat1,$lon1,$lat2=ORIGIN_LAT,$lon2=ORIGIN_LON,$method='streetgrid') {
    //This roughly determines walking time between two coordinates.
    //Uses AI result for "php calculate distance between two coordinates"

    //Convert from degrees to radians
    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);

    $dlon = $lon2 - $lon1;
    $dlat = $lat2 - $lat1;

    $earthRadius = 6371 * 0.621371; //kilometers to miles

    $distance = 0;

    //Crow-flies distance
    if($method=='crowflies') {
      // Haversine formula
      $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
      $c = 2 * asin(min(1, sqrt($a)));
      $distance = $earthRadius * $c;
    }

    //Street grid distance (horiz + vert)
    //Assumes perfectly NESW grid - TODO if at an angle (eg in Philly), do we need to take an avg between this and crow-flies? Or just do crow-flies unless overridden by user input
    if($method=='streetgrid') {
      //Distance between lat deg is always ~69 miles; dist between lon deg varies with lat.
      //Measure latitude distance with no longitude change
      $alat = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin(0 / 2) * sin(0 / 2);
      $clat = 2 * asin(min(1, sqrt($alat)));
      $distancelat = $earthRadius * $clat;
      $alon = sin(0 / 2) * sin(0 / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
      $clon = 2 * asin(min(1, sqrt($alon)));
      $distancelon = $earthRadius * $clon;
      $distance = $distancelat+$distancelon;
    }

    return $distance*20; //convert to minutes, at 3mph

  }
  
}
?>
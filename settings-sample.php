<?php
$showErrors = 1 || isset($_REQUEST['showerrors']);
error_reporting($showErrors?E_ALL:0);
ini_set('display_errors',($showErrors?1:0));

date_default_timezone_set('America/New_York');

define('SEPTA_API_BASE_URL','https://www3.septa.org/api/');
define('SEPTA_API_V2_BASE_URL','https://www3.septa.org/api/v2/');
define('SEPTA_API_FLAT_BASE_URL','https://flat-api.septa.org/');

define('SEPTA_API_USER_AGENT','[your email or similar]');

//Default origin to calculate walk times from. Can be overridden by originlat / originlon URL query parameters
//Very center of City Hall, Philadelphia
define('ORIGIN_LAT', isset($_REQUEST['originlat'])? $_REQUEST['originlat']:  39.9523266);
define('ORIGIN_LON', isset($_REQUEST['originlon'])? $_REQUEST['originlon']: -75.1635336);
?>
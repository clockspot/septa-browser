<?php
$showErrors = 1 || isset($_REQUEST['showerrors']);
error_reporting($showErrors?E_ALL:0);
ini_set('display_errors',($showErrors?1:0));

date_default_timezone_set('America/New_York');

define('SEPTA_API_BASE_URL','https://www3.septa.org/api/');
define('SEPTA_API_V2_BASE_URL','https://www3.septa.org/api/v2/');
define('SEPTA_API_FLAT_BASE_URL','https://flat-api.septa.org/');

define('SEPTA_API_USER_AGENT','[your email or similar]');
?>
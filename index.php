<?php


use App\Core\App;
use App\Core\DB\DB;
use App\Core\Route;
use App\Core\Url;

require_once "vendor/autoload.php";


$app = new App();

echo '<br><pre>';
print_r(array_keys(Route::$routes['get']));
echo '</pre><br>';


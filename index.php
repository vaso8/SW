<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">    
</head>
<body>

<?php

use App\Core\App;

require "vendor/autoload.php";

$app = new App();

echo '<hr>';
// echo $_SERVER['HTTP_REFERER'];
echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
echo '<hr>';
/*
if($app->url->getUrl() == 'goback') {
    $app->redirect->back();
}
*/
if(isset($app->request->name) && isset($app->request->lastname))
{
    echo '<br>' . $app->request->name . '<br>';
    echo '<br>' . $app->request->lastname . '<br>';
    echo '<br>' . $app->route->getRoute() . '<br>';
    echo '<br>' . $app->route->getRouteControllerAndMethod() . '<br>';
}

echo '<pre>';

print_r($_SESSION["history"]);
print_r($app->session->getHistory());
//print_r(Route::$routes['get']);
//Route::$routes['get']['/create'];

echo '</pre>';




?>



<form action="" method="post">

    <input type="text" name="name" id="">
    <input type="text" name="lastname" id="">
    <input type="text" name="mail" id="">
    <input type="submit" value="Submit">
</form>
<?php







$validate = $app->validate->validate([
    'name' => 'required|number',
    'lastname' => 'required',
    'mail' => 'required'
]);





echo '<pre>';


print_r($_SESSION['error']);

echo '</pre>';


if(array_key_exists('name',$_SESSION['error'])) {
    echo 'SESSION has error - name <br>';
}


echo $app->request->input('name');
echo ' ' . $app->request->input('lastname');
//echo '<br>' . $_SESSION['error'][0]['name'];

//echo '<br>'.$name;

?>

<!--<script type="text/javascript" src="/assets/js/main.js"></script>-->


<hr>
<?php
use App\Model\Product;

$products = Product::all();
foreach($products as $product){
    echo $product->name . "<br>";
}
?>
</body>
</html>



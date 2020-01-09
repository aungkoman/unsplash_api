<?php

ini_set("allow_url_fopen", true);
header('Content-Type: application/json');
// required headers
header("Access-Control-Allow-Origin: *");


require 'vendor/autoload.php'; // initialize composer library
//echo "hello";

Crew\Unsplash\HttpClient::init([
	'applicationId'	=> '4e7dfb3d8ad2016230891365f2537067332d4ef8b247bc41ec8bc28d29853750',
	'secret'		=> 'fb8b3c9ddcc67986dd98309faf1cbd9636fcf5dd25a8d62d9adc6d836f45c1f2',
	'callbackUrl'	=> 'https://your-application.com/oauth/callback',
	'utmSource' => 'NAME OF YOUR APPLICATION'
]);


$search = isset($_GET['search']) ? $_GET['search'] : 'myanmar';
$search = htmlentities(htmlspecialchars(stripslashes(trim($search))));
$page = 1;
$per_page = 30;
$orientation = 'portrait';
//echo "Search : ".$search;
//Crew\Unsplash\Search::photos($search, $page, $per_page, $orientation);

//$exp = Crew\Unsplash\Search::photos("myanmar", 1, 1);
//$exp = Crew\Unsplash\Search::photos($search, $page, $per_page, $orientation);
$exp = Crew\Unsplash\Search::photos($search, $page, $per_page);
//echo $exp->total;
//echo "<br>";
//print_r($exp);

//echo "Total : ".$exp->getTotal();
//print_r($exp);
//echo "<br>Result : ".json_encode($exp->getResults());
//echo "<br>Result Lenght : ".count($exp->getResults());

if(count($exp->getResults()) == 0 ) exit;
//echo "<br>Result : ". json_encode($exp->getResults()[0]);
echo json_encode($exp->getResults());
//$src = $exp->getResults()[0]['urls']['full'];

//echo "<img src='$src' style='width:100px;'>";
//echo "finished";
//echo "<br>full : ".$exp->getResults()[0]['full'];

// for($i = 0 ; $i < count($exp->getResults()); $i++){
//         $src = $exp->getResults()[$i]['urls']['thumb'];
//         $full = $exp->getResults()[$i]['urls']['full'];
//         $description = $exp->getResults()[$i]['description'];
//         echo "<p>".$description."</p>";
//         echo "<br><a href='$full'><img src='$src' style='width:200px;'><a>";
//         echo "<br><br>";
// }

?>
<?php
// no autloading, just a test assignment
require('Test.php');
require('Route_Planner.php');
require('Boarding_Card.php');

$test = new Test(15);
$testRoute = $test->generateTestRoute();

$planner = new Route_Planner($testRoute);

var_dump($planner->calculateRoute());
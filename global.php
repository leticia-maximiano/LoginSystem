<?php
session_start();
require_once "./Conector.php";
require_once "./LocationHelper.php";

$conn = new Conector;
$location = new LocationHelper;
$loginUrl = "/login.php";

//$_SESSION=[];

if($_SESSION && !$_SESSION["user"] && $_SERVER["REQUEST_URI"] != $loginUrl) {
  return $location->goToPage("login");
}
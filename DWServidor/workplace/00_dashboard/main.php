<?php
session_start();
require_once "excepciones.php";
require_once "App.php";
$app = new App;
$app->run();

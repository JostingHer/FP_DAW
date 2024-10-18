<?php

require_once "App.php";

try {
    $app = new App;
    $app->run();
} catch (Throwable $e) {
    echo "FAllo: " . $e->getMessage();
}

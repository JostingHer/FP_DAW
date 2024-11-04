<?php
require_once "App.php";

// Check if 'method' and 'query' parameters are set in the URL
$results = [];
if (isset($_GET['method']) && $_GET['method'] === 'getQuery' && isset($_GET['query'])) {
    // Get the query results as an array
    $results = getQueryResults($_GET['query']);
}

// Include the main view
include "views/home.php";

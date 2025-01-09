<?php
require_once "configDB.php";

function getQueryResults($query)
{
    $results = [];


    try {
        $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);


        $sql = $query;

        $results = $connection->query($sql);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $connection = null;
    }
    return $results;
}

function librosSegunCodigoESscritor()

{

    return [];
}

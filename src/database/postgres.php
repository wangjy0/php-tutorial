<?php
// Connecting, selecting database

$connStr = "host=localhost port=5432 dbname=test user=postgres password=123456";
$dbconn = pg_connect($connStr);
if (!$dbconn)
    die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM t1';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo implode(',', $line),PHP_EOL;
}

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
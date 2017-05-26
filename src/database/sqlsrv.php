<?php
$serverName = "(local)\sqlexpress";
$connectionOptions = array(
    "Database" => "test",
    "Uid" => "sa",
    "PWD" => "123456"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn) {
    echo "Connection established.",PHP_EOL;
} else {
    echo "Connection could not be established.",PHP_EOL;
    die(print_r(sqlsrv_errors(), true));
}

$tsql = "SELECT CONVERT(varchar(32), SUSER_SNAME())";
$stmt = sqlsrv_query($conn, $tsql);
if ($stmt === false) {
    echo "Error in executing query.",PHP_EOL;
    die(print_r(sqlsrv_errors(), true));
}

/* Retrieve and display the results of the query. */
$row = sqlsrv_fetch_array($stmt);
echo "User login: " . $row[0] . PHP_EOL;

/* Free statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
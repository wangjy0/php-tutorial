<?php
// set up basic connection
$ftp_server = '127.0.0.1';
$conn_id = ftp_connect($ftp_server);

// login with username and password
$ftp_user_name = 'ftpuser1';

$ftp_user_pass = '123456';

$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// check connection
if ((!$conn_id) || (!$login_result)) {
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name";
    exit;
} else {
    echo "Connected to $ftp_server, for user $ftp_user_name" . PHP_EOL;
}

$source_file = dirname(__FILE__). DIRECTORY_SEPARATOR . 'readme.txt';
$destination_file = 'readme.txt';
echo $destination_file .PHP_EOL;

ftp_pasv($conn_id, true);

// upload the file
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

// check upload status
if (!$upload) {
    echo "FTP upload has failed!";
} else {
    echo "Uploaded $source_file to $ftp_server as $destination_file";
}

// close the FTP stream
ftp_close($conn_id);
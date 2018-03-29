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

$local = dirname(__FILE__). DIRECTORY_SEPARATOR . '1.zip';
$remote = '1.zip';

ftp_pasv($conn_id, true);

$ret = ftp_nb_get($conn_id, $local, $remote, FTP_BINARY, filesize($local));

while ($ret == FTP_MOREDATA) {
   
   // Do whatever you want
   echo ".";

   // Continue downloading...
   $ret = ftp_nb_continue($conn_id);
}
if ($ret != FTP_FINISHED) {
   echo "There was an error downloading the file...";
   exit(1);
}
// close the FTP stream

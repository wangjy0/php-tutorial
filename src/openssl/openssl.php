<?php
/*
echo "openssl_x509_parse";
echo '<pre>';
print_r(openssl_x509_parse(file_get_contents('localhost.cer')));
echo '<br/>';
*/

// Get private key
$privatekey = file_get_contents( __DIR__ . '/../pki/localhost.key');

// Get public key
//$pk = openssl_get_privatekey($privatekey);
// $publickey = openssl_pkey_get_details($pk);
// $publickey = $publickey["key"];
$publickey = file_get_contents( __DIR__ . '/../pki/localhost.cer');

// echo "Private Key: $privatekey<br><br>Public Key: $publickey" . PHP_EOL;

$cleartext = '1234 5678 9012 3456';

echo "Clear text:" .PHP_EOL . $cleartext . PHP_EOL;

openssl_private_encrypt($cleartext, $crypttext, $privatekey);

echo "Crypt text:" .PHP_EOL . $crypttext . PHP_EOL;

openssl_public_decrypt($crypttext, $decrypted, $publickey);

echo "Decrypted text: " .PHP_EOL . $decrypted . PHP_EOL;

echo "Clear text: " .PHP_EOL . $cleartext . PHP_EOL;

openssl_public_encrypt($cleartext, $crypttext, $publickey);

echo "Crypt text: " .PHP_EOL . $crypttext . PHP_EOL;

openssl_private_decrypt($crypttext, $decrypted, $privatekey);

echo "Decrypted text: " .PHP_EOL . $decrypted . PHP_EOL;

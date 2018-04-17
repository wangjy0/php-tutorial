<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

for ($i = 0; $i < 100; $i ++) {
    $msg = new AMQPMessage('Hello World!' . $i);
    $channel->basic_publish($msg, '', 'hello');
    
    echo " [x] Sent " . $msg->getBody() . PHP_EOL;
    sleep(1);
}
$channel->close();
$connection->close();

?>
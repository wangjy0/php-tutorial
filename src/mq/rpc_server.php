<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.0.230', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('rpc_queue', false, false, false, false);

function fib($n)
{
    if ($n == 0)
        return 0;
    if ($n == 1)
        return 1;
    return fib($n - 1) + fib($n - 2);
}

function fib2($n)
{
    $x = 0;
    $y = 1;
    for ($i = 1; $i < $n; ++$i) {
        $y = $x + $y;
        $x = $y - $x;
    }

    return $y;
}

echo " [x] Awaiting RPC requests\n";

$channel->basic_qos(null, 1, null);
$channel->basic_consume('rpc_queue', '', false, false, false, false, function ($req) {
    $n = intval($req->body);
    echo " [.] fib(", $n, ")\n";

    $msg = new AMQPMessage((string)fib2($n), [
        'correlation_id' => $req->get('correlation_id')
    ]);

    $req->delivery_info['channel']->basic_publish($msg, '', $req->get('reply_to'));
    $req->delivery_info['channel']->basic_ack($req->delivery_info['delivery_tag']);
});

while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();



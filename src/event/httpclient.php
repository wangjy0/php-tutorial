<?php
// Read callback
function readcb($bev, $base)
{
    while ($buf = $bev->input->read(1024)) {
        echo $buf;
    }
}

function writecb($bev, $base)
{
   
}

// Event callback
function eventcb($bev, $events, $base)
{
    if ($events & EventBufferEvent::CONNECTED) {
        echo "Connected", PHP_EOL;
    } elseif ($events & EventBufferEvent::ERROR) {
        echo "DNS error: ", $bev->getDnsErrorString(), PHP_EOL;
        $base->exit();
    } else {        
        echo "Closing" ,PHP_EOL;
        $base->exit();
    }
}

if ($argc != 3) {
    echo <<<EOS
Trivial HTTP 0.x client
Syntax: php {$argv[0]} [hostname] [resource]
Example: php {$argv[0]} www.google.com /

EOS;
    exit();
}

$base = new EventBase();

$dns_base = new EventDnsBase($base, TRUE); // We'll use async DNS resolving
if (! $dns_base) {
    exit("Failed to init DNS Base\n");
}

$bev = new EventBufferEvent($base,NULL, EventBufferEvent::OPT_CLOSE_ON_FREE | EventBufferEvent::OPT_DEFER_CALLBACKS);

if (! $bev) {
    exit("Failed creating bufferevent socket\n");
}

$bev->setCallbacks("readcb", "writecb", "eventcb", $base);
$bev->enable(Event::READ | Event::WRITE);

$output = $bev->output; // $bev->getOutput();

if (! $output->add("GET {$argv[2]} HTTP/1.0\r\n" . "Host: {$argv[1]}\r\n" . "Connection: Close\r\n\r\n")) {
    exit("Failed adding request to output buffer\n");
}

if (! $bev->connectHost($dns_base, $argv[1], 80, EventUtil::AF_UNSPEC)) {
    exit("Can't connect to host {$argv[1]}\n");
}

$base->dispatch();

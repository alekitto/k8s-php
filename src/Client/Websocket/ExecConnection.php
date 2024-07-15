<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket;

use Kcs\K8s\Websocket\Contract\WebsocketConnectionInterface;

use function array_map;
use function chr;

readonly class ExecConnection
{
    public function __construct(private WebsocketConnectionInterface $websocket)
    {
    }

    /**
     * Send a line, or multiple lines, back through STDIN. This adds on a line feed to each line.
     *
     * @param string[]|string $lines
     *
     * @return $this
     */
    public function writeln(array|string $lines, string $lf = "\n")
    {
        $lines = array_map(static function (string $line) use ($lf): string {
            return chr(0) . $line . $lf;
        }, (array) $lines);

        foreach ($lines as $line) {
            $this->websocket->send($line);
        }

        return $this;
    }

    /**
     * Send arbitrary data through STDIN.
     *
     * @return $this
     */
    public function write(string $data)
    {
        $this->websocket->send(chr(0) . $data);

        return $this;
    }

    /**
     * This sends empty data to STDIN to keep a connection open in the absence of real input.
     *
     * @return $this
     */
    public function keepalive()
    {
        $this->websocket->send(chr(0));

        return $this;
    }

    public function close(): void
    {
        $this->websocket->close();
    }
}

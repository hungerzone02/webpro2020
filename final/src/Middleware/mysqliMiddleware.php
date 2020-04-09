<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class MysqliMiddleware implements MiddlewareInterface
{
    private $host;
    private $username;
    private $passwd;
    private $dbname;
    private $connection;
  
    public function __construct(

        $host,
        $username,
        $passwd,
        $dbname

    ) {

        $this->host = $host;

        $this->username = $username;

        $this->passwd = $passwd;

        $this->dbname = $dbname;

        // force mysqli throw exception when gets errors.

        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

        // initial mysqli without connecting

        $this->connection = mysqli_init();

        // set initial command, set connection encoding

        mysqli_options(
            $this->connection,
            MYSQLI_INIT_COMMAND,

            "SET NAMES 'utf8'"
        );
    }

    public function process(

        Request $request,
        RequestHandler $handler

    ): Response {

        // store connection object to attribute mysqli

        $request = $request->withAttribute('mysqli', $this);

        // let other middlewares perform their task

        $response = $handler->handle($request);

        // close connection when other middlewares finish

        mysqli_close($this->connection);

        return $response;
    }

    public function connect()
    {
        mysqli_real_connect(
            $this->connection,

            $this->host,
            $this->username,
            $this->passwd,
            $this->dbname
        );

        return $this->connection;
    }
}

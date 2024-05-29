<?php

namespace Api;

use Nette\Database\Explorer;
use Utils\Database;
use Utils\Helper;

class ApiController
{
    protected Explorer $e;
    protected array $data;
    private string $request;
    private array $action;
    protected array $statuses = [
        400 => "Bad Request",
        401 => "Unauthorized",
        403 => "Forbidden",
        404 => "Not Found",
        405 => "Method Not Allowed",
        406 => "Not Acceptable",
        409 => "Conflict",
        410 => "Gone",
        422 => "Unprocessable Entity",
        429 => "Too Many Requests",
        500 => "Internal Server Error",
        501 => "Not Implemented",
        502 => "Bad Gateway",
        503 => "Service Unavailable",
        504 => "Gateway Timeout",
        505 => "HTTP Version Not Supported"
    ];

    public function __construct()
    {
        $this->e = Database::explore();
        $this->setData();
        $this->setRequest();
    }

    private function setData()
    {
        $requestData = json_decode(file_get_contents('php://input') ?? '', true) ?? [];
        $data = array_merge(
            $requestData,
            $_POST,
            $_GET,
        );

        $this->data = $data;
    }

    private function setRequest()
    {
        $linkPath = Helper::getLinkPath();
        $request = str_replace(substr($linkPath, 0, -4), '', $_SERVER['REDIRECT_URL']);

        $this->request = $request;
    }

    private function solveRequest(): void
    {
        $req = $this->request;

        if (str_contains($req, '/')) {
            $requestParts = explode('/', $req);

            if (empty($requestParts[0]) || $requestParts[0] === 'api')
                unset($requestParts[0]);
            $method = 'action' . ucfirst(array_pop($requestParts));
            $classParts = array_splice($requestParts, -1, 1);

            if ($classParts) {
                $model = ucfirst($classParts[0]) . 'Model';
                $namespace = 'Api\Models\\' . (!empty($requestParts) ? implode('\\', array_map('ucfirst', $requestParts)) . '\\' : '');
                $class = $namespace . $model;

                $this->action = [
                    'class' => $class,
                    'method' => $method,
                ];

                return;
            }
        }

        $this->throwError(400, 'No model specified');
    }

    public function run(): void
    {
        $this->solveRequest();

        $class = $this->action['class'];
        $method = $this->action['method'];

        if (class_exists($class)) {
            $model = new $class();

            if (method_exists($model, $method)) {
                $result = $model->$method();

                // fallback if user just return, no $this->respond()
                $this->respond($result);
            } else {
                $this->throwError(404, 'Method not found');
            }
        } else {
            $this->throwError(404, 'Model not found');
        }
    }

    protected function respond(array|string $response, int $code = 200): void
    {
        http_response_code($code);
        echo json_encode($response, true);
        die();
    }

    protected function throwError(int $code = 400, array|string $msg = null): void
    {
        $this->respond(
            [
                'error' =>
                    $msg
                    ?? $this->statuses[$code]
                    ?? 'Something Went Wrong!'
            ],
            $code
        );
    }

    protected function requireMethod($requiredMethod): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== $requiredMethod) {
            $this->throwError(405);
        }
    }
}

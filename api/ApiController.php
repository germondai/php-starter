<?php

namespace Api;

use Nette\Database\Explorer;
use Utils\Database;

class ApiController
{
    protected Explorer $e;
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
    }

    public function handleRequest(string $request, array $data): void
    {
        if (str_contains($request, '/')) {
            $requestParts = explode('/', $request);
            if (empty($requestParts[0]) || $requestParts[0] === 'api')
                unset($requestParts[0]);
            $method = 'action' . ucfirst(array_pop($requestParts));
            $classParts = array_splice($requestParts, -1, 1);
            $modelName = ucfirst($classParts[0]) . 'Model';
            $namespace = 'Api\Models\\' . (!empty($requestParts) ? implode('\\', array_map('ucfirst', $requestParts)) . '\\' : '');
            $className = $namespace . $modelName;

            if (class_exists($className)) {
                $model = new $className();

                if (method_exists($model, $method)) {
                    $result = $model->$method($data);

                    // fallback if user just return, no $this->respond()
                    $this->respond($result);
                } else {
                    $this->throwError(404, 'Method not found');
                }
            } else {
                $this->throwError(404, 'Model not found');
            }
        } else {
            $this->throwError(400, 'No model specified');
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

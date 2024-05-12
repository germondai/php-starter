<?php

namespace Api;

use Nette\Database\Explorer;
use Utils\Database;

class ApiController
{
    protected Explorer $e;

    public function __construct()
    {
        $this->e = Database::explore();
    }

    public function handleRequest(string $request, array $data): void
    {
        if (str_contains($request, '/')) {
            $requestParts = explode('/', $request);
            $method = 'action' . ucfirst(array_pop($requestParts));
            $classParts = array_splice($requestParts, -1, 1);
            $modelName = ucfirst($classParts[0]) . 'Model';
            $namespace = 'Api\Models\\' . (!empty($requestParts) ? implode('\\', array_map('ucfirst', $requestParts)) . '\\' : '');
            $className = $namespace . $modelName;

            if (class_exists($className)) {
                $model = new $className();

                if (method_exists($model, $method)) {
                    $result = $model->$method($data);
                    $this->respond($result['statusCode'] ?? 200, $result);
                } else {
                    $this->respond(404, ['error' => 'Method not found']);
                }
            } else {
                $this->respond(404, ['error' => 'Model not found']);
            }
        } else {
            $this->respond(400, ['error' => 'No model specified']);
        }
    }

    private function respond(int $code, array|string $data): void
    {
        http_response_code($code);
        echo json_encode($data, true);
        die();
    }

    protected function requireMethod($requiredMethod): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod !== $requiredMethod) {
            $this->respond(405, ['error' => 'Method not allowed']);
        }
    }
}

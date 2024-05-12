<?php

namespace Api\Models\Users;

use Api\ApiController;

class AdminModel extends ApiController
{
    public function actionGet(array $data): array
    {
        $this->requireMethod('GET');

        return [
            'message' => 'You tried to get your first Admin User',
            'data' => $data
        ];
    }
}
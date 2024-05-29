<?php

namespace Api\Models\Users;

use Api\ApiController;

class AdminModel extends ApiController
{
    public function actionGet(array $data)
    {
        return [
            'message' => 'You tried to get your first Admin User',
            'data' => $data
        ];
    }
}
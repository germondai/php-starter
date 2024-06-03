<?php

namespace Api\Model\Users;

use Api\ApiController;

class AdminModel extends ApiController
{
    public function actionGet()
    {
        return [
            'message' => 'You tried to get your first Admin User',
            'data' => $this->params
        ];
    }
}
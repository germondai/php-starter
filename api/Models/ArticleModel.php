<?php

namespace Api\Models;

use Api\ApiController;

class ArticleModel extends ApiController
{
    public function actionInsert(array $data): array
    {
        $this->requireMethod('POST');

        return [
            'statusCode' => $data ? 200 : 404,
            'error' => $data ? 'none' : 'No data specified',
            'message' => 'You tried to insert your first Article',
            'data' => $data
        ];
    }
}
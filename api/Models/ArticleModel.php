<?php

namespace Api\Models;

class ArticleModel
{
    public function actionInsert(array $data): array
    {
        return [
            'statusCode' => $data ? 200 : 404,
            'error' => $data ? 'none' : 'No data specified',
            'message' => 'You tried to insert your first Article',
            'data' => $data
        ];
    }
}
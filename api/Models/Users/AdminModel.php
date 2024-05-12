<?php

namespace Api\Models\Users;

class AdminModel
{
    public function actionGet(array $data): array
    {
        return [
            'message' => 'You tried to get your first Admin User',
            'data' => $data
        ];
    }
}
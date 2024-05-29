<?php

namespace Api\Models;

use Api\ApiController;

class ArticleModel extends ApiController
{
    public function action(array $data)
    {
        $this->requireMethod('GET');

        return 'This is default action';
    }

    public function actionInsert(array $data)
    {
        $this->requireMethod('POST');

        if ($data) {
            $this->respond(
                [
                    'message' => 'You tried to insert your first Article',
                    'data' => $data
                ]
            );
        } else {
            $this->throwError(404);
        }
    }
}

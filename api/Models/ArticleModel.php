<?php

namespace Api\Models;

use Api\ApiController;

class ArticleModel extends ApiController
{
    public function action()
    {
        $this->allowMethods(['GET']);

        return 'This is default action';
    }

    public function actionInsert()
    {
        $this->allowMethods(['POST']);

        if ($this->body) {
            $this->respond(
                [
                    'message' => 'You tried to insert your first Article',
                    'data' => $this->body
                ]
            );
        } else {
            $this->throwError(400);
        }
    }
}

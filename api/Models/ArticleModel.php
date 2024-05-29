<?php

namespace Api\Models;

use Api\ApiController;

class ArticleModel extends ApiController
{
    public function action()
    {
        $this->requireMethod('GET');

        return 'This is default action';
    }

    public function actionInsert()
    {
        $this->requireMethod('POST');

        if ($this->data) {
            $this->respond(
                [
                    'message' => 'You tried to insert your first Article',
                    'data' => $this->data
                ]
            );
        } else {
            $this->throwError(404);
        }
    }
}

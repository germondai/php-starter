<?php

namespace Api\Models;

use Api\ApiController;

class AuthModel extends ApiController
{
    public function action()
    {
        $this->allowMethods(['POST']);
        $this->requireHeaders(['Authorization']);

        $token = $this->headers['Authorization'];

        return [
            'your_current_token' => $token
        ];
    }

    public function actionLogin()
    {
        $this->allowMethods(['POST']);
        $this->requireParams(['email', 'password']);

        if (
            $this->params['email'] === 'imejl'
            && $this->params['password'] === 'pass'
        ) {
            return [
                'user' => [
                    'name' => 'Joe',
                    'surname' => 'Doe'
                ],
                'token' => 'jwt.token'
            ];
        } else {
            $this->throwError(401);
        }
    }
}

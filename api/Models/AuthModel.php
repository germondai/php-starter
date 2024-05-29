<?php

namespace Api\Models;

use Api\ApiController;
use Utils\Token;

class AuthModel extends ApiController
{
    public function action()
    {
        $this->allowMethods(['POST']);
        $this->requireHeaders(['Authorization']);
        $jwt = $this->verifyJWT();

        return [
            'verified' => $jwt
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
            $user = [
                'name' => 'Joe',
                'surname' => 'Doe',
                'email' => 'imejl',
            ];

            return [
                'user' => $user,
                'token' => Token::generate($user),
            ];
        } else {
            $this->throwError(401);
        }
    }
}
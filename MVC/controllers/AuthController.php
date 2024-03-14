<?php

namespace App\Controllers;

use App\Models\User;
use App\Providers\View;
use App\Providers\Validator;


class AuthController
{

    public function index()
    {
        return View::render('auth/index');
    }


    public function store($data)
    {
        $validator = new Validator;
        $validator->field('username', $data['username'])->email();
        $validator->field('password', $data['password'])->min(6);

        if ($validator->isSuccess()) {
            $user = new User;
            $checkuser = $user->checkUser($data['username'], $data['password']);
            if ($checkuser) {
                return View::redirect('forum');
            } else {
                $errors['message'] = "Please check your credentials";
                return View::render('auth/index', ['errors' => $errors, 'user' => $data]);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('auth/index', ['errors' => $errors, 'user' => $data]);
        }
    }
    public function delete()
    {
        session_destroy();
        return View::redirect('login');
    }
}

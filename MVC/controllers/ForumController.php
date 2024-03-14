<?php

namespace App\Controllers;

use App\Models\Forum;
use App\Providers\View;
use App\Providers\Validator;

class ForumController
{
    public function index()
    {
        if (!$_SESSION['user_id']) {
            return View::redirect('login');
        }

        $forum = new Forum;
        $select = $forum->select();

        if ($select) {
            return View::render('/home', ['forum' => $select]);
        } else {
            return View::render('error');
        }
    }

    public function create()
    {
        return View::render('forum/create');
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $forum = new Forum;
            $selectId = $forum->selectId($data['id']);
            if ($selectId) {
                return View::render('forum/show', ['forum' => $selectId]);
            } else {
                return View::render('error', ['message' => 'Deu ruim']);
            }
        } else {
            return View::render('error');
        }
    }

    public function store($data)
    {
        $validator = new Validator;
        $data['dateTime'] = date('Y-m-d H:i:s');
        $validator->field('post', $data['post'], 'post')->max(10000);
        $validator->field('title', $data['title'])->max(100);
        $data['image'] = $data['dateTime'] . $_FILES["image"]["name"];
        $data['image'] = preg_replace('/[:\s\-]/', '',  $data['image']);

        $validator->field('image', $data['image'])->uploadImage($_FILES);

        error_log("verificando a data");
        error_log(print_r($data, true));

        if ($validator->isSuccess()) {
            echo "entrei no primeiro if";
            $forum = new Forum;
            $insert = $forum->insert($data);

            if ($insert) {
                return View::redirect('forum');
            } else {
                return View::render('error', ['message' => "It was not possible to register your post"]);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('post/create', ['errors' => $errors, 'post' => $data]);
        }
    }


    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $forum = new Forum;
            $selectId = $forum->selectId($data['id']);

            if ($selectId) {
                return View::render('forum/edit', ['forum' => $selectId]);
            } else {
                return View::render('error', ['message' => 'Deu ruim']);
            }
        } else {
            return View::render('error');
        }
    }

    public function update($data, $get)
    {

        $validator = new Validator;
        $validator->field('title', $data['title'])->required();
        $validator->field('post', $data['post'])->max(10000)->required();

        if ($validator->isSuccess()) {
            $forum = new Forum;
            $update = $forum->update($data, $get['id']);

            if ($update) {
                return View::redirect('forum');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('forum/create', ['errors' => $errors, 'forum' => $data]);
        }
    }

    public function delete($data)
    {
        $forum = new Forum;
        $delete = $forum->delete($data['id']);

        if ($delete) {
            return View::redirect('forum');
        } else {
            return View::render('error', ['message' => 'Deu ruim']);
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Providers\View;
use App\Providers\Validator;

class CommentController
{
    public function index()
    {

        $comment = new Comment;
        $select = $comment->select();

        if ($select) {
            return View::render('comment/index', ['comments' => $select]);
        } else {
            return View::render('error');
        }
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $comment = new Comment;
            $selectId = $comment->selectId($data['id']);
            if ($selectId) {
                return View::render('comment/show', ['comment' => $selectId]);
            } else {
                return View::render('error', ['message' => 'Deu ruim']);
            }
        } else {
            return View::render('error');
        }
    }

    public function create()
    {
        return View::render('comment/create');
    }

    public function store($data)
    {

        $validator = new Validator;
        $validator->field('class_students_id', $data['class_students_id'])->required()->max(25);
        $validator->field('class_course_id', $data['class_course_id'])->max(45);
        $validator->field('comment', $data['comment'], 'comment');
        $data['date-time'] = date('Y-m-d H:i:s');

        if ($validator->isSuccess()) {

            $comment = new Comment;
            $insert = $comment->insert($data);

            if ($insert) {
                return View::redirect('comment');
            } else {
                return View::render('error', ['message' => "Sorry. You can only write a comment if you are enroled for this class"]);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('comment/create', ['errors' => $errors, 'comment' => $data]);
        }
    }

    public function edit($data = [])
    {

        if (isset($data['id']) && $data['id'] != null) {
            $comment = new Comment;
            $selectId = $comment->selectId($data['id']);

            if ($selectId) {
                return View::render('comment/edit', ['comments' => $selectId]);
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
        $validator->field('class_students_id', $data['class_students_id'])->required()->max(25);
        $validator->field('class_course_id', $data['class_course_id'])->max(45);
        $validator->field('comment', $data['comment'], 'comment');
        $data['dateTime'] = date('Y-m-d H:i:s');

        if ($validator->isSucess()) {

            $comment = new Comment;
            $update = $comment->update($data, $get['id']);

            if ($update) {
                return View::redirect('comment');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('comment/create', ['errors' => $errors, 'comment' => $data]);
        }
    }

    public function delete($data)
    {
        $comment = new Comment;
        $delete = $comment->delete($data['id']);

        if ($delete) {
            return View::redirect('comment');
        } else {
            return View::render('error', ['message' => 'Deu ruim']);
        }
    }
}

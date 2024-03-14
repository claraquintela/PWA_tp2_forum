<?php
namespace App\Controllers;
use App\Providers\View;

class HomeController
{

    public function index()
    {
        View::render('home', ['data' => 'TP3_WebAvancee']);
    }

    public function home()
    {
        if (!$_SESSION['user_id']) {
            return View::redirect('login');
        }
        View::redirect('forum');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    // 課題3
    public function index() {
        return view('index');
    }

    // 課題6
    public function show() {
        $title = "詳細画面";
        return view('show', ['title' => $title]);
    }
}

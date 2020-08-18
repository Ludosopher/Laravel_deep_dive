<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view ('admin.index');
    }

    public function test1() {
        return view ('admin.test1');
    }

    public function test2() {
        return view ('admin.test2');
    }

    public function adding_news() {
        return view ('admin.adding_news');
    }
}

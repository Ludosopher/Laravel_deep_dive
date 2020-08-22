<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        // $news = DB::select('SELECT * FROM `news` WHERE 1');
        $news = \DB::table('news')->get();
        // dd($news);
        return view('news.index')->with('news', $news);
    }

    public function show($id) {
        $news = \DB::table('news')->find($id);
        if (!empty($news)) {
            return view('news.One')->with('news', $news);
        } else {
            return redirect()->route('news.index');
        }
    }
}

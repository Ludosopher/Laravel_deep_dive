<?php

namespace App\Http\Controllers;
use App\Categories;
use App\News;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        $catalog = Categories::all();
        return view('news.catalog')->with('catalog', $catalog);
    }

    public function show($name) {

        $categoriesArr = Categories::all()->toArray();
        $categoryArr = $categoriesArr[array_search($name, array_column($categoriesArr, 'slug'))];
        $id = $categoryArr['id'];

        $news = News::query()->where('category_id', $id)->get();

        return view('news.categoryOne')->with([
            'news' => $news,
            'title' => $categoryArr['title']
        ]);
    }

}

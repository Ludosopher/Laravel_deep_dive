<?php

namespace App\Http\Controllers;
use App\Catalog;
use App\News;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        return view ('news.catalog')->with('catalog', Catalog::getCatalog());
    }

    public function show($name) {
        return view('news.categoryOne')->with([
            'news' => News::getNewsByCategoryName($name),
            'title' => Catalog::getTitleBySlug($name)
        ]);
    }

}

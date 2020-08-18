<?php

namespace App\Http\Controllers;
use App\Catalog;
use App\News;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        return view ('catalog')->with('catalog', Catalog::getCatalog());
    }

    public function show($id) {
        return view ('categoryOne')->with([
            'catalog' => Catalog::getCatalogId($id),
            'news' => News::getNews()
        ]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Catalog;
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

    private function addId($news, $new) { // Добавление к массиву введённых админом данных о свежей новости её индивидуального номера
        $lastKey = array_search($news[count($news)], $news);
        $new['id'] = $lastKey + 1;
        return $new;
    }

    private function addIsPrivate($new) {  // Добавление к массиву введённых админом данных о свежей новости ключа 'isPrivate' со значением "0", если его не было
        if (!array_key_exists('isPrivate', $new)) {
            $new['isPrivate'] = 0;
        }
        return $new;
    }

    public function create(Request $request) {

        if ($request->isMethod('post')) {
            $new = $request->except('_token');
            $news = json_decode(\File::get('news.txt'), true);
            $new = $this->addId($news, $new);
            $news[$new['id']] = $this->addIsPrivate($new);
            \File::put('news.txt', json_encode($news), false);
            $request->flash();
            // dd($request->all());
            return redirect()->route('news.index');

        }

        return view ('admin.create', [
            'categories' => Catalog::getCatalog()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Catalog;
use App\News;
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

    private function addIsPrivate($new) {  // Добавление к массиву введённых админом данных о свежей новости ключа 'isPrivate' со значением "0", если его не было
        $new['isPrivate'] = isset($new['isPrivate']);
        return $new;
    }

    public function create(Request $request) {

        if ($request->isMethod('post')) {

            $name = null;
            if ($request->file('image')) {
                $path = \Storage::putFile('public/images', $request->file('image'));
                $name = \Storage::url($path);
            }

            \DB::table('news')->insert([
                ['title' => $request->title,
                 'text' => $request->text,
                 'category_id' => $request->category,
                 'isPrivate' => isset($request->isPrivate)]
                 // 'image' => $name
            ]);

            return redirect()->route ('admin.Create')->with('success', 'Новость добавлена успешно!');
        }

        return view ('admin.create', [
            'categories' => \DB::table('catalog')->get() // Catalog::getCatalog()
        ]);
    }
}

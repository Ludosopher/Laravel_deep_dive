<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Categories::query()->paginate(5);
        return view('admin.categories.index')->with('catalog', $catalog);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $categories = new Categories();

//            $name = null;
//            if ($request->file('image')) {
//                $path = \Storage::putFile('public/images', $request->file('image'));
//                $name = \Storage::url($path);
//            }

            $data = $request->except('_token');
            // dd($data);
            $categories->fill($data)->save();

            return redirect()->route ('admin.catalog.Create')->with('success', 'Категория добавлена успешно!');
        }

        $categories = new Categories();
        return view ('admin.categories.create')->with('categories', $categories);
    }

    public function update(Request $request, Categories $categories)
    {
        //            $name = null;
//            if ($request->file('image')) {
//                $path = \Storage::putFile('public/images', $request->file('image'));
//                $name = \Storage::url($path);
//            }

        $data = $request->except('_token');
        $categories->fill($data)->save();

        return redirect()->route ('admin.catalog.Index')->with('success', 'Категория обновлена успешно!');
    }

    public function destroy(Categories $categories)
    {
        DB::table('news')->where('category_id', $categories->getKey())->delete();
        $categories->delete();
        return redirect()->route ('admin.catalog.Index')->with('success', 'Удалены категория и все её новости!');
    }

    public function edit(Categories $categories)
    {
        return view('admin.categories.create')->with('categories', $categories);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.index')->with('news', $news);
    }

    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            $news = new News();

//            $name = null;
//            if ($request->file('image')) {
//                $path = \Storage::putFile('public/images', $request->file('image'));
//                $name = \Storage::url($path);
//            }

            $data = $request->except('_token');
            // dd($data);
            $news->fill($data)->save();

            return redirect()->route ('admin.Create')->with('success', 'Новость добавлена успешно!');
        }

        $news = new News();

        return view ('admin.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        //            $name = null;
//            if ($request->file('image')) {
//                $path = \Storage::putFile('public/images', $request->file('image'));
//                $name = \Storage::url($path);
//            }

        $data = $request->except('_token');
        $news->fill($data)->save();

        return redirect()->route ('admin.Index')->with('success', 'Новость обновлена успешно!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route ('admin.Index')->with('success', 'Новость удалена!');
    }

    public function edit(News $news)
    {
        // dd($news);
        return view('admin.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function store(News $news)
    {

    }
}

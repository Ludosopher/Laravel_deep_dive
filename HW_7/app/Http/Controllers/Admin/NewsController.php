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

    public function create()
    {
        $news = new News();

        return view ('admin.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $name = null;
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $name = \Storage::url($path);
        }

        $news->image = $name;
        $data = $request->except('_token');

        $this->validate($request, News::rules(), [], News::attrNames());

        $result = $news->fill($data)->save();
        if ($result) {
            return redirect()->route ('admin.news.create')->with('success', 'Новость изменена успешно!');
        } else {
            return redirect()->route ('admin.news.create')->with('error', 'Ошибка изменения новости!');
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route ('admin.news.index')->with('success', 'Новость удалена!');
    }

    public function edit(News $news)
    {
        // dd($news);
        return view('admin.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function store(Request $request)
    {
        $news = new News();

        $name = null;
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $name = \Storage::url($path);
        }

        $news->image = $name;
        $data = $request->except('_token');

        $this->validate($request, News::rules(), [], News::attrNames());

        $result = $news->fill($data)->save();

        if ($result) {
            return redirect()->route ('admin.news.create')->with('success', 'Новость добавлена успешно!');
        } else {
            return redirect()->route ('admin.news.create')->with('error', 'Ошибка добавления новости!');
        }
    }
}

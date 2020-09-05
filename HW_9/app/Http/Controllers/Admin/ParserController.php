<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\DB;

class ParserController extends Controller
{
    public function index() {

        $xml = XmlParser::load('https://lenta.ru/rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,pubDate,enclosure::url,category]'],
        ]);
        foreach ($data['news'] as $item) {
            $dataDB = [];
            $news = new News();
            $is_news = News::query()->where('title', $item['title'])->first();
            if(!$is_news) {
                $dataDB = [
                    'title' => $item['title'],
                    'text' => $item['description'],
                    'isPrivate' => 0,
                    'image' => $item['enclosure::url'],
                    'created_at' => strtotime($item['pubDate']),
                    'category_id' => $this->getCategoryId($item['category'])
                ];
                $result = $news->fill($dataDB)->save();
            }
        }
        if ($result) {
            return redirect()->route ('admin.news.index')->with('success', 'Новости успешно добавлены!');
        } else {
            return redirect()->route ('admin.news.index')->with('error', 'Ошибка добавления новости!');
        }
    }

    private function translit($value)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

            'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
            'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
            'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
            'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
            'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
            'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
            'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',   ' ' => '_'
        );

        $value = strtr($value, $converter);
        return $value;
    }

    private function getCategoryId(string $category) {
       $is_category = Categories::query()->where('title', $category)->first();
       if ($is_category) {

           return $is_category->id;

       } else {
           DB::table('categories')->insert([
               'title' => $category,
               'slug' => $this->translit($category)
           ]);
           $newCategory = DB::table('categories')->where('title', $category)->first();

           return $newCategory->id;
       }
    }

}

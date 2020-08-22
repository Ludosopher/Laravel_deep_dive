<?php

namespace App;

class News
{
    public static $news = [
        1 => [
            'id'=>1,
            'title'=>'Новость №1',
            'text'=>'Это первая новость (спортивная).',
            'category_id' => 1,
            'image' => null,
            'isPrivate' => true
        ],
        2 => [
            'id'=>2,
            'title'=>'Новость №2',
            'text'=>'Это вторая новость (спортивная).',
            'category_id' => 1,
            'image' => null,
            'isPrivate' => false
        ],
        3 => [
            'id'=>3,
            'title'=>'Новость №3',
            'text'=>'Это третья новость (политическая).',
            'category_id' => 2,
            'image' => null,
            'isPrivate' => true
        ],
        4 => [
            'id'=>4,
            'title'=>'Новость №4',
            'text'=>'Это четвёртая новость (политическая).',
            'category_id' => 2,
            'image' => null,
            'isPrivate' => false
        ]
    ];

    public static function getNewsByCategoryName($name) {
        $id = Catalog::getCategoryIdByName($name);
        $news = [];
        // foreach (static::$news as $item)
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public static function getNews() {
//        return static::$news;
        return json_decode(\File::get(storage_path() . '/news.json'), true, 512,JSON_UNESCAPED_UNICODE);
    }

    public static function getNewsId($id) {
        // return static::$news[$id];
        return static::getNews()[$id];
    }
}

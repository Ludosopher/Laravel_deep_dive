<?php

namespace App;

class News
{
    private static $news = [
        1 => [
            'id'=>1,
            'title'=>'Новость №1',
            'text'=>'Это первая новость (спортивная).',
            'category_id' => 1,
            'isPrivate' => true
        ],
        2 => [
            'id'=>2,
            'title'=>'Новость №2',
            'text'=>'Это вторая новость (спортивная).',
            'category_id' => 1,
            'isPrivate' => false
        ],
        3 => [
            'id'=>3,
            'title'=>'Новость №3',
            'text'=>'Это третья новость (политическая).',
            'category_id' => 2,
            'isPrivate' => true
        ],
        4 => [
            'id'=>4,
            'title'=>'Новость №4',
            'text'=>'Это четвёртая новость (политическая).',
            'category_id' => 2,
            'isPrivate' => false
        ]
    ];

    public static function getNewsByCategoryName($name) {
        $id = Catalog::getCategoryIdByName($name);
        $news = [];
        foreach (static::$news as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($id) {
        return static::$news[$id];
    }
}

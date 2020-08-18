<?php

namespace App;

class News
{
    private static $news = [
        [
            'id'=>1,
            'title'=>'Новость №1 (спортивная)',
            'text'=>'Это первая новость (спортивная).',
            'category_id' => 1
        ],
        [
            'id'=>2,
            'title'=>'Новость №2 (спортивная)',
            'text'=>'Это вторая новость (спортивная).',
            'category_id' => 1
        ],
        [
            'id'=>3,
            'title'=>'Новость №3 (политическая)',
            'text'=>'Это третья новость (политическая).',
            'category_id' => 2
        ],
        [
            'id'=>4,
            'title'=>'Новость №4 (политическая)',
            'text'=>'Это четвёртая новость (политическая).',
            'category_id' => 2
        ]
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($id) {
        return static::$news[array_search($id, array_column(static::$news, 'id'))];
    }
}

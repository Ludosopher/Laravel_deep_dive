<?php

namespace App;

class Catalog
{
    private static $catalog = [
        1 => [
            'id'=>1,
            'title'=>'Спорт',
            'slug' =>'sport'
        ],
        2 => [
            'id'=>2,
            'title'=>'Политика',
            'slug' =>'politics'
        ]
    ];

    public static function getCatalog() {
//        return static::$catalog;
         return json_decode(\File::get(storage_path() . '/catalog.json'), true, 512,JSON_UNESCAPED_UNICODE);
    }

    public static function getCategoryIdByName($name) {
        $id = null;
        foreach (json_decode(\File::get(storage_path() . '/catalog.json'), true, JSON_UNESCAPED_UNICODE) as $category) {
            if ($category['slug'] == $name) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getTitleBySlug($name) {
        $title = null;
        foreach (json_decode(\File::get(storage_path() . '/catalog.json'), true, 512, JSON_UNESCAPED_UNICODE) as $category) {
            if ($category['slug'] == $name) {
                $title = $category['title'];
                break;
            }
        }
        return $title;
    }

    public static function getCatalogId($id) {
        return static::getCatalog()[$id];
    }
}

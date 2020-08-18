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
        return static::$catalog;
    }

    public static function getCategoryIdByName($name) {
        $id = null;
        foreach (static::$catalog as $category) {
            if ($category['slug'] == $name) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getTitleBySlug($name) {
        $title = null;
        foreach (static::$catalog as $category) {
            if ($category['slug'] == $name) {
                $title = $category['title'];
                break;
            }
        }
        return $title;
    }

    public static function getCatalogId($id) {
        return static::$catalog[$id];
    }
}

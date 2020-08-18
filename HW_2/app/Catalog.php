<?php

namespace App;

class Catalog
{
    private static $catalog = [
        [
            'id'=>1,
            'title'=>'Спорт'
        ],
        [
            'id'=>2,
            'title'=>'Политика'
        ]
    ];

    public static function getCatalog() {
        return static::$catalog;
    }

    public static function getCatalogId($id) {
        return static::$catalog[array_search($id, array_column(static::$catalog, 'id'))];
    }
}

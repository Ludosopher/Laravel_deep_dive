<?php

use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalog')->insert([
            ['title' => 'Спорт', 'slug' => 'sport'],
            ['title' => 'Политика', 'slug' => 'politics']
        ]);
    }


}

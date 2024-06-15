<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'        => 'Nintendo Switch',
            'manufaturer' => 'Nintendo',
            'releasedate' => '2017-03-03',
            'description' => 'Lorem ipsum dolor'

        ]);

        $cat = new Category;
        $cat->name          = 'Xbox Series S';
        $cat->manufacturer  = 'Microsoft';
        $cat->releasedate   = '2020-11-10';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'Play Station 5';
        $cat->manufacturer  = 'Sony';
        $cat->releasedate   = '2020-11-12';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'Play Station 4';
        $cat->manufacturer  = 'Sony';
        $cat->releasedate   = '2021-11-12';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'Nintendo';
        $cat->manufacturer  = 'Nintendo';
        $cat->releasedate   = '2021-11-12';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();
    }
}

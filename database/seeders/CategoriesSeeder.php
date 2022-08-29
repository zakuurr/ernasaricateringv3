<?php

namespace Database\Seeders;

use App\Models\Backend\Kategori;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'kategori' => "Menu Utama",
                'slug' => 'menu-utama',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kategori' => "Satuan",
                'slug' => 'sa-tuan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kategori' => "Paket",
                'slug' => 'pak-et',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        Kategori::insert($posts);
    }
}

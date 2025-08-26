<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Electronics',
            'Fashion',
            'Beauty & Personal Care',
            'Home & Living',
            'Sports & Outdoors',
            'Toys, Kids & Baby',
            'Groceries & Essentials',
            'Books & Media',
            'Automotive',
            'Office & Stationery'
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName], [
                'slug' => Str::slug($categoryName),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            'Electronics'        => ['Phone', 'Laptop', 'Headphones', 'Smartwatch', 'Camera'],
            'Fashion'            => ['T-shirt', 'Jeans', 'Dress', 'Shoes', 'Jacket'],
            'Beauty & Personal Care' => ['Skincare Cream', 'Shampoo', 'Lipstick', 'Perfume', 'Hair Dryer'],
            'Home & Living'      => ['Sofa', 'Dining Table', 'Cookware Set', 'Bedsheet', 'Lamp'],
            'Sports & Outdoors'  => ['Football', 'Yoga Mat', 'Dumbbells', 'Bicycle', 'Camping Tent'],
            'Toys, Kids & Baby'  => ['Action Figure', 'Doll', 'Building Blocks', 'Baby Stroller', 'School Bag'],
            'Groceries & Essentials' => ['Rice', 'Cooking Oil', 'Snacks', 'Toothpaste', 'Dog Food'],
            'Books & Media'      => ['Novel', 'Comics', 'Textbook', 'Magazine', 'DVD'],
            'Automotive'         => ['Car Cover', 'Helmet', 'Seat Cushion', 'Engine Oil', 'Wiper Blades'],
            'Office & Stationery' => ['Pen', 'Notebook', 'Printer Paper', 'Stapler', 'Marker'],

        ];
        foreach($products as $category => $items) {
            $category = Category::where('name', $category)->first();
            foreach($items as $item) {
                Product::create([
                    'name' => ucfirst($item),
                    'slug' => Str::slug($item),
                    'description' => 'Description for ' . $item,
                    'price' => rand(10, 100) * 10, 
                    'category_id' => $category->id,
                    'quantity' => rand(1, 100), 
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Product::insert([
            ['name' => 'Nike black zoom', 'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups', 'picture' => 'nike-black.jpg', 'price' => 140],
            ['name' => 'Nike blue react', 'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups', 'picture' => 'nike-blue.jpg', 'price' => 90],
            ['name' => 'Nike green miler', 'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups', 'picture' => 'nike-green.jpg', 'price' => 110],
            ['name' => 'Puma red fantastic', 'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups', 'picture' => 'puma-red.jpg', 'price' => 75],
            ['name' => 'Vans black men', 'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups', 'picture' => 'vans-black.jpg', 'price' => 35],
            ['name' => 'Vans green dream', 'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups', 'picture' => 'vans-green.png', 'price' => 180],
        ]);
    }
}

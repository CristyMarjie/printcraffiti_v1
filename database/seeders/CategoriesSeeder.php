<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Mug',
                'description' => 'Mug for Giveaways',
                'status' => '1'
            ],
            [
                'name' => 'Business Card',
                'description' => 'Cards for Business',
                'status' => '1'
            ],
            [
                'name' => 'T-shirt',
                'description' => 'Tshirts for Business',
                'status' => '1'
            ]
           
        ];
        foreach ($categories as $category){
            Category::create($category);
        }
    }
}

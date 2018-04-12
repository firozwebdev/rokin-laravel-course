<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Mango',
            'description' => 'This is good fruit',
        ]);
        Category::create([
            'name' => 'Jackfruit',
            'description' => 'This is also good fruit',
        ]);
        Category::create([
            'name' => 'Banana',
            'description' => 'This is not good fruit',
        ]);
        Category::create([
            'name' => 'Orange',
            'description' => 'This is yes good fruit',
        ]);
        
    }
}

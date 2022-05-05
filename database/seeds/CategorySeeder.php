<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Contorni',
            'Dolci'
        ];

        foreach($categories as $name){
            $categories = new Category();
            $categories->name = $name;
            $categories->slug = Str::slug($name);
            
            $categories->save();
        };
    }
}

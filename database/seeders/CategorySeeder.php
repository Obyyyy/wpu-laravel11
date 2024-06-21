<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(2)->create();
        $categories = [
            [
                'name' => 'Web Programming',
                'slug' => 'web-programming',
                'color' => 'blue'
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'color' => 'green'
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
                'color' => 'orange'
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'color' => 'yellow'
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'color' => 'red'
            ],
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}

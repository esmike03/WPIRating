<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Personal Relation' => [
                'To Customers',
                'To Agent and Partner',
                'Loyalty to the Company',
                'To the Manager of the Company',
                'To the Supervisor',
                'To the Office Feedback',
            ],
            'Sales and Collection' => [
                'Ordering Concerns',
                'Terms Concerns',
                'Deal Concerns',
                'Discounting Concerns',
                'Collection Concerns',
            ],
            'Customer Satisfaction' => [
                'Quality of Service',
                'Timeliness of Delivery',
                'Pricing Satisfaction',
                'Responsiveness to Issues',
            ],
        ];

        foreach ($categories as $categoryName => $questions) {
            // Create Category
            $category = Category::create(['name' => $categoryName]);

            // Insert Questions
            foreach ($questions as $question) {
                Question::create([
                    'category_id' => $category->id,
                    'question' => $question,
                ]);
            }
        }
    }
}

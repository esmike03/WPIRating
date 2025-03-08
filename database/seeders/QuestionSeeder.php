<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['category' => 'Personal Relation', 'question' => 'To Customers'],
            ['category' => 'Personal Relation', 'question' => 'To Agent and Partner'],
            ['category' => 'Personal Relation', 'question' => 'Loyalty to the Company'],
            ['category' => 'Personal Relation', 'question' => 'To the Manager of the Company'],
            ['category' => 'Personal Relation', 'question' => 'To the Supervisor'],
            ['category' => 'Personal Relation', 'question' => 'To the Office Feedback'],
            ['category' => 'Personal Relation', 'question' => 'Loyalty to the Company'],
            ['category' => 'Sales and Collection', 'question' => 'Ordering Concerns'],
            ['category' => 'Sales and Collection', 'question' => 'Terms Concerns'],
            ['category' => 'Sales and Collection', 'question' => 'Deal Concerns'],
            ['category' => 'Sales and Collection', 'question' => 'Discounting Concerns'],
            ['category' => 'Sales and Collection', 'question' => 'Collection Concerns'],
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}

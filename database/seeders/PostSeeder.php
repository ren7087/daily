<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'customer' => '吉田',
            'location' => '八王子駅',
            'product' => 'テレビ',
            'start' => '2022-06-04 17:00',
            'end' => '2022-06-04 18:00',
            'action' => '打ち合わせ',
            'transportation' => '電車',
            'fee' => '1000円',
            'content' => 'これはtestですこれはtestですこれはtestです',
            'comment' => 'これはtestですこれはtestです',
        ]);

        Post::create([
            'customer' => '田中',
            'location' => '八王子駅',
            'product' => 'テレビ',
            'start' => '2022-06-04 17:00',
            'end' => '2022-06-04 18:00',
            'action' => '打ち合わせ',
            'transportation' => '電車',
            'fee' => '1000円',
            'content' => 'これはtestですこれはtestですこれはtestです',
            'comment' => 'これはtestですこれはtestです',
        ]);

        Post::create([
            'customer' => '武田',
            'location' => '八王子駅',
            'product' => 'テレビ',
            'start' => '2022-06-04 17:00',
            'end' => '2022-06-04 18:00',
            'action' => '打ち合わせ',
            'transportation' => '電車',
            'fee' => '1000円',
            'content' => 'これはtestですこれはtestですこれはtestです',
            'comment' => 'これはtestですこれはtestです',
        ]);

        Post::create([
            'customer' => '富田',
            'location' => '八王子駅',
            'product' => 'テレビ',
            'start' => '2022-06-04 17:00',
            'end' => '2022-06-04 18:00',
            'action' => '打ち合わせ',
            'transportation' => '電車',
            'fee' => '1000円',
            'content' => 'これはtestですこれはtestですこれはtestです',
            'comment' => 'これはtestですこれはtestです',
        ]);
    }
}

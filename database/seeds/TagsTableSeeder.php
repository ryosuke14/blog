<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            '中国', 'アメリカ', '日本', '戦争', '自民党', '中国共産党', 'トランプ'
        ];
        foreach ($tags as $tag) Tag::create(['tag' => $tag]);
    }
}

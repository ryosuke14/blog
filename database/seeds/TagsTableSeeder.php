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

        {
            $tags = [
                '中国', 'アメリカ', '戦争','法律', '首相', '教育', '官僚', '政治家',
            ];
            foreach ($tags as $tag) Tag::create(['tag' => $tag]);
        }


    }
}

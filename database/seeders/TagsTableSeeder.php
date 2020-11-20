<?php


namespace Database\Seeders;


use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        Tag::query()->truncate();

        Tag::factory(5)->create();
    }
}

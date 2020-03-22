<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
                [
                  'name'=>'Blog post',
                  'alias'=>'<p>aliasalias Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>',
                  'text'=>'<p>texttext Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>'
                ],
            ]
        );
    }
}

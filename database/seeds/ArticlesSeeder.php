<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // 1
        DB::insert('INSERT INTO `articles` (`name`,`text`,`img`) VALUE (?,?,?)',[
            'Blog post 1',
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>',
            'pic1.jpg'
        ]);

        // 2
        DB::table('articles')->insert(
            [
                [
                  'name'=>'Blog post 2',
                  'text'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>',
                  'img'=>'pic1.jpg'
                ],
                [
                  'name'=>'Blog post 3',
                  'text'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>',
                  'img'=>'pic1.jpg'
                ],
                [
                  'name'=>'Blog post 4',
                  'text'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>',
                  'img'=>'pic1.jpg'
                ],
            ]
        );

        // 3
        Article::create([
            'name'=>'Blog post 5',
            'text'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla, porro nemo.</p>',
            'img'=>'pic1.jpg'
        ]);
    }
}
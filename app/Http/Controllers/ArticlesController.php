<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\ArticlesRepository;

use Corp\Http\Requests;

class ArticlesController extends SiteController
{
  public function __construct(PortfoliosRepository $p_rep,ArticlesRepository $a_rep){
    parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

    $this->p_rep = $p_rep;
    $this->a_rep = $a_rep;

    $this->bar = 'right';
    $this->template = env('THEME').'.articles';
  }

  public function index(){
    // $portfolios = $this->getPortfolio();
    // $content = view(env('THEME').'.content')->with('portfolios',$portfolios)->render();
    // $this->vars = array_add($this->vars,'content',$content); 

    // $slidersItems = $this->getSliders();
    // $sliders = view(env('THEME').'.slider')->with('sliders',$slidersItems)->render();
    // $this->vars = array_add($this->vars,'sliders',$sliders); 

    // $this->keywords = 'Home Page';
    // $this->meta_desc = 'Home Page';
    // $this->title = 'Home Page';

    // $articles = $this->getArticles();
    // $this->contentRightBar = view(env('THEME').'.indexBar')->with('articles',$articles)->render();

    $articles = $this->getArticles();

    return $this->renderOutput();
  }
  
  public function getArticles($alias = FALSE){
    $articles = $this->a_rep->get(['title','alias','created_at','img','desc'],FALSE,TRUE);

    if($articles){
      // $articles->load('user','category','comments');
    }

    return $articles;
  }
}
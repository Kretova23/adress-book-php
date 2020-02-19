<?php


namespace Core;

use Vendor\twig;

class CoreView
{
    public $loader;     // место где будут хранятся шаблоны Twig
    public $twig;       // инициализация самого движка

    public function __construct ()
    {


        $this -> loader = new \Twig\Loader\FilesystemLoader( 'templates');
        //print_r($this->loader);


        $this -> twig = new \Twig\Environment($this -> loader, ['autoescape' => false]);
        //echo $twig;
    }

    public function index ()
    {
        //echo $this->twig->render('blog/articles.php', ['title' => 'Blog Home  WOW'] );
    }
}





<?php

class Page {
    protected $title = null;
    protected $styles = null;

    public function display() {
        echo $this->content;
    }

    public function setMainParameters($title, $styles) {
        $this->title = $title;
        $this->styles = $styles;
    }
}

class PageMain extends Page
{
    protected $content = 'some content';
    //other class logic
}

class PageLogin extends Page
{
    protected $content = 'some login content';
    //other class logic
}

class PageFactory
{
    public static function createPage($page_name) {
        return new $page_name;
        // OR YOU CAN USE SWITCH
        // switch($page_name) {
        // case 'Login':
        //     return new PageLogin;
        //     break;
        // case 'Main':
        //     return new PageMain;
        //     break;
        // }
    }
}

$p = PageFactory::createPage('PageLogin');
$p->setMainParameters('Login', 'style.css');
$p->display();
?>
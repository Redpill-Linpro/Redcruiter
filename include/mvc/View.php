<?php
require_once 'include/smarty/libs/Smarty.class.php';

class View
{
    protected $smarty;
    protected $html;

    public function __construct()
    {
        
        $this->html = 'include/mvc/html/index.tpl';
    }

    final public function initSmarty()
    {
        $this->smarty = new Smarty();
        $this->debugging = true;
        $this->caching = true;
        $this->cache_lifetime = 5;
        $this->smarty->setCompileDir('files/smarty/templates_c/');
        $this->smarty->setCacheDir('files/smarty/cache/');
    }

    public function process()
    {
        $this->smarty->assign('HELLO','Hello World');
    }

    public function display()
    {
        $this->smarty->display($this->html);
    }
}
<?php
require_once 'include/smarty/libs/Smarty.class.php';

class View
{
    protected $smarty;
    protected $html;

    public function __construct()
    {
        
        $this->tpl = 'include/mvc/html/index.tpl';
    }

    final public function initSmarty()
    {
        $this->smarty = new Smarty();
        $this->debugging = true;
        $this->caching = true;
        $this->cache_lifetime = 5;
        $this->smarty->setCompileDir('cache/smarty/templates_c/');
        $this->smarty->setCacheDir('cache/smarty/cache/');
    }

    public function display()
    {
        $this->smarty->assign('HELLO','Hello World');
        $this->smarty->display($this->tpl);

    }
}
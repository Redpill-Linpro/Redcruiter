<?php
/**
 * Copyright 2011 Redpill Linpro AB.
 * 
 * This file is part of Redcruiter.
 *
 * Redcruiter is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * Redcruiter is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Redcruiter. If not, see <http://www.gnu.org/licenses/>.
 */
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
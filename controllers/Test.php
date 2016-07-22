<?php

class Test extends Controller
{
 
    public function index()
    {
        $shop_mod = $this->getModel('ShopModel');
        $this->cats = $shop_mod->getAllCategories(Lang::$lang_id);

        $this->getView('test');
    }
    
    
}
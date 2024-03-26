<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    protected $menuservice;

    public function __construct(MenuService $menuservice)
    {
        $this->menuservice = $menuservice;
    }

    public function index(Request $request, $id, $slug){
        $menu_with_product = $this->menuservice->getId($id);

        $product = $this->menuservice->getProduct($menu_with_product,$request);

        $menu = $this->menuservice->getMenu();

        return view('shop',[
            'title'=> $menu_with_product->name,
            'id_menu'=>$menu_with_product->id,
            'products'=>$product,
            'menus'=>$menu
        ]);
    }

    public function search_price(Request $request,$id,$price_1,$price_2){
        $menu_with_product = $this->menuservice->getId($id);

        $search_price = $this->menuservice->select_price($menu_with_product,$price_1,$price_2);

        $menu = $this->menuservice->getMenu();
        return view('shop',[
            'title'=> $menu_with_product->name,
            'id_menu'=>$menu_with_product->id,
            'products'=>$search_price,
            'menus'=>$menu
        ]);

    }

    public function searchFullText(Request $request,$id){
        $menu_with_product = $this->menuservice->getId($id);

        $search = $this->menuservice->search($menu_with_product,$request);
        $menu = $this->menuservice->getMenu();

        return view('shop',[
            'title'=> $menu_with_product->name,
            'id_menu'=>$menu_with_product->id,
            'products'=>$search,
            'menus'=>$menu
        ]);

    }
}

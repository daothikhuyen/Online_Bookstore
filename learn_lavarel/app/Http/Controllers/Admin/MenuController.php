<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menus\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{

    protected $menuservice;

    public function __construct(MenuService $menuService)
    {
        $this->menuservice = $menuService;
    }

    public function create(){
        return view('admin.menu.add',[
            'title'=> 'Thêm Danh Mục',
            'menus' => $this->menuservice->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){
        $result = $this->menuservice->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.menu.list', [
            'title'=> 'Danh sách danh mục',
            'menus'=>$this->menuservice->getAll()

        ]);
    }

    public function destroy(Request $request){
        // echo 123;
        // exit;
        $result = $this->menuservice->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'message'=> 'Xoá thành công'
            ]);
        }
            return response()->json([
                'error' => true,
            ]);

    }

    public function show(Menu $menu){

        return view('admin.menu.edit', [
            'title'=> 'Chỉnh sửa danh mục: '. $menu->name,
            'menu'=> $menu,
            'menus'=>$this->menuservice->getParent()

        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request){

        $this->menuservice->update($request,$menu);

        return redirect('/admin/menus/list');
    }

}

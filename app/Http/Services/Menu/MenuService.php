<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class MenuService
{

    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll(){

        $users = Menu::select()->paginate(20);

        return $users;
    }

    public function destroy($request){
        $id = (int) $request -> input('id');

        $menu = Menu::where('id', $id)->first();

        if($menu){
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }
        return false;
    }

    public function update($request,$menu){
        // fill là update toàn bộ mà thông nó gửi lên
        $menu->fill($request->input());
        $menu->save(); // lưu lại
        Session::flash('success', 'Cập nhật thành công ');
        return true;
    }

    public function create($request){
        try {

            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (int) $request->input('active')

            ]);

            session()->flash('success', 'Tạo danh mục thành công');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return false;
        }
        return true;
    }

    public function getId($id){
        return Menu::select()->where('id',$id)
                            ->where('active',1)
                            ->firstOrFail();
    }

    public function getProduct($menu,$request){
        $query = $menu->products()->select()->where('active',1);

        if($request->input('price')){
            $query ->orderBy('price',$request->input('price'));
        }

        if($request->input('discount')){
            $query ->where('discount','<>',0);
        }

        return $query->orderByDesc('id')
                    ->paginate(12)
                    ->withQueryString();

    }

    public function getMenu(){
        return Menu::select()->where('active',1)
                            ->where('parent_id', '<>',0)
                            ->get();
    }

    public function select_price($menu,$price_1,$price_2){
        return $menu->products()->whereBetween('price', [$price_1, $price_2])->paginate(12)->withQueryString();;
    }

    public function search($menu,$request){
        $searchTerm = $request->input('search');

        $products = $menu->products()->where('name', 'LIKE', '%' . $searchTerm . '%')->paginate(12)->withQueryString();;

        return $products;
    }


}

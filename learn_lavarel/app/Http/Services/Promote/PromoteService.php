<?php

namespace App\Http\Services\Promote;

use App\Models\Promote;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PromoteService{

    public function create($request){
        try {
            Promote::create($request->all());

            Session::flash('success', 'Thêm khuyến maiz thành công');
        } catch (\Throwable $th) {
            Session::flash('erro', 'Thêm khuyến mãi lỗi');
            Log::info($th->getMessage());

            return false;
        }
        return true;
    }

    public function getAll(){
        return Promote::select()->paginate(15);
    }

    public function update($promote, $request){
        // dd($request);
        $promote->fill($request->input());
        $promote->save();

        Session::flash('success', 'Cập nhật thành công');
        return true;
    }

    public function destroy($request){

        $id = (int) $request->input('id');

        $slider = Promote::where('id', $id)->first();

        if($slider){
            return Promote::where('id', $id)->delete();
        }

        return false;
    }
}

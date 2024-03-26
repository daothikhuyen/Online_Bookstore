<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SliderService{

    public function create($request){

        try {
            Slider::create($request->all());

            Session::flash('success', 'Thêm Slider thành công');
        } catch (\Throwable $th) {
            Session::flash('erro', 'Thêm Slider lỗi');
            Log::info($th->getMessage());

            return false;
        }
        return true;
    }

    public function getAll(){
        return Slider::select()->paginate(10);
    }

    public function destroy($request){

        $id = (int) $request->input('id');

        $slider = Slider::where('id', $id)->first();

        if($slider){
            return Slider::where('id', $id)->delete();
        }

        return false;
    }

    public function update($request,$slider){

        $slider->fill($request->input());
        $slider->save();

        Session::flash('success', 'Cập nhật thành công');
        return true;
    }

    public function show(){
        return Slider::select()->where('active',1)->get();
    }

}

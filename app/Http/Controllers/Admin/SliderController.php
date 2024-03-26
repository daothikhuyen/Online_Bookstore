<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sliders\SliderRequest;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    protected $slider;

    public function __construct(SliderService $slider)
    {

        return $this->slider = $slider;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.list', [
            'title'=> 'Danh sách Slider',
            'sliders'=> $this->slider->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add',[
            'title'=> 'Thêm Slider mới',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // dd($request);
        $result = $this->slider->create($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.edit',[
            'title'=> 'Cập nhật slider',
            'slider'=> $slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $result = $this->slider->update($request,$slider);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công'
            ]);

        }
        return response()->json([
            'error' => true
        ]);
    }
}

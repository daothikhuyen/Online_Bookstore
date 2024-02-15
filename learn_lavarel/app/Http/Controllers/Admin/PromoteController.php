<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Promote\PromoteService;
use App\Models\Promote;
use Illuminate\Http\Request;

class PromoteController extends Controller
{
    protected $promote;

    public function __construct(PromoteService $promote)
    {

        return $this->promote = $promote;

    }

    public function index()
    {
        return view('admin.promote.list', [
            'title'=> 'Danh sách khuyến mãi',
            'promotes'=> $this->promote->getAll()
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('admin.promote.add',[
            'title'=> 'Thêm khuyến mãi mới',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->input('request'));
        $request->validate([
            'request' => 'required|max:255',
            'price' => 'required',
        ]);

        $result = $this->promote->create($request);

        return redirect()->back();
    }

    public function show(Promote $promote)
    {
        return view('admin.promote.edit',[
            'title'=> 'Danh sách khuyến mãi',
            'promote'=> $promote
        ]);
    }

    public function update(Promote $promote, Request $request)
    {
        $request->validate([
            'request' => 'required|max:255',
            'price' => 'required',
        ]);

        

        $this->promote->update($promote, $request);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->promote->destroy($request);

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

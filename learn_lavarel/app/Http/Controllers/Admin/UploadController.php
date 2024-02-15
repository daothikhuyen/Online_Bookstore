<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploadService;
use Illuminate\Http\Request;



class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload){

        $this->upload = $upload;

    }

    public function store(Request $request){
        //nếu validate dung lượng file có thể ghi ở đây
        // dd($request->file());
        $url = $this->upload->store($request);

        if($url != false){
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}

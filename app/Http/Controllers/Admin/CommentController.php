<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function __construct()
    {

    }

    public function index(){

        return view('admin.comments.list',[
            'title' => 'Bình Luận',
            'comments' => Comment::select()->with('user')->with('product')->paginate(10)
        ]);
    }

    public function feedback($id){
        return view('admin.comments.feedback',[
            'title' => 'Trả Lời Bình Luận',
            'comments' => Comment::select()->where('id', $id)->with('user')->first()
        ]);
    }

    public function update_feedback($id,Request $request){

        Comment::where('id',$id)->update(['feedback'=> $request->input('feedback')]);

        Session::flash('success', 'Cập nhật thành công');
        return redirect()->back();

        // return view('admin.comments.feedback',[
        //     'title' => 'Trả Lời Bình Luận',
        //     'comments' => Comment::select()->where('id', $id)->with('user')->first()
        // ]);
    }
}

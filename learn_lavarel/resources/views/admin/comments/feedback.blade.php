
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
<div class="container mt-3 py-3">
    <div class="info_user_order">
        <div class="order-item">
            <label for="">Tên khách hàng</label>
            <span>: &nbsp; {{$comments->user->name}}</span>
        </div>
        <div class="order-item">
            <label for="">Nội dung</label>
            <span>: &nbsp; {{$comments->content}}</span>
        </div>
        <div class="feedback ">
            <div class="order-item d-flex ">
                <label for="">Trả lời </label>
                <div>
                    <form action="/admin/comment/feedback_admin/{{$comments->id}}" method="post">
                        <input type="hidden" name="id" id="" value="{{$comments->id}}">
                        <div class="border-1">
                            <textarea name="feedback" id="" cols="40" rows="5" class="px-2" style="outline: none; border-radius: 8px"></textarea>
                        </div>
                        <button type="submit" name="btn-feedback" class="float-right btn btn-primary">Trả lời</button>
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div>

    </div>
</div>
@endsection

@section('footer')

@endsection



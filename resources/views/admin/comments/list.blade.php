
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
<div class="container mt-3 py-3">
    <table class="table ">
      <thead>
        <tr>
          <th style="width:50px">STT</th>
          <th>Tên sản phẩm</th>
          <th class="text-center">Tên khách hàng</th>
          <th class="text-center">Nội dung</th>
          <th class="text-center">Đánh Giá</th>
          <th class="text-center">Trả lời của người bán</th>
          <th style="width:100px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ( $comments as $key => $comment)
        {{-- {{$comment->menu}} --}}
        <tr class="align-middle comments">
            <td class="align-middle">{{ $key+=1 }}</td>
            <td class="align-middle">
                <img src="{{ $comment->product->image }}" alt="" style="width:80px">
                {{  $comment->product->name }}
            </td>
            <td class="align-middle text-center">{{ $comment->user->name }}</td>
            <td class="align-middle text-center ">{{ $comment->content }}</td>
            <td class="align-middle text-center ">{{ $comment->Star }} <small>sao</small></td>
            <td class="align-middle text-center ">{{ $comment->feedback }}</td>
            <td class="align-middle text-center">
                <a class="btn btn-primary btn-sm px-4 py-2" href="/admin/comment/feedback/{{$comment->id}}">
                    <i class="fa-solid fa-comment fa-xl"></i>
                </a>

            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {!! $comments->links() !!}
  </div>
@endsection

@section('footer')

@endsection



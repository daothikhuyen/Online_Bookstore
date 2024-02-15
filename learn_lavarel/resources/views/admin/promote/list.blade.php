
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
          <th class="text-center">Yêu Cầu</th>
          <th class="text-center">Giảm Giá</th>
          <th style="width:100px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ( $promotes as $key => $promote)
        {{-- {{$promote->menu}} --}}
        <tr class="align-middle products">
            <td class="align-middle">{{ $key+=1 }}</td>
            <td class="align-middle text-center ">{{ $promote->request }}</td>
            <td class="align-middle text-center product_price">{{ $promote->price }}</td>
            <td class="align-middle text-center">
                <a class="btn btn-primary btn-sm" href="/admin/promote/edit/{{$promote->id}}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick = "removeRow({{$promote->id}},'/admin/promote/destroy')">
                    <i class="fa-solid fa-trash-can "></i>
                </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {!! $promotes->links() !!}
  </div>
@endsection

@section('footer')

@endsection



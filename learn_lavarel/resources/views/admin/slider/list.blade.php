
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
<div class="container mt-3">
    <table class="table">
      <thead>
        <tr class="text-center">
          <th style="width:50px">ID</th>
          <th>Tên Slider</th>
          <th>Link</th>
          <th>Ảnh</th>
          <th>Trạng thái</th>
          <th>Sắp xếp</th>
          <th style="width:100px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ( $sliders as $key => $slider)
        {{-- {{$product->menu}} --}}
        <tr class="text-center">
            <td class="align-middle ">{{ $slider->id }}</td>
            <td class="align-middle ">{{ $slider->name }}</td>
            <td class="align-middle ">{{ $slider->url }}</td>
            <td class="align-middle ">
                <img src="{{ $slider->image }}" alt="" style="width:100px">
            </td>
            <td class="align-middle ">{!! \App\Helpers\Helper::active($slider->active) !!}</td>
            <td class="align-middle ">{{ $slider->sort_by }}</td>
            <td class="align-middle ">
                <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick = "removeRow({{$slider->id}},'/admin/sliders/destroy')">
                    <i class="fa-solid fa-trash-can "></i>
                </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {!! $sliders->links() !!}
  </div>
@endsection

@section('footer')

@endsection



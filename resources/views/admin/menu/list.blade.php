
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
<div class="container mt-3">
    <table class="table">
      <thead>
        <tr>
          <th style="width:50px">ID</th>
          <th>Tên danh muc</th>
          <th>Active</th>
          <th>Ngày tạo</th>
          <th style="width:100px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="">
        {!! \App\Helpers\Helper::menu($menus) !!}
      </tbody>
    </table>
  </div>
@endsection

@section('footer')

@endsection



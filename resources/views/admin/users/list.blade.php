
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
          <th>Tên người dùng</th>
          <th class="text-center">Email</th>
          <th class="text-center">Mật Khẩu</th>
          <th style="width:100px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ( $accounts as $key => $account)
        {{-- {{$account->menu}} --}}
        <tr class="align-middle accounts">
            <td class="align-middle">{{ $key+=1 }}</td>
            <td class="align-middle text-center">{{ $account->name }}</td>
            <td class="align-middle text-center ">{{ $account->email }}</td>
            <td class="align-middle text-center ">{{ $account->password }}</td>
            <td class="align-middle text-center">
                <a href="#" class="btn btn-danger btn-sm" onclick = "removeRow({{$account->id}},'/admin/accounts/destroy')">
                    <i class="fa-solid fa-trash-can "></i>
                </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {!! $accounts->links() !!}
  </div>
@endsection

@section('footer')

@endsection



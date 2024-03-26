@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container mt-3 py-3">
        <table class="table ">
            <thead>
                <tr>
                    <th style="width:50px">STT</th>
                    <th>Tên sản phẩm</th>
                    <th class="text-center">Danh mục</th>
                    <th class="text-center">Giá gốc</th>
                    <th class="text-center">Khuyến Mãi</th>
                    <th class="text-center">Giá Giảm</th>
                    <th class="text-center">Active</th>
                    <th style="width:100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($products as $key => $product)
                    {{-- {{$product->menu}} --}}
                    <tr class="align-middle products">
                        <td class="align-middle">{{ $key += 1 }}</td>
                        <td class="align-middle">
                            <img src="{{ $product->image }}" alt="" style="width:80px">
                            {{ $product->name }}
                        </td>
                        <td class="align-middle text-center">{{ $product->menu ? $product->menu->name : 'N/A' }}</td>
                        <td class="align-middle text-center product_price">{{ $product->price }}</td>
                        <td class="align-middle text-center ">{{ $product->discount }}%</td>
                        <td class="align-middle text-center product_price">
                            @if ($product->discount > 0)
                                {{ ($product->price * (100 - $product->discount)) / 100 }}
                            @else
                                {{ $product->price }}
                            @endif
                        </td>
                        <td class="align-middle text-center">{!! \App\Helpers\Helper::active($product->active) !!}</td>
                        <td class="align-middle text-center">
                            <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick = "removeRow({{ $product->id }},'/admin/products/destroy')">
                                <i class="fa-solid fa-trash-can "></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $products->links() !!}
    </div>
@endsection

@section('footer')
@endsection

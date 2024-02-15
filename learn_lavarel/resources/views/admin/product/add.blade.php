
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sách</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá gốc</label>
                        <input type="number" name="price" value="{{old('price')}}"  class="form-control" id="exampleInputEmail1" placeholder="0.000đ">
                    </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khuyến Mãi (%)</label>
                            <input type="number" name="discount" class="form-control" value="0"  id="exampleInputEmail1" placeholder="0%">
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhà xuất bản</label>
                        <input type="text" name="publisher" value="{{old('publisher')}}"  class="form-control" id="exampleInputEmail1" placeholder="Nhập tên NXB">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="0">Danh Mục Cha</option>
                            @foreach ($menus as $menus)
                                <option value="{{$menus->id}}">{{$menus->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Giảm</label>
                        <input type="number" name="price_sale" class="form-control" value="{{old('price_sale')}}"  id="exampleInputEmail1" placeholder="0.000đ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Số lượng</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{old('quantity')}}" placeholder="Nhập số lượng">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tác giả</label>
                        <input type="text" name="author" class="form-control" value="{{old('author')}}"  id="exampleInputEmail1" placeholder="Nhập tác giả">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Mô tả</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{old('description')}}</textarea>

            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <input type="file" name="file" id="upload" class="form-control">
                <div id="image_show">

                </div>

                <input type="hidden" name="image" id="image">

            </div>
            <div class="form-check">
                <label for="exampleInputFile">Nổi bật</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" value="1" id="customRadio1" name="active">
                      <label for="customRadio1" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" value="0" id="customRadio2" name="active" checked="">
                      <label for="customRadio2" class="custom-control-label">Không</label>
                    </div>

                  </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf
    </form>
    <!-- /.card -->
</form>
@endsection

@section('footer')
<script>
    ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection



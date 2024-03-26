
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Danh mục</label>
                <select name="parent_id" id="" class="form-control">
                    <option value="0">Danh Mục Cha</option>
                    @foreach ($menus as $menus)
                        <option value="{{$menus->id}}">{{$menus->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Mô tả</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>

            </div>
            <div class="form-group">
                <label for="exampleInputFile">Mô tả chi tiết</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="5"></textarea>

            </div>
            <div class="form-check">
                <label for="exampleInputFile">Kích hoạt</label>
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
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        @csrf
    </form>
    <!-- /.card -->
</form>
@endsection

@section('footer')
<script>
    ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection



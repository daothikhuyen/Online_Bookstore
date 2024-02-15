
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số tiền khuyến mãi</label>
                        <input type="number" name="price" value="{{old('price')}}"  class="form-control" id="exampleInputEmail1" placeholder="0.000đ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Yêu cầu</label>
                        <input type="text" name="request" value=""  class="form-control" id="exampleInputEmail1" placeholder="vd: Tối đa đơn hàng phải lớn hơn 50K">
                    </div>
                </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo khuyến mãi</button>
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



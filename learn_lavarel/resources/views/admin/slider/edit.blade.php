
@extends('admin.main')

@section('header')

@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Đường dẫn</label>
                        <input type="text" name="url" value="{{ $slider->url }}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <input type="file" name="file" id="upload" class="form-control">
                <div id="image_show">
                    <a href="{{ $slider->image }}" target="_blank">
                        <img src="{{ $slider->image }}" alt="" style="width:100px">
                    </a>
                </div>

                <input type="hidden" name="image" id="image" value="{{ $slider->image }}">

            </div>
            <div class="form-group">
                <label for="exampleInputFile">Sắp xếp</label>
                <input type="number" name="sort_by" id="" value="{{ $slider->sort_by }}" class="form-control">
            </div>
            <div class="form-check">
                <label for="exampleInputFile">Hoạt động</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" value="1" id="customRadio1" name="active" {{ $slider->active == 1?'checked':'' }}>
                      <label for="customRadio1" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" value="0" id="customRadio2" name="active" {{ $slider->active == 0?'checked':'' }}>
                      <label for="customRadio2" class="custom-control-label">Không</label>
                    </div>

                  </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
        </div>
        @csrf
    </form>
    <!-- /.card -->
</form>
@endsection

@section('footer')
@endsection



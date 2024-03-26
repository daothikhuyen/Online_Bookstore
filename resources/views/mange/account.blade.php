<div class="row py-3">
    <div class="col-md-6 d-flex info_left">
        <div>
            <img src="/template/admin/dist/img/avatar5.png" width="100px" height="120px" alt="">
        </div>
        <div class="account_user ms-3">
            <div class="py-2">
                <label for="" class="update_info_user  fw-bold" style="with:120px; max-width: 120px;">Tên khách hàng</label>
                <input type="text" class="px-1" style="border: none; border-bottom: 2px solid #eee; border-radius: 3px; outline:none" name="" id="" value="{{Session::get('user')->name}}">
            </div>
            <div class="py-2">
                <label for="" class="update_info_user fw-bold" style="with:120px; max-width: 120px;">Email</label>
                <input type="text" class="px-1" style="border: none; border-bottom: 2px solid #eee; border-radius: 3px; outline:none" name="" id="" value="{{Session::get('user')->email}}">
            </div>
            <div class="py-2">
                <label for="" class="update_info_user fw-bold" style="with:120px; max-width: 120px;">Số điện thoại</label>
                <input type="text" class="px-1" style="border: none; border-bottom: 2px solid #eee; border-radius: 3px; outline:none" name="" id="" value="{{ (Session::get('user')->number_phone != "")?Session::get('user')->number_phone: 'Chưa có'}}">
            </div>
            <div class="py-2">
                <label for="" class="update_info_user fw-bold" style="with:120px; max-width: 120px;">Địa chỉ</label>
                <input type="text" class="px-1" style="border: none; border-bottom: 2px solid #eee; border-radius: 3px; outline:none" name="" id="" value="{{ (Session::get('user')->addess != "")?Session::get('user')->addess: 'Chưa có'}}">
            </div>
        </div>
    </div>
    <div class="col-md-6 password">
        <div class="account_user ms-3">
            <div class="py-2">
                <label for="" class="update_info_user  fw-bold" style="with:120px; max-width: 120px;">Mật Khẩu</label>
                <input type="password" class="px-1" style="border: none; border-bottom: 2px solid #eee; border-radius: 3px; outline:none" name="" id="" value="{{Session::get('user')->password}}">
            </div>

        </div>
    </div>
</div>

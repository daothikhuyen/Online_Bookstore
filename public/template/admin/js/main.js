$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function removeRow(id, url)
{
    if(confirm('Xoá mà không thể khôi phục. Bạn chắc chắn ?')){
        $.ajax({
            type: 'DELETE',
            datatypeL: 'JSON',
            data: {id},
            url : url,
            success: function(result){
                decodeURI(result);
                // alert(result.message);
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xoá lỗi vui lòng thử lại');
                }
            }
        })
    }
}

function update(id, url)
{
    if(confirm('Huỷ Đơn Hàng. Huỷ Không Khôi Phục ?')){
        $.ajax({
            type: 'POST',
            datatypeL: 'JSON',
            data: {id},
            url : url,
            success: function(result){
                decodeURI(result);
                // alert(result.message);
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xoá lỗi vui lòng thử lại');
                }
            }
        })
    }
}

// upload file

$('#upload').change(function(){
    console.log(1);
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    console.log(form)

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data : form,
        url : '/admin/upload/services',
        success: function(result){
            if(result.error == false){
                $('#image_show').html('<a href="'+result.url+'"> <img src="'+result.url+'" alt="" style="width:100px;"> </a>')

                $('#image').val(result.url);
            }else{
                alert('Upload File lỗi')
            }
        }

    })
})

const product_price = document.querySelectorAll('.products .product_price');

product_price.forEach(element => {
    price = element.innerHTML;
    element.innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
});



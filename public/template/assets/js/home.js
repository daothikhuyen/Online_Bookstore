
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $('.image-slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        prevArrow:
            "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:
            "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      });
  });

$(document).ready(function(){
    $('.image-slider_two').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        rows: 2,
        prevArrow:
            "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:
            "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      });
});

// format giá tiền
function format_price($name_class){
    $name_class.forEach(element => {
        price = element.innerHTML;
        return element.innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
    });
}

const product_detail = document.querySelectorAll('.price');
format_price(product_detail)

const price_del = document.querySelectorAll('.del');
format_price(price_del)

// shop select option
function handleChange(select) {
    var selectedOption = select.options[select.selectedIndex];
    var redirectUrl = selectedOption.getAttribute('data-url');

    if (redirectUrl) {
        window.location.href = redirectUrl;
    }
}

// show carts
function showcarts(){
    console.log(1);
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url : '/carts',
        success:function(result){
            if(result.error == false){
                Swal.fire({
                    title: "Vui lòng đăng nhập",
                    text: "Bấm ok để đăng nhập",
                    icon: "error",
                    showDenyButton: true,
                    confirmButtonText: "Ok",
                    denyButtonText: `Cancel`
                }).then((results) => {
                    if (results.isConfirmed) {
                        location.href = '/admin/users/login';
                    } else if(result.isDenied) {
                        location.reload();
                    }
                  });
            }else if(result.error == true){
                location.href = '/to_carts'
            }
        }
    })
}

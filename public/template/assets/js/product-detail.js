$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const qty = document.querySelectorAll('.quantity');
const limit_qty = document.querySelectorAll('.limit_quantity');
const product_quauntity_box = document.querySelector('.product-view-quantity-box-block');
// tăng tiền tự động
const total_order_product_cart = document.querySelectorAll('.total_order_product_cart');
const price_order_item = document.querySelectorAll('.price-order-item');

// let amount = 0;
if(qty != null){
    function render(amount,id,index){
        if(amount > parseInt(limit_qty[index].value)){

            if(product_quauntity_box != null){
                console.log(product_quauntity_box);
                let overload_notification = document.createElement('div');
                overload_notification.className = 'overload_notification';

                overload_notification.innerHTML = `<span>Quá số lượng sản phẩm hiện có</span>`;

                product_quauntity_box.appendChild(overload_notification);

                setTimeout(()=>{
                    document.querySelector('.overload_notification').style.display = "block";
                    document.querySelector('.overload_notification').style.animation = "show_slide 1s ease forwards"
                },100)

                setTimeout(() => {
                    document.querySelector('.overload_notification').remove()
                },2000)
            }else{
                console.log("hello")
                setTimeout(()=>{
                    document.querySelector('.error').style.display = 'block';
                    document.querySelector('.error').style.animation = "show_slide 1s ease forwards"
                },100)

                setTimeout(() => {
                    document.querySelector('.error').style.display = 'none';
                },2000)
            }


        }else{

            qty[index].value= amount;


            $.ajax({
                type: 'POST',
                url : '/carts/update_quantity/'+id,
                data: {id: id, quantity : amount},
                success:function(data){

                    if(data.status == false){
                        alert('Tăng số lượng sản phẩm thất bịa');
                        location.reload();
                    }else{
                        // qty[index].value = 1;
                    }
                }
            })
        }
    }

    function handlePlus(id,local){
       document.querySelectorAll('.quantity').forEach((element,index) => {

            if(index == local){

                amount = document.querySelectorAll('.quantity')[index].value;
                amount++;


                if(total_order_product_cart.length !== 0 && amount < parseInt(limit_qty[index].value)){

                    price_money = parseFloat(total_order_product_cart[index].getAttribute('data-price'))+parseFloat(price_order_item[index].getAttribute('data-price-item'))

                    total_order_product_cart[index].innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price_money);
                    total_order_product_cart[index].setAttribute('data-price',price_money)
                }

                render(amount,id,index);
            }
       });
    }

    function handleMinus(id, local){
        document.querySelectorAll('.quantity').forEach((element,index) => {
            if(index == local){
                amount = document.querySelectorAll('.quantity')[index].value;

                if(amount >= 1){
                    if(total_order_product_cart !== null){
                        price_money = parseFloat(total_order_product_cart[index].getAttribute('data-price'))-parseFloat(price_order_item[index].getAttribute('data-price-item'))

                    total_order_product_cart[index].innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price_money);
                    total_order_product_cart[index].setAttribute('data-price',price_money)
                    }

                    amount--;

                if(amount < 1){
                    console.log('hello')
                    location.href ="/carts/delete/"+id;
                }else{
                    render(amount,id,index);
                }
            }
        }
    });

}

    qty.forEach((element,index) => {
        element.addEventListener('input',function(){

            amount= qty.value;
            amount = parseInt(amount)
            amount = (isNaN(amount)|| amount == 0)?1:amount;
            render(amount,element,index)
        })
    });
}

const btn_cart_to_cart = document.querySelector('.btn-cart-to-cart');

if(btn_cart_to_cart != null){

    btn_cart_to_cart.addEventListener('click',function(e){
        e.preventDefault();
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
                    $.ajax({
                        type: 'POST',
                        url: '/add-cart',
                        data : $('.form_product').serializeArray(),
                        success:function(data){
                            // alert(data);
                            data = JSON.parse(data);
                            if(data.status == true){
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Thêm vào giỏ hàng thành công",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(()=>{
                                    document.querySelector('.number_order').innerHTML = data.number
                                    qty[0].value = 1;
                                });
                            }else{
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: "Thêm vào giỏ hàng thất bại",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(()=>{
                                    document.querySelector('.number_order').innerHTML = data.number
                                    qty.value = 1;
                                    location.reload();
                                });
                            }
                        }
                    })
                }
            }
        })
    })
}

// Mua ngay
if(document.querySelector('.btn-buy-now') != null){
    
    document.querySelector('.btn-buy-now').addEventListener('click', function(e){
        e.preventDefault()

        var selectedProductData = [];

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
                }else{

                    $(".form_product").each(function() {
                        var id_product = $(this).find('input[name="product_id"]').val();
                        var quantity = $(this).find('input[name="quantity"]').val();

                        selectedProductData.push({
                            id: id_product,
                            quantity: quantity,
                            id_promote: ""
                        });
                    });

                    console.log(JSON.stringify(selectedProductData))
                    window.location.href = '/carts/checkout?products=' + JSON.stringify(selectedProductData);
                }
            }
        })

    })
}

// xem thêm
function toggleReadMore(){


    if(document.getElementById('btn-showmore').innerHTML== 'Xem Thêm'){
        document.getElementById('product-view-info').style.height = '100%';
        document.getElementById('product-view-info').style.overflow = 'auto';
        document.getElementById('btn-showmore').innerHTML= 'Rút Gọn'
    }else{
        document.getElementById('product-view-info').style.height = '400px';
        document.getElementById('product-view-info').style.overflow = 'hidden';
        document.getElementById('btn-showmore').innerHTML= 'Xem Thêm'
    }

}



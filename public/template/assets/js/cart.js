
// Thanh Toán
const promotion = document.querySelectorAll('.promote');
const btn_app = document.querySelectorAll('.btn-app');
const price_include_vat = document.getElementById('total_price_after');
const total_price = document.getElementById('total_order_product_cart');
const total_price_order = document.getElementById('total_price');
const price_discount = document.querySelectorAll('.price_discount');
var arr_id_promote = [];

function format_price(price){
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
}

function promote(){

    if(promotion !== null){
        promotion.forEach((element,index) => {
            var btn = btn_app[index];

            if(parseInt(total_price_order.getAttribute('data-price')) >= parseInt(price_discount[index].value)){

                    btn.style.color = '#259c5b';
                    btn.style.border = '2px solid #259c5b';
                    btn.style.cursor = 'pointer';

                    btn_app[index].addEventListener('click', function(e){

                        e.preventDefault();

                        var number_click = 0;
                        btn_app.forEach(element => {
                            if(element.innerHTML === "Huỷ"){
                                number_click++;
                            }
                        });

                        if(number_click == 0){

                            var btn = btn_app[index];
                                btn.style.color = '#7A7E7F';
                                btn.style.border = '2px solid #7A7E7F';
                                btn.style.cursor = 'no-drop';
                                btn.innerHTML = "Huỷ"

                            total_order = (parseFloat(price_include_vat.getAttribute('data-price-new')) - parseInt(price_discount[index].value))
                            price_include_vat.setAttribute('data-price-new',total_order);

                            price_include_vat.innerHTML = format_price(total_order);
                        }


                    })
            }else{

                btn.style.color = '#7A7E7F';
                btn.style.border = '2px solid #7A7E7F';
                btn.style.cursor = 'no-drop';
            }




        });

    }
}


const check_box = document.querySelectorAll('.check-box-product');
const total_product_order = document.querySelectorAll('.total_order_product_cart');

var number_order = 0
var totalPrice = 0
check_box.forEach((element,index) => {


    element.addEventListener('change', function(e){
        e.preventDefault();

        if(this.checked){
            number_order++;
            totalPrice += parseInt(total_product_order[index].getAttribute('data-price'));
        }else{
            number_order--;
            totalPrice -= parseInt(total_product_order[index].getAttribute('data-price'));
        }

        total_price_order.innerHTML= format_price(totalPrice)
        total_price_order.setAttribute('data-price', totalPrice);

        price_include_vat.innerHTML = format_price(totalPrice)
        price_include_vat.setAttribute('data-price-new', totalPrice);
        promote();

    })
});

// chọn tất cả sản phẩm để order

if(document.querySelector('.check-box-product-all') != null){

    document.querySelector('.check-box-product-all').addEventListener('change', function(e){
        e.preventDefault();
        const isCheckedAll = this.checked;

        check_box.forEach((element,index) => {

            if(element.checked !== isCheckedAll){
                element.checked = isCheckedAll;

                if(isCheckedAll){
                    number_order++;
                    totalPrice += parseInt(total_product_order[index].getAttribute('data-price'));
                }else{
                    number_order--;
                    totalPrice -= parseInt(total_product_order[index].getAttribute('data-price'));
                }

                total_price_order.innerHTML= format_price(totalPrice)
                total_price_order.setAttribute('data-price', totalPrice);

                price_include_vat.innerHTML = format_price(totalPrice)
                price_include_vat.setAttribute('data-price-new', totalPrice);
                promote();

            }
        })
    })
}


// quan trang thanh toán
const btn_checkout = document.getElementById('btn-checkout');
console.log(document.querySelectorAll('.qty-carts').values)
if(btn_checkout != null){

    btn_checkout.addEventListener('click',function(e){
        e.preventDefault();

        var selectProducts = document.querySelectorAll('.check-box-product:checked')

        var selectedProductData = [];

        var num = 0;

        selectProducts.forEach((element,index) => {
            id_product = element.value;
            quantity = document.getElementById('quantity-'+id_product).value
            var id_promote =0;

            var price_discount_id = document.querySelectorAll('.price_discount_id');
            btn_app.forEach((element,local) => {
                if(element.innerHTML === "Huỷ"){
                    id_promote = price_discount_id[local].value;
                }
            });

            selectedProductData.push({
                id: id_product,
                quantity: quantity,
                id_promote: id_promote
            })

            num++;

        });

        if(num > 0){
            window.location.href = '/carts/checkout?products=' + JSON.stringify(selectedProductData);
        }else{
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Bạn chưa chọn đơn hàng nào",
                showConfirmButton: false,
                timer: 1500
              });
        }

    })
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

// Bình Luận

const btn_comment = document.getElementById('btn_comment');
const btn_product_comment = document.querySelectorAll('.btn_comment_order_product');
const id_order =  document.querySelectorAll('.id_order');


if(btn_comment != null){

    var arr_id_product = [];

    btn_product_comment.forEach(function(element,index) {

        element.addEventListener('click', function(){
            var id_order_comment = id_order[index].value
            var product_comment = document.querySelectorAll('.product_order_'+id_order_comment);

            product_comment.forEach(element => {
                console.log(element.value);
                arr_id_product.push(element.value);
            });

        })
    });

    btn_comment.addEventListener('click', function(e){
        e.preventDefault();
        content = document.querySelector('.comment_content').value;
        $.ajax({
            type: 'POST',
            url : '/manger/purchase/comment',
            data: {
                id_product: arr_id_product,
                coment_product : content
            }
        })
        .done(function(data){
            // alert(data);
            Swal.fire({
                icon: "success",
                title: "Cảm Ơn Bạn Đã Góp Ý Kiến Cho Chúng Tôi",
                showConfirmButton: false,
                timer: 1500
            })

            location.reload();
        })
        .fail(function(data){
            alert(JSON.stringify(data))
            alert("Bạn đã bình luận thất bại");
        })
    })
}



@extends('main')

@section('content')

<header>
    @include('header')
</header>

<div class="wraper-shop-detail col-man">
    <div class="container mt-3 bg-white py-3">
        <div class="container-inner">
            <div class="row product-view">
                <div class="col-md-4">
                    <div class="product-view-img">
                        <div class="product-view-thumbnail">
                            <div class="lightgallery w-100">
                                <div class="include-in-gallery">
                                    <img src="{{$product->image}}" alt="">
                                </div>
                                <div class="include-in-gallery">
                                    <img src="{{$product->image}}" alt="">
                                </div>
                                <div class="include-in-gallery">
                                    <img src="{{$product->image}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="product-view-img-product">
                            <img src="{{$product->image}}" alt="{{$product->name}}" title="{{$product->name}}">
                        </div>
                    </div>

                </div>
                <div class="col-md-8 product-essentail-detail">
                    <h4 class="fw-bold">{{$product->name}}</h4>
                    <div class="product-view-sa container">
                        <div class="row">
                            <div class="col-md-6 ps-0">
                                <div class="product-view-sa-one ">
                                    <div class="product-view-sa-supplier">
                                        <span claas="">Nhà cung cấp :</span>
                                        <a href="" class="text-primary fw-bold">{{$product->publisher}}</a>
                                    </div>
                                </div>
                                <div class="product-view-sa-two d-flex justify-content-between">
                                    <div class="product-view-sa-supplier">
                                        <span claas="">Nhà xuất bản :</span>
                                        <a href="" class="fw-bold">{{$product->publisher}}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="ms-5">
                                    <div class="product-view-sa-one ">
                                        <div class="product-view-sa-author">
                                            <span>Tác giả :</span>
                                            <span class="fw-bold">{{$product->author}}</span>
                                        </div>
                                    </div>
                                    <div >
                                        <span>Tổng sản phẩm:</span>
                                        <span class="fw-bold"><input class="limit_quantity d-inline-block border-0 fw-o text-center" style='outline: none; width: 20px; font-family: "Roboto",sans-serif !important; font-size: 13px' value="{{$product->quantity}}"></span>sản phẩm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view-rate mt-4">
                        <div class="view-rate-left">
                            <div class="ratings">
                                <div class="rating-content">
                                    <div class="rating-sart">
                                        <span>
                                            <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                        </span>
                                        <span>
                                            <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-star fa-xs" style="color: #FFD43B;"></i>
                                        </span>
                                        <span style="color: #a2a0a0;">
                                            (4 sao)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 price-block py-4">
                        <div class="product-detail-price d-flex">
                            <div class="price-box d-flex">
                                <div class="special-price">
                                    <span class="price {{$product->quantity==0?"text-secondary":""}}" id="price">{{$product->price * (100 - $product->discount)/100}}</span>
                                </div>
                                <div class="old-price pt-2">
                                   <span class="price" id="price">
                                    {{$product->price}}
                                   </span>
                                    @if ($product->discount >0)
                                        <span class="discount-percent">-{{$product->discount}} %</span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12 expected-delivery">
                        <div class="expected-delivery-address d-flex">
                            <div>Thời gian giao hàng</div>
                            <div class="ms-5 fw-bold">Một đến hai tuần</div>
                        </div>
                        <div class="expected-delivery-fpoint_time d-flex">
                            <div>Chính sách đổi trả</div>
                            <div class="ms-5 ps-1 fw-bold">Đổi trả sản phẩm trong 2 tuần</div>
                        </div>
                    </div>
                    <div class="col-md-12 product-view-quantity-box my-4">
                        <label for="" class="fw-bold">Số lượng:</label>
                        <form action="/carts/checkout" id="form_product" class="form_product" method="POST" onsubmit="return false">
                            <input type="hidden" name="product_id" id="" value="{{$product->id}}">
                            <div class="product-view-quantity-box-block">
                                <div class="product-view-quantity-box-block-item">
                                    <button class="button-minus ms-2"  onclick="handleMinus({{$product->id}},0)">
                                        <img src="/template/image/ico_minus2x.png" alt="">
                                    </button>
                                    <input type="number" name="quantity" id="quantity" class="quantity text-center fw-light" value="1">
                                    <button class="button-plus" onclick="handlePlus({{$product->id}},0)">
                                        <img src="/template/image/ico_plus2x.png" alt="" class="me-2">
                                    </button>
                                </div>
                            </div>
                            <div class="product-view-add-box">
                                @if ($product->quantity == 0)
                                <button type="submit" class="btn-cart-to-cart-off border-secondary text-secondary" title="Thêm vào giỏ hàng"><i class='bx bx-cart-add fs-5 '></i> Thêm vào giỏ hàng</button>
                                <button type="submit" class="btn-buy-now-off bg-secondary " title="Mua Ngay">Mua ngay</button>
                                @else
                                <button type="submit" class="btn-cart-to-cart" title="Thêm vào giỏ hàng"><i class='bx bx-cart-add fs-5 '></i> Thêm vào giỏ hàng</button>
                                <button type="submit" class="btn-buy-now" title="Mua Ngay">Mua ngay</button>
                                @endif
                            </div>
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info container bg-white mt-3 py-3">
        <div class="product-view-info collapsed-content" id="product-view-info" style="font-family: Arial, Helvetica, sans-serif;">
            {!! $product->description !!}
        </div>
        <div class="btn_seen">
            <button class="btn-showmore" id="btn-showmore"   onclick="toggleReadMore()">Xem Thêm</button>
        </div>
    </div>
    <div class="container bg-white mt-3 py-3">
        <div class="product-view-review">
            <div class="product-view-content-title">
                Đánh giá sản phẩm
            </div>
            <div class="product_view_tab_content_review ps-5 py-3 d-flex" >
                <div class="product_view_content_rating">
                    <div class="star">
                        <span>5</span>
                        <span>/5</span>
                    </div>
                    <div class="ratings">
                        <div class="rating-content">
                            <div class="rating-sart">
                                <span>
                                    <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                </span>
                                <span>
                                    <i class="fa-regular fa-star fa-xs" style="color: #FFD43B;"></i>
                                </span>
                                <span style="color: #a2a0a0;">
                                    (4 sao)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating_star">
                    <div class="d-flex  align-items-center">
                        <span class="number_dg" style="font-family: 'Times New Roman', Times, serif;">5 sao</span>
                        <div class="review-rating"><div style="width: 100%;"></div></div>
                        <span style="font-family: 'Times New Roman', Times, serif;">100%</span>
                    </div>
                    <div class="d-flex  align-items-center">
                        <span class="number_dg" style="font-family: 'Times New Roman', Times, serif;">4 sao</span>
                        <div class="review-rating"><div style="width: 0%;"></div></div>
                        <span style="font-family: 'Times New Roman', Times, serif;">0%</span>
                    </div>
                    <div class="d-flex  align-items-center">
                        <span class="number_dg" style="font-family: 'Times New Roman', Times, serif;">3 sao</span>
                        <div class="review-rating"><div style="width: 0%;"></div></div>
                        <span style="font-family: 'Times New Roman', Times, serif;">0%</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="number_dg" style="font-family: 'Times New Roman', Times, serif;">2 sao</span>
                        <div class="review-rating"><div style="width: 0%;"></div></div>
                        <span style="font-family: 'Times New Roman', Times, serif;">0%</span>
                    </div>
                    <div class="d-flex  align-items-center">
                        <span class="number_dg" style="font-family: 'Times New Roman', Times, serif;">1 sao</span>
                        <div class="review-rating"><div style="width: 0%;"></div></div>
                        <span style="font-family: 'Times New Roman', Times, serif;">0%</span>
                    </div>
                </div>
            </div>
            <div class="comment-contnet border-top py-1">
                @foreach ($comments as $comment )

                <div class="row my-4">
                    <div class="col-md-2">
                        <div class="content-info-user">
                            <div class="content-user-name fw-bold" style="">
                                {{$comment->user->name}}
                            </div>
                            <div class="content-user-date" style="font-family: 'Times New Roman', Times, serif; color: #7A7E7F; font-size: 13px;">
                                {{\Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')}}
                            </div>

                        </div>

                    </div>
                    <div class="col-md-10">
                        <div>
                            <div>
                                <div class="fhs-center-left">
                                    <div class="ratings">
                                        <div class="rating-content">
                                            <div class="rating-sart">
                                                @for ($i= 0 ; $i < $comment->Star; $i++)
                                                    <span>
                                                        <i class="fa-solid fa-star fa-xs" style="color: #FFD43B;"></i>
                                                    </span>

                                                @endfor
                                                @if ($comment->Star < 5)
                                                    <span>
                                                        <i class="fa-regular fa-star fa-xs" style="color: #FFD43B;"></i>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_after_star">
                                   {{$comment->content}}
                            </div>

                            @if ($comment->feedback != '')
                            <div class="py-3 px-2" style="background-color: #eee; border-bottom-left-radius:8px ; border-bottom-right-radius: 8px;">
                                <label for="" class="fw-bold">Phản hồi người bán</label>
                                <span>:{{$comment->feedback}}</span>
                            </div>
                            @endif
                            <div class="center-review">
                                <div class="review-like">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

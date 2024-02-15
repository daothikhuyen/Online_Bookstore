@if ($order->status == 1)

<table class="table ">
    <thead>
        <tr>
            <th class="" colspan="4">
                <span>
                    <i class="fa-solid fa-truck-fast text-secondary" style=""></i>
                    Đã Giao
                </span>

            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp
        @foreach ($order->order_detail as $order_item)
            @php
                $total += $order_item->price * $order_item->quantity;
            @endphp
            <tr class="align-middle">
                <td class="align-middle">
                    <input type="hidden" class="product_order_{{$order->id}}" id="" value="{{$order_item->product->id}}">
                    <a href="/product/{{ $order_item->product->id }}-{{ Str::slug($order_item->product->name, '-') }}.html">
                        <img src="{{ $order_item->product->image }}" width="120px" height="120px" alt="">
                    </a>
                </td>
                <td class="align-middle fw-bold">
                    {{ $order_item->product->name }}
                </td>
                <td class="align-middle">
                    <span class="price_order text-center">{{ $order_item->quantity }}</span>
                </td>
                <td class="align-middle">
                    <span class="price">{{ $order_item->price * $order_item->quantity}}</span>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-end fw-bold">Tổng tiền :</td>
            <td class="text-end price fw-bold" style="color: #1b7a45">
                {{ $total }}</td>
        </tr>
        <tr class="border-0">
            <td colspan="3" class="text-end fw-bold border-0"></td>
            <td class="btn-detail align-middle text-center border-0 float-right">
                <a class="btn btn-primary " href="/manger/purchase/detail/{{$order->id}}">
                    Chi Tiết
                </a>
                <input type="hidden" name="" id="" class="id_order" value="{{$order->id}}">
                <button type="button" class="menu_order_page btn btn-sm btn_comment_order_product" data-bs-toggle="modal" data-bs-target="#modalId">
                    Bình luận
                </button>
            </td>
            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true" >
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Bình Luận
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                        </div>
                        <div class="modal-body">
                            <div class="comment_order">
                                <label for="" class="fw-bold">Chất lượng sản phẩm:</label>

                            </div>
                            <div class="comment_order">
                                <label for="" class="fw-bold">Nội dung:</label>
                                <textarea name="comment" id="comment_content" cols="30" rows="5" class="comment_content w-100 border-secondary border-1 rounded-3 p-2" style="outline: none;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" id="btn_comment">
                                Bình Luận
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </tr>

    </tbody>
</table>

@endif

@if ($order->status == 0)

    <table class="table ">
        <thead>
            <tr>
                <th class="" colspan="4">
                    <span>
                        <i class="fa-solid fa-truck-fast text-secondary" style=""></i>
                        Chưa xác nhận
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
                        <span class="price">{{ $order_item->price * $order_item->quantity }}</span>
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
                    <a class="btn btn-primary " href="/manger/purchase/detail/{{ $order->id }}">
                        Chi Tiết
                    </a>

                    @if ($order->status == 0)
                        <a href="#" class="btn btn-danger" onclick = "update({{$order->id}},'/admin/carts/destroy/{{$order->id}}')">
                            Huỷ Đơn
                        </a>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
@endif

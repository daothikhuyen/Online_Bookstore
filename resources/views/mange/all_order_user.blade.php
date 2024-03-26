@if ($order->status == 1)
    @include('mange.confirmed_order_user')
@elseif ($order->status == 2)
    @include('mange.cancel_order')
@elseif ($order->status == 0)
    @include('mange.unconfirmed_user')
@endif

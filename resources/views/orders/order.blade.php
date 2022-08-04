@extends('share.layout')

@section('head')
<title>Đơn hàng #{{ $user_order->id }}</title>
@endsection


@section('content')

<div class="container-md">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thông tin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>
                    <ul>
                        <li>
                            <span class="me-3">Họ và tên: </span>
                            {{ $user_order->name }}
                        </li>
                        <li>
                            <span class="me-3">Email: </span>
                            {{ $user->email }}
                        </li>
                        <li>
                            <span class="me-3">Số điện thoại: </span>
                            {{ $user_order->phone_number }}
                        </li>
                        <li>
                            <span class="me-3">Địa chỉ: </span>
                            {{ $user_order->address }}
                        </li>
                        <li>
                            <span class="me-3">Trạng thái: </span>
                            @if (user()->role != 'admin')
                                {{ $user_order->status_str->name }}
                            @else
                                <select 
                                    class="form-select w-50 order__update" 
                                    name="status"
                                    user_order_id="{{ $user_order->id }}"
                                >
                                    @foreach ($statuses as $status)
                                        @if ($status->id == $user_order->status)
                                        <option 
                                            value="{{ $status->id }}"
                                            selected 
                                        >
                                        @else 
                                        <option 
                                            value="{{ $status->id }}"
                                        >
                                        @endif
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </li>
                        <li class="my-4">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col col-12 bg-light rounded my-2">
                                    <div class="row gx-2">
                                        <div class="col col-2">
                                            <img class="w-75" src="{{ $product->image }}">
                                        </div>
                                        <div class="col col-10">
                                            <p>{{ $product->name }}</p>
                                            <p>Số lượng: {{ $product->pivot->number }}</p>
                                            <p>
                                                Tổng tiền: 
                                                <span class="price-text">
                                                    {{ number_format($product->price * $product->pivot->number) }}đ
                                                </span>
                                            </p>
                                        </div>
                                    </div>       
                                </div>
                                @endforeach
                            </div>
                        </li>
                        <li class="fs-4">
                            Tổng tiền: 
                            <span class="price-text">
                                @if (request()->user()->role != 'admin')
                                    {{ $UserOrder::getTotal($user_order->id) }}
                                @else
                                    {{ $UserOrder::getTotal($user_order->id, $user->id) }}
                                @endif
                                đ
                            </span>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@if (user()->role == 'admin')
<script type="text/javascript">
    
    var orderUpdate = document.querySelector('.order__update')

    orderUpdate.onchange = () => {

        var request = new XMLHttpRequest()
        var origin = window.location.origin

        var userOrderId = orderUpdate.getAttribute('user_order_id')

        request.open(
            'GET', 
            origin + `/admin/orders/update` + 
                    `/${orderUpdate.value}` +
                    `/${userOrderId}`,
            true
        ) 

        request.send()

    }

</script>
@endif

@endsection
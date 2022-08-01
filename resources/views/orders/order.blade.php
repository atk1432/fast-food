@extends('share.layout')

@section('head')
<title>Đơn hàng #{{ $user_order->id }}</title>
@endsection


@section('content')

<div class="container-md">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#{{ $user_order->id }}</th>
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

                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
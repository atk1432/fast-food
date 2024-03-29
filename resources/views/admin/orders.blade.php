@extends('share.layout')

@section('head')
<title>Section</title>
@endsection

@section('content')
<div class="container-md position-relative">
    <ul class="position-fixed bg-info p-4 rounded text-white order__info d-none">
        <li>
            #1 <a href="" class="text-white">Burger ngon bổ dưỡng</a>
        </li>
        <li>
            #232 <a href="" class="text-white">Xúc xích</a>
        </li>
    </ul>
    <form method="get">
        <div class="row my-4">
            <div class="col col-sm-4 col-12">                
                <input type="number" name="id" placeholder="Tìm ID" />
            </div>
            <div class="col col-sm-4 col-12">
                <input type="date" name="date" />                
            </div>
            <div class="col col-sm-4 col-12">                
                <select class="form-select w-100" name="status">
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">
                        {{ $status->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col col-2">                    
                <button type="submit" class="bg-warning rounded">Tìm kiếm</button>
            </div>
        </div>
    </form>   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th> 
                <th scope="col">Ngày tạo</th>                   
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="order bg-opacity-25">                
                <th scope="row">1</th>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->address }}</td>
                <td class="order__status">
                    <i>{{ $order->status_str->name }}</i>
                </td>
                <td>{{ $order->created_at }}</td>
                <td>                 
                    <a href="{{ route('admin.detail_order', [
                        'user_id' => $order->user_id,
                        'user_order_id' => $order->id
                    ]) }}">Chi tiết</a>               
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
    
    var orders = document.querySelectorAll('.order')
    var orderInfo = document.querySelector('.order__info')

    orders.forEach((order) => {
        order.firstElementChild.onclick = (e) => {
            e.preventDefault()
            e.stopPropagation()

            orderInfo.classList.toggle('d-none')
            order.classList.toggle('bg-info')
            orderInfo.style.top = e.clientY + 'px'
            orderInfo.style.left = e.clientX + 'px'

            window.onclick = () => {
                orderInfo.classList.toggle('d-none')
                order.classList.toggle('bg-info')
                window.onclick = () => {}
            }
        }
    })
</script>
@endsection
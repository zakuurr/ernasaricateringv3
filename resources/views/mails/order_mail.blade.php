<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>

    <p>Hai {{$order->nama_lengkap}}</p>
    <p>Pesanan kamu telah berhasil diterima</p>

    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>

        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td><img src="{{asset('storage/fotomenu/'. $item->menu->foto)}}" alt="" class="img-fluid"></td>
                    <td>{{$item->menu->nama_menu}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">

                </td>
                <td>Sub total : {{$order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3">

                </td>
                <td>Total : {{$order->total}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

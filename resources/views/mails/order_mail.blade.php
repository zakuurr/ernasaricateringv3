<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/owl.theme.default.min.css')}}">

    <script src="https://kit.fontawesome.com/7e01dd3eec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css')}}">
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

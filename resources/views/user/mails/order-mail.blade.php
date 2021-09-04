<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
<p>Hi {{$order->firstname}}{{$order->lastname}}</p>
<p>your order has been successfully placed.</p>
<br/>
<table style="width: 600px; text-align: right">
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
            <td>
                <figure><img src="{{$item->image}}"
                             alt="{{$item->name}}" style="border-radius: 50%; height: 100px;width: 100px;">
                </figure>
            </td>
            <td>{{$item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price * $item->quantity}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" style="border-top:solid 1px #ccc;"></td>
        <td style="font-size: 15px; font-weight: bold;border-top:solid 1px #ccc; ">Subtotal : ${{$order->subtotal}}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 15px; font-weight: bold;">Tax : ${{$order->tax}}</td>

    </tr>
    <tr>
        <td colspan="3" style="font-size: 15px; font-weight: bold;">Shipping : Free Shipping</td>

    </tr>
    <tr>
        <td colspan="3" style="font-size: 15px; font-weight: bold;">Total : ${{$order->total}}</td>

    </tr>
    </tbody>


</table>
</body>
</html>

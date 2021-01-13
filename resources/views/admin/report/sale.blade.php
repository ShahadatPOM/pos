<!doctype html>
<html>
<head>
    <meta charset="utf-8">

</head>

<body>


{{--New Ddesign--}}
<table style="height: 100px; border-bottom: 1px solid #000;" width="100%">
    <tbody>
    <tr style="height: 100px;"><td>&nbsp;<br></td></tr>
    <tr>
        <td style="font-weight: bold; letter-spacing: 1px; font-size: 18px">POS Sale Report</td>
    </tr>
    <tr style="height: 158px;">
        <td style="height: 158px; font-size: 14px" valign="top"><span style=" font-weight:bold">From</span> {{$fromdate}} <span style=" font-weight:bold">To</span> {{$todate}}<br><br>
            <p><strong>Restaurent POS System</strong>
                <br />Dhaka, Bangladesh<br />Phone: (02)55071755,<br />01974974973,
                <br />Email: demo@gmail.com</p>
        </td>
    </tr>
    </tbody>
</table>
<table style="height: 189px;" width="100%">
    <tbody>
    <tr>
        <td style="width: 10%;"><strong>&nbsp;Item ID</strong></td>
        <td style="width: 30.31%;"><strong>&nbsp;Food</strong></td>
        <td style="width: 15%;"><strong>&nbsp;Qty</strong></td>
        <td style="width: 15%;"><strong>&nbsp;Subtotal</strong></td>
    </tr>
    @foreach($orders as $order)
        @foreach($order->orderItem as $key=>$orderFood)
        <tr>
            <td style="width: 10%;">{{$key+1}}</td>
            <td style="width: 30.31%;">{{$orderFood->itemName}}</td>
            <td style="width: 11%;">{{$orderFood->quantity}}*{{number_format($orderFood->itemPrice)}}</td>
            <td style="width: 15%;">{{number_format($orderFood->total)}}</td>
        </tr>
        @endforeach
    @endforeach
    
    <tr>
        <td style="text-align: center" colspan="3"><strong>&nbsp;Order Total</strong></td>
        <td style="font-weight:bold">{{$orderTotal}}</td>
    </tr>
    </tbody>
</table>
</body>

</html>

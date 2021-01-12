<!doctype html>
<html>
<head>
    <meta charset="utf-8">

</head>

<body>


{{--New Ddesign--}}
<table style="height: 100px; border-bottom: 1px solid #000;" width="100%">
    <tbody>
    <tr style="height: 119px;">
        <td style="width: 33%; height: 119px;">&nbsp;</td>
        {{--  <td style="width: 33%; height: 119px;">
            @if(file_exists(public_path('settingImage/'.$settings->imageLink)))
                <img width="300px;" src="{{url('public/settingImage/'.$settings->imageLink)}}" style="width:200px; height:100px;">
            @elseif(file_exists(base_path('admin/public/settingImage/'.$settings->imageLink)))
                <img width="300px" src="{{url('admin/public/settingImage/'.$settings->imageLink)}}" style="width:200px; height:100px;">
            @endif
        </td>  --}}
        {{--  <td style="width: 33%; height: 119px;">&nbsp;Date {{$orderInfo->created_at}}</td>  --}}
    </tr>
    <tr style="height: 100px;"><td>&nbsp;<br></td></tr>
    <tr style="height: 158px;">

        <td style="height: 158px;" valign="top">From<br><br>
            <p><strong>POS System</strong><br />Dhaka, Bangladesh<br />Phone: (02)55071755,<br />01974974973,<br />Email: test@possys.com</p>
        </td>
        <td style="height: 158px;" valign="top">To
            <p></p>
        </td>
        {{--  <td style="height: 158px;" valign="top">&nbsp;<strong>Order ID </strong>:#{{$orderInfo->orderId}}<br>  --}}
        {{--  <hr><strong>Special Instruction :</strong><br>{{$orderInfo->note}} </td>  --}}
    </tr>
    </tbody>
</table>
<table style="height: 189px;" width="100%">
    <tbody>
    <tr>
        <td style="width: 10%;"><strong>&nbsp;#</strong></td>
        <td style="width: 30.31%;"><strong>&nbsp;Product</strong></td>
        <td style="width: 19.69%;"><strong>&nbsp;Option</strong></td>
        <td style="width: 11%;"><strong>&nbsp;Qty</strong></td>
        <td style="width: 15%;"><strong>&nbsp;Subtotal</strong></td>
    </tr>
    {{--  @foreach($orderInfo->orderedProduct as $key => $orderProduct)  --}}
        <tr>
            {{--  <td style="width: 10%;">{{$key+1}}</td>
            <td style="width: 30.31%;">{{$orderProduct->sku->product->productName}}</td>
            <td style="width: 19.69%;">
               
            </td>
            <td style="width: 11%;">{{$orderProduct->quiantity}}*{{number_format($orderProduct->price)}}</td>
            <td style="width: 15%;">{{number_format($orderProduct->total)}}</td>  --}}
        </tr>
    {{--  @endforeach  --}}
    </tbody>
</table>

    <div class="bel" style="position: absolute; top: 80%;">
    <table width="100%">
        <tbody>
        <tr>
            <td style="width: 50%; font-size: 24px;">&nbsp;Payment Methods:</td>
            <td style="width: 50%; font-size: 24px;">Order Total:</td>
        </tr>
        <tr>
            <td style="width: 128px; font-size: 24px;">&nbsp;<strong>Cash on delivery. </strong></td>
            <td style="width: 129px;">
                <table width="100%">
                    <tr >
                        <td width="50%">
                            <p style="font-size: 24px;"><strong>Total:</strong></p>
                        </td>
                        <td width="50%">
                            {{--  <p style="font-size: 24px;"><strong>{{number_format($orderInfo->orderedProduct->sum('total'))}}</strong></p>  --}}
                        </td>
                    </tr>
                    <tr >
                        <td width="50%">
                            {{--  <p style="font-size: 24px;"><strong>Discount:</strong></p>  --}}
                        </td>
                        <td width="50%">
                            {{--  <p style="font-size: 24px;"><strong>{{number_format($orderInfo->discount)}}</strong></p>  --}}
                        </td>
                    </tr>
                    

                    <tr >

                        <td width="50%">
                            <p style="font-size: 24px;"><strong>Order Total:</strong></p>
                        </td>
                        <td width="50%">
                            {{--  <p style="font-size: 24px;"><strong>{{number_format($orderInfo->orderTotal)}}</strong></p>  --}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <br>
        <br>
        <tr>
            <td style="font-size: 24px;">&nbsp;<strong>Note</strong>: Thank you for your purchase</td>
            <td style="font-size: 24px;">&nbsp;Signature:<hr /></td>
        </tr>
        </tbody>
    </table>
    </div>
</body>

</html>

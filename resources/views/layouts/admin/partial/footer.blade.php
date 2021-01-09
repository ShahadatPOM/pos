<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Rifat</a>.</strong> All rights
    reserved.
</footer>

<script>
    @if(session('message'))
    toastr.info('{{session('message')}}')
    @endif
    @if(session('warning'))
    toastr.warning('{{session('warning')}}')
    @endif
    @if(session('success'))
    toastr.success('{{session('success')}}')
    @endif
    @if(session('danger'))
    toastr.error('{{session('danger')}}')
    @endif

    function addToCart(id){
        // get checked or selected variations
        if($("#sizepic").find("li.active").length >= 0 && $("#colors").find("li").length>0){
            if($("#colors").find("li.active").length <=0){
                var skuId = 'please select a variation';
                alert(skuId);
            }
            if($("#sizepic").find("li").length > 0 && $("#colors").find("li.active").length>0){
                if ($('#colors li.active').attr("value") !== undefined){
                    var skuId = $('#colors li.active').attr("value");
                }
            }
        }
        if($("#sizepic").find("li.active").length >= 0 && $("#colors").find("li").length<=0){
            if ($('#sizepic li.active').attr("value") !== undefined){
                var skuId = $('#sizepic li.active').attr("value");
            }
        }
        if($("#colorpic").find("li.active").length >= 0 && $("#sizes").find("li").length>0){
            if($("#sizes").find("li.active").length <=0){
                var skuId = 'please select a variation';
                alert(skuId);
            }
            if($("#colorpic").find("li").length > 0 && $("#sizes").find("li.active").length>0){
                if ($('#sizes li.active').attr("value") !== undefined){
                    var skuId = $('#sizes li.active').attr("value");
                }
            }
        }
        if($("#colorpic").find("li.active").length >= 0 && $("#sizes").find("li").length<=0){
            if ($('#colorpic li.active').attr("value") !== undefined){
                var skuId = $('#colorpic li.active').attr("value");
            }
        }
        var quantity = $('#qty').val();
        var productId = id;
        $.ajax({
            url: "{{route('add-to-cart')}}",
            method: 'POST',
            data:{
                _token: "{{ csrf_token() }}",
                productId: productId,
                skuId: skuId,
                quantity: quantity,
            },
            success: function (data){
                toastr.success('Item Added To  Cart Successfully');
                // console.log(data.total);
                var getTotalQuantity=0;
                var getSubTotal=0;
                var cartItems=""
                $.each(data.cart,(index,row)=>
                {
                    getTotalQuantity+=parseFloat(row.quantity)
                    getSubTotal+=parseFloat(row.price)
                    cartItems+=`<li>
                                        <a href="#" onclick="removeItem(${row.id})" class="close-cart"><i class="fa fa-times-circle"></i></a>
                                        <div class="media">
                                        ${row.attributes.skuImage!= "demo.img" ? `<a href="{{url('product/details/')}}/${row.id}" class="pull-left"> <img alt="Beaox" src="{{url('admin/public/productImage/')}}/${row.attributes.skuImage}"></a>` : `<a class="pull-left"> <img alt="Beaox" src="{{url('public/frontend/images/1.jpg')}}"></a>`}
                                        <div class="media-body">
                                                <span><a href="{{url('product/details/')}}/${row.id}">${row.name}</a></span>
                                                <p class="cart-price">Price: ${row.price}</p>
                                                <div class="product-qty">
                                                        <p>Quantity: <b>${ row.quantity }</b></p>
                                                </div>
                                        </div>
                                    </li>`
                })
                $('#cart').html('')
                $('#cart').append(`
                        <a href="javascript:void(0)">
                            <span class="cart-icon-main"></span>
                            <div class="cart-text">
                                <div id="item" class="my-cart">${getTotalQuantity} Items</div>
                            </div>
                        </a>
                        <div class="cart-dropdown header-link-dropdown">
                            <ul id="test" class="cart-list link-dropdown-list">
                                ${cartItems}
                                ${getSubTotal != 0 ? `<p id="cartTotal" class="cart-sub-totle"> <span class="pull-left" style="font-size: 14px; font-weight: bold; color: #000000">Cart Subtotal</span> <span id="cartSubTotal" class="pull-right"><strong class="price-box">${data.total}</strong></span> </p>
                                <div class="clearfix"></div>
                                <div id="cartBtn" class="mt-20">
                                <a href="#" class="btn-color btn"><i class="fa fa-shopping-cart"></i>Cart</a>
                    <a href="#" class="btn-color btn right-side"><i class="fa fa-share"></i>Checkout</a>
                    </div>` :`<p style="font-weight: bold; font-size: 14px; text-align: center">Cart Is Empty</p>` }
                                </ul>`
                )
            },
            error:function (data)
            {
                toastr.warning('Stock Not available');
            }
        })
    }
    function removeItem(id){
        var skuId = id;
        $.ajax({
            url: "{{route('cart.itemRemove')}}",
            method: 'POST',
            data:{
                _token: "{{ csrf_token() }}",
                skuId: skuId,
            },
            success: function (data){
                toastr.success('Item removed From Cart Successfully');
                var getTotalQuantity=0;
                var getSubTotal=0;
                var cartItems=""
                $("#cartTable").load(location.href + " #cartTable");
                $.each(data.cart,(index,row)=>
                {
                    getTotalQuantity+=parseFloat(row.quantity)
                    getSubTotal+=parseFloat(row.price)
                    cartItems+=`<li>
                                        <a href="#" onclick="removeItem(${row.id})" class="close-cart"><i class="fa fa-times-circle"></i></a>
                                        <div class="media">
                                        ${row.attributes.skuImage!= "demo.img" ? `<a class="pull-left"> <img alt="Beaox" src="{{url('admin/public/productImage/')}}/${row.attributes.skuImage}"></a>` : `<a class="pull-left"> <img alt="Beaox" src="{{url('public/frontend/images/1.jpg')}}"></a>`}
                                        <div class="media-body">
                                                <span><a href="javascript:void(0)">${row.name}</a></span>
                                                <p class="cart-price">Price: ${row.price}</p>
                                                <div class="product-qty">
                                                   <p>Quantity: <b>${ row.quantity }</b></p>
                                                </div>
                                        </div>
                                    </li>`
                })
                $('#cart').html('')
                $('#cart').append(`
                        <a href="javascript:void(0)">
                            <span class="cart-icon-main"></span>
                            <div class="cart-text">
                                <div id="item" class="my-cart">${getTotalQuantity} Items</div>
                            </div>
                        </a>
                        <div class="cart-dropdown header-link-dropdown">
                            <ul id="test" class="cart-list link-dropdown-list">
                                ${cartItems}
                                ${getSubTotal != 0 ? `<p id="cartTotal" class="cart-sub-totle"> <span class="pull-left" style="font-size: 14px; font-weight: bold; color: #000000">Cart Subtotal</span> <span id="cartSubTotal" class="pull-right"><strong class="price-box">${data.total}</strong></span> </p>
                                <div class="clearfix"></div>
                                <div id="cartBtn" class="mt-20">
                                <a href="#" class="btn-color btn"><i class="fa fa-shopping-cart"></i>Cart</a>
                                @auth
                    <a href="#" class="btn-color btn right-side"><i class="fa fa-share"></i>Checkout</a>
                                @endauth
                    @guest
                    <a href="{{ route('login') }}" class="btn-color btn right-side"><i class="fa fa-share"></i>Checkout</a>
                                @endguest
                    </div>` :`<p style="font-weight: bold; font-size: 14px; text-align: center">Cart Is Empty</p>` }
                                </ul>`
                )
            },
        })
    }
</script>
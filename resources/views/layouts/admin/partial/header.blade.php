@push('base.css')
<style>
    nav{
        position: relative;
    }
    .shopping-cart{
        margin-left: -17rem;
        position: absolute;
        margin-top: 56px;
        background: #fff;
        /* margin-right: 76px; */
        width: 30%;
        padding: 10px 0;
    }
    .item-name{
        word-wrap: break-word;
    }
    .cartHeader{
        display: inline-block;
        width: 30%;
        margin-left: 5px;
        text-align: center;
    }
    .itemName{
        width: 45%;
        word-wrap: break-word;
    }
    .itemQuantity{
        width: 25%;
    }
    .itemPrice{
        width: 30%;
        word-wrap: break-word;
        text-align: right;
    }
</style>
@endpush
<!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="color: #fff" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a style="color: #fff" href="{{ url('dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>
           
           
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
               
                <!-- Notifications Dropdown Menu -->
               
                <li class="nav-item dropdown">
                    <a class="nav-link" id="cart" data-toggle="dropdown" href="#">
                        <i style="color: #fff" class="fa fa-shopping-basket"></i><small id="totalQ" style="color: #fff; font-weight:bold"> {{ \Cart::getTotalQuantity() }}</small>
                        <span style="background: #2C3E50; color: #fff" class="badge navbar-badge"></span>
                    </a>
                </li>

                <div id="fulll" class="shopping-cart">
                    @if(\Cart::getSubTotal() != 0)
                    <div id="cartH" class="cart-header">
                        <h6 class="cartHeader">Item</h6>
                        <h6 class="cartHeader" style="text-align: right">Qty</h6>
                        <h6 class="cartHeader">Price</h6>
                    </div>
                    @endif
                    <ul id="fullCart" class="shopping-cart-items">
                        @foreach(\Cart::getContent() as $row)
                        
                      <li style="list-style: none" class="clearfix">
                        
                      <div class="row">
                        <span style="padding-left:; padding-right: 2px"><a style="color: red" href="#" onclick="removeItem({{$row->id}})"><i class="fa fa-times-circle"></i></a></span>
                        
                        <span class="itemName" style="font-size: 14px">{{ $row->name }}</span >
                            <span style="padding: 0 7px 0 7px; font-size: 24px">*</span>
                        <span class="itemQantity" style="font-size: 14px">{{ $row->quantity }}</span>
                        <span class="itemPrice" style="font-size: 14px">{{ $row->price }}</span>
                    </div>
                      </li>

                      @endforeach
                      
                    </ul>
                    @if(\Cart::getSubTotal() != 0)
                    <hr>
                    <p id="orderT" style="display: inline-block; margin: 0 10px; font-weight: bold; font-size: 14px; text-align: left;" class="cardTotal">Order Total</p>
                    <span id="cartSubTotal" style="float: right; padding: 0 7px; font-weight: bold; font-size: 14px;">{{number_format(\Cart::getSubTotal())}}</span>
                    <hr>
                    {{-- <a href="#" class="btn btn-sm btn-info" style="float: left; margin: 5px; padding: 6px 40px"><i class="fa fa-shopping-cart"></i> Cart</a> --}}
                    <a id="Confirmbtn" href="{{ route('order.store') }}" class="btn btn-sm btn-info" style="float: right; margin: 5px; padding: 6px 40px"><i class="fa fa-check" ></i> Order Confirm</a>
                    @else
                        <p id="empty" style="font-weight: bold; font-size: 14px; text-align: center">Cart Is Empty</p>
                    @endif
                  </div> <!--end shopping-cart -->
                <!-- Notifications Dropdown Menu -->
        </nav>
        <!-- /.navbar -->
        
        @push('base.js')
        <script>
            $(".shopping-cart").hide();
            (function(){
            $("#cart").on("click", function() {
              $(".shopping-cart").fadeToggle("fast");
            });
          })();
        </script>
        @endpush
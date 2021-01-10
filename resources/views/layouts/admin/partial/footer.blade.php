<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Designed & Developed By <a href="#">Rifat</a> &copy; 2021. </strong> All rights
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
        var quantity = $('#qty').val();
        var foodId = id;
        $.ajax({
            url: "{{route('add-to-cart')}}",
            method: 'POST',
            data:{
                _token: "{{ csrf_token() }}",
                foodId: foodId,
                quantity: quantity,
            },
            success: function (data){
                toastr.success('Item Added To  Cart Successfully');
                    $("#fullCart").load(location.href + " #fullCart");
                    $("#cartSubTotal").load(location.href + " #cartSubTotal");
                    $("#Confirmbtn").load(location.href + " #Confirmbtn");
                    $("#empty").load(location.href + " #empty");
                    $("#totalQ").load(location.href + " #totalQ");
                    $("#cartH").load(location.href + " #cartH");
                    $("#orderP").load(location.href + " #orderP");
                
            },
            error:function (data)
            {
                toastr.warning('problem');
            } 
        })
    }
    

    function removeItem(id){
        alert(id);
        var foodId = id;
        $.ajax({
            url: "{{route('cart.itemRemove')}}",
            method: 'POST',
            data:{
                _token: "{{ csrf_token() }}",
                foodId: foodId,
            },
            success: function (data){
                toastr.success('Item removed From Cart Successfully');
                $("#fullCart").load(location.href + " #fullCart");
                $("#cartSubTotal").load(location.href + " #cartSubTotal");
                $("#Confirmbtn").load(location.href + " #Confirmbtn");
                $("#empty").load(location.href + " #empty");
                $("#totalQ").load(location.href + " #totalQ");
                $("#cartH").load(location.href + " #cartH");
                $("#orderP").load(location.href + " #orderP");
            },
        })
    }

</script>
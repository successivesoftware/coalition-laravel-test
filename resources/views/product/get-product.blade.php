@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="page-header text-center">Product Form</h1>
        <form class="form-horizontal" id="form_main" method="post" action="index.php">
            <div class="form-group">
                <label for="product_name" class="col-sm-3 control-label">Product Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" required id="product_name" name="product_name" placeholder="Product Name">
                </div>
            </div>
            <div class="form-group">
                <label for="quantity" class="col-sm-3 control-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" required id="quantity" name="quantity" placeholder="10" >
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" required name="price" placeholder="10">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
            </div>
            {{ csrf_field() }}
        </form> 
    </div>
</div>
<table id="mytable" class="table table-bordred table-striped hide">

    <thead>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date Submitted</th>
        <th>Total Value</th>
    </thead>
    <tbody>
        
        @foreach ($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->created_at->format('m/d/Y H:i:s')}}</td>
            <td class="total">{{$product->quantity * $product->price }}</td>
        </tr>
        @endforeach

        <tr id="last_row" class="hide">
            <td colspan=4><b>Total</b></td>
            <td id="total_value">+923335586757</td>
        </tr>

    </tbody>

</table>
@endsection



@section('scripts')
 <script>
    var totalValue = 0;
    function calculateTotal() {
        $('.total').each(function() {
            totalValue += parseFloat($(this).text());
        }); 
        
        // Hack: if there is a total then there should be a table
        if (totalValue > 0 ) {
            $('#mytable').removeClass('hide');
            $('#last_row').removeClass('hide');
            $('#last_row #total_value').text(totalValue);
        }
    }
    
    $(document).ready(function () {
        calculateTotal();
        $('#form_main').submit(function() {
            var data = $('#form_main').serialize(); 
            $.ajax({
                url: '{{ route('product-save') }}', 
                data: data,  
                dataType:'json',
                type:'POST', 
                async:false, 
                success: function(data) { 
                  var row = $('<tr>');
                  row.append($('<td>').text(data.product_name));
                  row.append($('<td>').text(data.quantity));
                  row.append($('<td>').text(data.price));
                  row.append($('<td>').text(data.date));
                  row.append($('<td>').text(data.total));
                  $('#mytable tbody').prepend(row);
                  calculateTotal();
                },
                error: function(data) { 

                }
            });
            $('.form-control').each(function(){
                $(this).val('');
            });
            return false; 
        });
    });
</script>
@endsection

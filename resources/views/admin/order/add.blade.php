@extends('admin-base.main')

@section('content')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Project</h3>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> {{ session('status') }}
                </div>
            @endif
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check-circle"></i> {{ $error }}
            </div>
            @endforeach
            <div class="row">
                <form action="{{route('order.store')}}" method="POST">
                    @csrf
                    <div class="col-md-5">
                        <!-- INPUT GROUPS -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Project Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select name="customer_id" class="form-control">
                                        <option hidden> ==Select Customer== </option>
                                        @foreach ($customer as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="input-group">
                                    <label>Sample Project</label>
                                    <input type="text" name="sample" class="form-control">
                                </div>
                                <br>
                                <div class="input-group">
                                    <label>DP</label>
                                    <input type="number" name="dp" class="form-control">
                                </div>
                                <br>
                                <div class="input-group">
                                    <label>Description</label>
                                    <textarea name="desc" cols="32" rows="4" class="form-control"></textarea>
                                </div>
                                <br>
                                <div class="input-group">
                                    <label>Deadline</label>
                                    <input type="date" name="deadline" class="form-control">
                                </div>
                                <br>
                                <div class="input-group">
                                    <input type="text" name="status" value="0" hidden/>
                                    <input type="text" name="marketing_id" value="{{Auth::id()}}" hidden/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <!-- END INPUT GROUPS -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Items</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table" id="product_table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="product0">
                                            <td>
                                                <select name="products[]" class="form-control">
                                                    <option value="">-- choose product --</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->name }} 
                                                            (Rp {{ number_format($product->price) }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="quantities[]" class="form-control" placeholder="quantity" value="1">
                                            </td>
                                        </tr>
                                        <tr id="product1"></tr>
                                        <tr id="product2"></tr>
                                        <tr id="product3"></tr>
                                        <tr id="product4"></tr>
                                        <tr id="product5"></tr>
                                        <tr id="product6"></tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                        <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- END INPUT GROUPS -->
                                <div class="col-md-4 col-md-offset-4">
                                <input class="btn btn-danger" type="submit" value="{{ trans('Save') }}">
                                </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
        let row_number = 1;
        $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e){
        e.preventDefault();
            if(row_number > 1){
                $("#product" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });
</script>
@endsection

{{-- @push('script')

@endpush --}}
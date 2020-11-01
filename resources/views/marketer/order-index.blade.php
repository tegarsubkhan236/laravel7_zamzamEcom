@extends('admin-base.main')

@section('content')
<!-- MAIN-->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Projects</h3>
            <div class="row">
                <div class="col-md-12">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-check-circle"></i> {{ session('status') }}
                    </div>
                    @endif
                    @if (session('status-danger'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-check-circle"></i> {{ session('status-danger') }}
                    </div>
                    @endif
                    @if (session('status-info'))
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-check-circle"></i> {{ session('status-info') }}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <i class="fa fa-check-circle"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="col-md-10">
                            </div>
                        </div>
                        <div class="panel-body">
                            @csrf
                            <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        {{-- <th>Created By</th> --}}
                                        <th>Customer</th>
                                        <th>DP</th>
                                        <th>Sample Project</th>
                                        <th>List of Project</th>
                                        <th>Description</th>
                                        <th>Amount Received</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id ?? '' }}</td>
                                        {{-- <td>{{ $order->marketing->name ?? '' }}</td> --}}
                                        <td>{{ $order->customers->name ?? '' }}</td>
                                        <td>Rp {{ number_format($order->dp) ?? '0' }}</td>
                                        <td>{{ $order->sample ?? '' }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($order->categories as $item)
                                                <li>
                                                    {{ $item->name }} ({{ $item->pivot->quantity }} items)
                                                    @php($subtotal = $item->pivot->quantity * $item->price)
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $order->desc ?? '' }}</td>
                                        {{-- @php($total = sum('quantity')) --}}
                                        <td>0</td>
                                        <td>{{ $order->deadline ?? '' }}</td>
                                        @if ($order->status == 0)
                                        <td><span class="label label-warning">PENDING</span></td>
                                        @endif
                                        <td style="text-align:center;">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN-->
@endsection

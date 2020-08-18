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
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Sample Project</th>
                                        <th>List of Project</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr data-entry-id="{{ $order->id }}">
                                        <td>{{ $order->id ?? '' }}</td>
                                        <td>{{ $order->customers->name ?? '' }}</td>
                                        <td>{{ $order->sample ?? '' }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($order->categories as $item)
                                                <li>{{ $item->name }} ({{ $item->pivot->quantity }} x Rp{{ number_format($item->price) }})</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $order->desc ?? '' }}</td>
                                        @if ($order->status == 0)
                                        <td><span class="label label-warning">PENDING</span></td>
                                        @endif
                                        <td style="text-align:center;">
                                            {{-- <button type="button" class="btn btn-info" id="edit-item" 
                                                data-item-id="{{$item->id}}"
                                                data-item-name="{{$item->name}}"
                                                data-item-email="{{$item->email}}"
                                                data-item-role="{{$item->role}}"
                                                data-item-password="{{$item->password}}">
                                                <span class="lnr lnr-pencil"></span>
                                            </button> --}}
                                            {{-- <a href="#" type="button" class="btn btn-info"><span class="lnr lnr-pencil"></span></a> --}}
                                            {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><span class="lnr lnr-trash"></span></button> --}}
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


<!-- Edit Modal -->
{{-- <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <p class="heading lead">Edit Person</p>
            </div>

            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="/team">
                    @method('PATCH')
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <!-- id -->
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" id="modal-input-id">
                            </div>
                            <!-- /id -->
                            <div class="form-group">
                                <label class="col-form-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="modal-input-name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="modal-input-email" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="modal-input-password" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="role">Role</label>
                                <input type="text" name="role" class="form-control" id="modal-input-role" required>
                            </div>
                    
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="editForm">Done</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Edit Modal -->

<!-- Delete Modal -->
{{-- <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Body -->
            <div class="modal-body">
                <form action="{{ url('team',$item->id) }}" class="d-inline" method="post">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    @method("delete")
                    @csrf
            </div>
            <!-- Footer -->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-danger"> Yes, delete <i class="far fa-gem ml-1"></i> </button>
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
                </form>
        </div>
        <!-- Content -->
    </div>
</div> --}}
<!-- End Delete Modal -->
@endsection
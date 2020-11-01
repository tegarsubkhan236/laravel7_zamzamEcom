@extends('admin-base.main')

@section('content')
<!-- MAIN-->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="page-title">Produk</h3>
                </div>
                @if (Auth::user()->role == "admin" || Auth::user()->role == "owner")
                <div class="col-md-2">
                    <a class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-check-circle"></i> Add Data</a>
                </div>
                @endif
            </div>
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
                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        @if (Auth::user()->role == "admin" || Auth::user()->role == "owner")
                                        <th style="text-align:center;">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->desc}}</td>
                                        @if (Auth::user()->role == "admin" || Auth::user()->role == "owner")
                                        <td style="text-align:center;">
                                            <button type="button" class="btn btn-info" id="edit-item" 
                                                data-item-id="{{$item->id}}"
                                                data-item-name="{{$item->name}}"
                                                data-item-price="{{$item->price}}"
                                                data-item-desc="{{$item->desc}}">
                                                <span class="lnr lnr-pencil"></span>
                                            </button>
                                            {{-- <a href="#" type="button" class="btn btn-info"><span class="lnr lnr-pencil"></span></a> --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><span class="lnr lnr-trash"></span></button>
                                        </td>
                                        @endif
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <p class="heading lead">Add Category</p>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            <br>
                            <input type="number" name="price" class="form-control" placeholder="Price">
                            <br>
                            <label>Description</label>
                            <textarea name="desc" cols="20" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <!-- Footer -->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-success"> Save <i class="far fa-gem ml-1"></i> </button>
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
                </form>
        </div>
        <!-- Content -->
    </div>
</div>
<!-- End Add Modal -->

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
                <form action="{{ url('customer',$item->id) }}" class="d-inline" method="post">
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

{{-- @push('script')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            sDom: '<"search-box"r><"H"lf>t<"F"ip>'
        });
    } );
</script>
@endpush --}}
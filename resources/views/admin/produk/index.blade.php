@extends('admin-base.main')

@section('content')
<!-- MAIN-->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="page-title">Portofolio</h3>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-check-circle"></i> Add Data</a>
                </div>
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
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Produk 1</th>
                                        <th>Produk 2</th>
                                        <th>Produk 3</th>
                                        <th>Description</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td><img width="150px" src="{{ asset('storage/produk1/'.$item->produk_1) }}"></td>
                                        <td>
                                            @if ($item->produk_2 != null)
                                                <img width="150px" src="{{ asset('storage/produk2/'.$item->produk_2) }}">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->produk_3 != null)
                                                <img width="150px" src="{{ asset('storage/produk3/'.$item->produk_3) }}">
                                            @endif
                                        </td>
                                        <td>{{$item->desc}}</td>
                                        <td style="text-align:center;">
                                            <a href="#" type="button" class="btn btn-info"><span class="lnr lnr-pencil"></span></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><span class="lnr lnr-trash"></span></button>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <p class="heading lead">Add Sample Produk</p>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <form method="POST" action="{{route('produk.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <input type="text" name="name" class="form-control" placeholder="Name of the Product">
                            <br>
                            <label>Category :</label>
                            <select name="category_id" class="form-control">
                                <option hidden> ==Select Category== </option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}"> {{$item->name}} </option>
                                @endforeach
                            </select>
                            <br>
                            <label>Produk 1</label>
                            <input type="file" name="produk_1" class="form-control" placeholder="Produk 1">
                            <br>
                            <label>Produk 2</label>
                            <input type="file" name="produk_2" class="form-control" placeholder="Produk 2">
                            <br>
                            <label>Produk 3</label>
                            <input type="file" name="produk_3" class="form-control" placeholder="Produk 3">
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

@endpush --}}
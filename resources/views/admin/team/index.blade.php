@extends('admin-base.main')

@section('content')
<!-- MAIN-->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Our Team</h3>
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
                            <div class="col-md-2">
                                <a class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-check-circle"></i> Add Data</a>
                            </div><br>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Role</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role}}</td>
                                        <td style="text-align:center;">
                                            <button type="button" class="btn btn-info" id="edit-item" 
                                                data-item-id="{{$item->id}}"
                                                data-item-name="{{$item->name}}"
                                                data-item-email="{{$item->email}}"
                                                data-item-role="{{$item->role}}"
                                                data-item-password="{{$item->password}}">
                                                <span class="lnr lnr-pencil"></span>
                                            </button>
                                            {{-- <a href="#" type="button" class="btn btn-info"><span class="lnr lnr-pencil"></span></a> --}}
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
                <p class="heading lead">Add Person</p>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <form method="POST" action="{{route('team.store')}}">
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <input type="text" name="name" class="form-control" placeholder="Username">
                            <br>
                            <input type="email" name="email" class="form-control" placeholder="E-Mail">
                            <br>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <br>
                            <p>Role</p>
                            <label class="fancy-radio">
                                <input name="role" value="Marketer" type="radio">
                                <span><i></i>Marketer</span>
                            </label>
                            <label class="fancy-radio">
                                <input name="role" value="Designer" type="radio">
                                <span><i></i>Designer</span>
                            </label>
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
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
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
</div>
<!-- End Edit Modal -->

<!-- Delete Modal -->
<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
</div>
<!-- End Delete Modal -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $(document).on('click', "#edit-item", function() {
                $(this).addClass('edit-item-trigger-clicked'); 
                var options = {
                'backdrop': 'static'
                };
                $('#edit-modal').modal(options)
            })

            $('#edit-modal').on('show.bs.modal', function() {
                var el = $(".edit-item-trigger-clicked");
                var row = el.closest(".data-row");

                // get the data
                var id = el.data('item-id');
                var name = el.data('item-name');
                var role = el.data('item-role');
                var email = el.data('item-email');
                var password = el.data('item-password');

                // fill the data in the input fields
                $("#modal-input-id").val(id);
                $("#modal-input-name").val(name);
                $("#modal-input-role").val(role);
                $("#modal-input-email").val(email);
                $("#modal-input-password").val(password);

                $("#edit-form").attr('action','/team/'+id);
            })

            // on modal hide
            $('#edit-modal').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            })
        })
    </script>
@endpush

{{-- @push('script')
    <script>
        $(document).ready(function (){
            var table = $('#datatable').DataTable();

            //start edit record
            $tr = $($this).closest('tr');
            if ($(tr).hasClass('child')){
                $tr = $tr.prev('/parent');
            }

            var data =table.row($tr).data();
            console.log(data);

            $('name').val(data[1]);
            $('email').val(data[2]);
            $('password').val(data[3]);
            $('role').val(data[4]);

            $('#editForm').attr('action', '/team/'+data[0]);
            $('#editModal').modal('show');
        });
    </script>
@endpush --}}
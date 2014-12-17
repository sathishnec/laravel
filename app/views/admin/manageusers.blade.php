@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">                                
                                <table class="table table-striped table-bordered table-hover" id="manageUsersList">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>User Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->department->name}}</td>
                                            <td>{{$user->status->name}}</td>
                                            <td>
                                                <div class="col-lg-6">
                                                    <div class="panel panel-default">
                                                        <!-- /.panel-heading -->
                                                        <div>
                                                            <!-- Button trigger modal -->
                                                            <button class="btn btn-primary btn-default" data-toggle="modal" data-target="#myModal">
                                                                Update
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Update User Details</h4>
                                                                        </div>
                                                                        <form name="adminupdateuser" method="POST" action="{{URL::route('adminupdateuser')}}">
                                                                            <p><div>{{$user->name}}</div></p>
                                                                            <p>
                                                                                <div class="form-group">
                                                                                    <div><label>Groups</label></div>
                                                                                    @foreach($groups as $group)
                                                                                    <div class="checkbox">
                                                                                        <label>
                                                                                            <input type="checkbox" name="groups[]" value="{{$group->id}}">{{$group->name}} ({{$group->description}})
                                                                                        </label>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </p>
                                                                            <p>
                                                                                <div class="form-group">
                                                                                    <div><label>User Status</label></div>
                                                                                    <select class="form-control" name='userstatus' id='userstatus'>
                                                                                        @foreach($statuses as $status)                                                        
                                                                                            <option value="{{$status->id}}" {{($status->id==$user->status->id) ? 'selected=selected' : '' }} >{{$status->name}}</option>
                                                                                        @endforeach
                                                                                    </select>                                            
                                                                                </div>
                                                                            </p>
                                                                            <p>
                                                                                <div class="form-group">
                                                                                    <label>Department</label>
                                                                                    <select class="form-control" name="dept" id="dept">
                                                                                    @foreach($departments as $dpt)
                                                                                        <option value="{{$dpt->id}}" {{($user->department->id==$dpt->id) ? 'selected=selected' : '' }} >{{$dpt->name}}</option>
                                                                                    @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </p>
                                                                            <input name="userid" type="hidden" value="{{$user->id}}">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Update Changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->
                                                        </div>
                                                        <!-- .panel-body -->
                                                    </div>
                                                    <!-- /.panel -->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div> 
            </div>          
        </div>
        <!-- /#page-wrapper -->
@stop

@section('footer')

    <!-- Page-Level Plugin Scripts - Tables -->
    {{ HTML::script('assets/js/plugins/dataTables/jquery.dataTables.js') }}
    {{ HTML::script('assets/js/plugins/dataTables/dataTables.bootstrap.js') }}

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#manageUsersList').dataTable();
    });
    </script>

@stop


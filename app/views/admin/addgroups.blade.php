@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Groups</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Group
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="addaclgroup" method="POST" action="{{URL::route('adminaddaclgroup')}}">                                        
                                        @if(Session::has('success'))
                                            <div class="form-group has-success">
                                                <label class="control-label" for="department">Department Added</label>
                                            </div>
                                        @endif

                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="department">Error with Department Name</label>
                                            </div>
                                        @endif 
                                            <div class="form-group">
                                                <input class="form-control" name="group" id="group" placeholder="Enter Group Name">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="groupdesc" id="groupdesc" placeholder="Enter Group Description">
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Permissions</label>
                                                @foreach($permissions as $permission)
                                                <label class="checkbox">
                                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->description}}
                                                </label>
                                                @endforeach
                                            </div>                                            
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>           
        </div>
        <!-- /#page-wrapper -->
@stop

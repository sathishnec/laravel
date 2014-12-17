@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Departments</h1>
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
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departments as $department)
                                        <tr>
                                            <td>{{$department->name}}</td>
                                            <td>{{$department->status}}</td>
                                            <td>
                                                <a href="{{URL::route('deleteDepartment',array('id'=>$department->id))}}">
                                                    <button type="submit" class="btn btn-default">Delete</button>
                                                </a>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Department
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="adminadddept" method="POST" action="{{URL::route('adminadddept')}}">                                        
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
                                                <input class="form-control" name="department" id="department" placeholder="Enter Department Name">
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

@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Leave Status</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

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
                                            <th>Leave Status</th>
                                            <th>Added By</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($leaveStatuses as $leaveStatus)
                                        <tr>
                                            <td>{{$leaveStatus->leave_status}}</td>
                                            <td>{{$leaveStatus->added_by}}</td>
                                            <td>
                                                <a href="{{URL::route('deleteLeaveStatus',array('id'=>$leaveStatus->id))}}">
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="holadminaddstatus" method="POST" action="{{URL::route('holadminaddstatus')}}">                                        
                                        @if(Session::has('success'))
                                        	<div class="form-group has-success">
												<label class="control-label" for="leaveStatus">Leave Status Added</label>
										@endif

                                        @if(Session::has('error'))
                                        	<div class="form-group has-error">
												<label class="control-label" for="leaveStatus">Error with Leave Status</label>
										@endif 

                                        		<input class="form-control" name="status" id="status" placeholder="Enter Leave Status">
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@stop

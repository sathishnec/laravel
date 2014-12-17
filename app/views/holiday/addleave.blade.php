@extends('template_masterpage')
<meta name="_token" content="{{ csrf_token() }}"/>
@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Leave Types</h1>
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
                                            <th>Leave Type</th>
                                            <th>Added By</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($leaveTypes as $leaveType)
                                        <tr>
                                            <td>{{$leaveType->leave_type}}</td>
                                            <td>{{$leaveType->added_by}}</td>
                                            <td>
                                                <a href="{{URL::route('deleteLeaveType',array('id'=>$leaveType->id))}}">
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
                            Add Leave Type
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="holadminaddtype" id="holadminaddtype" method="POST" action="{{URL::route('holadminaddtype')}}">                                        
                                        @if(Session::has('success'))
                                            <div class="form-group has-success">
                                                <label class="control-label" for="leaveType">Leave Type Added</label>
                                        @endif

                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="leaveType">Error with Leave Type</label>
                                        @endif 

                                                <input class="form-control" name="leaveType" id="leaveType" placeholder="Enter Leave Type">
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
@section('datepicker')
{{ HTML::script('assets/js/ajax.js') }}
@stop

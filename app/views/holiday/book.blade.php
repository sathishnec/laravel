@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Book a Holiday</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="bookholiday" method="POST" action="{{URL::route('holbook')}}">                                        
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="email">Error With Start Date</label>
                                            </div>
                                        @endif 
                                        	<div class="form-group">
                                                <input class="form-control datepicker" name="startDate" id="startDateBook" placeholder="Start Date">
                                            </div>
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="endDate">Error With End Date</label>
                                            </div>
                                        @endif 
                                            <div class="form-group">
                                                <input class="form-control datepicker" name="endDate" id="endDateBook" placeholder="End Date">
                                            </div>
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="noofDays">Error with Number of Days</label>
                                        	</div>
                                        @endif 

                                        	<div class="form-group">
                                                <input class="form-control" name="noofDays" id="noofDays" placeholder="Number of Days">
                                            </div>
                                            <div class="form-group">
                                                <label>AM / PM</label>
                                                <select class="form-control" name="am_pm" id="am_pm">
                                                    <option value=""></option>
                                                    <option value="AM">AM</option>
                                                    <option value="PM">PM</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Leave Type</label>
                                                <select class="form-control" name="leaveType" id="leaveType">
                                                @foreach($leaveTypes as $leaveType)
                                                    <option value="{{$leaveType->id}}">{{$leaveType->leave_type}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Reason</label>
                                                <textarea class="form-control" name="reason" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="tandc" value="1">Accept T &amp; C
                                                    </label>
                                                </div>
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

@stop

@section('datepicker')
{{ HTML::style('assets/css/jquery-ui.min.css') }}
{{ HTML::style('assets/css/jquery-ui.structure.min.css') }}
{{ HTML::style('assets/css/jquery-ui.theme.min.css') }}
{{ HTML::script('assets/js/jquery-ui.min.js') }}
{{ HTML::script('assets/js/datepicker.js') }}
@stop


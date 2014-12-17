@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Annual Holidays</h1>
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
                                    <form name="holadminaddannholi" method="POST" action="{{URL::route('holadminaddannholi')}}">  
                                            <div class="form-group">
                                                <label>User</label>
                                                <select class="form-control" name="userid" id="userid">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>                                      
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="startDate">Error With Start Date</label>
                                            </div>
                                        @endif 
                                        	<div class="form-group">
                                                <input class="form-control" name="startDate" id="startDate" placeholder="Start Date">
                                            </div>
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="endDate">Error With End Date</label>
                                            </div>
                                        @endif 
                                            <div class="form-group">
                                                <input class="form-control" name="endDate" id="endDate" placeholder="End Date">
                                            </div>
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="noofDays">Error with Total Number of Days</label>
                                        	</div>
                                        @endif 

                                        	<div class="form-group">
                                                <input class="form-control" name="noofDays" id="noofDays" placeholder="Total Number of Days">
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

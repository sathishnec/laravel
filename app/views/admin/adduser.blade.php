@extends('template_masterpage')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
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
                                    <form name="adminadduser" method="POST" action="{{URL::route('adminadduser')}}">                                      
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="email">Error with Email Address</label>
                                            </div>
                                        @endif 
                                        	<div class="form-group">
                                                <input class="form-control" name="email" id="email" placeholder="Email ID">
                                            </div>
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="leaveType">Error with Password</label>
                                        	</div>
                                        @endif 

                                        	<div class="form-group">
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                            </div>
                                        @if(Session::has('error'))
                                            <div class="form-group has-error">
                                                <label class="control-label" for="leaveType">Error with Full Name</label>
                                            </div>
                                        @endif 

                                            <div class="form-group">
                                                <input class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                            </div>
                                            <div class="form-group">
                                            	<label>Department</label>
                                            	<select class="form-control" name="dept" id="dept">
                                            	@foreach($departments as $dpt)
	                                                <option value="{{$dpt->id}}">{{$dpt->name}}</option>
	                                            @endforeach
                                            	</select>
                                        	</div>
                                            <div class="form-group">
                                                <label>Groups</label>
                                                @foreach($groups as $group)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="groups[]" value="{{$group->id}}">{{$group->name}} ({{$group->description}})
                                                    </label>
                                                </div>
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

@stop

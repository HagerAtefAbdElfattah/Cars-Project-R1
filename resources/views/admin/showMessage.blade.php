@extends('admin.layouts.adminlayout')
@section('title', 'Rent Car Admin | name')
@section('content')
	<!-- page content -->
		 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Messages</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <h2>Full Name: {{$message->firstName}} {{$message->lastName}}</h2>
                  <br>
                  <h2>Email: {{$message->email}}</h2>
                   <br>
                  <h2>Message Content:</h2>
                  <p>{{$message->content}}</p>
                </div>
                <a href="{{route('messagesList')}}"><button type="submit" class="btn btn-success">Go Back</button></a>
              </div>
            </div>
          </div>
        </div>
	<!-- /page content -->

@endsection
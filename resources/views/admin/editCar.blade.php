@extends('admin.layouts.adminlayout')
@section('title', 'Rent Car Admin | Edit Car')
@section('content')

<!-- page content -->

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Cars</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Car</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#">Settings 1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form action="{{route( 'updateCar',$car->id )}}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                @method('put')
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="title" class="form-control" required="required" name="title" value="{{$car->title}}">
                                        @error('title')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="content" name="content" required="required" class="form-control">{{$car->content}}</textarea>
                                        @error('content')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="luggage" class="form-control" required="required" type="number" name="luggage" value="{{$car->luggage}}">
                                        @error('luggage')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="doors" class="form-control" required="required" type="number" name="doors" value="{{$car->doors}}">
                                        @error('doors')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="passengers" class="form-control" required="required" type="number" name="passengers" value="{{$car->passengers}}">
                                        @error('passengers')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="price" class="form-control"  required="required" type="number" name="price" value="{{$car->price}}">
                                        @error('price')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="flat" name="active" @checked($car->active)>
                                        </label>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="image" name="image" required="required" class="form-control" value="{{$car->image}}">
                                        @error('image')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                        <img src="{{asset ('assets/images/'.$car->image)}}" alt="{{$car->title}}" style="width: 300px;">
                                    </div>
                                </div>
                               
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="category_id" id="">
                                            <option value="{{$car->category_id }} ">{{$car->category->categoryName }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="help-block text-danger">
                                            <strong>Warning!</strong> {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<!-- /page content -->

@endsection
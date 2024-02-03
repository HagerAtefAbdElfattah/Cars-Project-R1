<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{route('index')}}" class="site_title"><i class="fa fa-car"></i></i> <span>Rent Car Admin</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('assets/admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{Auth::user()->name}}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                      <h3>General</h3>
                      <ul class="nav side-menu">
                          <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('adminIndex')}}">Users List</a></li>
                                  <li><a href="{{route('addUser')}}">Add User</a></li>
                              </ul>
                          </li>
                          <li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('addCategory')}}">Add Category</a></li>
                                  <li><a href="{{route('categoriesList')}}">Categories List</a></li>
                              </ul>
                          </li>
                          <li><a><i class="fa fa-desktop"></i> Cars <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('addCar')}}">Add Car</a></li>
                                  <li><a href="{{route('carsList')}}">Cars List</a></li>
                              </ul>
                          </li>
                          <li><a><i class="fa fa-desktop"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('addTestimonial')}}">Add Testimonials</a></li>
                                  <li><a href="{{route('testimonialsList')}}">Testimonials  List</a></li>
                              </ul>
								          </li>
                          <li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="{{route('messagesList')}}">Messages</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>

              </div>
              <!-- /sidebar menu -->

      <!-- menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>
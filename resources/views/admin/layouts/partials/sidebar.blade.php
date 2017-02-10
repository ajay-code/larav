<div class="col-md-2">
  <div class="sidebar content-box" style="display: block;">
      <ul class="nav">
          <!-- Main menu -->
          <li><a href="{{url('admin')}}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
          <li><a href="{{url('admin/category')}}"><i class="glyphicon glyphicon-calendar"></i>category</a></li>
          <li><a href="{{url('admin/subcategory')}}"><i class="glyphicon glyphicon-stats"></i>Subcategory </a></li>
          <li><a href="{{url('admin/create')}}"><i class="glyphicon glyphicon-plus"></i>Add admin</a></li>
          <li><a href="{{url('admin/contact')}}"><i class="glyphicon glyphicon-list"></i>Contact</a></li>
          <li><a href="{{ url('admin/user') }}"><i class="glyphicon glyphicon-record"></i>View users</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-pencil"></i>Graphs</a></li>
          <li class="submenu">
               <a href="#">
                  <i class="glyphicon glyphicon-list"></i> Pages
                  <span class="caret pull-right"></span>
               </a>
               <!-- Sub menu -->
               <ul>
                  <li><a href="login.html">Login</a></li>
                  <li><a href="signup.html">Signup</a></li>
              </ul>
          </li>
      </ul>
   </div>
</div>

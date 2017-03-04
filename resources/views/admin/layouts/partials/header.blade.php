<div class="header">
     <div class="container">
        <div class="row">
           <div class="col-md-2">
              <!-- Logo -->
              <div class="logo">
                 <h1><a href="{{ url('admin/home') }}">Admin Area</a></h1>
              </div>
           </div>
           <div class="col-md-8">
              <div class="row">
                <div class="col-lg-6">
                    <form action="{{ url('/admin/search') }}">
                          <div class="input-group form">
                               <input type="text" class="form-control" name="query" placeholder="Search Products...">
                               <span class="input-group-btn">
                                 <button class="btn btn-primary" type="submit">Search</button>
                               </span>
                          </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form action="{{ url('/admin/users/search') }}">
                          <div class="input-group form">
                               <input type="text" class="form-control" name="query" placeholder="Search Users...">
                               <span class="input-group-btn">
                                 <button class="btn btn-primary" type="submit">Search</button>
                               </span>
                          </div>
                    </form>
                </div>
              </div>
           </div>
           <div class="col-md-2">
              <div class="navbar navbar-inverse" role="banner">
                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu animated fadeInUp">
                          <li><a href="#">Profile</a></li>
                          <li>
                              <a href="{{ url('/admin/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
              </div>
           </div>
        </div>
     </div>
</div>

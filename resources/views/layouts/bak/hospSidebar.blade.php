<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
              <div class="hospital-img text-center">
                <img src="{{asset('assets/images/imac.png')}}" alt="" class="img-fluid">
                <b>Hospital Name</b>
              </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                          <li> <a class="waves-effect waves-dark {{ Request::is('hosp/home') ? 'active' : '' }}" href="{{ url('hosp/home') }}" aria-expanded="false"><i class="ti-home"></i><span class="hide-menu">Home</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('hosp/settings') ? 'active' : '' }}" href="{{ url('hosp/settings') }}" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Account Settings</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('hosp/services') ? 'active' : '' }}" href="{{ url('hosp/services') }}" aria-expanded="false"><i class="ti-thought"></i><span class="hide-menu">Services</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('hosp/seminars') ? 'active' : '' }}" href="{{ url('hosp/seminars') }}" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">Trainings and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seminars</span></a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- <b>MAINTENANCE</b></li>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/homepage') ? 'active' : '' }}" href="{{ url('admin/homepage') }}" aria-expanded="false"><i class="ti-world"></i><span class="hide-menu">Homepage</span></a>
                          <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-heart"></i><span class="hide-menu">Services</span></a>
                          <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-thought"></i><span class="hide-menu">Inquiries</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/trainings') ? 'active' : '' }}" href="{{ url('admin/trainings') }}" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">Trainings and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seminars</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/homepage') ? 'active' : '' }}" href="{{ url('admin/hospitaldirector') }}" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Hospital Directors</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('news') ? 'active' : '' }}" href="{{ url('news') }}" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">News</span></a>
                          <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-help"></i><span class="hide-menu">Faqs</span></a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right">
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="index.html"><img src="{{ asset('/assets/images/logo/logo.png') }}" alt=""></a></div>
        </div>
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch">
                    <input id="sidebar-toggle" type="checkbox" data-toggle=".container" checked="checked"><span class="switch-state"></span>
                </label>
            </div>
        </div>
        <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
                    <li class="onhover-dropdown"><i data-feather="bell"></i>
            <ul class="chat-dropdown onhover-show-div p-t-20 p-b-20">


                @if (!@empty(App\Models\User::Notifications()))
                {{-- @foreach ($notifications as $notifications) --}}

                {{ App\Models\User::Notifications() }}
                 <li>
                    <div class="media">
                       
                        <div class="media-body">
                          <p class="f-12 mb-0 light-font"></p>
                          <p class="f-12 mb-0 font-primary">1 hr ago</p>
                        </div>
                      </div>
                    </li>
                    {{-- @endforeach --}}
                    <li class="light-font text-center">Mark all as read      </li>
                @else
                <div class="media">
                       
                    <div class="media-body">
                            <p>No Notification Found</p>
                    </div>
                </div>
                @endif


            </ul>
          </li>
                <a href="/logout"><i class="fa fa-lock"></i> Logout</a>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
<!-- Page Header Ends -->

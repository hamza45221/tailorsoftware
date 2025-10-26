<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6 d-flex justify-content-center align-items-center" style="height: 100px !important;" id="kt_app_sidebar_logo">
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('admin_assets/media/logos/custom-1.png') }}" class="h-65px my-4  app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('admin_assets/media/logos/custom-1.png') }}" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <!--end::Logo-->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3"
                 data-kt-scroll="true"
                 data-kt-scroll-activate="true"
                 data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu"
                 data-kt-scroll-offset="5px"
                 data-kt-scroll-save-state="true">

                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
                     id="kt_app_sidebar_menu"
                     data-kt-menu="true">




                    <!-- Domain Section -->
                    <div data-kt-menu-trigger="click"
                         class="menu-item {{ request()->routeIs('admin.user*') ? 'here show' : '' }}">



{{--                        <div class="menu-item pt-5">--}}
{{--                            <div class="menu-content">--}}

                        <a class="menu-link {{ request()->routeIs('admin.customer*') ? 'active' : '' }}"
                           href="{{ route('admin.customer') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                            <span class="menu-title">Customers</span>
                        </a>

                        <a class="menu-link {{ request()->routeIs('admin.order*') ? 'active' : '' }}"
                           href="{{ route('admin.order') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                            <span class="menu-title">Order List</span>
                        </a>


                        <a class="menu-link {{ request()->routeIs('admin.user*') ? 'active' : '' }}"
                                   href="{{ route('admin.user') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">User Setting</span>
                                </a>








                    </div>

                </div>

            </div>
        </div>
    </div>


    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->

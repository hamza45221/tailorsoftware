@extends('layouts.mainadmin')
@section('title')
    <div id="kt_app_header_page_title_wrapper">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_page_title_wrapper'}" class="page-title d-flex flex-column justify-content-center me-3 mb-6 mb-lg-0">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center me-3 my-0">Dashboard</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Admin</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Dashboard</li>
                <!--end::Item-->
                <!--begin::Item-->

                <!--end::Item-->
                <!--begin::Item-->
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-xl-10 ">


                        <!--begin::Col-->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 ">
                                    <!--begin::Card widget 16-->
                                    <a href="#">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10 dashboard-card" style="background-color: #080655">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex flex-column">
                                                    <!--begin::Amount-->
                                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"></span>
                                                    <!--end::Amount-->
                                                    <!--begin::Subtitle-->
                                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total User</span>
                                                    <!--end::Subtitle-->
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>



                                    <!--end::Card widget 16-->
                                    <!--begin::Card widget 7-->
                                    <!--end::Card widget 7-->
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 ">
                                    <!--begin::Card widget 16-->
                                    <a href="#">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10 dashboard-card" style="background-color: #a30505">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex flex-column">
                                                    <!--begin::Amount-->
                                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"></span>
                                                    <!--end::Amount-->
                                                    <!--begin::Subtitle-->
                                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Active Subscribed User</span>
                                                    <!--end::Subtitle-->
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>



                                    <!--end::Card widget 16-->
                                    <!--begin::Card widget 7-->
                                    <!--end::Card widget 7-->
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 ">
                                    <!--begin::Card widget 16-->
                                    <a href="#">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10 dashboard-card" style="background-color: #054500">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex flex-column">
                                                    <!--begin::Amount-->
                                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"></span>
                                                    <!--end::Amount-->
                                                    <!--begin::Subtitle-->
                                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total Orders</span>
                                                    <!--end::Subtitle-->
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>



                                    <!--end::Card widget 16-->
                                    <!--begin::Card widget 7-->
                                    <!--end::Card widget 7-->
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 ">
                                    <!--begin::Card widget 16-->
                                    <a href="#">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10 dashboard-card" style="background-color: #054500">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex flex-column">
                                                    <!--begin::Amount-->
                                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"></span>
                                                    <!--end::Amount-->
                                                    <!--begin::Subtitle-->
                                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Paid Orders</span>
                                                    <!--end::Subtitle-->
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>



                                    <!--end::Card widget 16-->
                                    <!--begin::Card widget 7-->
                                    <!--end::Card widget 7-->
                                </div>

                            </div>
                        </div>

                        <!--end::Col-->
                        <!--begin::Col-->

                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->

                    <!--end::Row-->
                    <!--begin::Row-->

                    <!--end::Row-->
                    <!--begin::Row-->

                    <!--end::Row-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        @include('partials.admin.footer')
        <!--end::Content wrapper-->
        <!--begin::Footer-->

        <!--end::Footer-->
    </div>

@endsection
@section('scripts')
    <script>

    </script>
@endsection

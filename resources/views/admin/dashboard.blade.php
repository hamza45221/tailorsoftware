@extends('layouts.mainadmin')

@section('content')


    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">

                    <div class="row g-5 g-xl-10 mb-xl-10">
                        <div class="col-md-8">
                            <div class="card shadow-sm border-0 rounded-4 overflow-hidden mt-5">
                                <div class="card-header d-flex justify-content-between align-items-center bg-light border-bottom">
                                    <h3 class="card-title fw-bold text-dark mb-0">📊 Orders Overview</h3>
                                    <select id="chartType" class="form-select w-auto rounded-pill border-primary">
                                        <option value="daily" selected>Daily</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                                <div class="card-body pt-5 pb-4">
                                    <canvas id="ordersChart" height="230"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row g-5 mt-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                                    <a href="#"  class="h-100 mb-3">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 dashboard-card" style="background-color: #080655">
                                            <!--begin::Header-->
                                            <div class="card-header d-flex justify-content-between align-items-center pt-4">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex justify-content-between align-items-center w-100">
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Amount-->
                                                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $total_customers }} </span>
                                                        <!--end::Amount-->
                                                        <!--begin::Subtitle-->
                                                        <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total Customers</span>
                                                        <!--end::Subtitle-->
                                                    </div>


                                                    <div class="d-flex flex-column justify-content-center">
                                                        <i class="fa-solid fa-users fs-2hx text-white"></i>
                                                    </div>

                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12  ">
                                    <a href="#" class="h-100 mb-3">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0   dashboard-card" style="background-color: #cc3434">
                                            <!--begin::Header-->
                                            <!--begin::Header-->
                                            <div class="card-header d-flex justify-content-between align-items-center pt-4">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex justify-content-between align-items-center w-100">
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Amount-->
                                                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $total_pending_orders }} </span>
                                                        <!--end::Amount-->
                                                        <!--begin::Subtitle-->
                                                        <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Pending Orders</span>
                                                        <!--end::Subtitle-->
                                                    </div>


                                                    <div class="d-flex flex-column justify-content-center">
                                                        {{--                                                        <i class="fa-solid fa-users "></i>--}}
                                                        <i class="fa-solid fa-list-ul fs-2hx text-white"></i>
                                                        {{--                                                        <i class="fa-solid fa-table-list "></i>--}}
                                                    </div>

                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                                    <a href="#" class="h-100 mb-3">
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0   dashboard-card" style="background-color: #009EF7">
                                            <!--begin::Header-->
                                            <!--begin::Header-->
                                            <div class="card-header d-flex justify-content-between align-items-center pt-4">
                                                <!--begin::Title-->
                                                <div class="card-title d-flex justify-content-between align-items-center w-100">
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Amount-->
                                                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $total_employee }} </span>
                                                        <!--end::Amount-->
                                                        <!--begin::Subtitle-->
                                                        <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total Employee</span>
                                                        <!--end::Subtitle-->
                                                    </div>


                                                    <div class="d-flex flex-column justify-content-center">
                                                        <i class="fa-solid fa-users fs-2hx text-white"></i>
                                                    </div>

                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->
                                            <!--end::Header-->

                                            <!--end::Card body-->
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>


                    {{--        Table of pending Pending           --}}

                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                                <!--begin::Toolbar container-->
                                <div id="kt_app_toolbar_container" class="  d-flex flex-stack">
                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                        <!--begin::Title-->
                                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Pending Orders</h1>
                                        <!--end::Title-->

                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->

                                    <!--end::Actions-->
                                </div>
                                <!--end::Toolbar container-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="">
                                    <!--begin::Card-->
                                    <!--begin::Card-->
                                    <div class="card">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0 pt-6">
                                            <!--begin::Card title-->
{{--                                            <div class="card-title">--}}
{{--                                                <!--begin::Search-->--}}
{{--                                                <div class="d-flex align-items-center position-relative my-1">--}}
{{--                                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>--}}
{{--                                                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-500px ps-12" placeholder="Search..." />--}}
{{--                                                </div>--}}
{{--                                                <!--end::Search-->--}}
{{--                                            </div>--}}
                                            <!--begin::Card title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <!--begin::Toolbar-->
                                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                                    <!--begin::Filter-->

                                                    <!--begin::Export-->

                                                    <!--end::Export-->
                                                    <!--begin::Add customer-->
                                                    <a class="btn btn-primary" href="{{ route('admin.order.create') }}"
                                                        {{--                                            data-bs-toggle="modal" --}}
                                                        {{--                                            data-bs-target="#kt_modal_add_customer"--}}
                                                    >Add New</a>
                                                    <!--end::Add customer-->
                                                </div>
                                                <!--end::Toolbar-->
                                                <!--begin::Group actions-->
{{--                                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">--}}
{{--                                                    <div class="fw-bold me-5">--}}
{{--                                                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>--}}
{{--                                                    <button type="button" data-url="{{route('admin.order.delete.multiple')}}" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>--}}
{{--                                                </div>--}}
                                                <!--end::Group actions-->
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Table-->
                                            <table  class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                                <thead>
                                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">
{{--                                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
{{--                                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />--}}
{{--                                                        </div>--}}
                                                    </th>

                                                    <th class="min-w-125px">Name</th>
                                                    <th class="min-w-110px">Customer ID</th>
                                                    <th class="min-w-125px">Phone Number</th>
                                                    <th class="min-w-125px">Date</th>
                                                    <th class="min-w-125px">Address</th>
                                                    <th class="min-w-120px">Status</th>
                                                    <th class="min-w-120px">Quantity</th>
                                                    <th class="text-end min-w-70px">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>

                                    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content w-100">


                                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.order.store') }}" id="kt_modal_add_customer_form">
                                                    @csrf

                                                    <!-- Header -->
                                                    <div class="modal-header" id="kt_modal_add_customer_header">
                                                        <h2 class="fw-bold">Edit Order</h2>
                                                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                                            <i class="ki-outline ki-cross fs-1"></i>
                                                        </div>
                                                    </div>

                                                    <!-- Body -->
                                                    <div class="modal-body py-10 px-lg-17">
                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                                             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                                             data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                                             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                                                            <div class="row">

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="customer_id" class="form-label">Customer ID</label>
                                                                    <input type="number" name="customer_id" id="customer_id" class="form-control" placeholder="Enter Customer ID" required>
                                                                </div>


                                                                <!-- First Name -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
                                                                </div>

                                                                <!-- Phone Number -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="phone_number" class="form-label">Phone Number </label>
                                                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Enter phone number">
                                                                </div>

                                                                <!-- Phone Number -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="phone_number2" class="form-label">Phone Number (2)</label>
                                                                    <input type="tel" name="phone_number2" id="phone_number2" class="form-control" placeholder="Enter phone number">
                                                                </div>


                                                                <!-- Service -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="service" class="form-label">Service</label>
                                                                    <select name="service" id="service" class="form-select" required>
                                                                        <option value="">Select Service</option>
                                                                        <option value="Shalwar kameez">1) Shalwar kameez</option>
                                                                        <option value="Waistcoat">2) Waistcoat</option>
                                                                        <option value="Shalwar Kameez + Waistcoat">3) Shalwar Kameez + Waistcoat</option>
                                                                        <option value="Shalwar kameez + Coat ">4) Shalwar kameez + Coat</option>
                                                                        <option value="Coat">5) Coat</option>
                                                                        <option value="Kurta">5) kurta</option>
                                                                        <option value="Multiple">6) Multiple</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Quantity (single) -->
                                                                <div class="col-md-6 mb-3" id="singleQuantityWrap">
                                                                    <label for="quantity" class="form-label">Quantity</label>
                                                                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity" min="1" required>
                                                                </div>

                                                                <!-- Hidden Multiple Fields -->
                                                                <div class="col-12 multiple-fields p-3" id="multipleFields" style="display:none; border:1px solid #e6e6e6; margin-top:8px;">
                                                                    <div class="row">
                                                                        <div class="col-md-3 mb-3">
                                                                            <label class="form-label">Shalwar Kameez Qty</label>
                                                                            <input type="number" name="shalwar_kameez_qty" id="shalwar_kameez_qty" class="form-control part-qty" placeholder="Qty" min="0">
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                            <label class="form-label">Waistcoat Qty</label>
                                                                            <input type="number" name="waistcoat_qty" id="waistcoat_qty" class="form-control part-qty" placeholder="Qty" min="0">
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                            <label class="form-label">Kurta Qty</label>
                                                                            <input type="number" name="kurta_qty" id="kurta_qty" class="form-control part-qty" placeholder="Qty" min="0">
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                            <label class="form-label">Coat Qty</label>
                                                                            <input type="number" name="coat_qty" id="coat_qty" class="form-control part-qty" placeholder="Qty" min="0">
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <!-- Status -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select name="status" id="status" class="form-select" required>
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Complete">Complete</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Phone Number -->
                                                                <div class="col-md-6 mb-4">
                                                                    <label for="reference_person" class="form-label mb-3">Reference Person</label> <br>

                                                                    <label class="form-label me-3">
                                                                        <input type="radio" name="reference_person" value="Yes" class="">
                                                                        Yes</label>

                                                                    <label>
                                                                        <input type="radio" name="reference_person" value="No" class="">
                                                                        No</label>
                                                                </div>


                                                                <!-- Address -->
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="address" class="form-label">Address</label>
                                                                    <textarea  name="address" id="address" rows="2" class="form-control" placeholder="Enter address" ></textarea>
                                                                </div>


                                                                <div class=" order-table-p-d d-flex flex-column justify-content-center align-items-center">
                                                                    <table class="order-table mt-5 pt-4">
                                                                        <thead>
                                                                        <!-- Main Header -->
                                                                        <tr>
                                                                            <th colspan="7" class="order-header py-5" > Shalwar Kameez Measurements</th>
                                                                        </tr>

                                                                        <!-- First Sub Header -->
                                                                        <tr class="order-subheader">
                                                                            <th>گلا</th>
                                                                            <th>کمر</th>
                                                                            <th>چھاتی تیار</th>
                                                                            <th>چھاتی</th>
                                                                            <th>بازو</th>
                                                                            <th>تیرہ</th>
                                                                            <th>لمبائی</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        <tr class="order-row">
                                                                            <td><input type="text" name="gala"></td>
                                                                            <td><input type="text" name="kamar"></td>
                                                                            <td><input type="text" name="chhati_tayar"></td>
                                                                            <td><input type="text" name="chhati"></td>
                                                                            <td><input type="text" name="bazoo"></td>
                                                                            <td><input type="text" name="teera"></td>
                                                                            <td><input type="text" name="lambai"></td>
                                                                        </tr>

                                                                        <!-- Second Sub Header -->
                                                                        <tr class="order-subheader">
                                                                            <th>کالر / بین</th>
                                                                            <th>کالر</th>
                                                                            <th>کف</th>
                                                                            <th>پٹی</th>
                                                                            <th>گھیرا تیار</th>
                                                                            <th>پانچہ</th>
                                                                            <th>شلوار</th>
                                                                        </tr>

                                                                        <tr class="order-row">
                                                                            <td>
                                                                                <select type="text" class="form-select"  style="width: 90% !important; border: 0" name="collar_bean">
                                                                                    <option value="bean">Bean</option>
                                                                                    <option value="collar Nok">Collar Nok</option>
                                                                                </select>
                                                                            </td>
                                                                            <td><input type="text" name="collar"></td>
                                                                            <td><input type="text" name="kaff"></td>
                                                                            <td><input type="text" name="pati"></td>
                                                                            <td><input type="text" name="gheera_tayar"></td>
                                                                            <td><input type="text" name="pancha"></td>
                                                                            <td><input type="text" name="shalwar"></td>
                                                                        </tr>


                                                                        <!-- Third Sub Header -->
                                                                        <tr class="order-subheader">
                                                                            <th> بٹن</th>
                                                                            <th>پانچہ</th>
                                                                            <th>شلوار پاکٹ</th>
                                                                            <th>سائڈ پاکٹ</th>
                                                                            <th>فرنٹ پاکٹ</th>
                                                                        </tr>

                                                                        <tr class="order-row">
                                                                            <td>
                                                                                <select type="text" class="form-select"  style="width: 90% !important; border: 0" name="button_style">
                                                                                    <option value="Simple">Simple</option>
                                                                                    <option value="Metal">Metal</option>
                                                                                    <option value="Fancy">Fancy</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select type="text" class="form-select"  style="width: 90% !important;  border: 0" name="pancha_style">
                                                                                    <option value="Simple">Simple</option>
                                                                                    <option value="Kanta">Kanta</option>
                                                                                    <option value="Beeding">Beeding</option>
                                                                                    <option value="Dora-Kanta">Dora-Kanta</option>
                                                                                </select>
                                                                            </td>
                                                                            <td><input type="checkbox" class="" name="shalwar_pocket"></td>
                                                                            <td><input type="text" name="side_pocket"></td>
                                                                            <td><input type="checkbox" name="front_pocket"></td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>


                                                                    <table class="order-table mt-5 pt-4">
                                                                        <thead>
                                                                        <!-- Main Header -->
                                                                        <tr>
                                                                            <th colspan="7" class="order-header py-5">Coat / Waistcoat Measurements</th>
                                                                        </tr>

                                                                        <!-- First Sub Header -->
                                                                        <tr class="order-subheader">
                                                                            <th>ہپ</th>
                                                                            <th>گلا</th>
                                                                            <th>کمر</th>
                                                                            <th>چھاتی</th>
                                                                            <th>بازو</th>
                                                                            <th>تیرہ</th>
                                                                            <th>لمبائی</th>

                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        <tr class="order-row">
                                                                            <td><input type="text" name="w_coat_hip"></td>
                                                                            <td><input type="text" name="w_coat_gala"></td>
                                                                            <td><input type="text" name="w_coat_kamar"></td>
                                                                            <td><input type="text" name="w_coat_chhati"></td>
                                                                            <td><input type="text" name="w_coat_bazoo"></td>
                                                                            <td><input type="text" name="w_coat_teera"></td>
                                                                            <td><input type="text" name="w_coat_lambai"></td>

                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <!-- Address -->
                                                                <div class="col-md-12 mb-3 mt-5">
                                                                    <label for="note" class="form-label">Note</label>
                                                                    <textarea  name="note" id="note" rows="4" class="form-control" placeholder="Write here....." ></textarea>
                                                                </div>


                                                                <!-- Quantity (single) -->
                                                                <div class="col-md-6 mb-3" id="singleQuantityWrap">
                                                                    <label for="total_amount" class="form-label">Total Amount</label>
                                                                    <input type="number" name="total_amount" id="total_amount" class="form-control" placeholder="Enter Amount" min="1" required>
                                                                </div>



                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- Footer -->
                                                    <div class="modal-footer flex-center">
                                                        <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                                                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Modal - Customers - Add-->
                                    <!--begin::Modal - Adjust Balance-->

                                    <!--end::Card-->
                                </div>
                                <!--end::Content container-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->

                        <!--end::Footer-->
                    </div>




                </div>
            </div>
            @include('partials.admin.footer')
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

{{--         Graph js work        --}}
document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('ordersChart').getContext('2d');
            const chartData = {
                daily: {
                    labels: @json($dailyLabels),
                    data: @json($dailyData),
                },
                monthly: {
                    labels: @json($monthlyLabels),
                    data: @json($monthlyData),
                },
                yearly: {
                    labels: @json($yearlyLabels),
                    data: @json($yearlyData),
                },
            };

            let currentType = 'daily';
            const createChart = (type) => {
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(0, 158, 247, 0.3)');
                gradient.addColorStop(1, 'rgba(0, 158, 247, 0)');

                return new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartData[type].labels,
                        datasets: [{
                            label: `Orders (${type})`,
                            data: chartData[type].data,
                            borderColor: '#009ef7',
                            backgroundColor: gradient,
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#009ef7',
                            pointHoverBackgroundColor: '#009ef7',
                            pointHoverBorderColor: '#fff',
                            fill: true,
                            tension: 0.4,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#1e1e2d',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                displayColors: false,
                                padding: 8,
                                cornerRadius: 8
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: '#7E8299', font: { size: 13 } },
                            },
                            y: {
                                grid: { color: 'rgba(0,0,0,0.05)' },
                                ticks: { color: '#7E8299', font: { size: 13 }, beginAtZero: true }
                            }
                        }
                    }
                });
            };
            let ordersChart = createChart(currentType);
            document.getElementById('chartType').addEventListener('change', function() {
                currentType = this.value;
                ordersChart.destroy();
                ordersChart = createChart(currentType);
            });
        });


//     ======================= pending status datatable js work


document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.getElementById('service');
    const multipleFields = document.getElementById('multipleFields');
    const singleQuantityWrap = document.getElementById('singleQuantityWrap');
    const singleQuantity = document.getElementById('quantity');
    const partQtyInputs = document.querySelectorAll('.part-qty');

    function updateFields() {
        if (roleSelect.value === 'Multiple') {
            singleQuantityWrap.style.display = 'none';
            singleQuantity.removeAttribute('required');
            singleQuantity.value = '';
            multipleFields.style.display = 'block';
            partQtyInputs.forEach(i => {
                i.setAttribute('required', 'required');
            });
        } else {
            singleQuantityWrap.style.display = 'block';
            singleQuantity.setAttribute('required', 'required');
            multipleFields.style.display = 'none';
            partQtyInputs.forEach(i => {
                i.removeAttribute('required');
                i.value = '';
            });
        }
    }

    // run on load (for edit forms or page reload)
    updateFields();

    // run on change
    roleSelect.addEventListener('change', updateFields);
});


// ============= code for fetching the data in front of dashboard:

$(document).ready(function() {
    $('#kt_customers_table').DataTable({
        // processing: true,
        serverSide: true,
        ajax: "{{ route('dashboard.pending.orders') }}",
        columns: [
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'name', name: 'name' },
            { data: 'customer_id', name: 'customer_id' },
            { data: 'phone_number', name: 'phone_number' },
            { data: 'created_at', name: 'created_at' },
            { data: 'address', name: 'address' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'quantity', name: 'quantity' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });
});
    </script>




    <script src="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script src="{{ asset('custom/order.js') }}"></script>
    <script src="{{ asset('custom/add-order.js') }}"></script>
@endsection

@extends('layouts.mainadmin')
@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Orders</h1>
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
                            <li class="breadcrumb-item text-muted">Orders List</li>

                            <!--end::Item-->
                            <!--begin::Item-->
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
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
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Card-->
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-500px ps-12" placeholder="Search..." />
                                </div>
                                <!--end::Search-->
                            </div>
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
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                                    <button type="button" data-url="{{route('admin.order.delete.multiple')}}" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                        </div>
                                    </th>

                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-110px">Customer ID</th>
                                    <th class="min-w-125px">Phone Number</th>
                                    <th class="min-w-125px">Date</th>
                                    <th class="min-w-125px">Address</th>
                                    <th class="min-w-110px">Status</th>

                                    <th class="min-w-110px">Quantity</th>
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
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Customers - Add-->
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

                                                <!-- radio -->
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
                                                                <select type="text" class="form-select"  name="collar_bean">
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



    {{--         Orders View Card           --}}

    <div class="modal fade" id="viewOrderModal" tabindex="-1" aria-labelledby="viewOrderLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewOrderLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id="resumeCardContainer">
                        <!-- Resume card HTML will be dynamically inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        var fetchUrl='{{route('admin.order.fetch')}}';
        document.addEventListener('DOMContentLoaded', function () {

            // Run when modal is opened
            $('#kt_modal_add_customer').on('shown.bs.modal', function () {

                // Get elements inside this modal
                const modal = this;
                const serviceSelect = modal.querySelector('#service');
                const multipleFields = modal.querySelector('#multipleFields');
                const singleQuantityWrap = modal.querySelector('#singleQuantityWrap');
                const singleQuantity = modal.querySelector('#quantity');
                const partQtyInputs = modal.querySelectorAll('.part-qty');

                // Safety check
                if (!serviceSelect) return;

                // Function to show/hide fields based on selection
                function updateFields() {
                    const value = serviceSelect.value.trim();

                    if (value === 'Multiple') {
                        // Hide single quantity
                        if (singleQuantityWrap) singleQuantityWrap.style.display = 'none';
                        if (singleQuantity) {
                            singleQuantity.removeAttribute('required');
                            singleQuantity.value = '';
                        }

                        // Show multiple section
                        multipleFields.style.display = 'block';
                        partQtyInputs.forEach(input => input.setAttribute('required', 'required'));
                    } else {
                        // Show single quantity
                        if (singleQuantityWrap) singleQuantityWrap.style.display = 'block';
                        if (singleQuantity) singleQuantity.setAttribute('required', 'required');

                        // Hide multiple fields
                        multipleFields.style.display = 'none';
                        partQtyInputs.forEach(input => {
                            input.removeAttribute('required');
                            input.value = '';
                        });
                    }
                }

                // Bind change event
                serviceSelect.addEventListener('change', updateFields);

                // Run once when modal opens (for edit mode)
                updateFields();
            });
        });
    </script>


    <script src="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('custom/order.js') }}"></script>
    <script src="{{ asset('custom/add-order.js') }}"></script>


    <script>
        $(document).on('click', '.btn-view', function() {
            const data = $(this).data('dt');

            let html = `
    <div class="card border-0">

        <!-- Header Section -->
        <div class="header-section rounded-3 border-bottom pb-3 mb-4">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class=" row align-items-center">
                            ${data.name ? `<h1 class="name-title display-6 fw-bold mb-2 pb-2">${data.name}</h1>` : ''}
                        <div class="col-md-4  mb-2">

                            ${data.phone_number ? `<p class="fs-6 mb-1"><strong>Phone:</strong> ${data.phone_number}</p>` : ''}
                            ${data.address ? `<p class="fs-6 mb-1"><strong>Address:</strong> ${data.address}</p>` : ''}
                        </div>
                         ${ ( (data.shalwar_kameez_qty !== undefined && data.shalwar_kameez_qty !== null && data.shalwar_kameez_qty !== '') ||
                            (data.waistcoat_qty !== undefined && data.waistcoat_qty !== null && data.waistcoat_qty !== '') ||
                            (data.coat_qty !== undefined && data.coat_qty !== null && data.coat_qty !== '') ||
                            (data.kurta_qty !== undefined && data.kurta_qty !== null && data.kurta_qty !== '') ) ? `
                            <div class="col-md-6 mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        ${ (data.shalwar_kameez_qty !== undefined && data.shalwar_kameez_qty !== null && data.shalwar_kameez_qty !== '') ? `<p class="fs-6 mb-1"><strong>Shalwar Kameez:</strong> ${data.shalwar_kameez_qty}</p>` : '' }
                                        ${ (data.waistcoat_qty !== undefined && data.waistcoat_qty !== null && data.waistcoat_qty !== '') ? `<p class="fs-6 mb-1"><strong>Waistcoat:</strong> ${data.waistcoat_qty}</p>` : '' }
                                    </div>
                                    <div class="col-md-6">
                                        ${ (data.coat_qty !== undefined && data.coat_qty !== null && data.coat_qty !== '') ? `<p class="fs-6 mb-1"><strong>Coat:</strong> ${data.coat_qty}</p>` : '' }
                                        ${ (data.kurta_qty !== undefined && data.kurta_qty !== null && data.kurta_qty !== '') ? `<p class="fs-6 mb-1"><strong>Kurta:</strong> ${data.kurta_qty}</p>` : '' }
                                    </div>
                                </div>
                            </div>
                            ` : '' }

                        <div class=" col-md-2 mb-2">
                           ${data.quantity && data.service ? `<p class="fs-6 mb-1"><strong>${data.service}:</strong> ${data.quantity}</p>` : ''}
                            ${data.total_amount ? `<p class="fs-6 mb-1"><strong>Total:</strong> ${data.total_amount}</p>` : ''}
                        </div>
                    </div>
                </div>
                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                    ${data.customer_id ? `
                        <span class="d-block fs-7 mb-1">Customer ID</span>
                        <span class="badge text-light px-3 py-2" style="font-size: 36px;">
                            ${data.customer_id}
                        </span>
                    ` : ''}
                </div>
            </div>
        </div>

        <!-- Shalwar Kameez Table -->
        <h3 class="mb-4 text-center bg-dark text-light py-3 rounded-3 fw-bold">Shalwar Kameez Measurements</h3>
        <table class="table view-table table-bordered order-table align-middle text-center">
            <thead>
                <tr class="bg-light">
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
                ${(data.gala || data.kamar || data.chhati_tayar || data.chhati || data.bazoo || data.teera || data.lambai) ? `
                <tr>
                    <td>${data.gala ?? ''}</td>
                    <td>${data.kamar ?? ''}</td>
                    <td>${data.chhati_tayar ?? ''}</td>
                    <td>${data.chhati ?? ''}</td>
                    <td>${data.bazoo ?? ''}</td>
                    <td>${data.teera ?? ''}</td>
                    <td>${data.lambai ?? ''}</td>
                </tr>` : ''}

                ${(data.collar_bean || data.collar || data.kaff || data.pati || data.gheera_tayar || data.pancha || data.shalwar) ? `
                <tr class="bg-light">
                    <th>کالر / بین</th>
                    <th>کالر</th>
                    <th>کف</th>
                    <th>پٹی</th>
                    <th>گھیرا تیار</th>
                    <th>پانچہ</th>
                    <th>شلوار</th>
                </tr>
                <tr>
                    <td>${data.collar_bean ?? ''}</td>
                    <td>${data.collar ?? ''}</td>
                    <td>${data.kaff ?? ''}</td>
                    <td>${data.pati ?? ''}</td>
                    <td>${data.gheera_tayar ?? ''}</td>
                    <td>${data.pancha ?? ''}</td>
                    <td>${data.shalwar ?? ''}</td>
                </tr>` : ''}

                ${(data.button_style || data.pancha_style || data.shalwar_pocket || data.side_pocket || data.front_pocket) ? `
                <tr class="bg-light">
                    <th>بٹن</th>
                    <th>پانچہ</th>
                    <th>شلوار پاکٹ</th>
                    <th>سائڈ پاکٹ</th>
                    <th>فرنٹ پاکٹ</th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <td>${data.button_style ?? ''}</td>
                    <td>${data.pancha_style ?? ''}</td>
                    <td>${data.shalwar_pocket == 'on' ? 'Yes' : (data.shalwar_pocket == 'off' ? 'no' : '')}</td>
                    <td>${data.side_pocket ?? ''}</td>
                    <td>${data.front_pocket == 'on' ? 'Yes' : (data.front_pocket == 'off' ? 'no' : '')}</td>
                    <td colspan="2"></td>
                </tr>` : ''}
            </tbody>
        </table>

        <!-- Coat / Waistcoat Table -->
        ${(data.w_coat_hip || data.w_coat_gala || data.w_coat_kamar || data.w_coat_chhati || data.w_coat_bazoo || data.w_coat_teera || data.w_coat_lambai) ? `
        <h3 class="mb-4 text-center bg-dark text-light py-3 rounded-3 fw-bold mt-5">Coat / Waistcoat Measurements</h3>
        <table class="table table-bordered order-table align-middle text-center">
            <thead>
                <tr class="bg-light">
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
                <tr>
                    <td>${data.w_coat_hip ?? ''}</td>
                    <td>${data.w_coat_gala ?? ''}</td>
                    <td>${data.w_coat_kamar ?? ''}</td>
                    <td>${data.w_coat_chhati ?? ''}</td>
                    <td>${data.w_coat_bazoo ?? ''}</td>
                    <td>${data.w_coat_teera ?? ''}</td>
                    <td>${data.w_coat_lambai ?? ''}</td>
                </tr>
            </tbody>
        </table>` : ''}
    </div>`;

            $('#resumeCardContainer').html(html);
        });
    </script>


@endsection

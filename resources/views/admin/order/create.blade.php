@extends('layouts.mainadmin')
<style>
    .order-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    .order-table th, .order-table td {
        border: 1px solid #ccc;
        text-align: center;
        padding: 8px;
        font-size: 16px;
    }

    .order-header {
        background-color: #333;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
    }

    .order-subheader th {
        background-color: #e9e9e9; /* light gray */
        font-weight: bold;
        padding: 18px 0px;
    }

    .order-row input {
        width: 100%;
        text-align: center;
        border: none;
        border-bottom: 2px solid #aaa;
        outline: none;
        padding: 10px 5px;
        margin-bottom: 8px;
    }

    .order-row input:focus {
        border-bottom: 2px solid #333;
    }
    .multiple-fields {
        display: none; /* hidden by default */
        margin-top: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #f9f9f9;
    }
</style>
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">Create Order</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Admin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Create Order</li>
                        </ul>
                    </div>
                    <!--end::Page title-->
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card">
                        <div class="card-body p-4">
                            <!--begin::Form-->
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.user.store') }}" id="kt_modal_add_customer_form">
                                @csrf

                                <!-- Header -->
                                <div class="modal-header" id="kt_modal_add_customer_header">
                                    <h2 class="fw-bold mb-0 mt-2">Add New Order</h2>
                                </div>

                                <!-- Body -->
                                <div class="modal-body py-10">
                                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll"
                                         data-kt-scroll="true"
                                         data-kt-scroll-activate="{default: false, lg: true}"

                                         data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                         data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                         >

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
                                                <label for="phone_number" class="form-label">Phone Number (Home)</label>
                                                <input type="tel" name="phone_number" id="phone_number2" class="form-control" placeholder="Enter phone number">
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

                                            <!-- Address -->
                                            <div class="col-md-6 mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea  name="address" id="address" rows="2" class="form-control" placeholder="Enter address" ></textarea>
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="col-md-6 mb-3">
                                                <label for="address" class="form-label mb-3">Reference Person</label> <br>

                                                <label class="form-label me-3">
                                                <input type="radio" name="reference_person" value="Yes" class="">
                                                    Yes</label>

                                                <label>
                                                <input type="radio" name="reference_person" value="No" class="">
                                                    No</label>
                                            </div>


{{--                                            <h2 class="mt-5 pt-4">Measurements</h2><hr>--}}


                                            <table class="order-table mt-5 pt-4">
                                                <thead>
                                                <!-- Main Header -->
                                                <tr>
                                                    <th colspan="7" class="order-header py-5">Measurements</th>
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
                                                    <th>بٹن</th>
                                                    <th>کالر</th>
                                                    <th>کف</th>
                                                    <th>پٹی</th>
                                                    <th>گھیرا تیار</th>
                                                    <th>پانچہ</th>
                                                    <th>شلوار</th>
                                                </tr>

                                                <tr class="order-row">
                                                    <td><input type="text" name="button"></td>
                                                    <td><input type="text" name="kalar"></td>
                                                    <td><input type="text" name="kaff"></td>
                                                    <td><input type="text" name="pati"></td>
                                                    <td><input type="text" name="gheera tayar"></td>
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
                                                        <select type="text" class="form-select" name="button_style">
                                                            <option value="Simple">Simple</option>
                                                            <option value="Metal">Metal</option>
                                                            <option value="Fancy">Fancy</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-select" name="pancha_style">
                                                            <option value="Simple">Simple</option>
                                                            <option value="Kanta">Kanta</option>
                                                            <option value="Beeding">Beeding</option>
                                                            <option value="Dora-Kanta">Dora-Kanta</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="shalwar pocket"></td>
                                                    <td><input type="text" name="side pocket"></td>
                                                    <td><input type="text" name="front pocket"></td>
                                                </tr>


                                                </tbody>
                                            </table>

                                            <!-- Address -->
                                            <div class="col-md-12 mb-3 mt-5">
                                                <label for="note" class="form-label">Note</label>
                                                <textarea  name="address" id="note" rows="4" class="form-control" placeholder="Write here....." ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="modal-footer flex-end">
{{--                                    <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>--}}
                                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    </button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/Vm7VRE" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--end::Footer-->
    </div>
@endsection

@section('scripts')
    <script>
        var fetchUrl = '{{ route('admin.user.fetch') }}';


        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('service');
            const multipleFields = document.getElementById('multipleFields');
            const singleQuantityWrap = document.getElementById('singleQuantityWrap');
            const singleQuantity = document.getElementById('quantity');
            const partQtyInputs = document.querySelectorAll('.part-qty');

            function updateFields() {
                if (roleSelect.value === 'Multiple') {
                    // hide single quantity
                    singleQuantityWrap.style.display = 'none';
                    singleQuantity.removeAttribute('required');
                    singleQuantity.value = ''; // optional: clear single quantity

                    // show multiple fields and set required
                    multipleFields.style.display = 'block';
                    partQtyInputs.forEach(i => {
                        i.setAttribute('required', 'required');
                    });
                } else {
                    // show single quantity
                    singleQuantityWrap.style.display = 'block';
                    singleQuantity.setAttribute('required', 'required');

                    // hide multiple fields and remove required
                    multipleFields.style.display = 'none';
                    partQtyInputs.forEach(i => {
                        i.removeAttribute('required');
                        i.value = ''; // optional: clear the part qtys
                    });
                }
            }

            // run on load (for edit forms or page reload)
            updateFields();

            // run on change
            roleSelect.addEventListener('change', updateFields);
        });
    </script>
    <script src="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('custom/user.js') }}"></script>
    <script src="{{ asset('custom/add-user.js') }}"></script>
@endsection

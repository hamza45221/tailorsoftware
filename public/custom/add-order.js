"use strict";

// Class definition
var KTModalCustomersAdd = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;
    var editor;
    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    // 'name': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Name is required'
                    //         }
                    //     }
                    // },
                    // 'phone_number': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Phone Number is required'
                    //         }
                    //     }
                    // },
                    // 'reference_id': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Reference ID is required'
                    //         }
                    //     }
                    // },



                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Revalidate country field. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('country');
        });
        var edit=false;
        var editId=0;
        $(document).on("click",'.btn-edit',function(){
            editId=$(this).attr('data-id');
            console.log($(this).attr('data-dt'));
            var data=JSON.parse($(this).attr('data-dt'));

            // $('[name="category_id"]').val(data.category_id).trigger('change');

            $('[name="customer_id"]').val(data.customer_id);
            $('[name="name"]').val(data.name);
            $('[name="phone_number"]').val(data.phone_number);
            $('[name="phone_number2"]').val(data.phone_number2);
            $('[name="service"]').val(data.service);
            $('[name="quantity"]').val(data.quantity);


            $('[name="shalwar_kameez_qty"]').val(data.shalwar_kameez_qty);
            $('[name="waistcoat_qty"]').val(data.waistcoat_qty);
            $('[name="kurta_qty"]').val(data.kurta_qty);
            $('[name="coat_qty"]').val(data.coat_qty);


            $('[name="address"]').val(data.address);
            $('[name="reference_person"]').val(data.reference_person);
            $('[name="gala"]').val(data.gala);
            $('[name="kamar"]').val(data.kamar);
            $('[name="chhati_tayar"]').val(data.chhati_tayar);
            $('[name="chhati"]').val(data.chhati);
            $('[name="bazoo"]').val(data.bazoo);
            $('[name="teera"]').val(data.teera);
            $('[name="lambai"]').val(data.lambai);
            $('[name="button"]').val(data.button);
            $('[name="collar"]').val(data.collar);
            $('[name="kaff"]').val(data.kaff);
            $('[name="pati"]').val(data.pati);
            $('[name="gheera_tayar"]').val(data.gheera_tayar);
            $('[name="pancha"]').val(data.pancha);
            $('[name="shalwar"]').val(data.shalwar);
            $('[name="button_style"]').val(data.button_style);
            $('[name="pancha_style"]').val(data.pancha_style);
            $('[name="shalwar_pocket"]').val(data.shalwar_pocket);
            $('[name="side_pocket"]').val(data.side_pocket);
            $('[name="front_pocket"]').val(data.front_pocket);
            //        coat measurement

            $('[name="w_coat_hip"]').val(data.w_coat_hip);
            $('[name="w_coat_gala"]').val(data.w_coat_gala);
            $('[name="w_coat_kamar"]').val(data.w_coat_kamar);
            $('[name="w_coat_chhati"]').val(data.w_coat_chhati);
            $('[name="w_coat_bazoo"]').val(data.w_coat_bazoo);
            $('[name="w_coat_teera"]').val(data.w_coat_teera);
            $('[name="w_coat_lambai"]').val(data.w_coat_lambai);


            $('[name="note"]').val(data.note);
            $('[name="total_amount"]').val(data.total_amount);
            $('[name="status"]').val(data.status);
            $('[name="gender"]').val(data.gender);
            $('[name="payment"]').val(data.payment);



            $('[name=id]').val(editId);
            // $('#image').attr('src',data.image)

            edit=true;
            console.log(data.description);
            editor.setData(data.description);
        })
        $('#kt_modal_add_customer').on('hide.bs.modal',function(){
            edit=false;
            $('[name="customer_id"]').val('');
            $('[name="name"]').val('');
            $('[name="phone_number"]').val('');
            $('[name="phone_number2"]').val('');
            $('[name="service"]').val('');
            $('[name="quantity"]').val('');
            $('[name="shalwar_kameez_qty"]').val('');
            $('[name="waistcoat_qty"]').val('');
            $('[name="kurta_qty"]').val('');
            $('[name="coat_qty"]').val('');
            $('[name="address"]').val('');
            $('[name="reference_person"]').val('');
            $('[name="gala"]').val('');
            $('[name="kamar"]').val('');
            $('[name="chhati_tayar"]').val('');
            $('[name="chhati"]').val('');
            $('[name="bazoo"]').val('');
            $('[name="teera"]').val('');
            $('[name="lambai"]').val('');
            $('[name="button"]').val('');
            $('[name="collar"]').val('');
            $('[name="kaff"]').val('');
            $('[name="pati"]').val('');
            $('[name="gheera_tayar"]').val('');
            $('[name="pancha"]').val('');
            $('[name="shalwar"]').val('');
            $('[name="button_style"]').val('');
            $('[name="pancha_style"]').val('');
            $('[name="shalwar_pocket"]').val('');
            $('[name="side_pocket"]').val('');
            $('[name="front_pocket"]').val('');
            //        coat measurement

            $('[name="w_coat_hip"]').val('');
            $('[name="w_coat_gala"]').val('');
            $('[name="w_coat_kamar"]').val('');
            $('[name="w_coat_chhati"]').val('');
            $('[name="w_coat_bazoo"]').val('');
            $('[name="w_coat_teera"]').val('');
            $('[name="w_coat_lambai"]').val('');


            $('[name="note"]').val('');
            $('[name="total_amount"]').val('');
            $('[name="status"]').val('');
            $('[name="gender"]').val('');
            $('[name="payment"]').val('');


            console.log('modal hide');

        });

        // Action buttons
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status === 'Valid') {
                        let formElement = document.getElementById('kt_modal_add_customer_form');
                        let formData = new FormData(formElement);

                        if (edit === true) {
                            formData.append('edit', true);
                            formData.append('id', editId);
                        }

                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;

                        $.ajax({
                            url: $(formElement).attr('action'),
                            type: $(formElement).attr('method') || 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,

                            success: function (data) {
                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;
                                edit = false;

                                if (data.success) {
                                    Swal.fire({
                                        text: data.message || "Order saved successfully!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-light-primary"
                                        }
                                    }).then(() => {
                                        // ✅ Redirect only after SweetAlert confirmation
                                        if (data.redirect) {
                                            window.location.href = data.redirect;
                                        } else {
                                            window.location.href = "{{ route('admin.order') }}";
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        text: data.message || "Something went wrong.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-light-primary"
                                        }
                                    });
                                }
                            },


                            error: function (xhr) {
                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;

                                let message = "An unexpected error occurred.";
                                if (xhr.status === 419) {
                                    message = "Session expired. Please refresh the page.";
                                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                                    message = xhr.responseJSON.message;
                                }

                                Swal.fire({
                                    text: message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-light-primary"
                                    }
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            text: "Please fix the form errors and try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });


        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        closeButton.addEventListener('click', function(e){
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_customer'));

            form = document.querySelector('#kt_modal_add_customer_form');
            submitButton = form.querySelector('#kt_modal_add_customer_submit');
            cancelButton = form.querySelector('#kt_modal_add_customer_cancel');
            closeButton = form.querySelector('#kt_modal_add_customer_close');
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'))
                .then(myEditor => {
                    console.log(editor);
                    editor=myEditor;
                })
                .catch(error => {
                    console.error(error);
                });
            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalCustomersAdd.init();
});

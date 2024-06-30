"use strict";

// Class definition
var KTSigninGeneral = (function () {
  // Elements
  var form;
  var submitButton;
  var validator;

  // Handle form
  var handleForm = function (e) {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    validator = FormValidation.formValidation(form, {
      fields: {
        username: {
          validators: {
            notEmpty: {
              message: "NIK is required",
            },
          },
        },
        password: {
          validators: {
            notEmpty: {
              message: "Password is required",
            },
          },
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "", // comment to enable invalid state icons
          eleValidClass: "", // comment to enable valid state icons
        }),
      },
    });

    // Handle form submit
    submitButton.addEventListener("click", function (e) {
      // Prevent button default action
      e.preventDefault();

      // Validate form
      validator.validate().then(function (status) {
        if (status == "Valid") {
          // Show loading indication
          submitButton.setAttribute("data-kt-indicator", "on");

          // Disable button to avoid multiple click
          submitButton.disabled = true;

          // Simulate ajax request
          setTimeout(function () {
            // Hide loading indication
            submitButton.setAttribute("data-kt-indicator", "on");

            // Enable button
            submitButton.disabled = true;

            var username = $("#username").val();
            var password = $("#password").val();

            $.ajax({
              method: "POST",
              url: base_url + "/auth/login",
              dataType: "json",
              beforeSend: function () {},
              data: {
                username: username,
                password: password,
              },
              success: function (result) {
                if (result.response == 200) {
                  submitButton.setAttribute("data-kt-indicator", "on");
                  submitButton.disabled = true;

                  toastr.options = {
                    closeButton: false,
                    debug: false,
                    newestOnTop: true,
                    progressBar: false,
                    positionClass: "toastr-top-left",
                    preventDuplicates: true,
                    showDuration: "300",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                  };

                  toastr.success(result.message);
                  submitButton.setAttribute("data-kt-indicator", "on");
                  submitButton.disabled = true;

                  window.setTimeout(function () {
                    window.location.href = base_url + "dashboard";
                  }, 2000);
                } else {
                  toastr.options = {
                    closeButton: false,
                    debug: false,
                    newestOnTop: true,
                    progressBar: false,
                    positionClass: "toastr-top-left",
                    preventDuplicates: true,
                    showDuration: "300",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                  };

                  toastr.error(result.message);

                  // Hide loading indication
                  submitButton.removeAttribute("data-kt-indicator");

                  // Enable button
                  submitButton.disabled = false;
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.options = {
                  closeButton: false,
                  debug: false,
                  newestOnTop: true,
                  progressBar: false,
                  positionClass: "toastr-top-left",
                  preventDuplicates: true,
                  showDuration: "300",
                  hideDuration: "1000",
                  timeOut: "5000",
                  extendedTimeOut: "1000",
                  showEasing: "swing",
                  hideEasing: "linear",
                  showMethod: "fadeIn",
                  hideMethod: "fadeOut",
                };

                toastr.error("Unexpected Error. Please try again.");

                submitButton.removeAttribute("data-kt-indicator");
                submitButton.disabled = false;
              },
            });
          }, 2000);
        } else {
          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
          Swal.fire({
            text: "Sorry, looks like there are some errors detected, please try again.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
              confirmButton: "btn btn-primary",
            },
          });
        }
      });
    });
  };

  // Public functions
  return {
    // Initialization
    init: function () {
      form = document.querySelector("#kt_sign_in_form");
      submitButton = document.querySelector("#kt_sign_in_submit");

      handleForm();
    },
  };
})();

// Class definition
var KTSignupGeneral = (function () {
  // Elements
    var form;
    var submitButton;
    var validator;

  // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(form, {
            fields: {
              'username_re': {
                validators: {
                  notEmpty: {
                    message: 'NIK is required'
                  }
                }
              },
              'fullname': {
                  validators: {
                      notEmpty: {
                          message: 'Fullname is required'
                      }
                  }
              },
                'email': {
                    validators: {
                        regexp: {
                            regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                            message: 'The value is not a valid email address',
                        },
                        notEmpty: {
                            message: 'Email address is required'
                        }
                    }
                },
                'phone': {
                    validators: {
                        notEmpty: {
                            message: "Phone is required",
                        },
                    },
                },
                'division': {
                    validators: {
                        notEmpty: {
                            message: "Division is required",
                        },
                    },
                },
                'password_re': {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        },
                        callback: {
                            message: 'Please enter valid password',
                            callback: function(input) {
                                if (input.value.length > 0) {
                                    return validatePassword();
                                }
                            }
                        }
                    }
                },
                're-password': {
                    validators: {
                        notEmpty: {
                            message: 'The password confirmation is required'
                        },
                        identical: {
                            compare: function() {
                                return form.querySelector('[name="password"]').value;
                            },
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "", // comment to enable invalid state icons
                eleValidClass: "", // comment to enable valid state icons
                }),
            },
        });

        // Handle form submit
        submitButton.addEventListener("click", function (e) {
        // Prevent button default action
        e.preventDefault();

        // Validate form
        validator.validate().then(function (status) {
            if (status == "Valid") {
                // Show loading indication
                submitButton.setAttribute("data-kt-indicator", "on");

                // Disable button to avoid multiple click
                submitButton.disabled = true;

                // Simulate ajax request
                setTimeout(function () {
                    // Hide loading indication
                    submitButton.setAttribute("data-kt-indicator", "on");

                    // Enable button
                    submitButton.disabled = true;

                    var username = $("#username_re").val();
                    var fullname = $("#fullname").val();
                    var email = $("#email").val();
                    var phone = $("#phone").val();
                    var division = $("#division").val();
                    var password_re = $("#password_re").val();
                    var repassword = $("#re-password").val();

                    $.ajax({
                        method: "POST",
                        url: base_url + "/auth/createAccount",
                        dataType: "json",
                        beforeSend: function () {},
                        data: {
                          fullname: fullname,
                          username: username,
                          email: email,
                          phone: phone,
                          division: division,
                          password: password_re,
                          repassword: repassword,
                        },
                        success: function (result) {
                          if (result.response == 200) {
                              submitButton.setAttribute("data-kt-indicator", "on");
                              submitButton.disabled = true;

                              toastr.options = {
                                  closeButton: false,
                                  debug: false,
                                  newestOnTop: true,
                                  progressBar: false,
                                  positionClass: "toastr-top-left",
                                  preventDuplicates: true,
                                  showDuration: "300",
                                  hideDuration: "1000",
                                  timeOut: "5000",
                                  extendedTimeOut: "1000",
                                  showEasing: "swing",
                                  hideEasing: "linear",
                                  showMethod: "fadeIn",
                                  hideMethod: "fadeOut",
                              };

                              toastr.success(result.message);
                              submitButton.setAttribute("data-kt-indicator", "on");
                              submitButton.disabled = true;

                              window.setTimeout(function () {
                                  window.location.href = base_url + "auth";
                              }, 2000);
                          } else {
                              toastr.options = {
                                closeButton: false,
                                debug: false,
                                newestOnTop: true,
                                progressBar: false,
                                positionClass: "toastr-top-left",
                                preventDuplicates: true,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                              };

                              toastr.error(result.message);

                              // Hide loading indication
                              submitButton.removeAttribute("data-kt-indicator");

                              // Enable button
                              submitButton.disabled = false;
                          }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                          toastr.options = {
                            closeButton: false,
                            debug: false,
                            newestOnTop: true,
                            progressBar: false,
                            positionClass: "toastr-top-left",
                            preventDuplicates: true,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "5000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                          };

                          toastr.error("Unexpected Error. Please try again.");

                          submitButton.removeAttribute("data-kt-indicator");
                          submitButton.disabled = false;
                        },
                    });
                }, 2000);
            } else {
                // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Sorry, looks like there are some errors detected, please try again.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                    confirmButton: "btn btn-primary",
                    },
                });
            }
        });
        });
    };

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector("#kt_register_form");
            submitButton = document.querySelector("#kt_register_submit");

            handleForm();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTSigninGeneral.init();
  KTSignupGeneral.init();
});

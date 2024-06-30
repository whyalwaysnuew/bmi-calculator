"use strict";
// Class definition
var KTDatatablesAdvanced = function () {
    // Private functions

    var handleDataTableServerSide = function () {
        if ($('#datatable-serverside-user').length !== 0) {

            $.getJSON(base_url + 'user/getColumns',function(column){
                $('#datatable-serverside-user').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    filter: true,
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        type: "POST",
                        url: base_url + 'user/getData',
                        dataType: "json",
                        data: function (d) {
                            
                        }
                    },
                    columns: column
                });
            });
        }
    }

    var initZeroConfiguration = function() {
        $("#datatable-clientside-user").DataTable({
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            filter: true,
            responsive: true,
        });
    }

    var initZeroConfiguration1 = function() {
        $("#datatable-clientside-scroll-user").DataTable({
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>",
            scrollX: true,
            scrollY: 350,
            scrollCollapse: true,
            paging: false,
            filter: true,
            // responsive: true,
        });
    }

    // Public methods
    return {
        init: function () {
            handleDataTableServerSide();
            initZeroConfiguration();
            initZeroConfiguration1();
        }
    }
}();


function reloadTable() {
    var table = $('#datatable-serverside-user').DataTable();
    table.ajax.reload();
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTDatatablesAdvanced.init();
});

// Delete Data
$(document).on('click', '#delete-data', function () {
    var id = $(this).attr('data-id');
    // console.log(id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
		reverseButtons: false,
		buttonsStyling: true,
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-primary"
        }
    }).then((result) => {
        // console.log(result);
		if (result.isConfirmed == true) {
            deletedata(id);
        } else if (result.dismiss === 'cancel') {
			Swal.fire({
				title: 'Cancelled',
				text: 'Your data is safe!',
				icon: 'error',
				customClass: {
					confirmButton: "btn btn-primary",
				}
			})
        }
    });
})

function deletedata(id) {
    $.ajax({
        method: 'GET',
        url: base_url +'/user/delete?id=' + id
    }).done(function (data) {
        Swal.fire(
            'Deleted!',
            'Your data is deleted from the servers',
            'success'
        ).then(result => {
            location.reload();
        });
    });
}

function getUsername() {
    var fullname = $('#fullname').val()
    var string = fullname.trim().split(' ')[0]
    var lower_uname = string.toLowerCase()

    $('#username').val(lower_uname)
}


if (location.href.match(/create/)) {
  var createForm = (function () {
    var submitButton;
    var validator;
    var form;
    // Handle form validation and submittion
    var handleForm = function () {
      // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
      validator = FormValidation.formValidation(form, {
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: "NIK is required",
              },
              remote: {
                data: function () {
                  return {
                    username: form.querySelector('[name="username"]').value,
                  };
                },
                message: "Username already in use. Please choose a different username.",
                method: "POST",
                url: base_url + "/user/checkUsername",
              },
            },
          },
          fullname: {
            validators: {
              notEmpty: {
                message: "Fullname is required",
              },
            },
          },
          division: {
            validators: {
              notEmpty: {
                message: "Division is required",
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
          confirm_password: {
            validators: {
              notEmpty: {
                message: "Confirm Password is required",
              },
              identical: {
                compare: function () {
                  return form.querySelector('[name="password"]').value;
                },
                message: "Password and its confirm are not the same",
              },
            },
          },
          phone: {
            validators: {
              regexp: {
                regexp: /^[0-9]+$/,
                message: "Phone must be a valid number",
              },
              notEmpty: {
                message: "Phone is required",
              },
            },
          },
          email: {
            validators: {
                regexp: {
                  regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                  message: 'The value is not a valid email address',
                },
                notEmpty: {
                    message: 'Email is required'
                },
                remote: {
                    data: function () {
                        return {
                            email: form.querySelector('[name="email"]').value,
                        };
                    },
                    message: 'Email already registered. Please use a different email.',
                    method: 'POST',
                    url: base_url + "/user/checkEmail",
                },
            }
          },
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "is-invalid",
            eleValidClass: "is-valid",
          }),
        },
      });

      // Action buttons
      submitButton.addEventListener("click", function (e) {
        e.preventDefault();

        // Validate form before submit
        if (validator) {
          validator.validate().then(function (status) {
            if (status == "Valid") {
              submitButton.setAttribute("data-kt-indicator", "on");

              // Disable button to avoid multiple click
              submitButton.disabled = true;

              // Simulate ajax process
              setTimeout(function () {
                var form = new FormData($("#createForm")[0]);
                $.ajax({
                  method: "POST",
                  url: base_url + "/user/store",
                  dataType: "json",
                  data: form,
                  processData: false,
                  contentType: false,
                  success: function (result) {
                    if (result.response == 200) {
                      toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: true,
                        progressBar: false,
                        positionClass: "toastr-top-right",
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
                        window.location.href = base_url + "user";
                      }, 2000);
                    } else {
                      toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: true,
                        progressBar: false,
                        positionClass: "toastr-top-right",
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

                      submitButton.removeAttribute("data-kt-indicator");
                      submitButton.disabled = false;
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    toastr.options = {
                      closeButton: false,
                      debug: false,
                      newestOnTop: true,
                      progressBar: false,
                      positionClass: "toastr-top-right",
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
              // Show error message.
              Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                  confirmButton: "btn btn-primary",
                },
              });
            }
          });
        }
      });
    };

    return {
      // Public functions
      init: function () {
        // Elements
        form = document.querySelector("#createForm");
        submitButton = document.getElementById("submitForm");

        handleForm();
      },
    };
  })();

  // On document ready
  KTUtil.onDOMContentLoaded(function () {
    createForm.init();
  });
} else if (location.href.match(/edit/)) {
  var updateForm = (function () {
    var submitButton;
    var validator;
    var form;

    // Handle form validation and submittion
    var handleForm = function () {
      // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
      validator = FormValidation.formValidation(form, {
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: "NIK is required",
              },
              remote: {
                data: function () {
                  return {
                    username: form.querySelector('[name="username"]').value,
                    id: form.querySelector('[name="id"]').value,
                  };
                },
                message: "Username already in use. Please choose a different username.",
                method: "POST",
                url: base_url + "/user/checkUsername",
              },
            },
          },
          fullname: {
            validators: {
              notEmpty: {
                message: "Fullname is required",
              },
            },
          },
          division: {
            validators: {
              notEmpty: {
                message: "Division is required",
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
          confirm_password: {
            validators: {
              notEmpty: {
                message: "Confirm Password is required",
              },
              identical: {
                compare: function () {
                  return form.querySelector('[name="password"]').value;
                },
                message: "Password and its confirm are not the same",
              },
            },
          },
          phone: {
            validators: {
              regexp: {
                regexp: /^[0-9]+$/,
                message: "Phone must be a valid number",
              },
              notEmpty: {
                message: "Phone is required",
              },
            },
          },
          email: {
            validators: {
                regexp: {
                  regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                  message: 'The value is not a valid email address',
                },
                notEmpty: {
                    message: 'Email is required'
                },
                remote: {
                    data: function () {
                        return {
                            email: form.querySelector('[name="email"]').value,
                            id: form.querySelector('[name="id"]').value,
                        };
                    },
                    message: 'Email already registered. Please use a different email.',
                    method: 'POST',
                    url: base_url + "/user/checkEmail",
                },
            }
          },
          user_status: {
            validators: {
              notEmpty: {
                message: "User Status is required",
              },
            },
          },
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "is-invalid",
            eleValidClass: "is-valid",
          }),
        },
      });

      // Action buttons
      submitButton.addEventListener("click", function (e) {
        e.preventDefault();

        // Validate form before submit
        if (validator) {
          validator.validate().then(function (status) {
            if (status == "Valid") {
              submitButton.setAttribute("data-kt-indicator", "on");

              // Disable button to avoid multiple click
              submitButton.disabled = true;

              // Simulate ajax process
              setTimeout(function () {
                var form = new FormData($("#updateForm")[0]);
                $.ajax({
                  method: "POST",
                  url: base_url + "/user/update",
                  dataType: "json",
                  data: form,
                  processData: false,
                  contentType: false,
                  success: function (result) {
                    if (result.response == 200) {
                      toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: true,
                        progressBar: false,
                        positionClass: "toastr-top-right",
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
                        window.location.href = base_url + "user";
                      }, 2000);
                    } else {
                      toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: true,
                        progressBar: false,
                        positionClass: "toastr-top-right",
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

                      submitButton.removeAttribute("data-kt-indicator");
                      submitButton.disabled = false;
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    toastr.options = {
                      closeButton: false,
                      debug: false,
                      newestOnTop: true,
                      progressBar: false,
                      positionClass: "toastr-top-right",
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
              // Show error message.
              Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                  confirmButton: "btn btn-primary",
                },
              });
            }
          });
        }
      });
    };

    return {
      // Public functions
      init: function () {
        // Elements
        form = document.querySelector("#updateForm");
        submitButton = document.getElementById("submitForm");

        handleForm();
      },
    };
  })();

  // On document ready
  KTUtil.onDOMContentLoaded(function () {
    updateForm.init();
  });
}
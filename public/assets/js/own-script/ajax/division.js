$('#datatable-division').DataTable({
  language: {
    lengthMenu: 'Show _MENU_',
  },
  dom:
    "<'row mb-2'" +
    "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
    '>' +
    "<'table-responsive'tr>" +
    "<'row'" +
    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
    '>',
});

function addDivision() {
  $.ajax({
    url: base_url + 'division/create',
    type: 'GET',
    success: (result) => {
      $('#sectionModal').modal('show'), $('#modalContent').html(result);
    },
  });
}

$(document).on('click', '#edit-data', function () {
  let id = $(this).attr('data-id');

  $.ajax({
    url: base_url + 'division/edit',
    type: 'GET',
    data: { id: id },
    success: (result) => {
      $('#sectionModal').modal('show'), $('#modalContent').html(result);
    },
  });
});

$(document).on('click', '#delete-data', function () {
  let id = $(this).attr('data-id');

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    reverseButtons: false,
    buttonsStyling: true,
    customClass: {
      confirmButton: "btn btn-danger",
      cancelButton: "btn btn-primary",
    },
  }).then((result) => {
    if (result.isConfirmed == true) {
      $.ajax({
        method: "GET",
        url: base_url + "division/delete?id=" + id,
      }).done(function (data) {
        Swal.fire(
          "Deleted!",
          "Your data is deleted from the servers",
          "success"
        ).then((result) => {
          location.reload();
        });
      });
    } else if (result.dismiss === "cancel") {
      Swal.fire({
        title: "Cancelled!",
        text: "Your data is safe.",
        icon: "error",
        customClass: {
          confirmButton: "btn btn-primary",
        },
      });
    }
  });
});

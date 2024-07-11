<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Headquarters</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('Pages.extras.style')
</head>



@include('headers.floatNav')

<hr style="padding: 2%">

<body  class="horizontal-layout horizontal-menu content-left-sidebar navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">

    <section id="basic-datatable" class="" style="margin-right:30px; margin-left:20px;">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <table class="datatables-basic table">
              <thead>
                <tr>

                  <th>Sno.</th>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Status</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <!-- Modal to add new record -->
      <div class="modal modal-slide-in fade" id="modals-slide-in">
        <div class="modal-dialog sidebar-sm">
          <form class="add-new-record modal-content pt-0" id="add-new-record-form">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
              <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname"> Name</label>
                <input
                  type="text"
                  class="form-control dt-full-name"
                  id="new-hq-name"
                  placeholder="John Doe"
                  aria-label="John Doe"
                />
              </div>

              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-logo">Logo</label>
                <input
                  type="file"
                  id="new-hq-logo"
                  class="form-control dt-email"
                  {{-- placeholder="john.doe@example.com" --}}
                  aria-label="john.doe@example.com"
                />
              </div>

              <div class="mb-4">
                <label class="form-label" for="basic-icon-default-salary">Address</label>
                <input
                  type="text"
                  id="new-hq-address"
                  class="form-control dt-password"
                  placeholder="Enter Address"

                />
              </div>

              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-role">Select Option</label>
                <select
                  id="new-hq-status"
                  class="form-control dt-select"
                  aria-label="Select Option"
                >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
                <small class="form-text"> Please choose role from the list </small>
              </div>

              <button type="button" class="btn btn-primary data-submit me-1" id="submit-btn">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>






<!-- Modal to edit record -->
<div class="modal modal-slide-in fade" id="edit-modal">
    <div class="modal-dialog sidebar-sm">
        <form class="edit-record modal-content pt-0" id="edit-record-form">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1 hidden">
                    <label class="form-label" for="edit-user-id">id</label>
                    <input
                        type="text"
                        id="edit-user-id"
                        class="form-control dt-email"
                        placeholder="john.doe@example.com"
                        aria-label="john.doe@example.com"
                    />
                </div>


                <div class="mb-1">
                    <label class="form-label" for="edit-user-name">Name</label>
                    <input
                        type="text"
                        class="form-control dt-full-name"
                        id="edit-hq-name"
                        placeholder="John Doe"
                        aria-label="John Doe"
                    />
                </div>

                <div class="mb-1">
                    <label class="form-label" for="edit-user-email">Logo</label>
                    <input
                        type="file"
                        id="edit-hq-logo"
                        class="form-control "
                        {{-- placeholder="john.doe@example.com" --}}
                        aria-label="john.doe@example.com"
                    />
                </div>

                <div class="mb-4">
                    <label class="form-label" for="edit-user-pass">Address</label>
                    <input
                        type="text"
                        id="edit-hq-address"
                        class="form-control dt-password"
                        placeholder="Enter Address"
                    />
                </div>

                <div class="mb-1">
                    <label class="form-label" for="edit-user-role">Select Status</label>
                    <select
                        id="edit-hq-status"
                        class="form-control dt-select"
                        aria-label="Select Option"
                    >
                        <option value="Active" selected>Active</option>
                        <option value="Inactive" selected>Inactive</option>


                    </select>
                    <small class="form-text"> Please choose role from the list </small>
                </div>

                <button type="button" class="btn btn-primary edit-submit me-1" id="edit-submit-btn">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>





    </section>
    <!--/ Basic table -->


    @include('Pages.extras.js')

</body>
</html>




<script>


$(function () {
  'use strict';

  var dt_basic_table = $('.datatables-basic'),
    assetPath = '../../../app-assets/';

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      ajax: {
        url: '/headquarters', // Replace with your API endpoint
        type: 'GET',
        dataSrc: '' // Assuming your API directly returns the array of users
      },
      columns: [

        { data: 'id' },
        {
    data: 'logo',
    name: 'Logo',
    render: function(data, type, full, meta) {
        var imageUrl = '/storage/logos/3aVoGvh521jDYKyvEB7VkTeF6UloYrrjnbt82hoA.png';
        return '<img src="'+ imageUrl +'" alt="'+ full.name +'" style="width: 30px; height: 30px; border-radius: 50%;">';
    }
},
        { data: 'name' },

        { data: 'address' },
        { data: 'status' },



      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          responsivePriority: 2,
          targets: 0
        },

        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
             '<div class="d-inline-flex">' +
    '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
        feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
    '</a>' +
    '<div class="dropdown-menu dropdown-menu-end">' +
        '<a href="javascript:;" class="dropdown-item delete-record" data-user-id="' + full.id + '">' +
            feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
            'Delete' +
        '</a>' +
    '</div>' +
'</div>' +
'<a id="edit-btn" class="pe-1 item-edit " data-user-id="' + full.id + '">' +
    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
'</a>' +
'<a href="/templates/' + full.id + '/headquarter" class="item-edit">' +
    feather.icons['tool'].toSvg({ class: 'font-small-4' }) +
'</a>'
            );
          }
        }
      ],
      order: [[1, 'asc']], // Order by name ascending
      dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [0,1, 2, 3] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [0,1, 2, 3] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [0,1, 2, 3] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [0,1, 2, 3] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [0,1, 2, 3] }
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
            }, 50);
          }
        },
        {
          text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add New Record',
          className: 'create-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ]
    });

    // Event listeners and custom functions can remain the same as in your original script
    // Add checkbox for all
    dt_basic_table.on('draw.dt', function () {
      setTimeout(function () {
        if (!$('.dt-checkboxes').length) {
          dt_basic
            .column(0, { page: 'current' })
            .nodes()
            .to$()
            .each(function (cell, i) {
              cell.innerHTML = '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + cell.innerHTML + '"/><label class="form-check-label" for="checkbox' + cell.innerHTML + '"></label></div>';
            });
        }
      }, 300);
    });

    // When row click will redirect to edit page
//     dt_basic_table.on('click', 'tr', function () {
//     $(this).toggleClass('selected');
//     var rowData = dt_basic.row(this).data(); // Get data of the clicked row
//     populateEditModal(rowData); // Function to populate edit modal with row data
// });


dt_basic_table.on('click', '.item-edit', function () {

var userId = $(this).data('template-id');
var rowData =  findRowById(userId);
populateEditModal(rowData);
});

function findRowById(id) {
var rowData = null;
dt_basic.rows().every(function(index, element) {
var data = this.data();
if (data.id === id) {
    rowData = data;
    return false;
}
return true;
});
return rowData;
}




// Function to populate edit modal with row data
function populateEditModal(data) {
    $('#edit-hq-id').val(data.id); // Assuming 'name' is a property in your data
    $('#edit-hq-name').val(data.name); // Assuming 'name' is a property in your data
    // $('#edit-hq-logo').val(data.logo); // Assuming 'email' is a property in your data
    // Populate other fields as needed, such as roles dropdown
    $('#edit-hq-address').val(data.address); // Assuming 'roles' is an array with objects having an 'id' property

    // Show the edit modal
    $('#edit-modal').modal('show');

    // Event listener for edit submit button
    $('#edit-submit-btn').on('click', function () {
        var editedData = {
            id: data.id,
            name: $('#edit-hq-name').val(),
            logo: $('#edit-hq-logo').val(),
            address: $('#edit-hq-address').val(),
            status: $('#edit-hq-status').val(), // Assuming you handle password changes
            _method: 'PUT', // Laravel convention for HTTP method override
        };

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/headquarters/' + editedData.id, // Ensure the correct URL for updating the user
        type: 'POST', // Use POST with _method: 'PUT' for Laravel method override
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: editedData,
        dataType: 'json',
        success: function (response) {
            console.log('User updated successfully:', response);

            // Assuming 'dt_basic' is your DataTable instance
            // Update the DataTable row with new data
            var newRowData = {
                id: response.id,
                name: response.name,
                address: response.address,
                status: response.status // Assuming roles are returned as an array
            };

            var row = dt_basic.row(function (idx, data, node) {
                return data.id === response.id;
               });


               if (row.index() !== -1) {
        // Update the row data
        row.data({
            id: response.id,
            name: response.name,
            address: response.address,
            status: response.status
        }).draw();
    } else {
        console.error('Row with id ' + response.id + ' not found in DataTable.');
    }
            // Close the modal
            $('#edit-modal').modal('hide');
        },
        error: function (xhr, status, error) {
            console.error('Error updating user:', error);
        }
    });
});

}

    $('.dt-buttons .create-new').on('click', function (e) {
      e.preventDefault();

    });

    // When click on action button
    dt_basic_table.on('click', '.item-edit', function () {
      var closest_row = $(this).closest('tr');
      var row = dt_basic.row(closest_row).data();
    //   window.location.href = './edit.html?id=' + row.id;
    });

    // When click on delete record
    dt_basic_table.on('click', '.delete-record', function () {

        var headquarterId = $(this).data('headquarter-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/headquarters/' + headquarterId,
            type: 'delete',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },

            dataType: 'json',
            success: function(response) {
                console.log('User updated successfully:', response);
            $('#deleteModal').hide();
            },
            error: function(xhr, status, error) {
                console.error('Error updating user:', error);
            }
        });


      dt_basic.row($(this).parents('tr')).remove().draw();




    });



    $('#submit-btn').on('click', function() {
    var Name = $('#new-hq-name').val();
    var Logo = $('#new-hq-logo').val();
    var Address = $('#new-hq-address').val();
    var Status = $('#new-hq-status').val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var formData = new FormData();
    formData.append('name', Name);
    formData.append('address', Address);
    formData.append('status', Status);
    formData.append('logo', $('#new-hq-logo')[0].files[0]);

    var submitBtn = $(this); // Capture the button element

    $.ajax({
        url: '/headquarters',
        type: 'POST', // Corrected to POST for creating a new record
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: formData,
        contentType: false, // Required for sending FormData
        processData: false, // Required for sending FormData
        dataType: 'json',
        success: function(response) {
            console.log('Headquarters created successfully:', response);

            var logoUrl = '/storage/logos/' + response.logo;
            var logoHtml = '<img src="' + logoUrl + '" alt="' + response.name + '" style="max-width: 100px; max-height: 100px;">';

            var newRowData = {
                id: response.id,
                name: response.name,
                logo:logoHtml,
                address: response.address,
                status: response.status,
                created_at: response.created_at
            };

            dt_basic.row.add(newRowData).draw(); // Add new row and redraw DataTable

            $('#modals-slide-in').modal('hide'); // Close modal after success
        },
        error: function(xhr, status, error) {
            console.error('Error creating headquarters:', error);
        }
    });
});






    // Custom search
    $('#DataTable_Search').on('keyup', function () {
      dt_basic.search(this.value).draw();
    });

    // Custom select
    $('.dt-custom-select').on('change', function () {
      var col = $(this).data('column');
      dt_basic.column(col).search($(this).val()).draw();
    });

    // Print Button
    $('.dt-print-csv').on('click', function (e) {
      e.preventDefault();
      dt_basic.button(0).trigger();
    });

    // Export Button
    $('.dt-print-excel').on('click', function (e) {
      e.preventDefault();
      dt_basic.button(1).trigger();
    });

    // Archive
    $('.archive-record').on('click', function () {
      dt_basic.rows('.selected').remove().draw(false);
    });
    $('div.head-label').html('<h6 class="mb-0">Headquarters</h6>');

  }
});


</script>



<style>
    #basic-datatable{
    zoom: 80%;
}
</style>

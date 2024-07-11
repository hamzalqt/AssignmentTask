<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Users</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('Pages.extras.style')
</head>
<body style="overflow: none;"  class="horizontal-layout horizontal-menu content-left-sidebar navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">
    @include('headers.floatNav')
<hr style="padding-bottom: 4%">
    <section id="basic-datatable" style="margin-right:30px; margin-left:20px; " class="">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <table class="datatables-basic table">
              <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Created_at</th>
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
              <h5 class="modal-title" id="exampleModalLabel">New User</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                <input
                  type="text"
                  class="form-control dt-full-name"
                  id="new-user-name"
                  placeholder="John Doe"
                  aria-label="John Doe"
                />
              </div>

              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <input
                  type="text"
                  id="new-user-email"
                  class="form-control dt-email"
                  placeholder="john.doe@example.com"
                  aria-label="john.doe@example.com"
                />
              </div>

              <div class="mb-4">
                <label class="form-label" for="basic-icon-default-salary">Password</label>
                <input
                  type="password"
                  id="new-user-pass"
                  class="form-control dt-password"
                  placeholder="*********"

                />
              </div>

              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-role">Select Option</label>
                <select
                  id="new-user-role"
                  class="form-control dt-select"
                  aria-label="Select Option"
                >
                  <option value="" disabled selected>Select Role</option>
                  {{-- <option value="option1">None</option> --}}
           @foreach ($roles  as $role )
           <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach

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
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
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
                    <label class="form-label" for="edit-user-name">Full Name</label>
                    <input
                        type="text"
                        class="form-control dt-full-name"
                        id="edit-user-name"
                        placeholder="John Doe"
                        aria-label="John Doe"
                    />
                </div>

                <div class="mb-1">
                    <label class="form-label" for="edit-user-email">Email</label>
                    <input
                        type="text"
                        id="edit-user-email"
                        class="form-control dt-email"
                        placeholder="john.doe@example.com"
                        aria-label="john.doe@example.com"
                    />
                </div>

                <div class="mb-4">
                    <label class="form-label" for="edit-user-pass">Password</label>
                    <input
                        type="password"
                        id="edit-user-pass"
                        class="form-control dt-password"
                        placeholder="*********"
                    />
                </div>

                <div class="mb-1">
                    <label class="form-label" for="edit-user-role">Select Option</label>
                    <select
                        id="edit-user-role"
                        class="form-control dt-select"
                        aria-label="Select Option"
                    >
                        <option value="" disabled>Select Role</option>
                        <option value='0'>None</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
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



</body>
</html>



@include('Pages.extras.js')

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
        url: '/users', // Replace with your API endpoint
        type: 'GET',
        dataSrc: '' // Assuming your API directly returns the array of users
      },
      columns: [
//         {
//     data: null,
//     render: function (data, type, full, meta) {
//       return '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="' + full.id + '" id="checkbox' + full.id + '" /><label class="form-check-label" for="checkbox' + full.id + '"></label></div>';
//     },
//     orderable: false,
//     className: 'dt-body-center'
//   },
        { data: 'id' },
        { data: 'name' },
        { data: 'email' },
        {
    data: 'roles',
    render: function(data, type, full, meta) {
        if (Array.isArray(data) && data.length > 0) {
            return data[0].name;

        } else {

            return 'None';
        }
    }
},
        { data: 'created_at' },
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
                            'Delete</a>'+
              '</div>' +
              '</div>' +
              '<a id="edit-btn"  class="item-edit" data-user-id="' + full.id + '">' +
                feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
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
              exportOptions: { columns: [1, 2, 3] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3] }
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
          text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add New User',
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

    dt_basic_table.on('click', '.item-edit', function () {

var userId = $(this).data('user-id');
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
    $('#edit-user-name').val(data.name);
    $('#edit-user-email').val(data.email);
    if (data.roles && data.roles.length > 0) {
        $('#edit-user-role').val(data.roles[0].id);
    } else {
        $('#edit-user-role').val('');
    }
    $('#edit-modal').modal('show');

    $('#edit-submit-btn').on('click', function () {
        var editedData = {
            id: data.id,
            name: $('#edit-user-name').val(),
            email: $('#edit-user-email').val(),
            role_id: $('#edit-user-role').val(),
            password: $('#edit-user-pass').val(),
            _method: 'PUT',
        };

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/users/' + editedData.id, // Ensure the correct URL for updating the user
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
                email: response.email,
                roles: response.roles[0].name, // Assuming roles are returned as an array
                created_at: response.created_at,
            };


            var row = dt_basic.row(function (idx, data, node) {
        return data.id === response.id;
    });

    if (row.index() !== -1) {
        // Update the row data
        row.data({
              id: response.id,
                name: response.name,
                email: response.email,
                roles: response.roles[0].name,
                created_at: response.created_at,
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

        var userId = $(this).data('user-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/users/' + userId,
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
    var Name = $('#new-user-name').val();
    var Email = $('#new-user-email').val();
    var RoleId = $('#new-user-role').val();
    var password = $('#new-user-pass').val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var submitBtn = $(this); // Capture the button element

    $.ajax({
        url: '/users/create',
        type: 'GET', // Corrected to POST for creating a new record
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            name: Name,
            email: Email,
            role: RoleId,
            password: password
        },
        dataType: 'json',
        success: function(response) {
            console.log('User created successfully:', response);

            // Add the new row to the DataTable
            var newRowData = {
                id: response.id,
                name: response.name,
                email: response.email,
                roles: response.roles[0].name, // Assuming roles are returned as an array
                created_at: response.created_at,
            };

            dt_basic.row.add(newRowData).draw(); // Add new row and redraw DataTable

            $('#modals-slide-in').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('Error creating user:', error);
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
    $('div.head-label').html('<h6 class="mb-0">User Managment</h6>');

  }
});
</script>



<style>
    #basic-datatable{
    zoom: 90%;
}
</style>

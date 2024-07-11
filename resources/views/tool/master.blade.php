<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('Pages.extras.style')
</head>


    {{-- @include('headers.navbar') --}}

@include('headers.floatNav')
<hr style="padding: 2%">

<body  class="horizontal-layout horizontal-menu  footer-static" data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">

    <section id="basic-datatable" class="" style="margin-right:30px; margin-left:20px;">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <table class="datatables-basic table">
              <thead>
                  <tr>

                  <th>Sno.</th>
                  <th>Type</th>
                  <th>Method</th>
                  <th>Size</th>
                  <th>Serial</th>
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
              <h5 class="modal-title" id="exampleModalLabel">New Template</h5>
            </div>
            <div class="modal-body flex-grow-1">

                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-role">Select Type</label>
                    <select
                      id="type"
                      class="form-control dt-select"
                      aria-label="Select Option"
                    >
                      <option value="" disabled selected>Select Role</option>
                <option value="Single" selected>Single</option>
               <option value="Multi">Multi</option>


                    </select>
                  </div>


              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Size</label>
                <input
                  type="text"
                  class="form-control dt-full-name"
                  id="size"
                  placeholder="Enter Size"
                  aria-label="88"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Serial</label>
                <input
                  type="text"
                  id="serial"
                  class="form-control dt-email"
                  placeholder="Enter Serial"

                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Method</label>
                <input
                  type="text"
                  id="method"
                  class="form-control dt-email"
                  placeholder="Enter Method"

                />
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Template</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-role">Select Type</label>
                    <select
                      id="type-upd"
                      class="form-control dt-select"
                      aria-label="Select Option"
                    >
                      <option value="" disabled selected>Select Role</option>
                <option value="Single" selected>Single</option>
               <option value="Multi">Multi</option>


                    </select>
                  </div>


              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Size</label>
                <input
                  type="text"
                  class="form-control dt-full-name"
                  id="size-upd"
                  placeholder="Enter Size"
                  aria-label="88"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Serial</label>
                <input
                  type="text"
                  id="serial-upd"
                  class="form-control dt-email"
                  placeholder="Enter Serial"

                />
              </div>

              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Method</label>
                <input
                  type="text"
                  id="method-upd"
                  class="form-control dt-email"
                  placeholder="Enter Method"

                />
              </div>

              {{-- <div class="mb-4">
                <label class="form-label" for="basic-icon-default-salary">Add to master</label>
                <input
                  type="checkbox"
                  id="master-upd"
                  class="form-control dt-password"
               />
              </div> --}}



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
        url: '/master-templates',
        type: 'GET',
        dataSrc: ''
      },
      columns: [

        { data: 'id' },
        { data: 'type' },
        { data: 'method' },
        { data: 'size' },
        { data: 'serial' },

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

'<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown" >' +
feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
'</a>' +
'<div class="dropdown-menu dropdown-menu-end">' +

'<a href="javascript:;" class="dropdown-item delete-record" data-template-id="' + full.uid + '">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
              'Delete</a>'+
'</div>' +
'</div>' +
'<a id="edit-btn"  class="item-edit"  data-template-id="' + full.uid + '">' +
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
          className: 'create-new btn btn-primary ms-1',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in',
            'data-bs-backdrop':false

          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        },

        {
    text: feather.icons['filter'].toSvg({ class: 'me-50 font-small-4' }) + 'Filter Type:',
    className: 'btn btn-primary ms-1',
    action: function (e, dt, node, config) {
        e.stopPropagation(); // Stop event propagation to prevent hiding the select

        // Create select input
        var select = $('<select class="form-select form-select-sm"><option value="">All</option><option value="Single">Single</option><option value="Multi">Multi</option></select>')
            .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                dt.column(1).search(val ? '^' + val + '$' : '', true, false).draw();

                // Update the selected option in the dropdown
                $(this).val(val); // Set the dropdown value to the selected option
            });

        // Append select to button node and focus
        $(node).empty().append(select);
        select.focus();
    }
}



      ]
    });


    // dt_basic_table.on('draw.dt', function () {
    //   setTimeout(function () {
    //     if (!$('.dt-checkboxes').length) {
    //       dt_basic
    //         .column(0, { page: 'current' })
    //         .nodes()
    //         .to$()
    //         .each(function (cell, i) {
    //           cell.innerHTML = '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + cell.innerHTML + '"/><label class="form-check-label" for="checkbox' + cell.innerHTML + '"></label></div>';
    //         });
    //     }
    //   }, 300);
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
if (data.uid == id) {
    rowData = data;
    return false;
}
return true;
});
return rowData;
}

// Function to populate edit modal with row data
function populateEditModal(data) {
    $('#type-upd').val(data.type); // Assuming 'name' is a property in your data
    $('#size-upd').val(data.size); // Assuming 'name' is a property in your data
    $('#method-upd').val(data.method); // Assuming 'email' is a property in your data
    // Populate other fields as needed, such as roles dropdown
    $('#serial-upd').val(data.serial); // Assuming 'roles' is an array with objects having an 'id' property

    // Show the edit modal
    $('#edit-modal').modal('show');

    // Event listener for edit submit button
    $('#edit-submit-btn').on('click', function () {
        var editedData = {
            id: data.uid,
            type: $('#type-upd').val(),
            size: $('#size-upd').val(),
            method: $('#method-upd').val(),
            serial: $('#serial-upd').val(), // Assuming you handle password changes
            _method: 'PUT', // Laravel convention for HTTP method override
        };

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/master-templates/' + editedData.id, // Ensure the correct URL for updating the user
        type: 'POST', // Use POST with _method: 'PUT' for Laravel method override
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: editedData,
        dataType: 'json',
        success: function (response) {
            console.log('User updated successfully:', response);


            var newRowData = {
                id: response.id,
                type: response.type,
                serial: response.serial,
                method: response.method,
                size: response.size,
            };


            var row = dt_basic.row(function (idx, data, node) {
        return data.id === response.id;
    });

    if (row.index() !== -1) {
        // Update the row data
        row.data({
            id: response.id,
            type: response.type,
            serial: response.serial,
            method: response.method,
            size: response.size,
        }).draw();
    } else {
        console.error('Row with id ' + response.id + ' not found in DataTable.');
    }



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

        var templateId = $(this).data('template-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/master-templates/' + templateId,
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
        var type = $('#type').val();
                var size = $('#size').val();
                var serial = $('#serial').val();
                var method = $('#method').val();
                var master = $('#master').is(':checked') ? 1 : 0;

    var submitBtn = $(this); // Capture the button element
    var formData = {
                    type: type,
                    size: size,
                    serial: serial,
                    method: method,
                    master:0,
                };
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/master-templates/create',
        type: 'GET', // Corrected to POST for creating a new record
        data:formData,
        dataType: 'json',
        success: function(response) {
            console.log('User created successfully:', response);

            // Add the new row to the DataTable
            var newRowData = {
                id: response.id,
                type: response.type,
                serial: response.serial,
                method: response.method,
                size: response.size,
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
    $('div.head-label').html('<h6 class="mb-0">Master Templates</h6>');

  }
});




</script>





<style>
   #basic-datatable{
    zoom: 80%;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Templates</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('Pages.extras.style')
</head>


    {{-- @include('headers.navbar') --}}

@include('headers.floatNav')
<hr style="padding: 2%">

<body  class="horizontal-layout horizontal-menu content-left-sidebar navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Master Templates</h5>
            <button
              type="button"
              class="btn-close text-reset"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="">
            <table  id="sidebar" class="dataTable" >
                <thead>
                    <tr class="bg-gray-800  text-black">
                        <th></th>
                        <th class="px-8 py-2">Type</th>
                        <th class="px-8 py-2">Size</th>
                        <th class="px-8 py-2">Method</th>
                        <th class="px-8 py-2">Serial</th>
                    </tr>
                </thead>
                <tbody id="masterTable" >

                </tbody>
            </table>


          </div>
        </div>

    <section id="basic-datatable" class="">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <table class="datatables-basic table" id="master-table">
              <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Serial</th>
                  <th>Method</th>
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

              <div class="mb-4">

                <input id="master" type="checkbox" class="mt-0.5">
                <label for="">Add to master</label>

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

    function getIdFromUrl() {
        var url = window.location.href;
        var params = url.split('/');
        var id = params[params.length - 2];

        return id;
    }

    var hq_id = getIdFromUrl();


    var dt_basic = dt_basic_table.DataTable({
      ajax: {
        url: '/templates/'+hq_id, // Replace with your API endpoint
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
        { data: 'type' },
        { data: 'size' },
        { data: 'serial' },
        { data: 'method' },

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

'<a href="javascript:;" class="dropdown-item delete-record" data-template-id="' + full.uid + '">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
              'Delete</a>'+
'</div>' +
'</div>' +
'<a id="edit-btn"  class="item-edit" data-template-id="' + full.uid + '">' +
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
        className: 'create-new btn btn-primary',
        attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
        },
        init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
        }
    },
    {
        text: feather.icons['star'].toSvg({ class: 'me-50 font-small-4' }) + 'Master',
        className: 'btn btn-primary ms-1',
        attr: {
            'data-bs-toggle': 'offcanvas',
            'data-bs-target': '#offcanvasEnd',
            'aria-controls': 'offcanvasEnd'
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
            });

        // Append select to button node and focus
        $(node).empty().append(select);
        select.focus();
    }
}



      ]
    });

    // Event listeners and custom functions can remain the same as in your original script
    // Add checkbox for all
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

    // When row click will open edit modal
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
    $('#type-upd').val(data.type);
    $('#size-upd').val(data.size);
    $('#method-upd').val(data.method);
    $('#serial-upd').val(data.serial);

    // Show the edit modal
    $('#edit-modal').modal('show');

    // Event listener for edit submit button
    $('#edit-submit-btn').on('click', function () {
        var editedData = {
            id: data.uid,
            type: $('#type-upd').val(),
            size: $('#size-upd').val(),
            method: $('#method-upd').val(),
            serial: $('#serial-upd').val(),
            _method: 'PUT',
        };

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/templates/' + editedData.id,
        type: 'POST',
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
                    $('.item-edit').modal('hide');

    } else {
        console.error('Row with id ' + response.id + ' not found in DataTable.');
    }
        },
        error: function (xhr, status, error) {
            console.error('Error updating user:', error);
        }
    });
});

}

    // $('.dt-buttons .create-new').on('click', function (e) {
    //   e.preventDefault();

    // });

    // When click on action button
    // dt_basic_table.on('click', '.create-new', function () {
    //   var closest_row = $(this).closest('tr');
    //   var row = dt_basic.row(closest_row).data();
    //   window.location.href = './edit.html?id=' + row.id;
    // });


//     $('.item-edit').click(function(event) {
//         event.preventDefault();
//         var userId = $(this).data('template-id');

//         alert(userId);
//         // var rowData = dt_basic.row($(this).closest('tr')).data();
//         // populateEditModal(rowData);
// });


    // When click on delete record
    dt_basic_table.on('click', '.delete-record', function () {

        var userId = $(this).data('template-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/templates/' + userId,
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
                    master:master,
                    headquarter_id:hq_id,
                };
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/templates/create',
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

            dt_basic.row.add(newRowData).draw();
         getMasterTemplate();
            $('#modals-slide-in').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('Error creating user:', error);
        }
    });
});

$(document).ready(function() {
getMasterTemplate();
})




function getMasterTemplate(){
    $.ajax({
                type: 'GET',
                url: '/master-templates',
                success: function(response) {
                    var tableBody = $('#masterTable');
                    tableBody.empty();


                    response.forEach(function(item) {


                var hasCheckedTemplate=false;
                        var masterId=item.id;
                        if (item.templates && item.templates.length > 0) {
                item.templates.forEach(function(template) {
                    if (template.master == masterId && template.headquarter_id == hq_id) {
                        hasCheckedTemplate = true;
                    }
                });
            }
                            var checkboxOrTick = hasCheckedTemplate ?
                '<svg class="tick-svg size-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" fill="currentColor" /></svg>' :
                '<input type="checkbox" class="item-checkbox" data-id="' + item.id + '">';


                var row = '<tr data-item-id="' + item.id + '">' +
                // '<td data-id="' + item.id + '"><input type="checkbox" class="item-checkbox"></td>' +
                 '<td>' + checkboxOrTick + '</td>' +
                 '<td>' + item.type + '</td>' +
                '<td>' + item.size + '</td>' +
                '<td>' + item.method + '</td>' +
                '<td>' + item.serial + '</td>' +
                '</tr>';

              tableBody.append(row);
                    });

    tableBody.find('.item-checkbox').change(function() {
            if ($(this).prop('checked')) {

                var id = $(this).data('id');

var isChecked = $(this).prop('checked');
var csrfToken = $('meta[name="csrf-token"]').attr('content');

function getIdFromUrl() {
var url = window.location.href;
var params = url.split('/');
var id = params[params.length - 2];

return id;
}
var headquarter_id = getIdFromUrl();

$.ajax({
url: '/master/to/template/' + id,
method: 'PUT',
headers: {
 'X-CSRF-TOKEN': csrfToken
       },
data: {
     status: 'checked',
     'headquarter_id':headquarter_id,

 },
success: function(response) {
getMasterTemplate();
         var newRowData = {
                id: response.id,
                type: response.type,
                serial: response.serial,
                method: response.method,
                size: response.size,
            };

            dt_basic.row.add(newRowData).draw();
},
error: function(xhr, status, error) {
    console.error('API call error:', error);
}
});

            }

        });

                }
})













}





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
    $('div.head-label').html('<h6 class="mb-0">Templates</h6>');


  }
});




</script>









<style>
    #sidebarTable {
            width: 100%;
            border-collapse: collapse;

        }

        #sidebarTable th,
        td {
            padding: 8px 12px;
        }

        #sidebarTable th {
            background-color: #f4f4f4;
        }

        .type-tag {
            display: inline-block;
            padding: 4px 8px;
            margin-right: 4px;
            color: white;
            border-radius: 4px;
        }

        .type-single {
            background-color: #3498db;
        }

        .type-multi {
            background-color: #e74c3c;
        }


        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3f4f6;
            color: #374151;
        }

        /* .container {
            max-width: 1200px;
            margin: 0 auto;
        } */



        /* DataTable Styles */
        #sidebarTable.dataTable {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;

        }

        #sidebarTable.dataTable thead th {
            background-color: #1a202c;
            color: #ffffff;
            font-weight: bold;
            text-align: left;
            padding: 1rem;
            border-bottom: 2px solid #cbd5e0;
        }

        #sidebarTable.dataTable tbody td {
            padding: 1rem;
            border-bottom: 1px solid #cbd5e0;
        }






        /* Sidebar Styles */
        #sidebar {
            /* position: fixed; */
            top: 0;
            right: 0;
            /* width: 180%; */
            /* Change to width: 100% for fullscreen sidebar */
            height: 100%;
            background-color: #f3f4f6;
            overflow-x: hidden;
            transition: width 0.5s ease;
            /* z-index: 999; */
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);

        }


/* html{
zoom: 70%;
} */

    </style>



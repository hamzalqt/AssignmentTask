<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Head Quarter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('headers.navbar')

    <button id="createNew" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mt-3 ml-3">Create Location</button>

<div id="createLocation" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden translate-x-52 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3  class="text-xl font-semibold text-gray-900 dark:text-white">
                Create New Location
              </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div  class="p-4 md:p-5 space-y-4">

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="location-name" type="text" id="new-user-name"  name="name"  placeholder="Enter Name"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label  class="block text-sm font-medium text-gray-700">Address</label>
                    <input id="location-address" type="text" id="new-user-email"  name="address"  placeholder="Enter Email"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label  class="block text-sm font-medium text-gray-700">Contact</label>
                    <input id="location-contact" type="text" id="new-user-pass"  name="contact"  placeholder="Enter Logo"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label  class="block text-sm font-medium text-gray-700">Status</label>
                    <input  id="location-status" type="text" id="new-user-pass"  name="status"  placeholder="Enter status"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

            <div class="mb-4">
                <label for="userRole" class="block text-sm font-medium text-gray-700">HeadQuarter</label>
                <select  id="location-hq" name="role_id"
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" disabled selected>Select HeadQuarter</option>
                @foreach ($headquarters as $hq )
                <option value="{{ $hq->id }}">{{ $hq->name }}</option>
                @endforeach

                </select>
        </div>

            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button id="createLocationBtn"  data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
            </div>

    </div>
</div>
</div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Contact
                </th>
                <th scope="col" class="px-6 py-3">
                    HeadQuarter
                </th>
                <th scope="col" class="px-6 py-3">
                 Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @isset($locations)

            @foreach ($locations as $loc )

            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loc->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $loc->address }}
                </td>
                <td class="px-6 py-4">
                    {{ $loc->contact }}
                </td>
                <td  class="px-6 py-4">
                    {{ $loc->headQuarter->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $loc->status }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" data-loc-id="{{ $loc->id }}"  class="showEditModal font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" data-loc-id="{{ $loc->id }}"  class="showDeleteModal  font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                </td>
            </tr>
            @endforeach

            @endisset

        </tbody>
    </table>
</div>


{{-- --------------------------------------------------------------------------------- --}}
<div id="updateLoc" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden translate-x-52 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3  class="text-xl font-semibold text-gray-900 dark:text-white">
                Update Location
              </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div  id="hq-edit" class="p-4 md:p-5 space-y-4">



            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button id="updateLocBtn"  data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-hide="default-modal">
                    No, cancel
                </button>

                <button id="confirmDelete"  type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Yes, I'm sure
                </button>

            </div>
        </div>
    </div>
</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
       $('[data-modal-hide="default-modal"]').click(function() {
        $("#createLocation").hide();
        $("#deleteModal").hide();
        $("#updateLoc").hide();



    });
 $(document).ready(function(){

$('#createNew').click(function(e){
    e.preventDefault();

    $('#createLocation').show();

    $('#createLocationBtn').click(function(e) {


var name = $('#location-name').val();
var address = $('#location-address').val();
var contact = $('#location-contact').val();
var status = $('#location-status').val();
var hq = $('#location-hq').val();
var csrfToken = $('meta[name="csrf-token"]').attr('content');

$.ajax({
            url: '/create/loc',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                name: name,
                address: address,
                contact:contact,
                status:status,
                headquarter_id:hq,
},
            dataType: 'json',
            success: function(response) {
                console.log('User updated successfully:', response);
             },
            error: function(xhr, status, error) {
                console.error('Error updating user:', error);
            }
        });

   });
});
});



$(document).ready(function(){
        $('.showDeleteModal').click(function(e) {
            e.preventDefault();
            var locId = $(this).data('loc-id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
             $("#deleteModal").show();
             $('#confirmDelete').click(function(e) {
                $.ajax({
            url: '/location/delete/' + locId,
            type: 'DELETE',
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
    });
});
})


// update location
$(document).ready(function() {
        var headQuarterId = null;
        $('.showEditModal').click(function(e) {
             locId = $(this).data('loc-id');
             $.ajax({
            url: '/get/loc/' + locId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {

            var location=null;
                 location = response;
                 console.log(location);

                 var Data =
                `
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="loc-name" value=${location.name} type="text" id="new-user-name"  name="name"  placeholder="Enter Name"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label  class="block text-sm font-medium text-gray-700">Address</label>
                    <input value=${location.address} id="loc-address" type="text" id="new-user-email"  name="address"  placeholder="Enter Email"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
<div class="mb-4">
                    <label  class="block text-sm font-medium text-gray-700">Contact</label>
                    <input value=${location.contact}  id="loc-status" type="text" id="new-user-pass"  name="status"  placeholder="Enter status"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label  class="block text-sm font-medium text-gray-700">Status</label>
                    <input value=${location.status}  id="loc-status" type="text" id="new-user-pass"  name="status"  placeholder="Enter status"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                `;
                $('#hq-edit').append(Data);

            }
             })

            $('#updateLoc').show();

            $('#updateLocBtn').click(function() {
        var updatedName = $('#loc-name').val();
        var updatedAddress = $('#loc-address').val();
        var updatedContact = $('#loc-contact').val();
        var updatedStatus = $('#loc-status').val();

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/location/update',
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: locId,
                name: updatedName,
                address: updatedAddress,
                contact: updatedContact,
                status:updatedStatus
            },
            dataType: 'json',
            success: function(response) {
                console.log('User updated successfully:', response);            },
            error: function(xhr, status, error) {
                console.error('Error updating user:', error);
            }
        });
    });






        })
    })


</script>

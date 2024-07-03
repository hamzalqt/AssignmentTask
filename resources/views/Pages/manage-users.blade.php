<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
@include('headers.navbar')

<div class="container mx-auto px-4 sm:px-6 mt-8 lg:px-8 py-8">
    <table id="example" class="table-auto w-full">
        <thead>
            <tr class="bg-gray-700">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">created</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($users)

        @foreach ($users as $user )
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->roles[0]->name }}</td>
                <td class="border px-4 py-2">{{ $user->created_at->diffForHumans() }}</td>
            <td class="flex justify-center space-x-4">
                <a href="#" id="showEditModel" data-user-id="{{ $user->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>

                </a>

                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                </a>
            </td>
            </tr>
            @endforeach

            @endisset


        </tbody>
    </table>


<!-- Modal toggle -->


  <!-- Main modal -->
  <div id="EditModel" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden translate-x-52 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3  class="text-xl font-semibold text-gray-900 dark:text-white">
                  Update
                </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <div id="upd" class="p-4 md:p-5 space-y-4">

                {{-- <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" id="userEmail" name="email" placeholder="Enter your email"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div> --}}
                {{-- <div class="mb-4">
                    <label for="roles-select" class="block text-sm font-medium text-gray-700">Roles</label>
                    <select id="userRole" name="role_id"
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select a role</option> --}}
                        {{-- @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach --}}
                        {{-- <option>admin</option>
                        <option>super-admin</option>

                    </select>
                </div> --}}


              </div>
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button id="updateUserBtn"  data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                  <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
              </div>
          </div>
      </div>
  </div>


</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });

$('[data-modal-hide="default-modal"]').click(function() {
        $("#EditModel").hide();
    });

$(document).ready(function() {
        $('#showEditModel').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');

            $.ajax({
            url: '/get/user/' + userId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var user = response.user;
                // $('#userName').text(user.name);
                // $('#userEmail').text(user.email);
                // // $('#userRole').text('Email: ' + user.email);

                var Data =
                `
                                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="userName" name="name" value=${user.name} placeholder="name"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                 <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="userEmail" name="name" value=${user.email} placeholder="email"
                           class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

<div class="mb-4">
            <label for="userRole" class="block text-sm font-medium text-gray-700">Roles</label>
            <select id="userRole" name="role_id"
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Select a role</option>`;

    // Append roles options to select dropdown
    response.roles.forEach(role => {
        Data += `<option value="${role.id}" ${(role.name === user.roles[0].name) ? 'selected' : ''}>${role.name}</option>`;
    });

    Data +=
            `</select>
        </div>`;


                $('#upd').append(Data);
                $("#EditModel").show();


                $('#updateUserBtn').click(function() {
        var updatedName = $('#userName').val();
        var updatedEmail = $('#userEmail').val();
        var updatedRoleId = $('#userRole').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/update/user',
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: user.id,
                name: updatedName,
                email: updatedEmail,
                role_id: updatedRoleId
            },
            dataType: 'json',
            success: function(response) {
                // Handle success response
                console.log('User updated successfully:', response);
                // Optionally update UI or redirect after successful update
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error updating user:', error);
            }
        });
    });




            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status, error);
            }
        });



        });
    });


</script>




</body>
</html>



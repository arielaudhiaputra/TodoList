<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ToDoList
        </h2>
    </x-slot>


    <div class="container w-full px-3 py-6 mx-auto mt-12 ">
        <form class="w-full  justify-end flex flex-row lg:gap-3 gap-4 md:gap-8" id="listForm">
            @csrf
            <div class="mb-5 me-3">
                <label for="name" class="block mb-2 text-md font-bold text-gray-900">Lists Kamu</label>
                <input type="text" name="name" id="name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="ketik list kamu" required />
            </div>
            <div class="mb-5">
                <label for="status" class="block mb-2 text-md font-bold text-gray-900">Select opsi</label>
                <select id="status" name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 pe-10 py-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option id="pilih" selected>Pilih status</option>
                    <option value="1">List</option>
                    <option value="2">Proses</option>
                    <option value="3">Success</option>
                </select>
            </div>
            <div class="mt-8">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>

    <div class="container py-8 w-full mx-auto">
        <div class="w-full flex flex-row p-4 mx-auto gap-4 md:gap-8 justify-center">

            <div class="bg-white shadow-sm sm:rounded-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="listSuccessTable">
                    <thead class="text-md text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                List Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listSuccess as $ls)
                            <tr class="text-white border-b" style="background-color: green;">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $ls->name }}
                                </th>
                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                    <div class="flex flex-rwo gap-2 md:gap-2">
                                        <button name="statusUp" id="statusUp" value="2, {{ $ls->id }}"
                                            class="p-3 bg-yellow-400 rounded-md statusUp"></button>
                                        <button name="statusUp" id="statusUp" value="1, {{ $ls->id }}"
                                            class="p-3 bg-gray-50 rounded-md statusUp"></button>
                                        <button name="deletList" id="deletList"
                                            class="p-2 bg-red-500 text-white rounded-md deletList font-bold ">X</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




            <div class="bg-white shadow-sm sm:rounded-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="listProgressTable">
                    <thead class="text-md text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                List Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listProgress as $lp)
                            <tr class="text-gray-900 border-b" style="background-color: yellow;">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $lp->name }}
                                </th>
                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                    <div class="flex flex-rwo gap-2 md:gap-2">
                                        <button name="statusUp" id="statusUp" value="3, {{ $lp->id }}"
                                            class="p-3 bg-green-500 rounded-md statusUp"></button>
                                        <button name="statusUp" id="statusUp" value="1, {{ $lp->id }}"
                                            class="p-3 bg-gray-50 rounded-md statusUp"></button>
                                        <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            <div class="bg-white shadow-sm sm:rounded-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="listTable">
                    <thead class="text-md text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                List Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $l)
                            <tr class="text-gray-900 border-t">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $l->name }}
                                </th>
                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                    <div class="flex flex-rwo gap-2 md:gap-2">
                                        <button name="statusUp" id="statusUp" value="3, {{ $l->id }}"
                                            class="p-3 bg-green-500 rounded-md statusUp"></button>
                                        <button name="statusUp" id="statusUp" value="2, {{ $l->id }}"
                                            class="p-3 bg-yellow-500 rounded-md statusUp"></button>
                                        <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#name').val("");
                        $('#status').val('Pilih status');

                        if (data.data.status == 1) {
                            $('#listTable tbody').append(`
                                <tr class="text-gray-900 border-t">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        ${data.data.name}
                                    </th>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap">
                                        <div class="flex flex-rwo gap-2 md:gap-2">
                                            <button name="statusUp" class="p-3  bg-green-500 rounded-md statusUp" id="statusUp" value="3 , ${data.data.id}"></button>
                                            <button name="statusUp" class="p-3 bg-yellow-500 rounded-md statusUp" id="statusUp" value="2,  ${data.data.id}"></button>
                                            <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        } else if (data.data.status == 2) {
                            $('#listProgressTable tbody').append(`
                                <tr class="text-gray-900 border-b" style="background-color: yellow;">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        ${data.data.name}
                                    </th>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap">
                                        <div class="flex flex-rwo gap-2 md:gap-2">
                                            <button name="statusUp" class="p-3 bg-green-500 rounded-md statusUp" id="statusUp" value="3,  ${data.data.id}"></button>
                                            <button name="statusUp" class="p-3  bg-gray-50 rounded-md statusUp" id="statusUp" value="1,  ${data.data.id}"></button>
                                            <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        } else {
                            $('#listSuccessTable tbody').append(`
                                <tr class="text-white border-b" style="background-color: green;">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        ${data.data.name}
                                    </th>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap">
                                        <div class="flex flex-rwo gap-2 md:gap-2">
                                            <button name="statusUp" class="p-3 bg-yellow-500 rounded-md statusUp" id="statusUp" value="2  ${data.data.name}" ></button>
                                            <button name="statusUp" class="p-3 bg-gray-50 rounded-md statusUp" id="statusUp" value="1,  ${data.data.name}"></button>
                                            <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });

        $(document).ready(function() {
            // Gunakan event delegation untuk menangani klik pada tombol dengan kelas .statusUp
            $(document).on('click', '.statusUp', function(e) {
                let button = $(this); // Simpan referensi tombol yang diklik
                let values = button.val().split(',');
                let status = values[0];
                let id = values[1];
                let row = button.closest('tr'); // Ambil baris yang berisi tombol yang diklik

                $.ajax({
                    url: "{{ route('update.list') }}",
                    type: "GET",
                    data: {
                        idList: id,
                        idStatus: status
                    },
                    success: function(data) {
                        // Hapus baris dari tabel yang sesuai
                        row.remove();
                        // Menambahkan baris ke tabel yang sesuai
                        if (data.data.status == 1) {
                            $('#listTable tbody').append(`
                        <tr class="text-gray-900 border-t">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                ${data.data.name}
                            </th>
                            <td class="px-6 py-4 font-medium whitespace-nowrap">
                                <div class="flex flex-rwo gap-2 md:gap-2">
                                    <button name="statusUp" class="p-3  bg-green-500 rounded-md statusUp" id="statusUp" value="3, ${data.data.id}"></button>
                                    <button name="statusUp" class="p-3 bg-yellow-500 rounded-md statusUp" id="statusUp" value="2,  ${data.data.id}"></button>
                                    <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                </div>
                            </td>
                        </tr>
                    `);
                        } else if (data.data.status == 2) {
                            $('#listProgressTable tbody').append(`
                        <tr class="text-gray-900 border-b" style="background-color: yellow;">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                ${data.data.name}
                            </th>
                            <td class="px-6 py-4 font-medium whitespace-nowrap">
                                <div class="flex flex-rwo gap-2 md:gap-2">
                                    <button name="statusUp" class="p-3 bg-green-500 rounded-md statusUp" id="statusUp" value="3,  ${data.data.id}"></button>
                                    <button name="statusUp" class="p-3  bg-gray-50 rounded-md statusUp" id="statusUp" value="1,  ${data.data.id}"></button>
                                    <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                </div>
                            </td>
                        </tr>
                    `);
                        } else {
                            $('#listSuccessTable tbody').append(`
                        <tr class="text-white border-b" style="background-color: green;">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                ${data.data.name}
                            </th>
                            <td class="px-6 py-4 font-medium whitespace-nowrap">
                                <div class="flex flex-rwo gap-2 md:gap-2">
                                    <button name="statusUp" class="p-3 bg-yellow-500 rounded-md statusUp" id="statusUp" value="2  ${data.data.id}" ></button>
                                    <button name="statusUp" class="p-3 bg-gray-50 rounded-md statusUp" id="statusUp" value="1,  ${data.data.id}"></button>
                                    <button name="deleteList" id="deleteList"
                                            class="p-2 bg-red-500 text-white rounded-md deleteList font-bold ">X</button>
                                </div>
                            </td>
                        </tr>
                    `);
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                    }
                });
            });
        });

        $(document).ready(function() {
            // Fungsi untuk menangani klik tombol delete
            $(document).on('click', '.deleteList', function(e) {
                let button = $(this); // Simpan referensi tombol yang diklik
                let id = button.siblings('.statusUp').val().split(',')[
                    1]; // Ambil id dari value tombol statusUp yang terkait
                let row = button.closest('tr'); // Ambil baris yang berisi tombol yang diklik

                // Permintaan AJAX untuk menghapus data
                $.ajax({
                    url: "{{ route('delete.list') }}",
                    type: "GET",
                    data: {
                        idList: id
                    },
                    success: function(data) {
                        console.log(data.status);
                        // Hapus baris dari tabel yang sesuai
                        row.remove();
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                    }
                });
            });
        });
    </script>
</x-app-layout>

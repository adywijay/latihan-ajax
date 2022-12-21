@extends('base.kerangka_panggil')
@section('list_content')
    <div class="row">
        <div id="man" class="col s12">
            <div class="card material-table" style="border-radius: 5px;">
                <div class="table-header">
                    <span class="table-title">
                        List data access / roles</span>
                    <div class="actions">
                        <a href="javascript:void(0)" onclick="addRole()" class="modal-trigger btn-flat nopadding"><i
                                class="material-icons">enhanced_encryption</i></a>
                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i
                                class="material-icons">search</i></a>
                    </div>
                </div>
                <table id="datatable" class="responsive-table" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Access Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="jbt-for-crud">
                        @foreach ($data_role as $isi)
                            <tr id="jid{{ $isi->id }}">
                                <td>{{ $isi->id }}</td>
                                <td>{{ $isi->access_name }}</td>
                                <td>
                                    <a href="javascript:void(0)" onclick="editRole({{ $isi->id }})"
                                        class="modal-trigger btn-floating btn-small waves-effect waves-light blue nopadding"><i
                                            class="medium material-icons white-text">edit</i></a>

                                    <a href="javascript:void(0)" onclick="delRole({{ $isi->id }})"
                                        class="btn-floating btn-small waves-effect waves-light red nopadding"><i
                                            class="medium material-icons white-text">delete</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal 1 (for add data)-->
    <div id="modal1" class="modal">
        <div class="modal-content" style="border-radius: 5px;">
            <div>
                <h4 id="header-modal-1" class="center-align"></h4>
            </div>
            <form id="role-form">
                @csrf
                <div class="input-field col s6">
                    <input placeholder="IT - Dev, Ops, Sec Etc" id="access_name" type="text" class="validate"
                        required="">
                    <label id="access_name" for="access_name">Nama Akses</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder=" " id="access_desc" type="text" class="validate" required="">
                    <label id="access_desc" for="access_desc">Deskripsi Akses</label>
                </div>
                <div class="modal-footer">
                    <button id="submit" class="btn waves-effect waves-light" type="submit">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal 1-->

    <!-- Modal 2 (for add edit data)-->
    <div id="modal2" class="modal">
        <div class="modal-content" style="border-radius: 5px;">
            <div>
                <h4 id="header-modal-2" class="center-align"></h4>
            </div>
            <br />
            <form id="role-form-edit">
                @csrf
                <input type="hidden" name="id" id="id" />
                <div class="input-field col s6">
                    <input placeholder="IT - Dev, Ops, Sec Etc" id="access_name2" type="text" class="validate"
                        required="">
                    <label id="access_name2" for="access_name2">Kode Jabatan</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder=" " id="access_desc2" type="text" class="validate" required="">
                    <label id="access_desc2" for="access_desc2">Nama Jabatan</label>
                </div>
                <div class="modal-footer">
                    <button id="submit" class="btn waves-effect waves-light red" type="submit">Simpan
                    </button>
                    <a href="javascript:void(0)" onclick="tutup()" class="btn waves-effect waves-light red">Close</a>
                </div>
            </form>
        </div>
    </div>

    <script type='text/javascript'>
        /**
         * Funngsi untuk keperluan penambahan data
         */
        function tutup() {
            $('#modal2').modal('close');
        }

        //panggil button dgn melewatkan link
        function addRole() {
            $('#header-modal-1').html("form tambah data role");
            $('#modal1').modal('open');
        }

        $('#role-form').on('submit', function(event) {
            event.preventDefault();
            access_name = $('#access_name').val();
            access_desc = $('#access_desc').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('jabatan/addroles') }}", //Define Post URL
                dataType: 'json',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    access_name: access_name,
                    access_desc: access_desc
                },
                success: function(response) {
                    $('#modal1').modal('close'),
                        alert(response['message']),
                        window.location.reload();
                }
            })
        })


        /**
         * Fungsi untuk keperluan edit data
         */

        //panggil button dgn melewatkan link
        function editRole(id) {
            $.get('get_role_view_edit/' + id, function(data) {
                $('#header-modal-2').html("form edit data roles");
                $("#modal2").modal('open');
                $("#id").val(data.id);
                $("#access_name2").val(data.access_name);
                $("#access_desc2").val(data.access_desc);
            })
        }

        //runner button action submit form edit data
        $('#role-form-edit').on('submit', function(event) {
            event.preventDefault();
            id = $('#id').val();
            access_name = $('#access_name2').val();
            access_desc = $('#access_desc2').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('jabatan/editrole') }}", //Define Post URL
                dataType: 'json',
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    access_name: access_name,
                    access_desc: access_desc
                },
                success: function(response) {
                    $('#role-form-edit').trigger("reset"),
                        $('#modal2').modal('close'),
                        alert(response['message']),
                        window.location.reload()
                }
            })
        })


        /**
         * Funngsi untuk keperluan hapus data
         */

        //panggil button dgn melewatkan link
        function delRole(id) {
            let text = "Are sure to delete this record" + " " + "id" + " " + id + "..?";
            if (confirm(text) == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'delete_role/' + id, //Define Post URL
                    dataType: 'json',
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response['message']);
                        window.location.reload();
                    }
                });
            }
            // if (confirm('Are sure to delete this record.?')) {
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: 'delete_role/' + id, //Define Post URL
            //         dataType: 'json',
            //         type: "DELETE",
            //         data: {
            //             "_token": "{{ csrf_token() }}"
            //         },
            //         success: function(response) {
            //             alert(response['message']);
            //             window.location.reload();
            //         }
            //     });
            // }
        }
    </script>
@endsection

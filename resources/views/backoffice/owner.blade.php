@extends('layout.base')
@section('title')
    Pemilik
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Data Pemilik</h5>
        <h6 class="float-right"><button class="btn btn-outline-primary" onclick="createData()"><i class="fa fa-plus"></i> Tambah Data</button></h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="data-tabel">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Company_name</th>
              <th>Alamat</th>
              <th>No Handphone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Company_name</th>
              <th>Alamat</th>
              <th>No Handphone</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody id="tbody">
          </tbody>
        </table>
      </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-data" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <div class="text-center mb-4">
                <h6 id="modalheader" class="modal-title"><b>TAMBAH DATA</b></h6>
                <p class="text-primary"><b>OWNERS</b></p>
                <hr>
              </div>
              <form id="formData" class="row g-3" onsubmit="return false">
                @csrf
                <div class="col-12">
                    <input type="hidden" name="id" id="dataId">
                    <div class="form-group">
                        <label class="form-label w-100" for="modalAddCard">Nama</label>
                        <input id="name" name="name" class="form-control val" type="text" placeholder="Input disini">
                        <span class="text-danger small alrt" id="name-alert"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100" for="modalAddCard">Email</label>
                        <input id="email" name="email" class="form-control val" type="email" placeholder="Input disini">
                        <span class="text-danger small alrt" id="email-alert"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100" for="modalAddCard">Nama Instansi</label>
                        <input id="company_name" name="company_name" class="form-control val" type="text" placeholder="Input disini">
                        <span class="text-danger small alrt" id="company_name-alert"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100" for="modalAddCard">Alamat</label>
                        <input id="address" name="address" class="form-control val" type="text" placeholder="Input disini">
                        <span class="text-danger small alrt" id="address-alert"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100" for="modalAddCard">No Handphone</label>
                        <input id="phone" name="phone" class="form-control val" type="number" placeholder="Input disini">
                        <span class="text-danger small alrt" id="phone-alert"></span>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button onclick="postData()" class="btn btn-outline-primary my-3" style="margin-right: 0.5rem">Simpan</button>
                    <button type="reset" class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    {{-- End Modal --}}
</div>
@endsection
@section('script')
    <script>
        const baseUrl = `{{ config('app.url') }}`


        function clearInput() {
            $('.val'  ).val('')
            $('.alrt' ).html ('')
        }

        $(document).on('click', '#btn-del', function() {
            let dataId = $(this).data('id')
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data tidak dapat dipulihkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Waiting',
                        text: "Processing Data!",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    })
                    $.ajax({
                        url: `${baseUrl}/api/v1/owners/${dataId}`,
                        type: 'delete',
                        success: function(result) {
                            let data = result.data;
                            setTimeout(() => {
                                Swal.close()
                                getAllData()
                                Swal.fire({
                                    title            : 'Success'               ,
                                    text             : 'Data Berhasil Dihapus.',
                                    icon             : 'success'               ,
                                    cancelButtonColor: '#d33'                  ,
                                    confirmButtonText: 'Oke'
                                })
                            }, 500);
                        },
                        error: function(result) {
                            let data = result.responseJSON
                            Swal.fire({
                                icon     : 'error' ,
                                title    : 'Error' ,
                                text     : data.response.message,
                                position : 'topRight'
                            });
                        }
                    });
                }
            })
        })

        $(document).on('click', '#btn-edit', function() {
            clearInput()
            let dataId = $(this).data('id')
            $('#modalheader').html('EDIT DATA')
            $.get(`${baseUrl}/api/v1/owners/${dataId}`, (res) => {
                let data = res.data
                $.each(data, (i,d) => {
                    if (i != "created_at" && i != "updated_at") {
                        $(`#${i}`).val(d)
                    }
                })
                $('#modal-data').modal('show')
            }).fail((err) => {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Server dalam masalah',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        })

        function createData()
        {
            clearInput()
            $('#modalheader').html('TAMBAH DATA')
            $('#modal-data').modal('show');
            $('#phone').val('62')
        }

        function closeModal()
        {
            $('#modal-data').modal('hide');
        }

        function postData() {
            const data = {
                id           : $('#id'           ).val(),
                name         : $('#name'         ).val(),
                email        : $('#email'        ).val(),
                company_name : $('#company_name' ).val(),
                address      : $('#address'      ).val(),
                phone        : $('#phone'        ).val(),
            }

            $.ajax({
                url        : `${baseUrl}/api/v1/owners`,
                method     : "POST"                   ,
                data       : data                     ,
                success: function(res) {
                    $('#modal-data').modal('hide')
                    Swal.fire({
                        title            : 'Success'               ,
                        text             : 'Data Berhasil Dihapus.',
                        icon             : 'success'               ,
                        cancelButtonColor: '#d33'                  ,
                        confirmButtonText: 'Oke'
                    })

                    getAllData()
                },
                error: function(err) {
                    if (err.status = 422) {
                        let data = err.responseJSON
                        let errorRes = data.errors;
                        if (errorRes.length >= 1) {
                            $.each(errorRes.data, (i, d) => {
                                $(`#${i}-alert`).html(d)
                            })
                        }
                    } else {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Server dalam masalah',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                dataType   : "json"
            });
        }

        function getAllData() {
            $('#data-tabel').DataTable().destroy()
            $.get(`${baseUrl}/api/v1/owners`, (res) => {
                let data = res.data

                $('#tbody').html('')
                $.each(data, (i,d) => {
                    $('#tbody').append(`
                        <tr>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.name}</td>
                            <td>${d.email}</td>
                            <td class="text-capitalize">${d.company_name}</td>
                            <td class="text-capitalize">${d.address}</td>
                            <td>${d.phone}</td>
                            <td>
                                <button id="btn-edit" data-id="${d.id}" class="btn rounded btn-sm btn-outline-primary mr-1"><i class="fa fa-edit"></i></button>
                                <button id="btn-del" data-id="${d.id}" class="btn rounded btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    `)
                })

                $('#data-tabel').DataTable();
            })
            .fail((err) => {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Server dalam masalah',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        }

        $(document).ready(function() 
        {
            getAllData()
        })
    </script>
@endsection
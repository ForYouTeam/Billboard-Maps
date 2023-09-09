@extends('layout.base')
@section('style')
    <style>
      .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }
    </style>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Data Akun</h5>
        <h6 class="float-right"><button class="btn btn-outline-primary" onclick="createData()"><i class="fa fa-plus"></i> Tambah Data</button></h6>
        
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="data-tabel">
          <thead class="thead-light">
            <tr>
              <th style="width: 5px">No</th>
              <th>Pemilik</th>
              <th>Alamat</th>
              <th>Latitude</th>
              <th>Longtitude</th>
              <th>Harga</th>
              <th>Status</th>
              <th style="width: 150px">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th style="width: 5px">No</th>
              <th>Pemilik</th>
              <th>Alamat</th>
              <th>Latitude</th>
              <th>Longtitude</th>
              <th>Harga</th>
              <th>Status</th>
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
        <div class="modal-dialog modal-xl modal-dialog-centered1 modal-simple modal-add-new-cc">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <div class="text-center mb-4">
                <h6 id="#modalheader" class="modal-title"><b>TAMBAH DATA</b></h6>
                <p class="text-primary"><b>JURUSAN</b></p>
                <hr>
              </div>
              <form id="formData" class="row g-3" onsubmit="return false">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label for="" class="">Latitude</label>
                          <input type="number" class="form-control val" name="latitude" id="latitude" placeholder="Input disini">
                          <span class="text-danger small alrt" id="latitude-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Longtitude</label>
                          <input type="number" class="form-control val" name="longtitude" id="longtitude" placeholder="Input disini">
                          <span class="text-danger small alrt" id="longtitude-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Alamat</label>
                          <input type="text" class="form-control val" name="address" id="address" placeholder="Input disini">
                          <span class="text-danger small alrt" id="address-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Tipe Media</label>
                          <input type="text" class="form-control val" name="media_type" id="media_type" placeholder="Input disini">
                          <span class="text-danger small alrt" id="media_type-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Tinggi Tiang</label>
                          <input type="number" class="form-control val" name="pole_height" id="pole_height" placeholder="Input disini">
                          <span class="text-danger small alrt" id="pole_height-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Panjang</label>
                          <input type="number" class="form-control val" name="height" id="height" placeholder="Input disini">
                          <span class="text-danger small alrt" id="height-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Lebar</label>
                          <input type="number" class="form-control val" name="width" id="width" placeholder="Input disini">
                          <span class="text-danger small alrt" id="width-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Deskripsi</label>
                          <input type="text" class="form-control val" name="description" id="description" placeholder="Input disini">
                          <span class="text-danger small alrt" id="description-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Harga</label>
                          <input type="number" class="form-control val" name="price" id="price" placeholder="Input disini">
                          <span class="text-danger small alrt" id="price-alert"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="" class="">Pemilik</label>
                          <select name="owner_id" id="owner_id" class="form-control val">
                            <option value="" selected disabled>-- Pilih --</option>
                            @foreach ($data as $owner)
                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                            @endforeach
                          </select>
                          <span class="text-danger small alrt" id="owner_id-alert"></span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <label class="switch">
                    <input type="checkbox" name="empty" id="empty">
                    <span class="slider round"></span>
                  </label><br>
                    <button onclick="postData()" class="btn btn-outline-primary my-3" style="margin-right: 0.5rem">Simpan</button>
                    <button type="reset" class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    {{-- End Modal --}}

    {{-- Modal --}}
    <div class="modal fade" id="modal-gambar" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <div class="text-center mb-4">
              <h6 id="#modalheader" class="modal-title"><b>TAMBAH GAMBAR</b></h6>
              <p class="text-primary"><b>JURUSAN</b></p>
              <hr>
            </div>
            <form id="form-gambar" enctype="multipart/form-data">
              @csrf
              <label for="">Gambar</label>
              <div class="form-group">
                <input type="hidden" name="billboard_id" id="billboard_id">
                <input type="file" name="image_path[]" id="image_path" accept="image/*" class="form-control" multiple>
                <div class="mt-3" id="image_preview"></div>
              </div>
              <div class="col-12 text-center">
                  <button type="button" id="btn-simpan" class="btn btn-outline-primary my-3" style="margin-right: 0.5rem">Simpan</button>
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
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
        $('#empty').on('change', function () {
          $(this).val() == 1 ?   $(this).val(0) : $(this).val(1)
        });

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
                        url: `${baseUrl}/api/v1/billboard/${dataId}`,
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
            $.get(`${baseUrl}/api/v1/billboard/${dataId}`, (res) => {
                let data = res.data
                $.each(data, (i,d) => {
                    if (i != "created_at" && i != "updated_at") {
                        $(`#${i}`).val(d)
                        var isChecked = $("#empty").val();
                        if (isChecked == 1) {
                            $("#empty").prop("checked", true);
                        } else {
                            $("#empty").prop("checked", false);
                        }
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

        $(document).on('click', '#btn-gambar', function() {
            $('#modal-gambar').modal('show')
            let billId = $(this).data('id')
            $('#billboard_id').val(billId)
        })

        $("#image_path").change(function() {
            $('#image_preview').append(""); // Bersihkan pratinjau gambar sebelum menambah yang baru
            var total_files = this.files.length;

            for (var i = 0; i < total_files; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').append("<img style='max-width: 100px; max-height: 100px; margin: 10px;' src='" + e.target.result + "'>");
                }
                reader.readAsDataURL(this.files[i]);
            }
        });

        $('#btn-simpan').click(function (e) {
            
            e.preventDefault();
            $(this).html('Menyimpan...');
            $(this).prop('disabled', false);

            let data = new FormData($('#form-gambar')[0]);

            let totalFiles = document.getElementById("image_path").files.length;

            for (let i = 0; i < totalFiles; i++) {
                data.append("image_path[]", document.getElementById("image_path").files[i]);
            }

            $.ajax({
                url: `${baseUrl}/api/v1/images`,
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#modal-gambar').modal('hide');
                    Swal.fire({
                        title            : 'Success'               ,
                        text             : 'Gambar Berhasil Ditambahkan.',
                        icon             : 'success'               ,
                        cancelButtonColor: '#d33'                  ,
                        confirmButtonText: 'Oke'
                    })
                    getAllData()
                },
                error: function(err) {
                    Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Server dalam masalah',
                            showConfirmButton: false,
                            timer: 1500
                        })
                },
                complete: function() {
                    $('#btn-simpan').html('Simpan');
                    $('#btn-simpan').prop('disabled', false);
                }
            });
        });

        function createData()
        {
            clearInput()
            $('#modal-data').modal('show');
            $('#phone').val('62')
        }

        function closeModal()
        {
            $('#modal-data').modal('hide');
        }

        function postData() {
            const data = {
                id          : $('#id'          ).val(),
                latitude    : $('#latitude'    ).val(),
                longtitude  : $('#longtitude'  ).val(),
                media_type  : $('#media_type'  ).val(),
                address     : $('#address'     ).val(),
                pole_height : $('#pole_height' ).val(),
                height      : $('#height'      ).val(),
                width       : $('#width'       ).val(),
                description : $('#description' ).val(),
                price       : $('#price'       ).val(),
                owner_id    : $('#owner_id'    ).val(),
                pole_height : $('#pole_height' ).val(),
                empty       : $('#empty'       ).val(),
            }

            $.ajax({
                url        : `${baseUrl}/api/v1/billboard`,
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
            $.get(`${baseUrl}/api/v1/billboard`, (res) => {
                let data = res.data
                $('#tbody').html('')
                $.each(data, (i,d) => {
                    let empty = d.empty
                    let status = ''
                    
                    if (empty == 1) {
                      status = '<span class="badge badge-success p-1">Tersedia</span>'
                    } else{
                      status = '<span class="badge badge-danger p-1">Tidak Tersedia</span>'
                    }
                    $('#tbody').append(`
                        <tr>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.nama_owner}</td>
                            <td class="text-capitalize">${d.address}</td>
                            <td class="text-capitalize">${d.latitude}</td>
                            <td class="text-capitalize">${d.longtitude}</td>
                            <td class="text-capitalize">Rp.${d.price}</td>
                            <td class="text-capitalize" id="status">${status}</td>
                            <td>
                                <button id="btn-gambar" data-id="${d.id}" class="btn rounded btn-sm btn-outline-success"><i class="fa fa-image"></i></button>
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
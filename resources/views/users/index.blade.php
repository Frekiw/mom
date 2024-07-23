@extends('layouts.admin_master')
@section('admincontent')

<head>
<style>
    table.dataTable>thead .sorting:before,
    table.dataTable>thead .sorting_asc:before,
    table.dataTable>thead .sorting_desc:before,
    table.dataTable>thead .sorting_asc_disabled:before,
    table.dataTable>thead .sorting_desc_disabled:before {
      content: none !important;
    }

    table.dataTable>thead .sorting:after,
    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:after,
    table.dataTable>thead .sorting_asc_disabled:after,
    table.dataTable>thead .sorting_desc_disabled:after {
      content: none !important;
    }

    .page-link.active,
    .active>.page-link {
      background-color: #ffffff !important;
      border-color: #fe9f1a !important;
    }

    .dataTables_wrapper .dataTables_length select {
      padding: 10px !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
      padding-right: 30px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      color: white !important;
      border: none !important;
      background-color: none !important;
      background: none !important;
    }

    .data_align {
      text-align: center;
    }

    .thead2 {
      text-align: center;
    }

    .addDataBtn {
      margin-left: 50px;
      margin-top: 14px;
      /* Atur nilai sesuai kebutuhan */
    }
    .custom-modal1 .btn-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            width: 24px;
            height: 24px;
        }

        .custom-modal1 .btn-close img {
            width: 100%;
            height: auto;
        }
  </style>
</head>

<div class="container-fluid py-4 px-4">
    
    <div class="modal fade custom-modal1" id="customModalc" tabindex="-1" aria-labelledby="customModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog2">
            <div class="modal-content modal-content2">
                <div class="modal-header modal-header2 border-bottom">
                    <h5 class="modal-title modal-title" id="customModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{asset('admin/assets/img/22.jpeg')}}" alt="Close">
                    </button>
                </div>
                <div class="modal-body modal-body2">
                    <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="nama" class="fw-bold mt-3">Nama</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="text" name="name" class="form-control" id="nama" placeholder="Masukkan nama"
                                required>
                        </div>
                        <div class="form-group">
                        <label for="nama" class="fw-bold mt-3">Roles</label>
                        <select name="roles" id="roles" class="form-select" required>
                            <option value="">Pilih Roles</option>
                                <option value="USER">USER</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="DESIGNER">DESIGNER</option>
                                <option value="PROJECT_MANAGER">PROJECT MANAGER</option>
                                <option value="MARKETING">MARKETING</option>
                                <option value="PROGRAMMER">PROGRAMMER</option>
                                <option value="DIRECTOR">DIRECTOR</option>
                                <option value="CREATIVE_DIRECTOR">CREATIVE DIRECTOR</option>
                        </select>
                        </div>
                        <label for="nama" class="fw-bold mt-3">Email</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="email" name="email" value="" class="form-control" id="name" placeholder="Masukkan Email Pengguna" required>
                        </div>
                        <label for="nama" class="fw-bold mt-3">Nomor</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="number" name="nomor"  class="form-control" id="name" placeholder="Masukkan Nomor Pengguna" required>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Password</label>
                                <div class="input-group input-group-outline w-100 mb-3">
                                    <input type="password" name="password" value="" class="form-control" id="name" placeholder="Masukkan Password Pengguna" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="name">Konfirmasi Password</label>
                                <div class="input-group input-group-outline w-100 mb-3">
                                    <input type="password" name="password_confirmation" value="" class="form-control" id="name" placeholder="Masukkan Kembali Password Pengguna" required>
                                </div>
                            </div>
                        </div>
                        <label for="nama" class="fw-bold mt-3">Gambar Profil</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="file" name="profile_photo_path" class="form-control" id="gambar" placeholder="Masukkan Gambar"
                                required>
                        </div>
                        <div class="form-group">
                            <img id="preview" src="" alt="preview" class="img-fluid p-5" style="display:none; max-width:100%; height:auto;"> 
                        </div>
                        <div class="d-flex justify-content-end pt-5">
                            <button type="submit" class="btn btn-warning">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
      <h5>Data Company Meeting</h5>
    </div>
          @if (session('status'))
          <div class="row">
            <div class="col-md-4 ms-auto">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close mb-1" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
              </div>
            </div>
        </div>
      
    @endif
    <table id="example" class="table table-striped" style="width:100%">
      <thead class="thead2">
        <tr>
          <th>Name</th>
          <th>Roles</th>
          <th>Gambar</th>
          <th>Aksi</th>
          <th class="d-none">Date</th>
        </tr>
      </thead>
      <tbody class="data_align">
        @forelse ($user as $item)
    <tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->roles }}</td>
    <td><img src="{{  asset('storage/'.$item->profile_photo_path) }}" style="width: 80px; height: 80px;" alt="1"></td>
    <td class="d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-warning mx-2 p-4 text-center" data-bs-toggle="modal" data-bs-target="#customModaledit{{ $item->id }}">
            <i class="fas fa-edit"></i>
        </button>
    </td>
    <td class="d-none">{{ $item->created_at }}</td>
</tr>
<div class="modal fade custom-modal1" id="customModaledit{{ $item->id }}" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog2">
        <div class="modal-content modal-content2">
            <div class="modal-header modal-header2 border-bottom">
                <h5 class="modal-title modal-title" id="customModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('admin/assets/img/22.jpeg') }}" alt="Close">
                </button>
            </div>
            <div class="modal-body modal-body2">
                <form action="{{ route('users.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="nama" class="fw-bold mt-3">User</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="text" name="name" value="{{ old('name') ?? $item->name }}" class="form-control" id="nama" placeholder="Masukkan nama"
                                required>
                        </div>
                        <div class="form-group">
                        <label for="roles" class="fw-bold mt-3">Roles</label>
                            <select name="roles" id="roles" class="form-select" required>
                                <option value="">Pilih Roles</option>
                                <option value="USER" {{ $item->roles == 'USER' ? 'selected' : '' }}>USER</option>
                                <option value="ADMIN" {{ $item->roles == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                                <option value="DESIGNER" {{ $item->roles == 'DESIGNER' ? 'selected' : '' }}>DESIGNER</option>
                                <option value="PROJECT_MANAGER" {{ $item->roles == 'PROJECT_MANAGER' ? 'selected' : '' }}>PROJECT MANAGER</option>
                                <option value="MARKETING" {{ $item->roles == 'MARKETING' ? 'selected' : '' }}>MARKETING</option>
                                <option value="PROGRAMMER" {{ $item->roles == 'PROGRAMMER' ? 'selected' : '' }}>PROGRAMMER</option>
                                <option value="DIRECTOR" {{ $item->roles == 'DIRECTOR' ? 'selected' : '' }}>DIRECTOR</option>
                                <option value="CREATIVE_DIRECTOR" {{ $item->roles == 'CREATIVE_DIRECTOR' ? 'selected' : '' }}>CREATIVE DIRECTOR</option>
                            </select>
                        </div>
                        <label for="nama" class="fw-bold mt-3">Email</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="email" name="email" value="{{ old('email') ?? $item->email  }}" class="form-control" id="name" placeholder="Masukkan Email Pengguna">
                        </div>
                        <label for="nama" class="fw-bold mt-3">Nomor</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="number" name="nomor" value="{{ old('nomor') ?? $item->nomor  }}" class="form-control" id="name" placeholder="Masukkan Nomor Pengguna">
                        </div>
                        <div class="row py-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Password</label>
                                <div class="input-group input-group-outline w-100 mb-3">
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="name" placeholder="Masukkan Password Pengguna" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="name">Konfirmasi Password</label>
                                <div class="input-group input-group-outline w-100 mb-3">
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="name" placeholder="Masukkan Kembali Password Pengguna" required>
                                </div>
                            </div>
                        </div>
                            <label for="formFile" class="fw-bold mt-3 ">Gambar Sebelumnya</label>
                            <div class="boxft py-3">
                                <img src="{{  $item->profile_photo_url }}" class="img-fluid" style=" max-width: 20%; height: auto;" alt=""/>
                            </div>
                            <label for="formFile" class="fw-bold mt-3 ">Gambar Baru</label>
                            <div class="input-group input-group-outline w-100">
                                <input type="file" name="profile_photo_path" class="form-control" id="gambar" placeholder="Masukkan Gambar">
                            </div>
                            <div class="form-group">
                                <img id="preview" src="" alt="Preview" class="img-fluid p-5"
                                    style="display: none; max-width: 100%; height: auto;" />
                            </div>
                    <div class="d-flex justify-content-end pt-5">
                        <button type="submit" class="btn btn-warning">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse
      </tbody>
      <tfoot>
        <th>Name</th>
      </tfoot>
    </table>
  </div>

</main>
<!--   Core JS Files   -->
<script src="{{asset ('admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset ('admin/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset ('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset ('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset ('admin/assets/js/plugins/chartjs.min.js')}}"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 5 JS -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<!-- DataTables ColReorder JS -->
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<!-- Bootstrap 5 JS Bundle (Popper.js included) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('gambar').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });


  $(document).ready(function () {
    // Event handler untuk tombol delete
    $('#deleteBtn').on('click', function () {
      confirmDelete();
    });
  });

  function confirmDelete() {
    var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (result) {
      // Jika pengguna mengklik "OK"
      alert("Data telah dihapus.");
      // Tambahkan fungsi untuk menghapus data di sini
    } else {
      // Jika pengguna mengklik "Cancel"
      alert("Penghapusan dibatalkan.");
    }
  }


  $(document).ready(function () {
    $('#example').DataTable({
        colReorder: true,
        order: [[4, 'desc']], // Urutan berdasarkan kolom ke-4 (index 3), descending
        columnDefs: [
            {
                targets: [4], // Kolom yang harus disembunyikan
                visible: false
            }
        ],
        language: {
            paginate: {
                previous: "&#8249;", // Tanda panah kiri
                next: "&#8250;" // Tanda panah kanan
            }
        },
        initComplete: function () {
            // Tambahkan select box di setiap kolom footer (jika diperlukan)
            this.api().columns().every(function () {
                var column = this;
                var select = $('<select class="form-select"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });
            });

            // Tambahkan tombol "Tambah Data" di sebelah search bar (jika diperlukan)
            $('<a href="input_data.html" class="btn btn-warning ms-3 mt-3" data-bs-toggle="modal" data-bs-target="#customModalc">Tambah Data</a>')
                .appendTo('.dataTables_filter')
                .on('click', function () {});
        }
    });

    // Implementasi aksi tambah data bisa ditambahkan di sini
    // Contoh: menambahkan data baru ke tabel
    $('#addDataForm').on('submit', function (e) {
      e.preventDefault();
      var newData = $('#newDataInput').val();
      table.row.add([
        newData,
        // tambahkan kolom lainnya sesuai kebutuhan
      ]).draw(false);

      $('#newDataInput').val('');
    });
  });


  // $(document).ready(function () {
  //   $('#example').DataTable({
  //     colReorder: true,
  //     initComplete: function () {
  //       this.api().columns().every(function () {
  //         var column = this;
  //         var select = $('<select class="form-select"><option value=""></option></select>')
  //           .appendTo($(column.footer()).empty())
  //           .on('change', function () {
  //             var val = $.fn.dataTable.util.escapeRegex(
  //               $(this).val()
  //             );

  //             column
  //               .search(val ? '^' + val + '$' : '', true, false)
  //               .draw();
  //           });

  //         column.data().unique().sort().each(function (d, j) {
  //           select.append('<option value="' + d + '">' + d + '</option>');
  //         });
  //       });
  //     }
  //   });
  // });

  // $(document).ready(function() {
  //         $('#example').DataTable({
  //             colReorder: true,
  //             "pagingType": "simple_numbers", // Use simple numbers pagination
  //             "language": {
  //                 "paginate": {
  //                     "previous": "&lt;",
  //                     "next": "&gt;"
  //                 }
  //             }
  //         });
  //     })
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const previousLink = document.querySelector('a.page-link[aria-controls="example"][data-dt-idx="0"]');
    if (previousLink) {
      previousLink.textContent = "<";
    }
  });
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset ('admin/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>
@endsection
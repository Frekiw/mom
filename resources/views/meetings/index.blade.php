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
  </style>
</head>

<div class="container-fluid py-4 px-4">
    <div>
      <h5>Data Minutes Of Meeting</h5>
    </div>
    @if (session('status'))
                <div class="row">
                    <div class="col-md-4 ms-auto">
                      <div class="alert alert-info text-white alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close mb-1" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                </div>
      
    @endif
    <table id="example" class="table table-striped" style="width:100%">
      <thead class="thead2">
        <tr>
          <th>Owner Profile</th>
          <th>Title</th>
          <th>PM Sign</th>
          <th>Client Sign</th>
          <th>Share</th>
          <th>Aksi</th>
          <th class="d-none">Date</th>
        </tr>
      </thead>
      <tbody class="data_align">
        @forelse ( $meeting as $item )
        <tr>
          <td class="text-start">
            @if ($item->user)
            <div class="d-flex position-relative">
                <img data-bs-toggle="tooltip" data-bs-title="{{ $item->user->name }}" src="{{ asset('storage/'.$item->user->profile_photo_path) }}" class="me-2 rounded-circle" style="width: 50px; height: 50px;border:4px solid white;" alt="1">
                <img data-bs-toggle="tooltip" data-bs-title="{{ $item->forward_id == null ? '' : $item->forwardUser->name }}" 
                src="{{ asset($item->forward_id == null ? '' : 'storage/'.$item->forwardUser->profile_photo_path) }}" 
                class="me-2 rounded-circle position-absolute {{ $item->forward_id == null ? 'd-none' : '' }}" 
                style="left:15%;width: 50px; height: 50px;border:4px solid white;" 
                alt="2">
           
            </div>
        @else
            <span>No user</span>
            @endif
          </td>
          <td class="text-center">Meeting{{ $item->stmeeting->name }} ke-{{ $item->title }}</td>
          <td>  
            @if ($item->pm_sign != "Approve")
            <button type="button" id="sha" class="py-2 btn btn-secondary me-2 p-3 text-center" title="Belum Teraprove"> <i class="fas fa-question"></i></button>
            @else
            <button type="button" id="sha" class="py-2 btn btn-success me-2 p-3 text-center" title="Sudah Teraprove"> <i class="fas fa-check"></i></button>
            @endif
          </td>
          <td>  
            @if ($item->client_sign != "Approve")
            <button type="button" id="sha" class="py-2 btn btn-secondary me-2 p-3 text-center" title="Belum Teraprove"> <i class="fas fa-question"></i></button>
            @else
            <button type="button" id="sha" class="py-2 btn btn-success me-2 p-3 text-center" title="Sudah Teraprove"> <i class="fas fa-check"></i></button>
            @endif
          </td>
        </td>
        <td>  
          <textarea name="" id="text-copy{{ $item->id_meeting }}" class="" cols="0" rows="1" readonly>{{ $item->narasi }}</textarea>
          <button class="py-2 btn btn-copy btn-circle" onclick="copyText{{ $item->id_meeting }}()">
              <span class="fa fa-copy"></span>
          </button>
          <script>
            function copyText{{ $item->id_meeting }}() {  
              var copyText = document.getElementById("text-copy{{ $item->id_meeting }}");  
              copyText.select();  
              document.execCommand("copy");
          }
          </script>
        </td>
          <td class="d-flex align-items-center justify-content-center">
            <a href="{{ route('meetings.edit',$item-> id_meeting) }}" class="py-2 btn btn-warning mx-2 p-3 text-center"><i class="fas fa-edit"></i></a>
            <form action="{{ route('meetings.destroy', $item-> id_meeting) }}" onsubmit="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" method="POST">
              {!! method_field('delete') . csrf_field() !!}
              <button type="submit" class="py-2 btn btn-danger me-2 p-3 text-center">
                <i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
          <td class="d-none">{{ $item->created_at }}</td>
        </tr>
        @empty

          @endforelse
      </tbody>
      <tfoot>
        <tr>
          <th></th>
        </tr>
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
        order: [[6, 'desc']], // Urutan berdasarkan kolom ke-4 (index 3), descending
        columnDefs: [
            {
                targets: [6], // Kolom yang harus disembunyikan
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

        // Menambahkan tombol "Add Data" di sebelah search bar
        var
          addButton = $(
            '<a href="{{ route('meetings.create') }}" class="btn btn-warning ms-3 mt-3">Add Data</a>')
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
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
                    <h5 class="modal-title modal-title" id="customModalLabel">Tambah Company Meeting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{asset('admin/assets/img/22.jpeg')}}" alt="Close">
                    </button>
                </div>
                <div class="modal-body modal-body2">
                    <form action="{{ route('stmeetings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="nama" class="fw-bold mt-3">Nama</label>
                        <div class="input-group input-group-outline w-100">
                            <input type="text" name="name" class="form-control" id="nama" placeholder="Masukkan nama"
                                required>
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
              <div class="alert alert-info alert-dismissible fade show text-white" role="alert">
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
          <th>Aksi</th>
          <th class="d-none">Date</th>
        </tr>
      </thead>
      <tbody class="data_align">
        @forelse ($stmeeting as $item)
<tr>
    <td>{{ $item->name }}</td>
    <td class="d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-warning mx-2 p-3 text-center" data-bs-toggle="modal" data-bs-target="#customModaledit{{ $item->id_stmeeting }}">
            <i class="fas fa-edit"></i>
        </button>
    </td>
    <td class="d-none">{{ $item->created_at }}</td>
</tr>
<div class="modal fade custom-modal1" id="customModaledit{{ $item->id_stmeeting }}" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog2">
        <div class="modal-content modal-content2">
            <div class="modal-header modal-header2 border-bottom">
                <h5 class="modal-title modal-title" id="customModalLabel">Edit Sub Katalog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('admin/assets/img/117.png') }}" alt="Close">
                </button>
            </div>
            <div class="modal-body modal-body2">
                <form action="{{ route('stmeetings.update', $item->id_stmeeting) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="nama" class="fw-bold mt-3">Stmeeting</label>
                    <div class="input-group input-group-outline w-100">
                        <input type="text" value="{{ old('name') ?? $item->name }}" name="name" class="form-control" id="nama" placeholder="Masukkan nama" required>
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
        order: [[2, 'desc']], // Urutan berdasarkan kolom ke-4 (index 3), descending
        columnDefs: [
            {
                targets: [2], // Kolom yang harus disembunyikan
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



  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      datasets: [{
        label: "Sales",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "rgba(255, 255, 255, .8)",
        data: [50, 20, 10, 22, 50, 10, 40],
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
            color: "#fff"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "rgba(255, 255, 255, .8)",
        pointBorderColor: "transparent",
        borderColor: "rgba(255, 255, 255, .8)",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });

  var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

  new Chart(ctx3, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "rgba(255, 255, 255, .8)",
        pointBorderColor: "transparent",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#f8f9fa',
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
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
@extends('layouts.admin_master')
@section('admincontent')
<div class="container-fluid py-4 mt-4 bord">
        <div class="row">
            <div class="col-md-12 ">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h4>Edit Data</h4>
                </div>

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-body">
                  <form action="{{ route('meetings.update', $meeting->id_meeting) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Other form fields -->
                
                    <div class="form-group">
                        <label for="stmeeting" class="fw-bold">Nama Company Meeting </label>
                        <select name="stmeeting_id" id="stmeeting" class="form-select" disabled>
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach($stmeetings as $stmeeting)
                                <option value="{{ $stmeeting->id_stmeeting }}" 
                                    {{ $stmeeting->id_stmeeting == $meeting->stmeeting_id ? 'selected' : '' }} disabled>
                                    {{ $stmeeting->name }} - ({{ $meetingCounts[$stmeeting->id_stmeeting] ?? 0 }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <label for="title" class="fw-bold mt-3">Title</label>
                    <div class="input-group input-group-outline w-100">
                        <input type="text" value="{{ old('title') ?? $meeting->title }}" name="title" class="form-control" id="title" placeholder="Masukkan Title" readonly>
                    </div>
                    
                    <label for="time" class="fw-bold mt-3">Time</label>
                    <div class="input-group input-group-outline w-100">
                        <input type="date" value="{{ old('date') ?? $meeting->date }}" name="date" class="form-control" id="time" placeholder="Masukkan Time" readonly>
                    </div>
                    
                    <label for="notes" class="fw-bold mt-3">Notes</label>
                    <div class="input-group input-group-outline w-100">
                        <textarea class="form-control w-100" name="notes" id="notes" placeholder="Masukkan Notes">{{ old('notes') ?? $meeting->notes }}</textarea> 
                    </div>
                    <label for="forward_id" class="fw-bold mt-3">Forward</label>
                    <div class="input-group input-group-outline w-100">
                        <select name="forward_id" id="forward_id" class="form-select" disabled>
                            <option value="">Pilih Anggota</option>
                            @foreach($forwardUsers as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $meeting->forward_id ? 'selected' : '' }}>
                              {{ $user->name }}
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning my-3">Submit</button>
                </form>
                
                </div>
              </div>
            </div>
          </div>
      </div>
    </main>
    <!--   Core JS Files   -->
  <script src="{{asset ('admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset ('admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset ('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset ('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset ('admin/assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


  
    <script>
      ClassicEditor
    .create(document.querySelector('#notes'))
    .catch(error => {
    console.error(error);
    });


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
        

        const subcategories = {
        calendar: ["Desk Calendar", "Wall Calendar", "Planner"],
        magazine: ["Fashion Magazine", "Travel Magazine", "Science Magazine"],
        "social-media": ["Facebook", "Instagram", "Twitter", "LinkedIn"],
        "corporate-design": ["Logo Design", "Brochure Design", "Business Card Design"]
    };

    // Fungsi untuk memperbarui pilihan subkategori berdasarkan kategori utama yang dipilih
    function updateSubcategories(category) {
        const subcategorySelect = document.getElementById("subcategory");
        subcategorySelect.innerHTML = ''; // Menghapus semua opsi subkategori yang ada
        
        if (category && subcategories[category]) {
            subcategories[category].forEach(function(subcategory) {
                const option = document.createElement('option');
                option.textContent = subcategory;
                option.value = subcategory.toLowerCase().replace(/ /g, '-');
                subcategorySelect.appendChild(option);
            });
            
            // Tampilkan div subkategori
            document.getElementById("subcategory-group").style.display = "block";
        } else {
            // Sembunyikan div subkategori jika tidak ada subkategori yang dipilih
            document.getElementById("subcategory-group").style.display = "none";
        }
    }

    // Panggil fungsi pertama kali untuk menampilkan subkategori untuk kategori yang terpilih saat ini
    updateSubcategories(document.getElementById("category").value);
    
      // Data subkategori untuk setiap kategori
    //   const subcategories = {
    //         calender: ["Desk Calendar", "Wall Calendar", "Planner"],
    //         magazine: ["Fashion Magazine", "Travel Magazine", "Science Magazine"],
    //         "social-media": ["Facebook", "Instagram", "Twitter", "LinkedIn"],
    //         "corporate-design": ["Logo Design", "Brochure Design", "Business Card Design"]
    //     };

    //     // Fungsi untuk memperbarui pilihan subkategori berdasarkan kategori utama yang dipilih
    //     function updateSubcategories(category) {
    //         const subcategorySelect = document.getElementById("subcategory");
    //         subcategorySelect.innerHTML = ''; // Menghapus semua opsi subkategori yang ada
            
    //         if (category && subcategories[category]) {
    //             subcategories[category].forEach(function(subcategory) {
    //                 const option = document.createElement('option');
    //                 option.textContent = subcategory;
    //                 option.value = subcategory.toLowerCase().replace(/ /g, '-');
    //                 subcategorySelect.appendChild(option);
    //             });
                
    //             // Tampilkan div subkategori
    //             document.getElementById("subcategory-group").style.display = "block";
    //         } else {
    //             // Sembunyikan div subkategori jika tidak ada subkategori yang dipilih
    //             document.getElementById("subcategory-group").style.display = "none";
    //         }
    //     }
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
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset ('admin/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
  </body>

  </html>
  @endsection
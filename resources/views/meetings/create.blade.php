@extends('layouts.admin_master')
@section('admincontent')
<div class="container-fluid py-4 mt-4 bord">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>Tambah Data</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('meetings.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="stmeeting" class="fw-bold">Nama Company Meeting</label>
                  <select name="stmeeting_id" id="stmeeting" class="form-select" required>
                      <option value="">Pilih Kategori</option>
                      @foreach($stmeetings as $stmeeting)
                          <option value="{{ $stmeeting->id_stmeeting }}">
                              {{ $stmeeting->name }} - ({{ $meetingCounts[$stmeeting->id_stmeeting] ?? 0 }})
                          </option>
                      @endforeach
                  </select>
              </div>
          
              <label for="title" class="fw-bold mt-3">Title</label>
              <div class="input-group input-group-outline w-100">
                  <input type="number" name="title" class="form-control" id="title" placeholder="Masukkan Title" readonly>
              </div>
          
              <label for="time" class="fw-bold mt-3">Time</label>
              <div class="input-group input-group-outline w-100">
                  <input type="date" name="date" class="form-control" id="time" placeholder="Masukkan Time">
              </div>
          
              <label for="notes" class="fw-bold mt-3">Notes</label>
              <div class="input-group input-group-outline w-100">
                  <textarea class="form-control w-100" name="notes" id="notes" placeholder="Masukkan Notes"></textarea>
              </div>
          
              <label for="forward_id" class="fw-bold mt-3">Forward</label>
              <div class="input-group input-group-outline w-100">
                  <select name="forward_id" id="forward_id" class="form-select" required>
                      <option value="">Pilih Anggota</option>
                      @foreach($forwardUsers as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                  </select>
              </div>
          
              <label for="password" class="fw-bold mt-3">Password</label>
              <div class="input-group input-group-outline w-100">
                  <input type="text" value="MaxMeeting" name="password" class="form-control" id="password" placeholder="Masukkan Password">
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

    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const offset = 7 * 60; // WIB is UTC+7
        const wibTime = new Date(now.getTime() + (offset * 60 * 1000));
        const formattedDate = wibTime.toISOString().slice(0, 10);
        document.getElementById('time').value = formattedDate;
    });
    
    const meetingCounts = {
        @foreach($meetingCounts as $id => $count)
            {{ $id }}: {{ $count }},
        @endforeach
    };

    document.getElementById('stmeeting').addEventListener('change', function() {
        const selectedStMeetingId = this.value;
        const titleInput = document.getElementById('title');
        const count = meetingCounts[selectedStMeetingId] ?? 0;
        titleInput.value = count + 1;
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
  

  // Data subkategori untuk setiap kategori
  const subcategories = {
        calender: ["Desk Calendar", "Wall Calendar", "Planner"],
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
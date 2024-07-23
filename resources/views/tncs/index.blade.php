@extends('layouts.admin_master')
@section('admincontent')
<div class="container-fluid py-4 mt-4 bord">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>Terms And Condition</h4>
            @foreach ($tnc as $item)
            <a href="{{ route('tncs.edit',$item-> id_tnc) }}" class="py-2 btn btn-warning mx-2 p-3 text-center">Edit TNC</a>
          </div>
          <div class="card-body">
              <label for="notes" class="fw-bold mt-3">Terms Of Condition</label>
              <div class="input-group input-group-outline">
                <textarea class="form-control w-100" name="narasi" id="notes" placeholder="Masukkan Narasi">{{ $item->narasi }}</textarea>
              </div>
              
          @endforeach              
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


<style>
  .ck-reset_all :not(.ck-reset_all-excluded *), .ck.ck-reset, .ck.ck-reset_all{
    width: 100% !important;
  }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    ClassicEditor
      .create(document.querySelector('#notes'))
      .then(editor => {
        editor.enableReadOnlyMode('readOnlyMode');
      })
      .catch(error => {
        console.error(error);
      });
  });

    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const offset = 7 * 60; // WIB is UTC+7
        const wibTime = new Date(now.getTime() + (offset * 60 * 1000));
        const formattedDate = wibTime.toISOString().slice(0, 10);
        document.getElementById('time').value = formattedDate;
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
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
        @foreach($sign as $s)
        <form method="post" action="{{route('updatesign')}}">
        @csrf
        <input type="hidden" name="id_meeting" value="{{$s->id_meeting}}">
        Nama : {{ $s->title; }}
        </form>
    @endforeach
    
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
  <title>maxiidea</title>
  <link rel="shortcut icon" href="https://maxiidea.com/img/icon.png">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-scrolled {
            /* From https://css.glass */
            background: rgba(0, 0, 0, 0.17) !important;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(12.8px);
            -webkit-backdrop-filter: blur(12.8px);
            transition: background-color 0.3s;
        }
    </style>
</head>

<body style="background-color: #000;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black w-100 position-fixed z-2">
    <div class="container-fluid py-2">
            <a class="navbar-brand ms-5" href="#">
                <img src="{{ asset('home/img/logomaxid.png') }}" alt="Logo" style="width: 150px; height:40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse px-4" id="navbarSupportedContent" data-aos="fade-down" data-aos-delay="400">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item d-flex justify-content-center align-content-center">
                        <a class="nav-link ms-4" href="#">Our Client</a>
                        <a class="nav-link ms-4" href="#">Portofolio</a>
                        <a class="nav-link ms-4" href="#">About Us</a>
                    </li>
                </ul>
                <div class="">
                    <button type="button" class="btn btn-outline-light rounded-pill py-1 me-5">Contact</button>
                </div>
        </div>
    </div>
</nav>

    <!-- hero-section -->
    <section class="hero-section vh-100">
        <div class="container h-100 my-0">
            <div class="row h-100">
                <div class="col-md-6 py-4 d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="fw-bold" data-aos="fade-down" data-aos-delay="300">Streamline our</h1>
                        <h1 class="ror" data-aos="fade-up" data-aos-delay="500">Meeting workflow</h1>
                        <p data-aos="fade-right" data-aos-delay="700">This Clien will really change your development <br> workflow. Integrate with tool you love.</p>
                        <div class="d-flex">
                            <a class="download mt-2 btn btn-outline-light text-center justify-content-center align-items-center"
                                type="button" style="text-decoration: none; border-radius: 23px;" data-aos="zoom-in" data-aos-delay="900">Download</a>
                            <a class="download ms-2 mt-2 btn btn-outline-light text-center justify-content-center align-items-center" type="button"
                                style="text-decoration: none; border-radius: 23px;" href="#meeting" data-aos="zoom-in" data-aos-delay="1100">Conclusion</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 position-relative" data-aos="fade-left" data-aos-delay="700">
                    <img class="gambar1 position-absolute" style="top:50%;left:50%;transform:translate(-50%, -50%)" src="{{ asset('home/img/gambar1.jpg')}}" alt="Decorative">
                    <img class="gambar2 position-absolute" style="top:50%;left:50%;transform:translate(-55%, -45%)" src="{{ asset('home/img/gambar2.jpg')}}" alt="Decorative">
                </div>
            </div>
        </div>
    </section>

    <section class="meeting-section py-5" id="meeting">
    @foreach($sign as $s)
        <div class="container mt-5">
            <h2 data-aos="fade-down" data-aos-delay="800" class="text-white text-center"> Minutes Of Meeting</h2>
            <div class="text-start mt-5">
                <h3 data-aos="fade-right" data-aos-delay="1000">Meeting {{ $s->stmeeting->name }} Ke #{{$s->title}}</h3>
                <div class="d-flex" data-aos="fade-right" data-aos-delay="1200">
                <a class="tgl btn btn-secondary text-center justify-content-center align-items-center" type="button"
                    style="text-decoration: none; border-radius: 23px;">{{$s->date}}</a>
                </div>
            </div>
            <div class="testimonial-container" data-aos="fade-up" data-aos-delay="1400">
                <div class="note text-start">
                    <h3>Note:</h3>
                    {!! $s->notes !!}
                    <div class="d-flex w-100 align-items-center">
                        <p style="font-style: italic; font-size: 12px;">
                        <font color="red">*</font> Jika ada catatan tambahan hubungi
                        </p>
                        <a class="" type="button"
                        style="text-decoration: none; border-radius: 23px; font-style: italic; font-size: 10px; color: #fff; font-weight: 500;"
                        href="whatsapp://send?text=Hello&phone=+62{{ $s->user->nomor }}" target="_blank"><u style="text-decoration: none;">
                            <h6 class="ms-2 mb-0 fst-italic">project manager</h6>
                        </u>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex px-4 mt-4">
                <div class="plc text-center">
                    <h5 data-aos="fade-down" data-aos-delay="1000" class="text-white mb-3">Client Plc</h5>
                    <a class="tdt btn btn-outline-light text-center justify-content-center align-items-center {{ $s->client_sign == 'Approve' ? 'btn-secondary' : '' }} " type="button"
                        style="text-decoration: none; border-radius: 23px;" data-aos="fade-up" data-aos-delay="1200" {{ $s->client_sign != 'Approve' ? "data-bs-toggle=modal data-bs-target=#customModal2" : '' }}>{{ $s->client_sign == 'Approve' ? 'Telah ditandatangani' : 'Klik untuk tanda tangan' }}</a>
                </div>
                <div class="pjt ms-auto text-center">
                    <h5 data-aos="fade-down" data-aos-delay="1000" class="text-white mb-3">Project Manager</h5>
                    <a class="td btn btn-success text-center justify-content-center align-items-center" type="button"
                        style="text-decoration: none; border-radius: 23px;" data-aos="fade-up" data-aos-delay="1200">Telah ditanda tangani</a>
                </div>
            </div>
            <div class="modal fade" id="customModal2" tabindex="-1" aria-labelledby="customModal2Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content" style="background-color: #2b2b2b; color: #fff;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="customModal2Label">Apakah anda ingin tanda tangan?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        X
                      </button>
                    </div>
                    <div class="modal-footer">
                      <form method="post" action="{{route('updatesign')}}">
                        @csrf
                        <input type="hidden" name="id_meeting" value="{{$s->id_meeting}}">
                        <div class="form-group">
                          <input type="text" name="client_sign" value="Approve" class="form-control" required="" hidden>
                          <input type="date" name="sign_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required="" hidden>
                        </div>
                        <button type="submit" class="btn btn-success">Iya</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    @endforeach
    </section>

  <!-- footer -->
    <section class="footer-section">
        <footer style="background-color: black; color: white; padding: 20px; text-align: center;">
            <div>
            <img src="{{ asset('home/img/logomaxid.png')}}" alt="Untitled UI" style="max-width: 110px;">

            </div>
            <div class="kus" style="margin-top: 20px;">
            <a style="color: white; margin: 0 15px; text-decoration: none;"  href="#">Our Client</a>
            <a style="color: white; margin: 0 15px; text-decoration: none;"  href="#">Protfolio</a>
            <a style="color: white; margin: 0 15px; text-decoration: none;"  href="#">About Us</a>
            </div>
            <div class="d-flex">
            <div class="text-start" style="margin-top: 28px;">
                <p>&copy; 2024 Copyright by maxiidea.</p>
            </div>
            </div>
            <div class="text-end kas" style="margin-top: -35px;">
            <a style="color: white; margin: 0 15px; text-decoration: none;"  href="#">Terms & Conditions</a>
            <a style="color: white; margin: 0 15px; text-decoration: none;"  href="#">Privacy</a>
            </div>
        </footer>
    </section>




  <!-- Bootstrap JS and dependencies -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    AOS.init();
  </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var navbar = document.querySelector('.navbar');
    
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    });

    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var navbar = document.querySelector('.navbar');
    
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    });
    

  <!-- <script>
      (function() {
      // Init
      var container = document.getElementById("containera"),
        inners = document.querySelectorAll("#inner");
    
      // Mouse
      var mouse = {
        _x: 0,
        _y: 0,
        x: 0,
        y: 0,
        updatePosition: function(event) {
          var e = event || window.event;
          this.x = e.clientX - this._x;
          this.y = (e.clientY - this._y) * -1;
        },
        setOrigin: function(e) {
          this._x = e.offsetLeft + Math.floor(e.offsetWidth / 2);
          this._y = e.offsetTop + Math.floor(e.offsetHeight / 2);
        },
        show: function() {
          return "(" + this.x + ", " + this.y + ")";
        }
      };
    
      // Track the mouse position relative to the center of the container.
      mouse.setOrigin(container);
    
      //-----------------------------------------
    
      var counter = 0;
      var updateRate = 10;
      var isTimeToUpdate = function() {
        return counter++ % updateRate === 0;
      };
    
      //-----------------------------------------
    
      var defaultTransforms = {}; // Simpan transformasi default untuk setiap #inner
    
      // Ambil transformasi default untuk setiap #inner
      inners.forEach(function(inner) {
        defaultTransforms[inner.id] = getComputedStyle(inner).transform;
      });
    
      //-----------------------------------------
    
      var onMouseEnterHandler = function(event) {
        var inner = event.target.closest("#inner");
        if (inner) {
          update(event, inner);
        }
      };
    
      var onMouseLeaveHandler = function(event) {
        var inner = event.target.closest("#inner");
        if (inner) {
          inner.style.transform = defaultTransforms[inner.id]; // Kembalikan transformasi ke nilai default
        }
      };
    
      var onMouseMoveHandler = function(event) {
        if (isTimeToUpdate()) {
          var inner = event.target.closest("#inner");
          if (inner) {
            update(event, inner);
          }
        }
      };
    
      //-----------------------------------------
    
      var update = function(event, inner) {
        mouse.updatePosition(event);
        updateTransformStyle(inner, (mouse.y / inner.offsetHeight / 2).toFixed(2), (mouse.x / inner.offsetWidth / 2).toFixed(2));
      };
    
      var updateTransformStyle = function(inner, x, y) {
        var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
        inner.style.transform = style;
        inner.style.webkitTransform = style;
        inner.style.mozTransform = style;
        inner.style.msTransform = style;
        inner.style.oTransform = style;
      };
    
      //-----------------------------------------
    
      container.addEventListener("mouseenter", onMouseEnterHandler);
      container.addEventListener("mouseleave", onMouseLeaveHandler);
      container.addEventListener("mousemove", onMouseMoveHandler);
    })();
      
    </script> -->
</body>

</html>
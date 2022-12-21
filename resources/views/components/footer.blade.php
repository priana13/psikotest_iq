<footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3>About {{ $app_name }}</h3>
          <p>{{ $app_bio }}</p>
          <p class="social">
            <a href="#"><span class="bi bi-twitter"></span></a>
            <a href="#"><span class="bi bi-facebook"></span></a>
            <a href="#"><span class="bi bi-instagram"></span></a>            
          </p>
        </div>
        <div class="col-md-7 ms-auto">
          <div class="row site-section pt-0">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Navigation</h3>
              <ul class="list-unstyled">
                <li><a href="{{ route('page.harga') }}">Harga</a></li>
                <li><a href="{{ route('page.fitur') }}">Fitur</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="/page/{{ ($kontak)?$kontak->slug:"#" }}">{{ ($kontak)?$kontak->title:"Kontak" }}</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Page</h3>
              <ul class="list-unstyled">

                <li><a href="/page/{{ ($tentang)?$tentang->slug:"#" }}">{{ ($tentang)?$tentang->title:"Tentang Kami" }}</a></li>
                <li><a href="/page/{{ ($syarat_ketentuan)?$syarat_ketentuan->slug:"#" }}">{{ ($syarat_ketentuan)?$syarat_ketentuan->title:"Syarat & Ketentuan" }}</a></li>
                <li><a href="/page/{{ ($kebijakan)?$kebijakan->slug:"#" }}">{{ ($kebijakan)?$kebijakan->title:"Kebijakan" }}</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Downloads</h3>
              <ul class="list-unstyled">
                <!-- <li><a href="#">Get from the App Store</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>


      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright {{ config('app.name') }} {{ date('Y') }}</p>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=SoftLand
          -->
           
          </div>
        </div>
      </div>

    </div>
  </footer>
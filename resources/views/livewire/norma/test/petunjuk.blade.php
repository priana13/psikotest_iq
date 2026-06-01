<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <div class="card border-0 shadow-sm text-center" style="margin-top: 3rem; padding: 2.5rem 2rem;">

                    {{-- Ikon centang --}}
                    <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle bg-success"
                         style="width: 72px; height: 72px; background-color: #d4edda !important;">
                        <i class="fas fa-check-circle fa-2x" style="color: #155724;"></i>
                    </div>

                    {{-- Judul --}}
                    <h5 class="font-weight-bold text-gray-800 mb-1">Intelligence Structure Test</h5>
                    <p class="text-muted small mb-0">IST &nbsp;·&nbsp; Sesi selesai</p>

                    <hr class="my-4">

                    {{-- Pesan --}}
                    <p class="text-muted mb-3">
                        Anda telah menyelesaikan seluruh sesi test ini.<br>
                        Terima kasih atas partisipasi Anda.
                    </p>

                    {{-- Badge status --}}
                    <span class="badge badge-pill px-4 py-2"
                          style="background-color: #d4edda; color: #155724; font-size: 13px;">
                        Test Selesai
                    </span>


                    {{-- tombol ke test 16PF --}}
                    <div class="text-center mt-4">
                        <p>Lanjutkan ke Test 16PF?</p>

                            {{-- Form logout tersembunyi --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            {{-- Tombol Logout --}}
                            <button class="btn btn-primary" onclick="logoutAndRedirect()">
                                Test 16PF
                            </button>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function logoutAndRedirect() {
            const form = document.getElementById('logout-form');
            const redirectUrl = 'https://16pf.gemapersona.com/?nama=&usia=';

            // Tambahkan input hidden untuk redirect setelah logout
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'redirect_to';
            input.value = redirectUrl;
            form.appendChild(input);

            form.submit();
        }
    </script>


</div>
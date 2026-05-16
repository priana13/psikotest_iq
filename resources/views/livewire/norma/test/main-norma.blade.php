<style>
    :root {
        --brand: #4F46E5;
        --brand-light: #EEF2FF;
        --norma-card: #ffffff;
        --norma-border: #E8E9F0;
        --norma-bg: #F3F4F8;
        --norma-text: #1A1A2E;
        --norma-muted: #6B6B80;
        --norma-radius: 16px;
        --norma-radius-sm: 10px;
    }

    .norma-wrapper {
        max-width: 960px;
        margin: 0 auto;
    }

    /* ── Progress bar at top ── */
    .norma-progress-bar {
        height: 3px;
        background: var(--norma-border);
        border-radius: 99px;
        overflow: hidden;
        margin-bottom: 28px;
    }
    .norma-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--brand), #818CF8);
        border-radius: 99px;
        width: {{ (($tipe / 11) * 100) }}%;
        transition: width 0.6s ease;
    }

    /* ── Header chip ── */
    .norma-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .norma-step-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--brand-light);
        color: var(--brand);
        border-radius: 100px;
        padding: 6px 14px 6px 6px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.2px;
    }

    .norma-step-badge-dot {
        width: 22px;
        height: 22px;
        background: var(--brand);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 10px;
        font-weight: 700;
    }

    /* ── Timer pill ── */
    .norma-timer-pill {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--norma-card);
        border: 1px solid var(--norma-border);
        border-radius: 100px;
        padding: 6px 16px 6px 10px;
        font-size: 13px;
        font-weight: 600;
        color: var(--norma-text);
    }

    .norma-timer-pill i { color: var(--brand); font-size: 14px; }

    #countdown {
        font-family: 'DM Mono', 'Courier New', monospace;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 1px;
        color: var(--norma-text);
    }

    .countdown-warning { color: #DC2626 !important; }

    /* ── Main test card ── */
    .norma-card {
        background: var(--norma-card);
        border: 1px solid var(--norma-border);
        border-radius: var(--norma-radius);
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(0,0,0,0.04);
    }

    .norma-card-header {
        padding: 20px 28px 18px;
        border-bottom: 1px solid var(--norma-border);
        display: flex;
        align-items: center;
        gap: 12px;
        background: #FAFAFA;
    }

    .norma-card-header-icon {
        width: 36px;
        height: 36px;
        background: var(--brand-light);
        border-radius: var(--norma-radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--brand);
        font-size: 16px;
        flex-shrink: 0;
    }

    .norma-card-header h5 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: var(--norma-text);
    }

    .norma-card-header p {
        margin: 0;
        font-size: 12px;
        color: var(--norma-muted);
        margin-top: 2px;
    }

    .norma-card-body {
        padding: 24px 28px;
    }

    /* ── Step dots ── */
    .norma-steps {
        display: flex;
        align-items: center;
        gap: 0;
        margin-bottom: 28px;
        overflow-x: auto;
        padding-bottom: 4px;
        scrollbar-width: none;
    }
    .norma-steps::-webkit-scrollbar { display: none; }

    .norma-step-item {
        display: flex;
        align-items: center;
        flex-shrink: 0;
    }

    .norma-step-dot {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 2px solid var(--norma-border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 600;
        color: var(--norma-muted);
        background: var(--norma-card);
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .norma-step-dot.active {
        border-color: var(--brand);
        background: var(--brand);
        color: #fff;
        box-shadow: 0 0 0 4px rgba(79,70,229,0.15);
    }

    .norma-step-dot.done {
        border-color: #10B981;
        background: #10B981;
        color: #fff;
    }

    .norma-step-line {
        height: 2px;
        width: 24px;
        background: var(--norma-border);
        flex-shrink: 0;
    }
    .norma-step-line.done { background: #10B981; }

    /* ── Livewire mount area ── */
    .norma-livewire-zone {
        min-height: 200px;
    }
</style>

<div class="norma-wrapper">

    <!-- Progress bar -->
    <div class="norma-progress-bar">
        <div class="norma-progress-fill"></div>
    </div>

    <!-- Header row -->
    <div class="norma-header">
        <div class="norma-step-badge">
            <div class="norma-step-badge-dot">{{ $tipe <= 10 ? $tipe : '✓' }}</div>
            @if($tipe <= 10)
                Subtes {{ $tipe }} dari 10
            @elseif($tipe == 11)
                Norma Pengguna
            @else
                Petunjuk Pengerjaan
            @endif
        </div>

        <div class="norma-timer-pill">
            <i class="fas fa-clock"></i>
            <span id="countdown">--:--:--</span>
        </div>
    </div>

    <!-- Step indicator -->
    <div class="norma-steps" style="margin-bottom: 20px;">
        @for($i = 1; $i <= 10; $i++)
            <div class="norma-step-item">
                <div class="norma-step-dot {{ $i < $tipe ? 'done' : ($i == $tipe ? 'active' : '') }}">
                    @if($i < $tipe)
                        <i class="fas fa-check" style="font-size:10px;"></i>
                    @else
                        {{ $i }}
                    @endif
                </div>
                @if($i < 10)
                    <div class="norma-step-line {{ $i < $tipe ? 'done' : '' }}"></div>
                @endif
            </div>
        @endfor
    </div>

    <!-- Main test card -->
    <div class="norma-card">
        <div class="norma-card-header">
            <div class="norma-card-header-icon">
                <i class="fas fa-brain"></i>
            </div>
            <div>
                <h5>
                    @if($tipe == 11)
                        Norma Pengguna
                    @elseif($tipe <= 0)
                        Petunjuk Pengerjaan
                    @else
                        Subtes {{ $tipe }}
                    @endif
                </h5>
                <p>Sistem Psikotest Terpadu &mdash; Kerjakan dengan teliti dan jujur</p>
            </div>
        </div>

        <div class="norma-card-body">
            <div class="norma-livewire-zone">
                @if($tipe == 1)
                    @livewire('norma.test.kesatu')
                @elseif($tipe == 2)
                    @livewire('norma.test.kedua')
                @elseif($tipe == 3)
                    @livewire('norma.test.ketiga')
                @elseif($tipe == 4)
                    @livewire('norma.test.keempat')
                @elseif($tipe == 5)
                    @livewire('norma.test.kelima')
                @elseif($tipe == 6)
                    @livewire('norma.test.keenam')
                @elseif($tipe == 7)
                    @livewire('norma.test.ketujuh')
                @elseif($tipe == 8)
                    @livewire('norma.test.kedelapan')
                @elseif($tipe == 9)
                    @livewire('norma.test.kesembilan')
                @elseif($tipe == 10)
                    @livewire('norma.test.kesepuluh')
                @elseif($tipe == 11)
                    @livewire('norma.user-norma')
                @else
                    @livewire('norma.test.petunjuk')
                @endif
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    // timerUpdated: dikirim dari Livewire component (kesatu, kedua, dst)
    // setelah user klik Mulai. secondsLeft = sisa detik dari server.
    Livewire.on('timerUpdated', (secondsLeft) => {
        // Sembunyikan elemen .timer jquery.simple.timer jika masih ada
        $('.timer').hide();

        const countdownEl = document.getElementById('countdown');
        let sisa = secondsLeft;

        // Bersihkan interval lama jika ada (misalnya Livewire re-render)
        if (window._timerInterval) clearInterval(window._timerInterval);

        function formatWaktu(detik) {
            const h = Math.floor(detik / 3600);
            const m = Math.floor((detik % 3600) / 60);
            const s = detik % 60;
            return String(h).padStart(2,'0') + ':' +
                   String(m).padStart(2,'0') + ':' +
                   String(s).padStart(2,'0');
        }

        // Tampilkan langsung sebelum interval pertama
        countdownEl.textContent = formatWaktu(sisa);

        window._timerInterval = setInterval(function () {
            if (sisa > 0) {
                sisa--;
                countdownEl.textContent = formatWaktu(sisa);
                if (sisa < 60) {
                    countdownEl.classList.add('countdown-warning');
                }
            } else {
                clearInterval(window._timerInterval);
                countdownEl.textContent = '00:00:00';
                // Trigger tombol finish tersembunyi di dalam livewire component
                $('#finish').trigger('click');
            }
        }, 1000);
    });

    Livewire.on('reloadPage', function () {
        location.reload();
    });
</script>
@endpush
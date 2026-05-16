<div>

    {{-- ═══════════════════════════════════════════════
         STATE 1 — PETUNJUK (belum mulai)
    ═══════════════════════════════════════════════ --}}
    @if($waktu_mulai === null)

    <style>
        .petunjuk-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }
        .petunjuk-icon {
            width: 48px;
            height: 48px;
            background: #EEF2FF;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4F46E5;
            font-size: 20px;
            flex-shrink: 0;
        }
        .petunjuk-title {
            font-size: 18px;
            font-weight: 700;
            color: #1A1A2E;
            margin: 0 0 4px;
            letter-spacing: -0.3px;
        }
        .petunjuk-subtitle {
            font-size: 13px;
            color: #6B6B80;
            margin: 0;
        }

        .petunjuk-content {
            background: #FAFBFF;
            border: 1px solid #E8E9F0;
            border-radius: 12px;
            padding: 24px 28px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.8;
            color: #2D2D45;
        }

        .petunjuk-img-wrap {
            text-align: center;
            margin: 24px 0;
        }
        .petunjuk-img-wrap img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            border: 1px solid #E8E9F0;
        }

        .petunjuk-ready-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #EEF2FF;
            border: 1px solid #C7D2FE;
            border-radius: 12px;
            padding: 14px 20px;
            margin-top: 24px;
        }
        .petunjuk-ready-text {
            font-size: 13px;
            font-weight: 600;
            color: #4338CA;
        }
        .petunjuk-ready-text span {
            display: block;
            font-weight: 400;
            color: #6366F1;
            font-size: 12px;
            margin-top: 2px;
        }

        .btn-start {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #4F46E5;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 22px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.15s, transform 0.1s;
            font-family: inherit;
        }
        .btn-start:hover { opacity: 0.88; }
        .btn-start:active { transform: scale(0.97); }
        .btn-start i { font-size: 14px; }
    </style>

    <div class="petunjuk-header">
        <div class="petunjuk-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <div>
            <h4 class="petunjuk-title">
                Petunjuk &amp; Contoh Soal
            </h4>
            <p class="petunjuk-subtitle">
                {{ $NormaSe['nama'] ?? 'Intelligence Structure Test SE - 01' }}
            </p>
        </div>
    </div>

    <div class="petunjuk-content">
        {!! nl2br($NormaSe['petunjuk_kesatu'] ?? '') !!}
    </div>

    @if(!empty($NormaSe['file_petunjuk']))
        <div class="petunjuk-img-wrap">
            <img src="{{ url('storage/photos/' . $NormaSe['file_petunjuk']) }}" alt="Contoh soal">
        </div>
    @endif

    <div class="petunjuk-ready-bar">
        <div class="petunjuk-ready-text">
            Siap untuk memulai?
            <span>Pastikan Anda sudah memahami petunjuk di atas sebelum melanjutkan.</span>
        </div>
        <button type="button" class="btn-start" wire:click="seMulai({{ $test_id }})">
            Mulai Sekarang <i class="fas fa-arrow-right"></i>
        </button>
    </div>


    {{-- ═══════════════════════════════════════════════
         STATE 2 — SOAL AKTIF (test berjalan)
    ═══════════════════════════════════════════════ --}}
    @else

    <style>
        /* Info petunjuk waktu */
        .soal-info-bar {
            background: #F0F4FF;
            border: 1px solid #C7D2FE;
            border-radius: 10px;
            padding: 12px 18px;
            margin-bottom: 24px;
            font-size: 13px;
            color: #4338CA;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .soal-info-bar i { margin-top: 2px; flex-shrink: 0; font-size: 14px; }
        .soal-info-bar p { margin: 0; line-height: 1.6; }

        /* Divider antar soal */
        .soal-item {
            padding: 20px 0;
            border-bottom: 1px solid #F0F0F5;
        }
        .soal-item:last-child { border-bottom: none; }

        /* Nomor + pertanyaan */
        .soal-question-row {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 16px;
        }
        .soal-no {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: #EEF2FF;
            color: #4F46E5;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .soal-no.answered {
            background: #D1FAE5;
            color: #065F46;
        }
        .soal-text {
            font-size: 15px;
            font-style: italic;
            color: #1A1A2E;
            line-height: 1.7;
            font-weight: 500;
            margin: 0;
        }

        /* Radio options */
        .soal-options {
            padding-left: 44px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .soal-option-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px;
            border: 1.5px solid #E8E9F0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.15s;
            font-size: 14px;
            color: #2D2D45;
            background: #fff;
        }
        .soal-option-label:hover {
            border-color: #A5B4FC;
            background: #F5F3FF;
        }

        /* Radio input hidden, styling via label */
        .soal-option-radio {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid #C7C7D4;
            border-radius: 50%;
            flex-shrink: 0;
            cursor: pointer;
            transition: all 0.15s;
            position: relative;
        }
        .soal-option-radio:checked {
            border-color: #4F46E5;
            background: #4F46E5;
            box-shadow: inset 0 0 0 3px #fff;
        }
        .soal-option-radio:checked + .soal-option-label {
            border-color: #4F46E5;
            background: #EEF2FF;
            color: #3730A3;
            font-weight: 500;
        }

        /* Wrapping label trick: we use <label> as the whole row */
        .soal-option-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px;
            border: 1.5px solid #E8E9F0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.15s;
            background: #fff;
        }
        .soal-option-wrap:hover {
            border-color: #A5B4FC;
            background: #F5F3FF;
        }
        .soal-option-wrap:has(input:checked) {
            border-color: #4F46E5;
            background: #EEF2FF;
        }
        .soal-option-key {
            font-size: 12px;
            font-weight: 700;
            color: #9CA3AF;
            min-width: 18px;
        }
        .soal-option-wrap:has(input:checked) .soal-option-key {
            color: #4F46E5;
        }
        .soal-option-text {
            font-size: 14px;
            color: #2D2D45;
            line-height: 1.5;
        }
        .soal-option-wrap:has(input:checked) .soal-option-text {
            color: #3730A3;
            font-weight: 500;
        }

        /* Footer tombol */
        .soal-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #F0F0F5;
        }

        .btn-next-hidden {
            display: none;
        }

        .btn-next {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #4F46E5;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.15s, transform 0.1s;
            font-family: inherit;
        }
        .btn-next:hover { opacity: 0.88; }
        .btn-next:active { transform: scale(0.97); }

        .btn-next-confirm {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            color: #4F46E5;
            border: 1.5px solid #C7D2FE;
            border-radius: 10px;
            padding: 9px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
            font-family: inherit;
        }
        .btn-next-confirm:hover {
            background: #EEF2FF;
            border-color: #A5B4FC;
        }
    </style>

    {{-- Info petunjuk waktu --}}
    @if(!empty($NormaSe['petunjuk_kedua']))
    <div class="soal-info-bar">
        <i class="fas fa-info-circle"></i>
        <p>{{ $NormaSe['petunjuk_kedua'] }}</p>
    </div>
    @endif

    {{-- Nama test --}}
    <h6 style="font-size:13px;font-weight:600;color:#6B6B80;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:20px;">
        {{ $nama_test }}
    </h6>

    {{-- Daftar soal --}}
    @if($QuizSe)
        @foreach($QuizSe as $QS => $q)
        <div class="soal-item">

            {{-- Nomor + Pertanyaan --}}
            <div class="soal-question-row">
                <div class="soal-no">{{ $q['no'] }}</div>
                <p class="soal-text">{{ $q['quiz'] }}</p>
            </div>

            {{-- Pilihan A–E --}}
            <div class="soal-options">
                @foreach(['a','b','c','d','e'] as $opt)
                <label class="soal-option-wrap">
                    <input
                        type="radio"
                        class="soal-option-radio"
                        id="option1_{{ $q['no'] }}{{ $opt }}"
                        wire:model="answer{{ $q['no'] }}"
                        value="{{ $opt }}"
                        wire:change="updateDatabase({{ $q['id'] }},{{ $q['no'] }})"
                    />
                    <span class="soal-option-key">{{ strtoupper($opt) }}</span>
                    <span class="soal-option-text">{{ $q[$opt] }}</span>
                </label>
                @endforeach
            </div>

        </div>
        @endforeach
    @endif

    {{-- Footer navigasi --}}
    <div class="soal-footer">
        {{-- Tombol trigger otomatis (timer habis) — tersembunyi --}}
        <button
            id="finish"
            type="button"
            class="btn-next-hidden"
            wire:click="seSelesai({{ $test_id }})"
        >NEXT</button>

        {{-- Tombol manual dengan konfirmasi --}}
        <button
            id="finish_"
            type="button"
            class="btn-next-confirm"
            onclick="confirm('Apakah anda ingin berpindah ke test tahap selanjutnya?') || event.stopImmediatePropagation()"
            wire:click="seSelesai({{ $test_id }})"
        >
            <i class="fas fa-check"></i>
            Selesai &amp; Lanjut
        </button>
    </div>

    @endif

</div>
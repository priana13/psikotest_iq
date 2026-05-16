@extends('layouts.app-iq')

@section('title', 'Biodata – SIMKESMEN')

@push('styles')
<style>
    body { background: linear-gradient(180deg, #eef0ff 0%, #c5cae9 100%); }
</style>
@endpush

@section('content')

{{-- Top strip --}}
<div class="bg-white shadow-sm px-6 py-3 flex items-center gap-3 max-w-lg mx-auto rounded-b-lg">
    <div class="w-2 h-8 rounded-full" style="background:var(--blue-bright)"></div>
    <div>
        <div class="font-black text-lg" style="font-family:'Poppins',sans-serif; color:var(--blue-deep)">
            Isikan biodata Anda
        </div>
        <div class="text-xs text-gray-500">Lengkapi data diri sebelum memulai tes</div>
    </div>
</div>

<div class="max-w-lg mx-auto py-4">
    <div class="card-white p-6 fade-up">

        {{-- ID card icon --}}
        <div class="flex justify-end mb-4">
            <div class="rounded-2xl p-4" style="background:var(--green-soft)">
                @include('partials.id-card-svg')
            </div>
        </div>    

        <form action="{{ route('norma.test.biodata.store') }}" method="POST" class="space-y-4"
              x-data="biodataForm()">
            @csrf

            <div class="flex items-center gap-3">
                <label class="text-sm font-bold w-36 shrink-0" style="color:var(--blue-deep)">
                    Tanggal sekarang
                </label>
                <input id="bio-tanggal" name="tanggal" type="date"
                       value="{{ old('tanggal', date('Y-m-d')) }}"
                       x-model="tanggalSekarang"
                       class="form-input">
                @error('tanggal')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center gap-3">
                <label class="text-sm font-bold w-36 shrink-0" style="color:var(--blue-deep)">Nama</label>
                <div class="flex-1">
                    <input id="bio-nama" name="nama" type="text" placeholder="Nama lengkap"
                        value="{{ old('nama') }}"
                        x-model="nama"
                        class="form-input">
                
                    @error('nama')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    
                </div>
            </div>

            <div class="flex items-center gap-3">
                <label class="text-sm font-bold w-36 shrink-0" style="color:var(--blue-deep)">Jenis Kelamin</label>
                <div class="flex-1">
                    <select id="bio-jk" name="jenis_kelamin" class="form-input"
                                x-model="jenisKelamin">
                            <option value="">-- Pilih --</option>
                            @foreach(['Laki-laki', 'Perempuan'] as $jk)
                                <option value="{{ $jk }}" {{ old('jenis_kelamin') === $jk ? 'selected' : '' }}>
                                {{ $jk }}
                            </option>
                        @endforeach
                    </select>

                    @error('jenis_kelamin')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3">
                <label class="text-sm font-bold w-36 shrink-0" style="color:var(--blue-deep)">Tanggal Lahir</label>

                <div class="flex-1">
                    <input id="bio-tgl-lahir" name="tanggal_lahir" type="date"
                           value="{{ old('tanggal_lahir') }}"
                           x-model="tanggalLahir"
                           @change="hitungUsia()"
                           class="form-input">

                    @error('tanggal_lahir')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    
                </div>

            </div>

            <div class="flex items-center gap-3">
                <label class="text-sm font-bold w-36 shrink-0" style="color:var(--blue-deep)">Usia (Th)</label>
                <div class="flex-1">
                    <input id="bio-usia" name="usia" type="number" placeholder="Usia"
                           x-model.number="usia"
                           class="form-input">
                    @error('usia')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3">
                <label class="text-sm font-bold w-36 shrink-0" style="color:var(--blue-deep)">Pendidikan</label>

                <div class="flex-1">
                    <select id="bio-pendidikan" name="pendidikan" class="form-input">
                        <option value="">-- Pilih --</option>
                            @foreach(['SD','SMP','SMA/SMK','D3','S1','S2','S3'] as $edu)
                                <option value="{{ $edu }}" {{ old('pendidikan') === $edu ? 'selected' : '' }}>
                                    {{ $edu }}
                                </option>
                            @endforeach

                    </select>
                    <div class="text-red-500 text-xs mt-1">
                        @error('pendidikan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

            </div>

            <div class="mt-5 p-3 rounded-lg text-center text-sm font-bold"
                 style="background:#fff9c4; color:#f57f17">
                ⚠️ Pastikan data Anda sudah benar !
            </div>
            <p class="text-center text-xs text-gray-500 mb-4">
                Klik tombol dibawah untuk melanjutkan
            </p>

            <button type="submit" class="btn-yellow w-full py-3 text-base">OKE</button>
        </form>

    </div>
</div>

@push('scripts')
<script>
    function biodataForm() {
     
        return {
            tanggalSekarang: '{{ old('tanggal', date('Y-m-d')) }}',
            nama: '{{ old('nama') }}',
            jenisKelamin: '{{ old('jenis_kelamin') }}',
            tanggalLahir: '{{ old('tanggal_lahir') }}',
            usia: {{ old('usia', 0) }},

            hitungUsia() {
               
                if (!this.tanggalLahir) {
                    this.usia = null;
                    return;
                }

                const tanggalLahir = new Date(this.tanggalLahir);
                const tanggalSekarang = new Date(this.tanggalSekarang);

                if (tanggalLahir > tanggalSekarang) {
                    this.usia = null;
                    return;
                }

                let usia = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear();
                const bulanSekarang = tanggalSekarang.getMonth();
                const bulanLahir = tanggalLahir.getMonth();
                const hariSekarang = tanggalSekarang.getDate();
                const hariLahir = tanggalLahir.getDate();

                if (bulanSekarang < bulanLahir || (bulanSekarang === bulanLahir && hariSekarang < hariLahir)) {
                    usia--;
                }

                this.usia = Math.max(0, usia);
            }
        };
    }
</script>
@endpush

@endsection

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="hapusModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Anda Akan Menghapus Semua Soal di Kolom: {{ $column }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body text-center">

            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Batal</button>
            <button type="button" wire:click.prevent="hapusSoalColumn" class="btn btn-danger close-modal">Ya Hapus</button>

			
            </div>

            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>

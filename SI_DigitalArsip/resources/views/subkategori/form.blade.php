 {{-- Modal  Tambah --}}
 <div class="modal fade" id="tambahModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Tambah Data
                     Baru</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('subkategori.store')}}" method="post">
                     {{ csrf_field() }}
                     <!-- Isi form kedua di sini -->
                     <div class="form-group">
                         <label for="nama">Nama Sub-Kategori</label>
                         <input type="text" class="form-control" name="nama" id="nama"
                             aria-describedby="Kode Universitas" placeholder="Masukkan Nama" required>
                         <div id="kodeWarning" class="text-danger"></div>
                     </div>
                     <div class="form-group">
                         <label for="keterangan">Keterangan</label>
                         <textarea class="form-control" name="keterangan" id="keterangan"
                             placeholder="Masukkan Deskripsi" required></textarea>
                     </div>

                     <button type="submit" class="btn btn-primary">Simpan</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                 </form>
             </div>
             <div class="modal-footer">

             </div>
         </div>
     </div>
 </div>


 <!-- Modal Hapus -->
 <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data
                     Standarisasi
                 </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Ingin Hapus Data tersebut ?
             </div>
             <form id="hapusModalForm" action="" method="post">
                 @csrf
                 @method('DELETE')
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                     <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                         title="Tombol Hapus">Hapus</button>
                 </div>
             </form>

         </div>
     </div>
 </div>

 <!-- Modal Update -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editForm" method="post">
                @csrf
                @method('PATCH')
                <!-- Isi formulir update di sini -->
                <div class="form-group">
                    <label for="nama">Nama Sub-Kategori</label>
                    <input type="text" class="form-control " name="nama" id="nama" placeholder="Masukkan Nama"
                        required>
                    <div id="kodeWarning" class="text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="Keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="Keterangan" id="Keterangan"
                        placeholder="Masukkan Keterangan" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </form>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
</div>

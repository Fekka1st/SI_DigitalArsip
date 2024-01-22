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
                 <form action="/kelolaberkas/store" method="post" enctype="multipart/form-data">

                     @csrf
                     <!-- Isi form kedua di sini -->
                     <div class="form-group">
                         <label for="input3">Nama Berkas</label>
                         <input type="text" class="form-control" name="NamaBerkas" id="NamaBerkas"
                             aria-describedby="Nama Standar" placeholder="Masukan Nama Berkas">
                     </div>
                     <div class="form-group">
                         <label for="input4">Keterangan</label>
                         <input type="text" class="form-control" name="keterangan" id="keterangan"
                             placeholder="........" required>
                     </div>
                     <div class="form-group">
                         <label for="id_standar">Standar</label>
                         <select class="form-control" name="id_standar" id="id_standar" required>
                             <option value="">Pilih Standar</option>
                             @foreach ($standar as $id => $nama_standar)
                             <option value="{{ $id }}">{{ $nama_standar }}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="form-group">
                         <label for="id_kategori">Kategori</label>
                         <select class="form-control" name="id_kategori" id="id_kategori" required>
                             <option value="">Pilih Kategori</option>
                             @foreach ($kategori as $id => $Nama_Kategori)
                             <option value="{{ $id }}">{{ $Nama_Kategori }}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="form-group">
                         <label for="id_subkategori">Subkategori</label>
                         <select class="form-control" name="id_subkategori" id="id_subkategori" required>
                             <option value="">Pilih Subkategori</option>
                             @foreach ($subkategori as $id=> $Nama_SubKategori)
                             <option value="{{ $id }}">{{ $Nama_SubKategori }}</option>
                             @endforeach
                         </select>
                     </div>

                     {{-- <div class="form-group">
                        <label for="filename">File Berkas</label>
                        <input type="file" class="form-control" name="filename" id="filename" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="filename">File Berkas (Maksimal 2 MB, PDF/Word/Excel)</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="filename" id="filename" required
                                    accept=".pdf, .doc, .docx, .xls, .xlsx"
                                    aria-describedby="inputGroupFileAddon01" onchange="validateFile()">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>

                     <div class="d-flex text-center justify-content-between">
                         <button type="button" data-dismiss="modal"
                             class="flex-shrink-1 btn btn-danger "> Kembali</button>
                         <button type="submit" class="ml-2 flex-fill btn btn-primary"> Simpan Berkas</button>
                     </div>
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
                     Berkas
                 </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Data yang sudah terhapus tidak akan bisa dipulihkan <br>
                 Anda yakin ingin  menghapus berkas tersebut?
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
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                        <label for="input3">Nama Berkas</label>
                        <input type="text" class="form-control" name="NamaBerkas" id="NamaBerkas"
                            aria-describedby="Nama Standar" placeholder="Masukan Nama Berkas">
                    </div>
                    <div class="form-group">
                        <label for="input4">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan"
                            placeholder="........" required>
                    </div>
                    <div class="form-group">
                        <label for="id_standar">Standar</label>
                        <select class="form-control" name="id_standar" id="id_standar" required>
                            <option value="">Pilih Standar</option>
                            @foreach ($standar as $id => $nama_standar)
                            <option value="{{ $id }}">{{ $nama_standar }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $id => $Nama_Kategori)
                            <option value="{{ $id }}">{{ $Nama_Kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_subkategori">Subkategori</label>
                        <select class="form-control" name="id_subkategori" id="id_subkategori" required>
                            <option value="">Pilih Subkategori</option>
                            @foreach ($subkategori as $id=> $Nama_SubKategori)
                            <option value="{{ $id }}">{{ $Nama_SubKategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                       <label for="filename">File Berkas</label>
                       <input type="file" class="form-control" name="filename" id="filename" required>
                   </div> --}}
                   <div class="form-group">
                    <label for="filename">File Berkas (Maksimal 2 MB, PDF/Word/Excel)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="filename" id="filename" required
                                accept=".pdf, .doc, .docx, .xls, .xlsx"
                                aria-describedby="inputGroupFileAddon01" onchange="validateFile()">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                 </form>
             </div>
             <div class="modal-footer">
                <label class="text-left">* Untuk bagian Berkas Jika tidan ingin di rubah kosongkan saja</label>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Detail -->
 <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Detail Berkas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">

             </div>
             <div class="modal-footer"></div>
         </div>
     </div>
 </div>

@extends('Dashboard.base')
 @section('title','Dashboard Artikel')
 @section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Form </h6> <br>          
        </div>
        <div class="card-body">
         
            <div class="table-responsive">
                <form action="{{route('update.artikel',$artikel->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-header">
                        <h4>Edit Data Artikel</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="artikel" >artikel</label>
                          <input type="text" class="form-control" id="artikel" name="artikel" value="{{ $artikel->artikel }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Gambar Artikel</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                          </div>
                          
                        </div>
                        <div class="mb-4">
                            <label for="kategori_id" class="form-label">Pilih Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="form-control" required>
                                <option value="" disabled selected>Pilih kategori</option>
                                @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('kategori_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->categori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                     
                       
                        <button type="submit" class="btn btn-primary">Save change</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
 
</div>
 @endsection
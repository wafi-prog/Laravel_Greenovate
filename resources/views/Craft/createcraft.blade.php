@extends('Dashboard.base')
 @section('title','Dashboard craft')
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
                <form action="{{route('create.craft')}}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Buat Data craft</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama" >Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <input type="deskripsi" class="form-control" id="deskripsi" name="deskripsi">
                        </div>

                        <div class="mb-4">
                            <label for="filter_id" class="form-label">Pilih filter</label>
                            <select id="filter_id" name="filter_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Filter</option>
                                @foreach ($filter as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('filter_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->filter }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                           
                       <div class="form-group">
                      <label for="tutorial">Tutorial</label>
                      <textarea class="form-control" id="tutorial" name="tutorial"></textarea>
                    </div>

                    <script>
                      CKEDITOR.replace('tutorial');
                    </script>


                          <div class="form-group">
                            <label for="link_yt">Link Youtube</label>
                            <input type="link_yt" class="form-control" id="link_yt" name="link_yt">
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
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
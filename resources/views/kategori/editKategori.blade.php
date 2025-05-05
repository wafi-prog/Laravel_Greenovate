{{-- modal tambah genre --}}
<div class="modal fade" id="edit{{$row->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Kategori</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('update.categori',$row->id)}}" method="POST">
            @method('PUT')
            @csrf 
            <div class="mb-3">
                <label for="categori">Jenis Kategori</label>
                <input type="text" class="form-control" name="categori" value="{{$row->categori}}" >
            </div>
        
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
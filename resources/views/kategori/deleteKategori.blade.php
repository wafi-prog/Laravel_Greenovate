{{-- modal delete --}}
<div class="modal fade" id="delete{{$row->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Data Kategori</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('delete.categori',$row->id)}}" method="POST">
            @method('Delete')
            @csrf 
            <div class="mb-3">
                <p class="text-center" >Yakin Hapus Data <strong style="color: brown">{{$row->categori}}</strong></p>
                <input type="hidden" name="id" value="{{$row->id}}">
            </div>
        
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
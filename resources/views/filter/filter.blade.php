@extends('Dashboard.base')
 @section('title','Dashboard Filter')
 
 @section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Filter</h1>
   

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Filter</h6> <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Filter</button>
        </div>
        <div class="card-body">
           {{-- Alert create --}}
           @if(Session::get('Create'))
           <div class="alert alert-success alert-dismissble fade show " role="alert">
               {{Session::get('Create')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           @endif
           
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th> Kategori Filter</th>
                    </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($filter as $row)
                        <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$row->filter}}</td>
                         
                    @endforeach
                     </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
 {{-- modal tambah genre --}}
 <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Filter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('create.filter')}}" method="POST">
          @csrf 
          <div class="mb-3">
              <label for="filter">Kategori filter</label>
              <input type="text" class="form-control" name="filter" >
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
</div>
 @endsection
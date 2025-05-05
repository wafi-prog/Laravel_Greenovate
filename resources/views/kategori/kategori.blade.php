@extends('Dashboard.base')
 @section('title','Dashboard Kategori')
 
 @section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Kategori</h1>
   

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Kategori</h6> <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Kategori</button>
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
           {{-- Alert create --}}
           @if(Session::get('Update'))
           <div class="alert alert-success alert-dismissble fade show " role="alert">
               {{Session::get('Update')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           @endif
           {{-- Alert create --}}
           @if(Session::get('Delete'))
           <div class="alert alert-danger alert-dismissble fade show " role="alert">
               {{Session::get('Delete')}}
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
                        <th> jenis Kategori</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                  
                    <tbody>
                      @foreach ($kategori as $row)
                          <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$row->categori}}</td>
                           <td>{{$row->slug}}</td>
                           <td>
                            <a href="" data-toggle="modal" data-target="#edit{{$row->id}} "  class="btn btn-info">Edit</a>
                            <a href="" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger">Delete</a>
                           </td>
                          </tr>
                          @include('kategori.editKategori')
                          @include('kategori.deleteKategori')
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
        <h4 class="modal-title">Tambah Data Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('create.categori')}}" method="POST">
          @csrf 
          <div class="mb-3">
              <label for="categori">Jenis Kategori</label>
              <input type="text" class="form-control" name="categori" >
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
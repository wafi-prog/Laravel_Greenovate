@extends('Dashboard.base')
 @section('title','Dashboard Artikel')
 
 @section('content')
  <!-- Begin Page Content -->
 
     <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Artikel</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Artikel</h6> <br>
           <a href="{{route('form.artikel')}}" class="btn btn-primary">Add Data</a>
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
           {{-- Alert Update --}}
           @if(Session::get('Update'))
           <div class="alert alert-success alert-dismissble fade show " role="alert">
               {{Session::get('Update')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           @endif
           {{-- Alert Delete --}}
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
                            <th>Judul</th>
                            <th>Artikel</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Created At</th>
                            <th colspan="2">Action</th>
                          </tr>
                    </thead>
                    <tbody>
                       {{-- foreach buat nampilin semua data --}}
                       @foreach ($artikel as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->artikel}}</td>
                            <td><img src="{{ url('storage/img-artikel' . '/' . $row->image) }}" alt="{{ $row->artikel }}" style="height: 100px;width: 100%; object-fit: cover;" class="img-fluid rounded"></td>
                            <td>{{$row->kategori->categori}}</td>
                            <td>{{ $row->created_at->format('d M Y') }}</td>
                            <td>
                             <a href="{{route('edit.artikel',$row->id)}}" class="btn btn-secondary">Edit</a>
                         </td>
                         <td>
                             <a href="" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger">Delete</a>
                         </td>
                          </tr>
                          @include('Artikel.deleteartikel')
                      @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
 
</div>
 @endsection
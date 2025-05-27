@extends('Dashboard.base')
 @section('title','Dashboard User')
 
 @section('content')
  <!-- Begin Page Content -->
 
     <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data User</h6> <br>
           <a href="" class="btn btn-primary">Add Data</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image Profile</th>
                            <th>Created At</th>
                            <th colspan="2">Action</th>
                          </tr>
                    </thead>
                    <tbody>
                       {{-- foreach buat nampilin semua data --}}
                       @foreach ($user as $row)  
                       <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$row->name}}</td>
                         <td>{{$row->email}}</td>
                         <td>{{$row->image_profile}}</td>
                         <td>{{$row->telpon}}</td>
                         
                         <td>{{$row->created_at}}</td>
                         {{-- <td> 
                             <td>{{$row->created_at}}</td>
                           <a href="{{route('edit.user',$row->id)}}" class="btn btn-info">Edit</a>                          
                         </td>
                         <td>
                        
                           <form action="{{route('delete.dataUser')}}" method="POST">
                             @csrf
                             @method('DELETE')   
                               <input type="hidden" name="id" value="{{$row->id}}">
                                 <button type="submit" class="btn btn-danger" >Delete</button>
                               </form>
                         </td> --}}
                     </tr>
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
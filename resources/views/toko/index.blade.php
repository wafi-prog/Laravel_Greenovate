@extends('Dashboard.base')
 @section('title','Dashboard Toko')
 
 @section('content')
  <!-- Begin Page Content -->
 
     <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Toko</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Toko</h6> <br>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Id</th>
                            <th>Nama Toko</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Created At</th>
                          </tr>
                    </thead>
                    <tbody>
                     
                       @foreach ($toko as $row)  
                       <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$row->user->id}}</td>
                         <td>{{$row->nama_toko}}</td>
                         <td>{{$row->lokasi}}</td>
                          <td>
                          <form action="{{ route('index.update.status', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="badge 
                                {{ $row->status == 'pending' ? 'badge-warning' : '' }}
                                {{ $row->status == 'verified' ? 'badge-success' : '' }}">
                                <option value="pending" {{ $row->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ $row->status == 'verified' ? 'selected' : '' }}>Verified</option>
                            </select>
                        </form>
                        </td>
                         
                         <td>{{$row->created_at}}</td>
                        
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
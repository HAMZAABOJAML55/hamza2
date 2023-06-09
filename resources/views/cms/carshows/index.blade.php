@extends('cms.parent')

@section('title' , 'Index CarShow' )

@section('main-title' , 'Index CarShow')

@section('sub-title' , 'Index CarShow')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('car_shows.create') }}" type="submit" class="btn btn-success">Add New CarShow</a>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>CarShow Name</th>
                <th>CarShow Mobile</th>
                <th>City Name</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($carshows as $carshow)
                <tr>
                    <td>{{ $carshow->id }}</td>
                    <td>{{$carshow->name}}</td>
                    <td>{{ $carshow->mobile }}</td>
                    <td>{{ $carshow->city->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('car_shows.edit' , $carshow->id) }}" type="button" class="btn btn-info">Edit</a>
                            <button type="button" onclick="performDestroy({{ $carshow->id }} , this)" class="btn btn-danger">Delete</button>
                            <a href="{{ route('car_shows.show' , $carshow->id) }}" type="button" class="btn btn-success">Show</a>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  {{ $carshows->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/car_shows/'+id , reference);
        }
    </script>

@endsection


@extends('cms.parent')

@section('title' , 'Index City' )

@section('main-title' , 'Index City')

@section('sub-title' , 'Index City')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('cities.create') }}" type="submit" class="btn btn-success">Add New City</a>
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
                <th>City Name</th>
                <th>Country Name</th>
                <th>Number of Cars Shows</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{$city->name}}</td>
                    <td>{{ $city->country->name}}</td>
                    <td>{{ $city->car_shows_count}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('cities.edit' , $city->id) }}" type="button" class="btn btn-info">Edit</a>
                            <button type="button" onclick="performDestroy({{ $city->id }} , this)" class="btn btn-danger">Delete</button>
                            <a href="{{ route('cities.show' , $city->id) }}" type="button" class="btn btn-success">Show</a>
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
  {{ $cities->links() }}
@endsection

@section('scripts')

    <script>
        function performDestroy(id , reference){
            confirmDestroy('/cms/admin/cities/'+id , reference);
        }
    </script>

@endsection


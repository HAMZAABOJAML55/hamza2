@extends('cms.parent')

@section('title' , 'Index Supplier')

@section('main-title' , 'Index Supplier')

@section('sub-title' , 'Index Supplier')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <a href="{{ route('suppliers.create') }}" type="submit" class="btn btn-success">Add New Supplier</a>

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
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>email</th>
                    <th>Gender</th>
                    <th>city</th>
                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $Supplier)
                <tr>
                    <td>{{$Supplier->id}}</td>
                    <td>
                      <img class="img-circle img-bordered-sm" src="{{asset('storage/images/Supplier/'.$Supplier->user->image ?? "")}}" width="60" height="60" alt="User Image">
                   </td>
                    <td>{{$Supplier->user->first_name ?? "".' '. $Supplier->user->last_name ?? ""}}</td>
                    <td>{{$Supplier->email}}</td>
                    <td>{{$Supplier->user->gender ?? ""}}</td>
                    <td>{{$Supplier->user->city->name ?? ""}}</td>
                    <td>

                        <a href="{{ route('suppliers.edit' , $Supplier->id ) }}" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" onclick="performDestroy({{$Supplier->id}} , this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <a href="{{ route('suppliers.show' , $Supplier->id) }}" type="button" class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                      </td>
                </tr>
                    @endforeach

                </tbody>
              </table>
            </div>

            {{ $suppliers->links() }}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection


@section('scripts')

<script>
  function performDestroy(id , reference){

    confirmDestroy('/cms/admin/suppliers/'+id , reference);
  }
  </script>
@endsection
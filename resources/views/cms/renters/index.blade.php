@extends('cms.parent')

@section('title', 'Index Renter')

@section('main-title', 'Index Renter')

@section('sub-title', 'Index Renter')

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

                            <a href="{{ route('renters.create') }}" type="submit" class="btn btn-success">Add New Renter</a>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

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
                                        <th>Car</th>
                                        <th>city</th>
                                        <th>Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($renters as $renter)
                                        <tr>
                                            <td>{{ $renter->id }}</td>
                                            <td>
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/images/renter/' . $renter->user->image ?? '') }}"
                                                    width="60" height="60" alt="User Image">
                                            </td>
                                            <td>{{ $renter->user->first_name ?? ''  . ' ' . $renter->user->last_name ?? '' }}
                                            </td>
                                            <td>{{ $renter->email }}</td>
                                            <td>{{ $renter->user->gender ?? ''}}</td>
                                            <td>{{ $renter->car->name}}</td>
                                            <td>{{ $renter->user->city->name ?? ''}}</td>
                                            <td>

                                                <a href="{{ route('renters.edit', $renter->id) }}" type="button"
                                                    class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                <button type="button" onclick="performDestroy({{ $renter->id }} , this)"
                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                <a href="{{ route('renters.show', $renter->id) }}" type="button"
                                                    class="btn btn-success"><i class="far fa-eye"></i> Show</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        {{ $renters->links() }}
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
        function performDestroy(id, reference) {

            confirmDestroy('/cms/admin/renters/' + id, reference);
        }
    </script>
@endsection

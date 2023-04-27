@extends('cms.parent')

@section('title', 'Show Admin')

@section('sub-title', 'Show Admin')


@section('left-title', 'Show-Admin')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="first_name">Name of Car</label>
                    <input type="text" disabled value = "{{ $cars ->name }}"class="form-control" id="name" name="name"placeholder="Enter Car Name">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" disabled value = "{{ $cars ->model }}"class="form-control" id="model" name="model"placeholder="Enter Car Model">
                </div>
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" disabled  value = "{{ $cars ->color }}" class="form-control" id="color" name="color"placeholder="Enter Car color">
                </div>
                <div class="form-group">
                    <label for="status"> Status</label>
                    <select class="form-select form-select-sm"disabled name="status" style="width: 100%;" id="status" value = "{{ $cars ->status }}"
                        aria-label=".form-select-sm example">
                        <option value="active">active</option>
                        <option value="inactive">inactive </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gear_stick_type"> Gear_stick_type</label>
                    <select class="form-select form-select-sm"disabled name="gear_stick_type" style="width: 100%;" value = "{{ $cars ->gear_stick_type }}"
                        id="gear_stick_type" aria-label=".form-select-sm example">
                        <option value="manual">manual</option>
                        <option value="Automatic">Automatic</option>
                    </select>
                </div>
                <div class="form-group" data-select2-id="29">
                    <label for="tank_type">tank_type</label>
                    <select class="form-control select2 select2-hidden-accessible"disabled style="width: 100%;" id="tank_type" value = "{{ $cars ->tank_type }}"
                        name="tank_type" tabindex="-1" aria-hidden="true">
                        <option value="petrol">petrol</option>
                        <option value="diesel">diesel</option>
                    </select></span>
                </div>
                <div class="form-group">
                    <label for="buy_price">Buy_Price</label>
                    <input type="number" class="form-control" id="buy_price"disabled value = "{{ $cars ->buy_price }}"
                        name="buy_price"placeholder="Enter Car buy_price">
                </div>
                <div class="form-group">
                    <label for="rent_price">Rent_price</label>
                    <input type="number" class="form-control" id="rent_price"disabled value = "{{ $cars ->rent_price }}"
                        name="rent_price"placeholder="Enter Car rent_price">
                </div>
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cars->supplier->user->first_name . ' ' . $cars->supplier->user->last_name}}" disabled >
                  </div>
            </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-success" href ="{{ route('cars.index') }}" >Back</a>
        <button type="button" onclick="performDestroy({{ $cars->id }}, this) "class="btn btn-danger">Delete</button>

    </div>
    </form>
    </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/admins/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection

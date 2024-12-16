@extends('layouts.side')

@section('content')

<div>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Service</h3>
            </div>
                <form action="{{route('services.store')}}" method="post" id="formId">
                @csrf
                <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Service Name" required>
                      </div>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id='submitBtn' class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>

    </div>
</div>


@endsection

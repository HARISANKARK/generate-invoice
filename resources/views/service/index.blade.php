@extends('layouts.side')

@section('content')
<div>
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Services</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Name</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($services as $service)
                          <tr class="odd">
                            <th scope="row">{{$i++}}</th>
                            <td>{{$service->s_name}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection

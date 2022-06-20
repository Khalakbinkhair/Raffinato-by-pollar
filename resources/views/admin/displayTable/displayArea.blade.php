@extends('layouts.admin-layouts')
@section('content')
      

      
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Area</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach($area as $info)
                <tr>
                  <td class="width-fix-title">
                    <p style="text-align: center;">
                    {{$info->area}}
                  </td>
                    <td>
                      <form method="POST" action="{{ route('delete_area',$info['id'])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}  
                        <button class="btn btn-danger" onclick="return checkdelete()"><i class="fa fa-trash-o fa-lg"></i></button> 
                      </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                  <th>Area</th>
                  <th>Action</th>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endsection
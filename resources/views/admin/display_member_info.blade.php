@extends('layouts.admin-layouts')
@section('content')
<section class="content">
    @if (session('message'))
                <div id="hidediv" class="alert alert-success-polar alert-dismissible">
                  <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Thanks!</strong> {{ session('message') }}
                </div>
              @endif
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Table</h3>
        </div>
        <div class="card-body table-responsive">
          <table id="example2" class="table table-bordered table-hover  text-center">
            <thead>
              <tr>
                <th>Name</th>
                <th>Club Name</th>
                <th>Member ID</th>
                <th>Gender</th>
                <th>Area</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Mocha</th>
                <th>Mocha Rating</th>
                <th>Natural Vanilla</th>
                <th>Natural Vanilla Rating</th>
                <th>Mint Chocolate</th>
                <th>Mint Chocolate Rating</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($memberInfo as $info) 
              <tr>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->name}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->club_name}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->member_id}}
                </td>
                <td>
                  <p style="text-align: center;">
                  {{$info->gender}}
                  </p>
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->area}}
                </td>
                <td>
                  <p style="text-align: center;">
                  {{$info->phone}}
                  </p>
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->email}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->mocha}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->mocha_rating}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->natural_vanilla}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->vanilla_rating}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->mint_chocolate}}
                </td>
                <td class="width-fix-title">
                  <p style="text-align: center;">
                  {{$info->mint_rating}}
                </td>
                <td>
                  <div class="row">
                    <div class="col-md-6">
                      <a class="btn btn-primary" href="{{ route('edit_memberinfo',$info['id'])}}">
                        <i class="fa fa-edit fa-lg"></i>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <form method="POST" action="{{ route('delete_memberinfo',$info['id'])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}  
                        <button class="btn btn-danger" onclick="return checkdelete()"><i class="fa fa-trash-o fa-lg"></i></button> 
                      </form>
                  </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Club Name</th>
                <th>Member ID</th>
                <th>Gender</th>
                <th>Area</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Mocha</th>
                <th>Mocha Rating</th>
                <th>Natural Vanilla</th>
                <th>Natural Vanilla Rating</th>
                <th>Mint Chocolate</th>
                <th>Mint Chocolate Rating</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script type="text/javascript">
        setTimeout(function() {
          $('#hidediv').fadeOut('fast');
      }, 5000);
      
</script>
@endsection
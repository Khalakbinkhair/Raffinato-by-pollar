@extends('layouts.user-latouts')
@section('content')

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Table</h3>
        </div>
        <div class="card-body table-responsive">
          <table id="example2" class="table table-bordered table-hover text-center">
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
                  <a class="btn btn-primary" href="{{ route('user.edit_memberinfo',$info['id'])}}">
                    <i class="fa fa-edit fa-lg"></i>
                  </a>
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
@endsection
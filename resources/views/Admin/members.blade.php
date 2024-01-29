@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           <a href="{{ route('home')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
           <a href="{{ route('add_member')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add New</a></br>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Delca</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Welfare Members</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>ID/PPT No.</th>
                        <th>Phone No.</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Contribution</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cnt=1;
                    @endphp
                    @foreach($members as $member)
                        <tr>
                            <td>{{$cnt}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->idno}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->age}}</td>
                            <td>{{$member->status}}</td>
                            <td>{{$member->subscriptionfee}}/{{$member->paymentplan}}</td>
                            <td>
                                <a href="{{url ('/member/'.$member->id)}}" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i>&nbsp;Edit</a>
                                <button type="button" class="btn btn-danger btn-xs" data-memberid="{{$member->id}}" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i>&nbsp;Del</button>
                            </td>
                        </tr>
                        @php
                            $cnt++;
                        @endphp
                     @endforeach
                </tbody>
            </table>
        </div>

    </div>
  </div>
</div>

<!-- Modal for deleting member-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" align="center">Delete Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <p align="center">Are you sure you want to delete this record?</p>
                    <form method="post"  class="form-horizontal" action="{{route('delete_member','test')}}" enctype="multipart/form-data">
                    {{method_field('delete')}}
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="member_id" id="member_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"> No Cancel</button>
                <button type="submit" class="btn btn-danger">Yes Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End of Modal for deleting members -->

@endsection
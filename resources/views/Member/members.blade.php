@extends('layouts.member')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           <a href="{{ route('home')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
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
                        <th>Phone No.</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cnt=1;
                    @endphp
                    @foreach($all_members as $member)
                        <tr>
                            <td>{{$cnt}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->email}}</td>
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
@endsection
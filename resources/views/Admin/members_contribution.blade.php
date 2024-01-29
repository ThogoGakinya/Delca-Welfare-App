@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           <a href="{{ route('home')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
           <!-- Button trigger modal -->
           <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_contribution"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add New</button>
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
        <h5 class="card-title">Members Monthly/Annual Contributions</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Phone No.</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cnt=1;
                    @endphp
                    @foreach($contributions as $contribution)
                        <tr>
                            <td>{{$cnt}}</td>
                            <td>{{$contribution->users->name}}</td>
                            <td>{{$contribution->users->phone}}</td>
                            <td>{{$contribution->month}}</td>
                            <td>{{$contribution->amount}}</td>
                            <td>
                                <a href="{{url ('/edit/member_contribution/'.$contribution->id)}}" class="btn btn-primary btn-xs" ><i class="fas fa-edit"></i>&nbsp;Edit</a>
                                <a href="{{url ('/view_statement/'.$contribution->users_id)}}" class="btn btn-success btn-xs"><i class="fas fa-eye"></i>&nbsp;View Statement</a>
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

 <!-- Modal for adding member contribution-->
 <div class="modal fade" id="add_contribution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Members Contribution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="card">
                 <form method="post"  class="form-horizontal" action="{{route('submit_member_contribution')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Member</label>
                                <div class="col-sm-9">
                                    <select name="memberid" class="form-control" required>
                                           <option value="">Select Member</option>
                                        @foreach($all_members as $member)
                                           <option value="{{$member->id}}">{{$member->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Month</label>
                                <div class="col-sm-9">
                                    <select name="month" class="form-control" required>
                                        <option value="">Select Month</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="Jul">Jul</option>
                                        <option value="Aug">Aug</option>
                                        <option value="Sep">Sep</option>
                                        <option value="Oct">Oct</option>
                                        <option value="Nov">Nov</option>
                                        <option value="Dec">Dec</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="amount" placeholder="Contribution here" required>
                                </div>
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End of Modal for adding members contributions -->

@endsection
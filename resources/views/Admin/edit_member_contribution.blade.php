@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           <a href="{{ route('members_contribution')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
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
        <h5 class="card-title">{{$membercontribution->users->name}}</h5>
        <div class="card">
                 <form method="post"  class="form-horizontal" action="{{ url('/update-contribution/'.$membercontribution->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('put')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Month</label>
                                <div class="col-sm-9">
                                    <select name="month" class="form-control" required>
                                        <option value="{{$membercontribution->month}}">{{$membercontribution->month}}</option>
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
                                    <input type="number" class="form-control" name="amount" placeholder="Contribution here" value="{{$membercontribution->amount}}" required>
                                </div>
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>

    </div>
  </div>
</div>
@endsection
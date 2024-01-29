@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           <a href="{{ route('members')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left "></i>&nbsp;&nbsp;Back</a></br>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
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
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="card">
    <div class="card-body wizard-content">
        <h4 class="card-title">Add Welfare Member</h4>
        <h6 class="card-subtitle"></h6>
        <form method="post" id="example-form" class="m-t-40" action="{{route('submit_member')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div>
                <h3>Personal Details</h3>
                <section>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="fullname">Full Names *</label>
                            <input id="userName" name="fullname" type="text" class="required form-control"></br>
                            <label for="age">Age*</label>
                            <input id="number" name="age" type="text" class="required form-control"></br>
                            <label for="idnumber">I.D/PPT Number</label>
                            <input id="idnumber" name="idnumber" type="text" class="required form-control"></br>
                            <input id="" name="password" type="hidden" class="required form-control" value="user123"></br>
                        </div>
                        <div class="col-md-4">
                            <label for="idnumber">Residential Address</label>
                            <input id="address" name="address" type="text" class="required form-control"></br>
                            <label for="phone">Phone No.</label>
                            <input id="phone" name="phone" type="number" class="required form-control"></br>
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="required form-control"></br>
                            <label for="phone">Marital Status</label>
                            <select name="status" class="required form-control"></br>
                                <option value="">Select status</option>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                                <option value="widow">Widow</option>
                                <option value="widower">Widower</option>
                            </select>
                        </div>
                    </div>
                </section>
                <h3>Parents</h3>
                <section>
                    <table id="" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><strong>PARENT</strong></th>
                            <th><strong>NAME</strong></th>
                            <th><strong>RESIDENCE</strong></th>
                            <th><strong>ALIVE</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>FATHER</td>
                            <td><input id="fathername" name="fathername" type="text" class="required form-control"></td>
                            <td> <input id="fresidence" name="fatherresidence" type="text" class="required form-control"></td>
                            <td>
                                <select name="fatheralive" class="required form-control"></br>
                                    <option value="">Select Yes/No</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>MOTHER</td>
                            <td><input id="mothername" name="mothername" type="text" class="required form-control"></td>
                            <td> <input id="mresidence" name="motherresidence" type="text" class="required form-control"></td>
                            <td>
                                <select name="motheralive" class="required form-control"></br>
                                    <option value="">Select Yes/No</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </section>
                <h3>Dependants</h3>
                <section>
                <div class="row">
                    <div class="col-md-4">
                    <input id="child1" name="child1" type="text" class="form-control" placeholder="1"></br>
                    <input id="child2" name="child2" type="text" class="form-control" placeholder="2"></br>
                    </div> 
                    <div class="col-md-4">
                    <input id="child3" name="child3" type="text" class="form-control" placeholder="3"></br>
                    <input id="child4" name="child4" type="text" class="form-control" placeholder="4"></br>
                    </div>
                    <div class="col-md-4">
                    <input id="child5" name="child5" type="text" class="form-control" placeholder="5"></br>
                    </div>
                </div>
                </section>
                <h3>Representative</h3>
                <section>
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><strong>FULL NAMES</strong></th>
                                <th><strong>ID/PPT NUMBER</strong></th>
                                <th><strong>RELATIONSHIP</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input id="rname" name="rname" type="text" class="form-control"></td>
                                <td><input id="rid" name="rid" type="number" class="form-control"></td>
                                <td><input id="relationship" name="relationship" type="text" class="form-control"></td>    
                            </tr>
                        </tbody>
                    </table>
                </section>
                <h3>Subscription</h3>
                <section>
                <div class="row">
                    <div class="col-md-4">
                        <label for="fee">Registration Fee</label>
                        <input id="fee" name="fee" type="number" class="required form-control"></br>
                    </div>
                    <div class="col-md-4">
                        <label for="phone">Payment Plan</label>
                        <select name="plan" class="required form-control"></br>
                            <option value="">Select Plan</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="subscription">Amount</label>
                        <input id="subscription" name="subscription" type="number" class="required form-control"></br>
                    </div>
                </div>
                </section>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
@endsection
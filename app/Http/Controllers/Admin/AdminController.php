<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Admin\MemberContribution;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //store a member into the database
    public function submitMember(Request $request)
    {
        
       $new_member = new User;
       $password = $request->input('password');
       $hashed_password = Hash::make($password);
       $new_member->name = $request->input('fullname');
       $new_member->age = $request->input('age');
       $new_member->idno = $request->input('idnumber');
       $new_member->residence = $request->input('address');
       $new_member->phone = $request->input('phone');
       $new_member->email = $request->input('email');
       $new_member->status = $request->input('status');
       $new_member->fathername = $request->input('fathername');
       $new_member->fatherresidence = $request->input('fatherresidence');
       $new_member->fatheralive = $request->input('fatheralive');
       $new_member->mothername = $request->input('mothername');
       $new_member->motheralive= $request->input('motheralive');
       $new_member->motherresidence= $request->input('motherresidence');
       $new_member->child1= $request->input('child1');
       $new_member->child2 = $request->input('child2');
       $new_member->child3= $request->input('child3');
       $new_member->child4 = $request->input('child4');
       $new_member->child5= $request->input('child5');
       $new_member->repname= $request->input('rname');
       $new_member->repid= $request->input('rid');
       $new_member->reprel = $request->input('relationship');
       $new_member->regfee= $request->input('fee');
       $new_member->paymentplan= $request->input('plan');
       $new_member->subscriptionfee= $request->input('subscription');
       $new_member->password= $hashed_password;
       $new_member->save();

       return redirect('/members')->with('success','Member Added Successfully');

    }

    //store a member contribution into the database
    public function submitMemberContribution(Request $request)
    { 
        $contributions = MemberContribution::all();
        $new_member_contribution = new MemberContribution;
        $new_member_contribution ->users_id = $request->input('memberid');
        $new_member_contribution->month= $request->input('month');
        $new_member_contribution->amount = $request->input('amount');
        $new_member_contribution->save();
       
        return redirect('/members/contribution')->with('success','Contribution added successfully');
    }

    //update member contribution
    public function updateContribution(Request $request, $id)
    {
        $contribution  = MemberContribution::find($id); 
        $contribution ->month= $request->input('month');
        $contribution ->amount = $request->input('amount');
        $contribution ->update();

        return redirect('/members/contribution')->with('updated','Contribution details updated Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMember($id)
    {
        $member = User::find($id);
        return view('Admin.edit_member')->with('member', $member);
    }

    //Editting member contribution
    public function editMemberContribution($id)
    {
        $membercontribution = MemberContribution::find($id);
        return view('Admin.edit_member_contribution')->with('membercontribution', $membercontribution);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMember(Request $request, $id)
    {
        $new_member  = User::find($id); 
        $new_member->name = $request->input('fullname');
        $new_member->age = $request->input('age');
        $new_member->idno = $request->input('idnumber');
        $new_member->residence = $request->input('address');
        $new_member->phone = $request->input('phone');
        $new_member->email = $request->input('email');
        $new_member->status = $request->input('status');
        $new_member->fathername = $request->input('fathername');
        $new_member->fatherresidence = $request->input('fatherresidence');
        $new_member->fatheralive = $request->input('fatheralive');
        $new_member->mothername = $request->input('mothername');
        $new_member->motheralive= $request->input('motheralive');
        $new_member->motherresidence= $request->input('motherresidence');
        $new_member->child1= $request->input('child1');
        $new_member->child2 = $request->input('child2');
        $new_member->child3= $request->input('child3');
        $new_member->child4 = $request->input('child4');
        $new_member->child5= $request->input('child5');
        $new_member->repname= $request->input('rname');
        $new_member->repid= $request->input('rid');
        $new_member->reprel = $request->input('relationship');
        $new_member->regfee= $request->input('fee');
        $new_member->paymentplan= $request->input('plan');
        $new_member->subscriptionfee= $request->input('subscription');
        $new_member->update();

        return redirect('/members')->with('updated','Member Details updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMember(Request $request)
    {
        $member = User::findOrfail($request->member_id);
        $member->delete();

        return redirect('/members')->with('deleted','Member Deleted Successfully');
    }

    //fetch all registerd members
    public function fetchMembers()
    {
        if(session('success'))
        {
            Alert::success('Success!', 'Member Added Successfully');
        }
        elseif(session('updated'))
        {
            Alert::success('Success!', 'Member Details Updated Successfully');
        }
        elseif(session('deleted'))
        {
            Alert::success('Success!', 'Member Deleted Successfully');
        }
    $members = User::all();
    return view('Admin.members')->with('members', $members);
    }

     //fetch all registerd members
     public function showMembers()
     {
        return view('Member.members');
     }


    //fetch contribution list for members
    public function fetchContribution()
    {
        if(session('success'))
        {
            Alert::success('Success!', 'Contribution Added Successfully');
        }
        $contributions = MemberContribution::all();
        return view('Admin.members_contribution')->with('contributions', $contributions);
    }

    //fetch current user savings for members
    public function fetchmySavings()
    {
        $savings = MemberContribution::where('users_id', Auth::user()->id)->get();
        return view('Member.members_savings')->with('savings', $savings);
    }

    //fetch selected user savings for members
    public function viewStatement($id)
    {
        $current_user  = User::find($id);
        $member_savings = MemberContribution::where('users_id', $id)->get();
        return view('Admin.member_statement')->with('member_savings', $member_savings)->
                                                with('current_user', $current_user);
    }


    //register a member
    public function addMember()
    {
        return view('Admin.add_member');
    }
}

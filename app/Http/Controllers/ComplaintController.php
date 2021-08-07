<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Auth;

class ComplaintController extends Controller
{
    public function __construct()
    {
        // This is to make sure the user doesn't access home page and create page without logging in
        $this->middleware('auth')->except(['home','complaint/create']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { // list all complaints in a paged list using pagination
        $users_data = Auth::user();

        if($users_data['role'] == 1998) 
        $complaints = Complaint::paginate(3); 
        else $complaints = Complaint::where('user_id',auth()->id())->paginate(1);
        
        
        return view('complaint.index')->with([
            'complaints'  => $complaints,
            'users_data' => $users_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $users_data = Auth::user();
        $complaint = new Complaint([
             'subject' =>$request['subject'],
             'description'=>$request['description'],
             'user_id' =>auth()->id(),
             'status'=>"Pending", 

         ]);
         $complaint->save();
         return $this->index()->with([
             'response' => "Complaint Added Successfully!",
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        $users_data = Auth::user();
        return view('complaint.show')->with([
            'complaint' =>$complaint,
            'users_data' => $users_data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    { //main use is to change status
       
        if($request['status'] == "Approve")
           $request['status'] = "Approved";

        if($request['status'] == "Reject")
            $request['status'] = "Rejected";

        $complaint->update([
            'status'=> $request['status'],
        ]);
        return $this->index()->with([
            'response' => "Status Changed Successfully!",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return $this->index()->with([
            'response' => "Complaint Deleted Successfully",
        ]);
    }
}

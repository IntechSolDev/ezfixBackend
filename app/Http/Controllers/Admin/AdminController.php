<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\NotificationUser;
use App\Models\User;
use App\Models\Payment;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mail;
use Cache;
use Session;

class AdminController extends Controller
{
    
    public function index(Request $request)
    {
        $total_user = User::count();
        return view('admin/pages/index',['total_user'=>$total_user]);
    }
    
    public function all_users()
    {
        $users = User::orderBy('last_seen', 'DESC')->get();
        return view('admin/pages/all-user', ['users'=> $users]);
    }

    public function all_commuity()
    {
        $data = Community::with('user')->get();
        return view('admin/pages/community', ['data'=> $data]);
    }

    public function detail_community(Request $request)
    {
        $id = $request->id;
        $data = Community::where('id', $id)->with('user')->first();
        $total = Payment::where('community_id', $id)->sum('amount');
        return view('admin/pages/communityDetail', ['data'=> $data, 'total_donation'=> $total]);
    }

    public function community_donation()
    {
        $data = Payment::with(['user', 'community'])->get();
        return view('admin/pages/donation', ['data'=> $data]);
    }

    public function donation_detail(Request $request)
    {
        $id = $request->id;
        $data = Payment::where('id', $id)->with(['user', 'community'])->first();
        return view('admin/pages/donationDetail', ['data'=> $data]);
    }

}


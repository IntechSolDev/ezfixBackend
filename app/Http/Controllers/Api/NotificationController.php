<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationUser;
use App\Models\User;
use Validator;
use Auth;
use App\Http\Resources\NotificationListResource;
class NotificationController extends Controller
{
     public function viewAllNotification()
    {
        $user = Auth::user();
        $notifictiondata = NotificationUser::with(['user', 'receiver'])->where('send_to',$user->id)->orWhere([['user_id', null], ['send_to', null]])->get();
        $notifictionlist = NotificationListResource::collection($notifictiondata);
        
         if($notifictiondata)
        {
            return response()->json([
                'data'=>$notifictionlist,
                'message' => 'Notification Data.',
                'status'=>'success',
            ],200);
        }
        else{
        return response()->json([
            'message' => 'There was no notification yet',
            'status' => 'error',
            ],404);
        }
    }
    
    
   public function changeStatusNotification()
   {
         $user = Auth::user();
         $notification = NotificationUser::where('send_to', $user->id)->orWhere([['user_id', null], ['send_to', null]])->update(['status'=>1]);
        
         if($notification)
        {
            return response()->json([
                'data'=>$notification,
                'message' => 'You read All Notification.',
                'status'=>'success',
            ],200);
        }
        else{
        return response()->json([
            'message' => 'There was some error ',
            'status' => 'error',
            ],404);
        }
   }
   
  public function deleteNotification(Request $request)
   {
        $id = $request->id;
        $user = Auth::user();
        $delete = NotificationUser::find($id)->delete();
        
         if($delete)
        {
            return response()->json([
                'message' => 'You delete Notification.',
                'status'=>'success',
            ],200);
        }
        else{
        return response()->json([
            'message' => 'There was some error ',
            'status' => 'error',
            ],404);
        }
   }
}

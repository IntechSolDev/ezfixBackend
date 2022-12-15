<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use App\Models\MeetingAttendance;
class MeetingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();
        $check = MeetingAttendance::where([['meeting_id', $this->id], ['user_id', $user->id]])->first();
        if($check){
            $status = 1;
        }else{
            $status = 0;
        }
        
        return[
         'id'=>$this->id,
         'location'=>$this->location,
         'date'=>$this->date,
         'month'=>$this->month, 
         'time'=>$this->time, 
         'topic'=>$this->topic,
         'status'=> $status,
         'created_at'=>$this->created_at,  
         'updates_at'=>$this->updated_at,

        ];

    }
}

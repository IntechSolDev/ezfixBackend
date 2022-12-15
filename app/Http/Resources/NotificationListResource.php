<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Setting;
class NotificationListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $id = $this->user_id;
        if($id != null){
            return[
             'id'=>$this->id,
             'title'=>$this->title,
             'order_uuid'=>$this->order_uuid,
             'user_id'=>$this->user->id, 
             'email'=>$this->user->email, 
             'name'=>$this->user->fullname,
             'image'=>$this->user->image,  
             'message'=>$this->message,
             'type'=>$this->type,
             'status'=>$this->status,
             'time'=>$this->created_at
            ];
        }else{
            return[
             'id'=>$this->id,
             'title'=>$this->title,
             'order_uuid'=>$this->order_uuid, 
             'message'=>$this->message,
             'type'=>$this->type,
             'status'=>$this->status,
             'time'=>$this->created_at
            ];
        }
        
        

    }
}

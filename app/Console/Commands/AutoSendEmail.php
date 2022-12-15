<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Refer;
use App\Models\User;
use App\Models\MailMessage;
use Mail;

class AutoSendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Done';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = array('name'=>"Saad Mughal",'admin_message'=>"Testing message");
            Mail::send('admin.pages.mail', $data, function($message) {
                $message->to("saadey7@gmail.com", "Saad")->subject
                    ('Referral Reminder');
            });
        // $user = Refer::where('status', 0)->pluck('vender_id');
        // $array = collect($user);
        // $result = $array->flatten()->unique();
        // $all_user = User::whereIn('id', $result)->get();
        // foreach ($all_user as $user) {
        //     $msg = MailMessage::where('reason', 'referral_reminder')->first();
        //     $replaced = Str::replace(array('[Member_Name]', '[Referral_Name]'), array("$user->fullname", "$vender->name"), $msg->message);
        //     $data = array('name'=>"$user->fullname",'admin_message'=>"$replaced");
        //     Mail::send('admin.pages.mail', $data, function($message) use($user) {
        //         $message->to("$user->email", "$user->fullname")->subject
        //             ('Referral Reminder');
        //     });
        // }
        
    }
}

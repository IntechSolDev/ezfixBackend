<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\User;

class Scoreboard implements FromView
{
    function __construct($month) {
        $this->month = $month;
}
/**
* @return \Illuminate\Support\Collection
*/
public function view(): View
{
    $month = $this->month;
    $member = User::all();
    if ($month == null || $month == 'Week') {
        return view('admin/Scoreboard/weekly', ['member'=>$member]);
    }
    elseif ($month == '1month') {
        return view('admin/Scoreboard/oneMonth', ['member'=>$member]);
    }
    elseif ($month == '3month') {
        return view('admin/Scoreboard/threeMonth', ['member'=>$member]);
    }
    elseif ($month == '6month') {
        return view('admin/Scoreboard/sixMonth', ['member'=>$member]);
    }
    elseif ($month == '9month') {
        return view('admin/Scoreboard/nineMonth', ['member'=>$member]);
    }
    elseif ($month == '12month') {
        return view('admin/Scoreboard/twelveMonth', ['member'=>$member]);
    }
    else {
        return view('admin/Scoreboard/lifetime', ['member'=>$member]);
    }
}
}

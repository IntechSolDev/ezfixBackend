<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class DataExport implements FromView
{
    protected $id;

    function __construct($month) {
            $this->month = $month;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $month = $this->month;
        if ($month == null || $month == 'Week') {
            return view('admin/excelView/weekly');
        }
        elseif ($month == '1month') {
            return view('admin/excelView/oneMonth');
        }
        elseif ($month == '3month') {
            return view('admin/excelView/threeMonth');
        }
        elseif ($month == '6month') {
            return view('admin/excelView/sixMonth');
        }
        elseif ($month == '9month') {
            return view('admin/excelView/nineMonth');
        }
        elseif ($month == '12month') {
            return view('admin/excelView/twelveMonth');
        }
        else {
            return view('admin/excelView/lifetime');
        }
    }
}

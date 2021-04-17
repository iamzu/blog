<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('test2');
//        dump(Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d H:i:s'));
//        dump(Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d H:i:s'));
        $data = Bill::query()->where('user_id',1)->whereBetween('created_at',[
            Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'),
            Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'),
        ])->groupBy('tag_id')->selectRaw('tag_id as tag,sum(money)/100 as money')->get()->toArray();

        $data = arrayCombine($data,'tag');

        $tagIds = array_keys($data);

        $tags = BillType::query()->whereIn('id',$tagIds)->pluck('tag','id')->toArray();
    }
}

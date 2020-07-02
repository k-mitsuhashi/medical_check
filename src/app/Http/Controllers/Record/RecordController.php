<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Http\Requests\Record\RecordRequest;
use Carbon\Carbon;

class RecordController extends Controller
{
    /**
     * 受診記録一覧
     *
     * @param \App\Http\Requests\Record\RecordRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(RecordRequest $request)
    {
        // 年度の一覧
        $years = Record::years();
        $years = $years->combine($years)->sortDesc()->toArray();

        // 年度無しの場合は今年度とする
        $year = ($request->year) ?? Carbon::today()->fiscalYear();
        $records = Record::getList($year)->toArray($request);

        return view('record.index')->with(compact('years', 'year', 'records'));
    }
}

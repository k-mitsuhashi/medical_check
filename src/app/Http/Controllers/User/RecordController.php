<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RecordRequest;

class RecordController extends Controller
{
    /**
     * 入力画面
     *
     * @param Request $request
     * @param array $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function input(Request $request, array $user)
    {
        return view('user.record.input')->with(compact('user'));
    }

    /**
     * 入力確認
     *
     * @param \App\Http\Requests\User\RecordRequest $request
     * @param array $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function confirm(RecordRequest $request, array $user)
    {
        return view('user.record.confirm')
            ->with(compact('user'))
            ->with($request->all('date', 'course', 'place'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Arr;
use App\Http\Requests\User\RecordRequest;
use App\Models\Record;

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
        $data = Arr::only($user, ['id', 'course']);
        return view('user.record.input')->with($data);
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
        $data = Arr::only($user, 'id');
        $data = array_merge($data, $request->only('date', 'course', 'place'));

        return view('user.record.confirm')->with($data);
    }

    /**
     * データ登録
     *
     * @param \App\Http\Requests\User\RecordRequest $request
     * @param array $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(RecordRequest $request, array $user)
    {
        $data = ['user_id' => $user['id']];
        $data = array_merge($data, $request->only('year', 'date', 'course', 'place'));

        $record = Record::create($data);

        return redirect('/users/' . $user['id'] . '/record')->with(['record' => $record->toArray()]);
    }
}

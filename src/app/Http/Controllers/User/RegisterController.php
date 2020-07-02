<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * 入力画面
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function input()
    {
        return view('user.register.input');
    }

    /**
     * 入力確認
     *
     * @param \App\Http\Requests\User\RegisterRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function confirm(RegisterRequest $request)
    {
        return view('user.register.confirm')->with($request->only('name', 'birth_date'));
    }

    /**
     * データ登録
     *
     * @param \App\Http\Requests\User\RegisterRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(RegisterRequest $request)
    {
        $user = User::create(
            $request->all('name', 'birth_date')
        );

        return redirect('/users/register')->with(['user' => $user->toArray()]);
    }
}

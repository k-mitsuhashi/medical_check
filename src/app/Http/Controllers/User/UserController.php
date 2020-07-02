<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $users = User::getList()->toArray($request);

        return view('user.index')->with('users', $users);
    }
    /**
     * ユーザー詳細
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function detail(Request $request, $id)
    {
        $user = User::getUser($id)->toArray($request);

        return view('user.detail')->with('user', $user);
    }
}

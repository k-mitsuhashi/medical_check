<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use App\Models\User;

class UserDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-detail {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ユーザー詳細を表示する。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('user_id');
        try {
            $user = User::getUser($id)->toArray(null);
        } catch (\Exception $e) {
            $this->error('ユーザーなし');
            return 1;
        }

        $records = $user['records'];
        unset($user['records']);

        // ユーザー情報
        $this->table(
            ['ユーザーID', '名前', '生年月日', '年度年齢', '今年度の受診コース'],
            [$user],
        );

        // 受診記録
        $this->table(
            ['受診年度', '受診日', '受診コース', '受診場所'],
            $records,
        );
    }
}

<?php

namespace App\Listeners;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;
use App\LogLogin;
use Illuminate\Http\Request;
class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Logout     $event
     * @return void
     */
    public function handle(Logout $event)
    {
        LogLogin::insert(
            [
              "user_id"=>Auth::user()->id,
              "aciklama"=>Auth::user()->name . " Çıkış Yaptı",
              "islem_kodu"=>"0",
              "ip"=>\Illuminate\Support\Facades\Request::ip()
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function marcarNotiLida($idNoti)
    {
        $update = Notifications::where([
            'id' => $idNoti
        ])->update([
            'statu' => 'Vista'
        ]);
        if($update){
            return redirect()->route('notification');
        }
    }
}

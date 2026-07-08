<?php

namespace App\Http\Controllers;

use Rats\Zkteco\Lib\ZKTeco;

class ZKController extends Controller
{
    public function test()
    {
        $zk = new \Rats\Zkteco\Lib\ZKTeco('10.3.40.177', 4370);

        $zk->connect();

        $attendance = $zk->getAttendance();

        dd($attendance);
    }
}
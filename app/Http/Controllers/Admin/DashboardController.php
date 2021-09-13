<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$roles = Role::all();
    	return view('admin.admin', compact('roles'));
    }

    public function phpinfo() {
        return view('admin.phpinfo.phpinfo');
    }

    public function dbTest() {
        $conn = DB::connection('sqlsrv');
        // $now = "20210913";
        $now = "2021-09-13 13:00:00.000";
        // $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');

        $sql = "
    EXEC OIK.dbo.SrezLT
        @Cat = ?,
        @Ids = ?,
        @Time = '". $now . "'
";
        $params = array("W", "50", $now);
        $stmt = $conn->select( $sql, $params);

        // dd((float)$stmt[0]->value);
        dd($stmt);
    }
}

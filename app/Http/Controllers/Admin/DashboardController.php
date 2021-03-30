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
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');
        $sql = "
    EXEC OIK.dbo.SrezLT
        @Cat = ?,
        @Ids = ?,
        @Time = '". $now . "'
";
        $params = array("Л", "49", $now);
        $stmt = $conn->select( $sql, $params);

        dd($stmt);
    }
}

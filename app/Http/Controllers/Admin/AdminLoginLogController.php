<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Http\Request;

class AdminLoginLogController extends Controller
{
    public function index()
    {
        $logs = LoginLog::with('user')->orderBy('logged_in_at', 'desc')->paginate(20);
        return view('admin.logs.index', compact('logs'));
    }
}

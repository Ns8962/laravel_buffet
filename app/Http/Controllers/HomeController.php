<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('m_orders')
        ->leftjoin('m_tables','m_tables.id','=','m_orders.table_id')
        ->select('*','m_tables.status as 77')
        ->where('m_tables.status',0)
        ->get();
        return view('home', compact('data'));
    }
}

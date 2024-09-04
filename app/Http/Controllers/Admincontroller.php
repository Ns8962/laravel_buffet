<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
class Admincontroller extends Controller
{
     function get_table(){
        $get_table =  DB::table('m_tables')
        ->get();
        return view('reserve_table', compact('get_table'));
     }
     function add_table(Request $id){
        $id->validate([
            'tb_id'=> 'required',
        ],[
            'tb_id.required' => 'no have id'
        ]);
   
        $chk_time = date('H:i');
        $chk_out_time = date('H:i', strtotime($chk_time . ' +2 hours'));
        $set_data = array(
            'status'=>0,
            'check_in_time'=>$chk_time,
            'check_out_time'=>$chk_out_time
        );
        DB::table('m_tables')
        ->where('id', $id->tb_id)
        ->update($set_data);
        $tb_id = $id->tb_id;
        $qrCode = QrCode::size(100)->generate('http://localhost/laravel_buffet/public/user?tb_id='.$tb_id);
        return view('qrcode', compact('tb_id','chk_time','chk_out_time','qrCode'));
    }
    function show_menu(Request $table_id){
        $table_id->validate(['tb_id'=>'required']);
        $tb_id = $table_id->tb_id;
        return  view('user', compact('tb_id'));
    }
  
    function select_type(Request $type_food){
        $get_menu = DB::table('m_menus')
        ->where('type_id', $type_food->select_type)
        ->get();
        $tb_id = $type_food->tb_id;
        return  view('listmenu', compact('get_menu', 'tb_id'));
    }
    function add_menu(Request $menu){
        $set = [
            'table_id'=> $menu->table_id,
            'name_id'=> $menu->menu_id,
            'name_menu'=> $menu->menu_name,
            'comment'=> "0",
            'qr_cord'=> "0",
            'updated_at'=> date('Y-m-d H:i:s'),
            'count_menu'=> $menu->menu_count,
            'status'=> 0
        ];
        DB::table('m_orders')
        ->insert($set);

        $get_menu = DB::table('m_menus')
        ->where('type_id', $menu->menu_type_id)
        ->get();
        $tb_id =  $menu->table_id;
       return view('listmenu', compact('get_menu', 'tb_id'));
    }
    function preorder(Request $tb){
        $getdata = db::table('m_orders')
        ->where('table_id', $tb->tb)
        ->get();

        return view('getorder', compact('getdata'));
    }
    
    function create_table(){
        return view('create_table');
    }
    function send_api_create(Request $request){
        $request->validate([ 
            'name_table'=> 'required',
            'status'=> 'required',
        ]);
        try {
            $data = [
                'name_table' => $request->input('name_table'),
                'status' => $request->input('status'),
            ];
            $url = 'http://localhost:3000/api/type/';
            $ch = curl_init();  
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false); 
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, /*http_build_query($data)*/json_encode($data));  // หรือ json_encode($data) ขึ้นอยู่กับ API
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            $response = curl_exec($ch);
            if ($response === false) {
                \Log::error('cURL error: ' . curl_error($ch));
                return response()->json(['message' => 'cURL error'], 500);
            }
            $HomeController = new HomeController();
            return $HomeController->index();
            

        } catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'error data base 500'
            ],500);
        }
    }
    function report_graft(){

        try {

            $list_count =  DB::table('m_orders')
            ->select('name_id', 'name_menu', DB::raw('SUM(count_menu) as total'))
            ->groupBy('name_id','name_menu')
            ->get();
            $i=0;
            $list = count($list_count);
            $color1 = rand(0,300);
            $color2 = rand(0,300)+11;
            $color3 = rand(0,300)+22;
            $color4 = rand(0,300);
            foreach($list_count as $item){
                if(!empty($item->name_menu && $item->total)){
                    $data_or[] = $item->name_menu;
                    $data_detail[] = $item->total;
                    $data = [
                        'labels' => $data_or,
                        'datasets' => [
                            [
                                'label' => 'Sales',
                                'backgroundColor' => 'rgba('.$color1.', '.$color2.', '.$color3.','.$color4.')',
                                'borderColor' => 'rgba('.$color1.','.$color2.', '.$color3.', '.$color4.')',
                                'data' =>$data_detail,
                            ]
                        ],
                    ];
                    $data2 = [
                        'labels' => $data_or,
                        'datasets' => [
                            [
                                'data' =>$data_detail,
                                'backgroundColor' => ['#A2CA71', '#36A2EB', '#FF1114'],
                                'hoverBackgroundColor' => ['#A2CA71', '#36A2EB', '#FF1114']
                            ]
                        ],
                    ];
                }
                $i++;
            }
            return view('report_graft', compact('data', 'data2'));
        } catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'error data base 500'
            ],500);
        }

        

    }
    function report_qrcode(Request $tb_id){

        $tb_id = $tb_id->tb_id;
        $chk_time = date('H:i');
        $chk_out_time = date('H:i', strtotime($chk_time . ' +2 hours'));
        $qrCode = QrCode::size(100)->generate('http://localhost/laravel_buffet/public/user?tb_id='.$tb_id);

         //// อัพไฟล์ //////
        //  $path = $request->file('data_file')->store('public/qr');
        // dd($qrCode);
         $path = $qrCode->store('public/qr');
         dd($path);
         $s_p = explode('/',$path);
         Storage::url($path);
         ////// ///////////


        // สร้าง PDF จาก Blade Template
        $pdf = Pdf::loadView('report_qrcode', compact('tb_id','chk_time','chk_out_time','qrCode'));

        // ส่ง PDF ไปดาวน์โหลด
        $name = 'report_table_'.$tb_id;
        return $pdf->download($name.'.pdf');

    }
}

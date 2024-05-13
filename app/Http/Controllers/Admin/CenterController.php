<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\CenterHelper;
class CenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCenter(){
        $centers = CenterHelper::getCenter();
        return view('admin.center.list')
        ->with('centers',$centers);
    }
    public function storeCenter(Request $request){
            return CenterHelper::storeCenter($request);
    }
    public function getCenterById(Request $request){
        return CenterHelper::getCenterById($request);
    }
    public function updateCenter(Request $request){
        return CenterHelper::updateCenter($request);
    }
}

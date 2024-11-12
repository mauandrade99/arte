<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\cpcr;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'CPCR';
        $cpcrs = cpcr::paginate(10);
       
        return view('site.cpcr',compact('cpcrs','titulo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details($id)
    {
        $titulo = 'CPCR';
        $lancamento = cpcr::where('id',$id)->first();

        return view('site.details',compact('lancamento','titulo'));


    }

    public function cpcrUser($id)
    {
        $name = User::where('id',$id)->first()->name;

        $titulo = 'CPCR' . ' - ' . $name;
        $cpcrs = cpcr::where('user_id',$id)->paginate(10);

        return view('site.cpcr',compact('cpcrs','titulo'));

    }

   
}

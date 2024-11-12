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

        if ($id == 0) {


            $lancamento = [  'id'=>0
                            ,'titulo'=>null
                            ,'descricao'=>null
                            ,'valor'=>null
                            ,'status'=>null
                            ,'datavenc'=>null
                        ];


            $lancamento = json_decode(json_encode($lancamento));

        } else {

            $lancamento = cpcr::where('id',$id)->first();

        }

        return view('site.details',compact('lancamento','titulo'));


    }

    public function delete($id)
    {
        $titulo = 'CPCR';
       
        $cpcr = cpcr::where('id',$id)->delete();


        if (Auth::user()->admin == '0')
            return redirect()->route('site.cpcrUser',Auth::user()->id);
        else
            return redirect()->route('site.index');




    }

    public function updatedetails(Request $request,$id)
    {

        $params = $request->all();

        if ($id == 0 ) {

            cpcr::create([
                'titulo'=>$request->input('titulo')
                ,'descricao'=>$request->input('descricao')
                ,'valor'=>$request->input('valor')
                ,'status'=>$request->input('status')
                ,'user_id'=>Auth::user()->id
            ]);


        } else {

            cpcr::where('id',$id)->update([
                'titulo'=>$request->input('titulo')
                ,'descricao'=>$request->input('descricao')
                ,'valor'=>$request->input('valor')
                ,'status'=>$request->input('status')
            ]);

        }

        if (Auth::user()->admin == '0')
            return redirect()->route('site.cpcrUser',Auth::user()->id);
        else
            return redirect()->route('site.index');

    }

   

    public function cpcrUser($id)
    {
        $name = User::where('id',$id)->first()->name;

        $titulo = 'CPCR' . ' - ' . $name;
        $cpcrs = cpcr::where('user_id',$id)->paginate(10);

        return view('site.cpcr',compact('cpcrs','titulo'));

    }

   
}

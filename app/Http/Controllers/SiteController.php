<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\cpcr;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'CPCR';
        $cpcrs = cpcr::where('idativo','1')->paginate(10);
       
        return view('site.cpcr',compact('cpcrs','titulo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details($id,$user_id)
    {
        $titulo = 'CPCR';

        if ($id == 0) {


            $lancamento = [  'id'=>0
                            ,'titulo'=>null
                            ,'descricao'=>null
                            ,'valor'=>null
                            ,'status'=>null
                            ,'datavenc'=>Date('Y-m-d')
                            ,'user_id'=>$user_id
                        ];


            $lancamento = json_decode(json_encode($lancamento));

        } else {

            $lancamento = cpcr::where('id',$id)->first();

            Gate::authorize('cpcrDetail',$lancamento);

        }

        return view('site.details',compact('lancamento','titulo'));


    }

    public function delete($id,$user_id)
    {
        $titulo = 'CPCR';

        $cpcr = cpcr::where('id',$id)->update([
            'idativo'=>'0'
        ]);

        //Gate::authorize('cpcrDetail',$cpcr);

        return redirect()->route('site.cpcrUser',$user_id);


    }

    public function updatedetails(Request $request,$id)
    {

        $params = $request->all();

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'valor' => 'required',
            'status' => 'required',
            'datavenc' => 'required',
        ]);

        if ($id == 0 ) {

            $cpcr =cpcr::create([
                'titulo'=>$request->input('titulo')
                ,'descricao'=>$request->input('descricao')
                ,'valor'=>$request->input('valor')
                ,'status'=>$request->input('status')
                ,'user_id'=>$request->input('user_id')
                ,'datavenc'=>Date('Y-m-d',strtotime($request->input('datavenc')))
            ]);


        } else {

            $cpcr = cpcr::where('id',$id)->update([
                'titulo'=>$request->input('titulo')
                ,'descricao'=>$request->input('descricao')
                ,'valor'=>$request->input('valor')
                ,'status'=>$request->input('status')
                ,'user_id'=>$request->input('user_id')
                ,'datavenc'=>Date('Y-m-d',strtotime($request->input('datavenc')))
                ,'idativo'=>$request->input('idativo')
            ]);

        }

        //Gate::authorize('cpcrDetail',$cpcr);

        return redirect()->route('site.cpcrUser',$request->input('user_id'));

    }

   

    public function cpcrUser($id)
    {
        $name = User::where('id',$id)->first()->name;

        $titulo = 'CPCR' . ' - ' . $name;
        
        $cpcrs = cpcr::where('user_id',$id)->where('idativo','1')->paginate(10);

        return view('site.cpcr',compact('cpcrs','titulo'));

    }

   
}

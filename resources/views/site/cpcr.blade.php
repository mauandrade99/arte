@extends('site.layout')

@section('title')
    {{$titulo}}
@endsection

@section('content')
    @if ( Auth::user()->admin == '1' )
        <div style="margin-top:40px;margin-left:40px" >
        <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Usuários <i class="material-icons right">expand_more</i></a>
        </div>
    @endif

    <div class="card" style="margin-top:60px" >
        <div class="card-body">
            
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="{{ route('site.index')}}">TODOS</a></li>
                @foreach($usuariosMenu as $usuarioMenu)
                <li><a href="{{ route('site.cpcrUser',$usuarioMenu->id)}}">{{$usuarioMenu->name}}</a></li>
                @endforeach
            </ul>


            <div class="table-responsive table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i id="controladd" class="fa fa-plus fa-2x hide" aria-hidden="true"></i></a></span>
                <table id="tabela" class="resizeable table table-bordered table-responsive-xl table-striped text-center sortable">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center sorttable_numeric">ID</th>
                        <th class="text-center">Titulo</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center sorttable_ddmm">Vencto</th>
                        <th class="text-center sorttable_numeric">Valor</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Usuario</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($cpcrs as $cpcr)

                        <tr id="clone" class="">
                            <td class="pt-3-half"><a href="{{ route('site.details',$cpcr->id)}}"><i class="material-icons">visibility</i></a></td>
                            <td id="ID" class="pt-3-half" contenteditable="false">{{Str::limit($cpcr->id,60)}}</td>
                            <td id="TITULO" class="pt-3-half" contenteditable="false">{{Str::limit($cpcr->titulo,60)}}</td>
                            <td id="DESCRICAO" class="pt-3-half" contenteditable="false">{{Str::limit($cpcr->descricao,60)}}</td>
                            <td id="DATAVENC" class="pt-3-half align-right" contenteditable="false">{{date('d/m/Y', strtotime($cpcr->datavenc))}}</td>
                            <td id="VALOR" class="pt-3-half align-right" contenteditable="false">{{$cpcr->valor}}</td>
                            <td id="STATUS" class="pt-3-half" contenteditable="false">{{$cpcr->status}}</td>
                            <td id="USUARIO" class="pt-3-half" contenteditable="false">{{$cpcr->user->name}}</td>
                        </tr>

                    @endforeach
                    <tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
                <div class="row center">
                    {{$cpcrs->links('custom.paginate')}}
                </div>
            </div>
        </div>
    </div>
    


@endsection
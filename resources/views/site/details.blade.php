@extends('site.layout')

@section('title')
    {{$titulo}}
@endsection

@section('content')


<div id="painelcadastro" class="">
    <div class="form-row">
        <div class="col-sm-6 panel-body" id='cadastro'>

            <form class="form-horizontal action_noedit">
                
                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Lançamento</label>
                    <div class="col-sm-2">
                      <input name="" type="text" id="ID" class="form-control" readonly="true" value="{{$lancamento->id}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-2">
                      <input name="" type="text" id="ID" class="form-control"  value="{{$lancamento->titulo}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-2">
                      <input name="" type="text" id="ID" class="form-control"  value="{{$lancamento->descricao}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-2">
                      <input name="" type="text" id="ID" class="form-control"  value="{{$lancamento->valor}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-2">
                      <input name="" type="text" id="ID" class="form-control" value="{{$lancamento->status}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">DATA VENCIMENTO</label>
                    <div class="col-sm-2">
                        <input name="DATA VENCIMENTO" type="text" id="DATA" class="form-control mask-date " data-toggle="tooltip" value="{{$lancamento->datavenc}}">
                    </div>
               </div>												
                  
               
                <br>

                <div class="form-group">
                    
                    <div class="col-sm-12">
                        <div id="btcontrole" class="btn-toolbar">
                        
                            <span class="btn-default btn pull-right" id="back2">Cancelar</span>
                            <span>&nbsp &nbsp</span>
                            <span class="btn-primary btn pull-right" id="submit2">Salvar</span>
                            <span>&nbsp &nbsp</span>
                            
                        </div>
                    </div>

                </div>

                  
            </form>
            
        </div>
               
    </div>
</div>


@endsection
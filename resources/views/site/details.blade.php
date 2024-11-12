@extends('layouts.app')

@section('title')
    {{$titulo}}
@endsection

@section('content')



<div id="painelcadastro" class="">
    <div class="form-row">
        <div class="col-sm-6 panel-body" id='cadastro'>

            <form method="POST"  enctype="multipart/form-data" action="{{ route('site.updatedetails',$lancamento->id) }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Lançamento</label>
                    <div class="col-sm-2">
                      <input name="id" type="text" id="id" class="form-control" readonly="true" value="{{$lancamento->id}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-2">
                      <input name="titulo" type="text" id="titulo" class="form-control"  value="{{$lancamento->titulo}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-2">
                      <input name="descricao" type="text" id="descricao" class="form-control"  value="{{$lancamento->descricao}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-2">
                      <input name="valor" type="text" id="valor" class="form-control"  value="{{$lancamento->valor}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Status</label>
                    <div class="input-field col s12" >
                        <select name="status" id="status" value="{{$lancamento->status}}">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="pendente">pendente</option>
                          <option value="pago">pago</option>
                        </select>
                       
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Data Vencimento</label>
                    <div class="col-sm-2">
                        <input name="datavenc" type="text" id="datavenc" class="datepicker"  value="{{date('d-m-Y', strtotime($lancamento->datavenc));}} " readonly="true">
                    </div>
               </div>												
                  
               
                <br>

                <div class="form-group">
                    
                    <div class="col-sm-12">
                        <div id="btcontrole" class="btn-toolbar">
                        
                            <span class="btn-default btn pull-right" onclick="back()" id="back">Cancelar</span>
                            <span>&nbsp &nbsp</span>
                            <button class="btn-primary btn pull-right" type="submit" id="submit">Salvar</button>
                            <span>&nbsp &nbsp</span>
                            
                        </div>
                    </div>

                </div>

                  
            </form>
            
        </div>
               
    </div>
</div>



@endsection


@section('javascript')

<script>

window.onload = function() {

    $("#status").val('{{$lancamento->status}}');
    $('select').formSelect();


    $('.datepicker').datepicker({
        format: "dd-mm-yyyy"    
    });


};

function save() {

    
}

</script>

@endsection


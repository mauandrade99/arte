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

                <div id="mymodal" class="modal" >
                    <div class="modal-content">
                      <p class="message"></p>
                    </div>
                    <div class="modal-footer">
                      <span class="yes btn btn-primary">Sim</span>
                            <span class="no btn btn-primary">Não</span>
                    </div>
                  </div>
                
                
                  
                  <div id="mymodalSubmit" class="modal" >
                    <div class="modal-content">
                      <p class="message"></p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="yes btn btn-primary">Sim</button>
                            <span class="no btn btn-primary">Não</span>
                    </div>
                  </div>
                

                <input name="user_id" type="text" id="user_id" class="form-control hide" readonly="true" value="{{$lancamento->user_id}}">
                <input name="idativo" type="text" id="idativo" class="form-control hide" readonly="true" value="{{$lancamento->idativo}}">
                
                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Lançamento</label>
                    <div class="col-sm-2">
                      <input name="id" type="text" id="id" class="" readonly="true" value="{{$lancamento->id}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-2">
                      <input name="titulo" type="text" id="titulo" class="@error('titulo') is-invalid @enderror"  value="{{$lancamento->titulo}}">
                    </div>
                    @error('titulo')
                        <div class="alert alert-danger " style = 'color:red'>{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-2">
                      <input name="descricao" type="text" id="descricao" class="@error('descricao') is-invalid @enderror"  value="{{$lancamento->descricao}}">
                    </div>
                    @error('descricao')
                        <div class="alert alert-danger " style = 'color:red'>{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-2">
                      <input name="valor" type="text" id="valor" class="@error('valor') is-invalid @enderror"  value="{{$lancamento->valor}}">
                    </div>
                    @error('valor')
                        <div class="alert alert-danger " style = 'color:red'>{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Status</label>
                    <div class="input-field col s12" >
                        <select name="status" id="status" value="{{$lancamento->status}}" class="@error('status') is-invalid @enderror" >
                          <option value="" disabled selected>Choose your option</option>
                          <option value="pendente">pendente</option>
                          <option value="pago">pago</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="alert alert-danger " style = 'color:red'>{{ $message }}</div>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label">Data Vencimento</label>
                    <div class="col-sm-2">
                        <input name="datavenc" type="text" id="datavenc" class="datepicker @error('datavenc') is-invalid @enderror"  value="{{date('d-m-Y', strtotime($lancamento->datavenc));}} " readonly="true">
                    </div>
                    @error('datavenc')
                        <div class="alert alert-danger " style = 'color:red'>{{ $message }}</div>
                    @enderror
               </div>												
                  
               
                <br>

                <div class="form-group">
                    
                    <div class="col-sm-12">
                        <div id="btcontrole" class="btn-toolbar">
                            <a class="btn-default btn pull-right" href="{{ route('site.cpcrUser',$lancamento->user_id)}}" id="back">Cancelar <i class="material-icons right">undo</i></a>
                            <span>&nbsp &nbsp</span>
                            <button class="btn-primary btn pull-right" type="submit" id="submit">Salvar <i class="material-icons right">save</i></button>
                            <span>&nbsp &nbsp</span>
                            <span class="btn-danger btn pull-right materialize-red" id="delete">Delete <i class="material-icons right">delete</i></span>
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

};

$("#delete").click( function() {

    doConfirm('#mymodalSubmit',"Confirma Exclusão?" , function yes()
    {

        $("#idativo").val('0');
        
    }, function no()
    {

    });

});


</script>


@endsection


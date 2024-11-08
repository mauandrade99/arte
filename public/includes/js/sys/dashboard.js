function opendetails( description, action ){
	
	$("#titledatagrid").html( '<i class="icon-highlight fa fa-check"></i> ' + description );

	$.ajax({
		  url: "includes/php/app/ajax.php?grid=false&action=" + action
		, type: "POST"
		, dataType: "json"
		, data: {
			'action': action
		}
		, success: function (data) {
			if( data.response_status.status == 1 ) {
				
				// Atualização dos painéis de sumarização de chamados agrupados por etapa. 
				$("#subpanel").html( data.response_data.subpanel.html );
				// Atualizando a tabela de chamados
				refreshdatatable( action );
			} 
			else {
				$("#subpanel").html( '&nbsp;' );
				alert( data.response_status.msg );
			}
		}
		, error: function () {
			alert( "Ocorreu um erro inesperado por favor, entre em contato com suporte tecnico." );
		}
	})
}

function totalisationcalledwaitingservice(){
	
	opendetails( 'Chamados aguardando atendimento', 'totalisationcalledwaitingservice'  );
}

function calledattendance(){
	
	opendetails( 'Chamados em atendimento', 'totalisationcalledattendance'  );
}

function callchamadosuspenso(){
	
	opendetails( 'Chamados Suspenso', 'totalcallchamadosuspenso'  );
}

function calledlate(){
	
	opendetails( 'Chamados em atraso', 'totalisationcalledlate'  );
}

function calledall(){
	
	opendetails( 'Chamados em Aberto', 'totalisationcalledall'  );
}

function refreshdatatable( action ){
	
	$('#datatable').DataTable({
		destroy: true
		, "ajax": "includes/php/app/ajax.php?grid=true&action=" + action
		, "language": {
			"lengthMenu": 		"Exibir _MENU_ registros por pagina",
			"search": 		"Pesquisar: ",
			"infoFiltered": 	"(filtered from _MAX_ total records)",
			"loadingRecords":	"Carregando...",
			"processing":     	"Processando...",
			"infoEmpty": 		"",
			"zeroRecords": 		"Nenhum registro foi localizado.",
			"info": 		"Mostrando página _PAGE_ de _PAGES_",
			"paginate": {
				"first":      "Primeiro",
				"last":       "Último",
				"next":       "Seguinte",
				"previous":   "Anterior"
			}
		}
		,"columns": [
			 { "data": "nmcliente", "sClass": "left" }
			,{ "data": "nmtitulochamado", "sClass": "left" }
			,{ "data": "nmequipe", "sClass": "left" }
			,{ "data": "cdchamado", "sClass": "center" }
			,{ "data": "dtprevisaotermino", "sClass": "center" }
			,{ "data": "nmsubsituacao", "sClass": "left" }
			,{ "data": "nmmotivosuspenso", "sClass": "left" }
		]
	});
}
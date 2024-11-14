var numerico = {
    radixPoint:".",
    groupSeparator: "",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function (value, opts) {
      return value;
    }
   }

   var decimal = {
    radixPoint:".",
    groupSeparator: "",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function (value, opts) {
      return value;
    }
   }
   
   
   var percent = {
    radixPoint:".",
    groupSeparator: "",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    suffix: ' %',
    onBeforeMask: function (value, opts) {
      return value;
    }
   }

  var inteiro = {
    radixPoint:"",
    groupSeparator: "",
    alias: "integer",
    min: 0,
    max: 9999999999,
    allowMinus: false,
    allowPlus: false,
    rightAlign: false,
    onBeforeMask: function (value, opts) {
      return value;
    }
   }
  
   function mascaras() {
	

    $(".mask-percent").inputmask("decimal",percent); 
    $(".mask-inteiro").inputmask("decimal",inteiro); 
    $(".mask-numerico").inputmask("decimal",numerico); 
    $(".mask-decimal").inputmask("decimal",numerico); 
    $(".mask-horario").inputmask("99:99"); 
	$(".mask-jornada").inputmask("99:99 às 99:99"); 
    $(".mask-date").inputmask("date");
	$('.mask-lowercase').inputmask({casing:'lower'}); 
	
	$('.mask-fone').each(function(i, el){
	$('#'+el.id).inputmask("(99) 9999-99999");
	});
	
	
	function updateMask(event) {
		var $element = $('#'+this.id);
		$(this).off('blur');
		$element.inputmask('unmaskedvalue');
		if(this.value.replace(/\D/g, '').length > 10) {
			$element.inputmask("(99) 99999-9999");
		} else {
			$element.inputmask("(99) 9999-9999");
		}
		$(this).on('blur', updateMask);
	}
	
	$('.mask-fone').on('blur', updateMask);
	
	$('.mask-date').addClass("datepicker");
	
	$('.mask-date').attr("data-provide","datepicker");
	
	$('.mask-date').datepicker({
       todayBtn: "linked",
       language: "pt-BR",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy' ,
	   IsEditable: false,
	});
	
	$('.mask-time').inputmask("hh:mm");
	
	$(document).on('focusin','.mask',function(){
		var $this = $(this);
		var mask = $this.data('mask');
		makeMask(mask, $this);
	});

	var makeMask = function (mask, $this) {
		if (mask === 'cpf') {
			$this.inputmask("99999999999");
		}
		if (mask === 'numeric') {
			$this.inputmask({
					  alias: 'numeric', 
					  allowMinus: false,  
					  digits: 0, 
					  max: 99999999999
					})
		}
		if (mask === 'cep') {
			$this.inputmask("99999-999");
		}
		if (mask === 'cnpj') {
			$this.inputmask("99.999.999/9999-99");
		}
		if (mask === 'telefone') {
			$this.inputmask({"mask": "+55 (99) [9] 9999-9999"});
		}
		if (mask === 'mail') {
			$this.inputmask("email");
		}
	}
	
	
}  

		
iniciaSort();

mascaras();

$('.dropdown-trigger').dropdown();

$('.modal').modal();

$('.datepicker').datepicker({
    format: "dd-mm-yyyy"    
});

function back() {
    window.history.back();
}

function preparePost(form,key,value) {

    var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", value);

    form.appendChild(hiddenField);

}

function postForm(path, params, method) {

    
    method = method || "post"; 

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    
    for(var key in params) {

        if(params.hasOwnProperty(key)) {

    preparePost(form,key,params[key]);

        }
    }
    
            
    document.body.appendChild(form);
    form.submit();

}

function doConfirm(modal, msg, yesFn, noFn) {
    var confirmBox = $(modal);

    confirmBox.find(".yes").unbind( "click" );
    confirmBox.find(".no").unbind( "click" );
    
    $(modal).find(".message").html(msg);
    confirmBox.find(".yes,.no").unbind().click(function()
    {
        $(modal).modal('close');
    });
    confirmBox.find(".yes").click(yesFn);
    confirmBox.find(".no").click(noFn);
    $(modal).modal('open');
 }




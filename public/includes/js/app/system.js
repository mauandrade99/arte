
		
iniciaSort();

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
    
    preparePost(form,"p_unidade",$("#p_unidade").val());
    preparePost(form,"p_nomeunidade",$("#p_nomeunidade").val());
    preparePost(form,"p_empresa",$("#p_empresa").val());
    preparePost(form,"p_nomeempresa",$("#p_nomeempresa").val());
    preparePost(form,"p_ultimadata",(window.location.pathname.indexOf("form") >= 0?hoje():$("#p_ultimadata").val()));
    
        
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


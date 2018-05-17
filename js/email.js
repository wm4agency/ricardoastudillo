var http = createRequestObject(),
    areal = Math.random() + "",
    real = areal.substring(2,6),
    forma,
    inputs ={};

function createRequestObject() {
    var xmlhttp;
    try {
        var xmlhttp = null;if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else{  if (window.ActiveXObject) {     xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');  } }

        // xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e) {
        try {
            var xmlhttp = null;if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else{  if (window.ActiveXObject) {     xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');  } }
            //xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(f) { xmlhttp=null; }
    }
    if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
        xmlhttp=new XMLHttpRequest();
    }
    return  xmlhttp;
}

function sendRequest() {

    if(Object.keys(inputs).length == 0) throw "no inputs registered";
    inputs.rnd = Math.random();

    var data= JSON.stringify(inputs);

    try{
        http.open('POST',  'p/services/mailer.php');
        http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        http.onreadystatechange = handleResponse;
        http.send('inputs='+data);
    }
    catch(e){ console.log(e);}
    finally{

    }
}

function checkvals(givenForm){
    forma = givenForm;
    var all_els = forma.elements,
        errors = 0;
    for(i=0;i<all_els.length;i++){
        var e = all_els[i];
        var hasClass=$("label[for='"+e.id+"']").hasClass("err");
        if( e.value == ""){
          if ($(e).hasClass('required')){
            errors++;
            switch (e.type){
              case "text":
              case "email":
              case "tel":
              case "checkbox":
              case "number":
              case "textarea":
                switch (e.name){
                  case "nombre":
                      outputErrorLabel(e,hasClass,"Por favor escriba su nombre");
                      break;
                  case "empresa":
                      outputErrorLabel(e,hasClass,"Por favor escriba la empresa o dependencia a a la que pertenece");
                      break;
                  case "ciudad":
                      outputErrorLabel(e,hasClass,"Por favor escriba la ciudad desde la que nos contacta");
                      break;
                  case "correo":
                      outputErrorLabel(e,hasClass,"Por favor ingrese un correo de contacto");
                      break;
                  case "telefono":
                      outputErrorLabel(e,hasClass,"Por favor ingrese un número telefónico de contacto");
                      break;
                  case "seleccion":
                      outputErrorLabel(e,hasClass,"Por favor seleccione el servicio de su interés");
                      break;
                  case "intencion":
                      outputErrorLabel(e,hasClass,"Por favor defina el motivo de su contacto");
                      break;
                  case "grado":
                      outputErrorLabel(e,hasClass,"Por favor seleccione una opción");
                      break;
                  default:
                      outputErrorLabel(e,hasClass,"Por favor ingrese un valor");
                      break;
                }
                break;
              case "select-one":
                outputErrorLabel(e,hasClass,"Por favor seleccione una opción");
                break;
              }
            }
          }
          else{
            switch(e.name){
              case "correo":
                if(validate_email($(e).val())==false){
                  outputErrorLabel(e,hasClass,"Por favor ingrese un correo válido");
                  errors++;
                }
                else{
                    $("label[for='"+e.id+"'].err").remove();
                    inputs[e.name]=e.value;
                }
                break;
              case "telefono":
                  if(validate_phone($(e).val())==false){
                    outputErrorLabel(e,hasClass,"Por favor ingrese un teléfono válido");
                    errors++;
                  }
                  else{
                    $("label[for='"+e.id+"'].err").remove();
                    inputs[e.name]=e.value;
                  }
                  break;
              default:
                  if(!e.value || e.value=="" || e.value==null || e.value<=0)break;
                  $("label[for='"+e.id+"'].err").remove();
                  inputs[e.name]=e.value;
                  break;
            }
          }
        }

    if(errors==0) {
       $("#send",forma).disabled=true;
        $("#send",forma).val("enviando...");
        sendRequest();
    }

    function outputErrorLabel(e,hasClass,label){
      if(hasClass==false){
        $(e).before("<label for="+e.id+" generated='true' class='err' >"+label+"</label>");
      }
      else{
        $("label[for='"+e.id+"'].err").html(label);
      }
    }

}

function validate_email(address) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(address) == false) {
        return false;
    }
    else
        return true;
}

function validate_phone(phone){
    /*var phoneNum = phone.replace(/[^\d]/g, '');
    if(phoneNum.length > 6 && phoneNum.length < 11) {  return true;  } else {return false;}*/
    /*var reg = /^\+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d$/;
    if(reg.test(phone) == false) {*/
        //return false;
        if(phone.length > 6 && phone.length < 11) {  return true;  }
        else
        return false;
    /*}
    else
    return true;*/
}

function handleResponse() {
    console.log('handling http response');
    switch(http.readyState){
        /*case 0:
            console.log("unsent - headers not yet sent");
            break;
        case 1:
            console.log("opened -http channel opened");
            break;
        case 2:
            console.log("headers received");
            break;
        case 3:
            console.log("loading - loading http response body");
            break;*/
        case 4:
            //console.log("done - data transfer completed or failed");
            if(http.status == 200){
                console.log("SUCCESS: http status "+http.status);
                var respuesta = http.responseText;
                $("fieldset",forma).slideUp("slow").hide();
                $(forma).append('<div class="success animate fadeInLeft">'+respuesta+'</div>')
            }
            else{
                respuesta = "No hemos podido procesar tu envío, por favor inténtalo nuevamente.";
                throw("ERROR: http status "+http.status);}
            break;
                          }
}

function isUndefined(a) {
    return typeof a == 'undefined';
}

function trim(a) {
    return a.replace(/^s*(S*(s+S+)*)s*$/, "$1");
}

function isEmail(a) {
    return (a.indexOf(".") > 0) && (a.indexOf("@") > 0);
}

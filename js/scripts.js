$(document).ready(function($){
  mediaQueryBind();
});

function mediaQueryBind() {
  document.addEventListener('animationend', function(event){

    switch (event.animationName){
      case "large":
        console.log('large');
        delegateEvents();
        break;
      case "small":
        console.log('small detected');
        delegateEventsMobile();
        break;
    }
  }, false);
}

function delegateEvents(){
    document.addEventListener('click', function (event) {
        var e = event.target;
        e.preventDefault

        if (e.classList.contains( "m-nav-toggler" ) ) { // botones en formas de contacto
            togglenav();
        }
        else if (e.classList.contains( 'sendform' ) ) { //envíos de formas
            var forma = e.form;
            checkvals(forma);
        }
        else if(e.getAttribute("data-target")){// objetos que disparan navegación
            navegar(e);
        }

    }, false);
}
function delegateEventsMobile(){
    document.addEventListener('touchstart', function (event) {
        var e = event.target;
        e.preventDefault

        if (e.classList.contains( "m-nav-toggler" ) ) { // botones en formas de contacto
            togglenav();
        }
        else if (e.classList.contains( 'sendform' ) ) { //envíos de formas
            var forma = e.form;
            checkvals(forma);
        }
        else if(e.getAttribute("data-target")){// objetos que disparan navegación
            navegar(e);
        }

    }, false);
}

function togglenav(){
    var panel = document.getElementById('panel');
    console.log('toggle!');
    panel.classList.toggle("sliding");
}

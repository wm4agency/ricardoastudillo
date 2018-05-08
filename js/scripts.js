$(document).ready(function($){
  mediaQueryBind();
  delegateEvents();
});

function mediaQueryBind() {
  document.addEventListener('animationend', function(event){
    console.log(event.animationName);

    switch (event.animationName){
      case "large":
        console.log('large detected');
        break;
      case "small":
        console.log('small to medium detected');
        break;
    }
  }, false);
}

function delegateEvents(){
    //port touch events to click events
    document.addEventListener('touchend', function(e) {
      /* prevent delay and simulated mouse events */
      //e.stopPropagation();
      //e.preventDefault();
      /* trigger the actual behavior we bound to the 'click' event */
      e.target.click();
    })
    document.addEventListener('click', function (event) {
        var e = event.target;
        //e.preventDefault
        //console.log(e);

        if (e.classList.contains( "m-nav-toggler" ) ) { // botones en formas de contacto
            e.preventDefault
            togglenav();
        }
        else if (e.classList.contains( 'sendform' ) ) { //envíos de formas
            e.preventDefault
            var forma = e.form;
            checkvals(forma);
        }
        else if(e.getAttribute("data-target")){// objetos que disparan navegación
            e.preventDefault
            navegar(e);
        }

    }, false);
}


function togglenav(){
    var panel = document.getElementById('panel');
    console.log('toggle!');
    panel.classList.toggle("sliding");
}

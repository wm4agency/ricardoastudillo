$(document).ready(function($){
  mediaQueryBind();
  delegateEvents();
  //unsliderInit();
});

var panel = document.getElementById('panel');

function mediaQueryBind() {
  document.addEventListener('animationend', function(event){
    //console.log(event.animationName);

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
  $("form").submit(function(event){
      event.preventDefault();
  });

    //port touch events to click events
    document.addEventListener('touchend', function(e) {
      /* prevent delay and simulated mouse events */
      //e.stopPropagation();
      //e.preventDefault();
      /* trigger the actual behavior we bound to the 'click' event */
      e.target.click();
    });

    document.addEventListener('click', function (event) {
        var e = event.target;
        //e.preventDefault
        //console.log(e);

        if (e.classList.contains( "m-nav-toggler" ) ) { // botones en formas de contacto
            e.preventDefault;
            //console.log(e);
            togglenav();
        }
        else if (e.classList.contains( 'send' ) ) { //envíos de formas
            e.preventDefault;
            var forma = e.form;
            //console.log(e);
            checkvals(forma);
        }
        else if(e.getAttribute("data-target")){// objetos que disparan navegación
            e.preventDefault;
            //console.log(e);
            navegar(e);
    }

    }, false);
}

function navegar(e){
    var t = e.getAttribute('data-target'),
        at;

    if( t.startsWith("#")){
        //if(document.getElementsByClassName("m-nav-toggler").length>0)togglenav();
        togglers= document.getElementsByClassName("m-nav-toggler");
        toggler_v = (togglers[0].offsetParent === null);

        if(toggler_v == false){
          window.location = t;
          togglenav();

          /* Listen for a transition! */
          /*var transitionEvent = whichTransitionEvent();
          transitionEvent && panel.addEventListener(transitionEvent, function() {
          	console.log('Transition complete!  let´s scroll!');
          });*/

        }
        else{
          $('html, body').animate({scrollTop: $(t).offset().top}, 1000);
        }
        //console.log(toggler_v);

    }
    else if(t.startsWith("http")) {  window.location = t;}
    else if(t.startsWith("?")){  window.location = rootpath+'/'+e.getAttribute('data-target');}
    else if(t=="home"){  window.location = rootpath;}
    else if(t=="contacto"){ window.location = rootpath+'/#contacto';}
    console.log(t);
    //window.location=at;
}
function togglenav(){
    console.log('toggle!');
    if(panel)panel.classList.toggle("sliding");
}

function whichTransitionEvent(){
    var t;
    var el = document.createElement('fakeelement');
    var transitions = {
      'transition':'transitionend',
      'OTransition':'oTransitionEnd',
      'MozTransition':'transitionend',
      'WebkitTransition':'webkitTransitionEnd'
    }

    for(t in transitions){
        if( el.style[t] !== undefined ){
            return transitions[t];
        }
    }
}



function modalInit(){
    // Get the modal
    var modal = document.getElementById('modal_contacto');

    if(!modal || modal == null) return;

    // Get the button that opens the modal
    var btn = document.getElementById("contacto_head");

    if(!btn || btn == null) return;


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
function unsliderInit(){
    // evaluate if there's an unslider
    var unslider = document.getElementsByClassName("unslider");

    if(!unslider[0] || unslider[0] == null) return;
    for(var i = 0; i < unslider.length; i++){
        var options = unslider[i].dataset.unslider_options;
        if(!options || options == null) {
            jQuery(unslider[i]).unslider();
        }else{
            options = JSON.parse(options);
            jQuery(unslider[i]).unslider(options);
        };

    }
}

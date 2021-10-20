$(document).ready(function(){
    
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
    if (animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50)+"%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
            next_fs.css({'left': left, 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function(){
    return false;
})



});

function activeTele1(){
     
        document.getElementById('entreprise1').disabled = false;
        document.getElementById('poste1').disabled = false;
        document.getElementById('encadrant1').disabled = false;
        document.getElementById('duree1').disabled = false;
        document.getElementById('mail1').disabled = false;
        document.getElementById('convention1').disabled = false;
        document.getElementById('rapport1').disabled = false;
     
}
function desactiveTele1(){
     
        document.getElementById('entreprise1').disabled = true;
        document.getElementById('poste1').disabled = true;
        document.getElementById('encadrant1').disabled = true;
        document.getElementById('duree1').disabled = true;
        document.getElementById('mail1').disabled = true;
        document.getElementById('convention1').disabled = true;
        document.getElementById('rapport1').disabled = true;
     
     
}
  
 
function activeTele2(){
     
        document.getElementById('entreprise2').disabled = false;
        document.getElementById('poste2').disabled = false;
        document.getElementById('encadrant2').disabled = false;
        document.getElementById('duree2').disabled = false;
        document.getElementById('mail2').disabled = false;
        document.getElementById('convention2').disabled = false;
        document.getElementById('rapport2').disabled = false;
     
}
function desactiveTele2(){
     
        document.getElementById('entreprise2').disabled = true;
        document.getElementById('poste2').disabled = true;
        document.getElementById('encadrant2').disabled = true;
        document.getElementById('duree2').disabled = true;
        document.getElementById('mail2').disabled = true;
        document.getElementById('convention2').disabled = true;
        document.getElementById('rapport2').disabled = true;
     
     
}

function activeTele3(){
     
        document.getElementById('entreprise3').disabled = false;
        document.getElementById('poste3').disabled = false;
        document.getElementById('encadrant3').disabled = false;
        document.getElementById('duree3').disabled = false;
        document.getElementById('mail3').disabled = false;
        document.getElementById('convention3').disabled = false;
        document.getElementById('rapport3').disabled = false;
     
}
function desactiveTele3(){
     
        document.getElementById('entreprise3').disabled = true;
        document.getElementById('poste3').disabled = true;
        document.getElementById('encadrant3').disabled = true;
        document.getElementById('duree3').disabled = true;
        document.getElementById('mail3').disabled = true;
        document.getElementById('convention3').disabled = true;
        document.getElementById('rapport3').disabled = true;
     
     
}
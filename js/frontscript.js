/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    window.sr = ScrollReveal();
    sr.reveal('.reveal',{
        duration: 500,
        reset : true
    });
    
    sr.reveal('.reveal700', { 
        duration: 700,
        scale : 0.8,
        reset : true
    });
    
    sr.reveal('.reveal1000', { 
        duration: 700,
        scale : 0.8,
        reset : true
    });
});


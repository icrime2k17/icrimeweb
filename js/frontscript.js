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
        duration: 1000,
        scale : 0.8,
        reset : true
    });
    
    sr.reveal('.reveal1100', { 
        duration: 1100,
        scale : 0.8,
        reset : true
    });
    
    sr.reveal('.reveal1200', { 
        duration: 1200,
        scale : 0.8,
        reset : true
    });
    
    sr.reveal('.reveal1300', { 
        duration: 1300,
        scale : 0.8,
        reset : true
    });
    
    var pie = new d3pie("myPie", {
            header: {
            },
            data: {
                    content: [
                            { label: "JavaScript", value: 11},
                            { label: "Ruby", value: 0},
                            { label: "Java", value: 0},
                    ]
            }
    });
    
    //sorting
    $("#sort_selector").change(function(){
        var sorter = $(this).val();
        if(sorter == 1)
        {
            $(".day-holder").show();
            $(".week-holder").hide();
            $(".month-holder").hide();
            $(".year-holder").hide();
        }
        else if(sorter == 2)
        {
            $(".week-holder").show();
            $(".day-holder").hide();
            $(".month-holder").hide();
            $(".year-holder").hide();
        }
        else if(sorter == 3)
        {
            $(".day-holder").hide();
            $(".week-holder").hide();
            $(".month-holder").show();
            $(".year-holder").show();
        }
        else if(sorter == 4)
        {
            $(".day-holder").hide();
            $(".week-holder").hide();
            $(".month-holder").hide();
            $(".year-holder").show();
        }
    });
});

$(function() {
$.scrollify({
                section : ".main-section",
        });
});
$.scrollify({
    section : "main-section",
    sectionName : "section-name",
    interstitialSection : "",
    easing: "easeOutExpo",
    scrollSpeed: 1100,
    offset : 0,
    scrollbars: true,
    standardScrollElements: "",
    setHeights: true,
    overflowScroll: true,
    updateHash: true,
    touchScroll:true,
    before:function() {},
    after:function() {},
    afterResize:function() {},
    afterRender:function() {}
});


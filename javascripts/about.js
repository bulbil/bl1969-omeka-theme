// about page carousel

jQuery(function(){

    jQuery('#jcarousel-about').jcarousel({
        animation: 'slow'
        
    });

    jQuery('#jcarousel-about ul')
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three")
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three")
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three")
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three")
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three")
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three")
        .append("<li>" + "one")
        .append("<li>" + "two")
        .append("<li>" + "three");

    console.log('fire');

});
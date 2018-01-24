jQuery(document).ready(function(){
"use strict";


/*** RESPONSIVE VERSION HEADER ***/		
var dropdowns = $('#main-menu > li > ul');
$('#main-menu > li > a').click(function() {
	$(dropdowns).slideUp();
	$(this).parent().find(dropdowns).slideToggle();
});

var dropdowns2 = $('#main-menu > li > ul > li ul');
$('#main-menu li > ul > li > a').click(function() {
	$(dropdowns2).slideUp();
	$(this).parent().find(dropdowns2).slideToggle();
});

$('.main-nav > span').click(function() {
	$(this).next('#main-menu').slideToggle();
});

});
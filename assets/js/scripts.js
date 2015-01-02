/* This file basically exists to polyfill IE8 because I know someone will moan */

function ready(fn) {
	if (document.addEventListener) {
		document.addEventListener('DOMContentLoaded', fn);
	} else {
		document.attachEvent('onreadystatechange', function() {
		if (document.readyState === 'interactive')
			fn();
		});
	}
}

function buttonGroupChange(){
    var tabs = document.getElementsByName("tabs");
    for(var i = 0; i < tabs.length; i++){
        if(tabs[i].checked === true){
            // alert(tabs[i] + ' is now checked');
            tabs[i].className = tabs[i].className + " checked";
        }
        else{
            // remove class
            tabs[i].className = "";
        }
    }
}

ready(function(){
	var tabs = document.getElementById("responsive-tabs");
	var radios = document.getElementsByName("tabs");
	radios[0].className = radios[0].className + " checked";
	tabs.onchange = function(){
		buttonGroupChange();
	};
});
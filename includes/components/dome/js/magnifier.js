document.onreadystatechange = function(){
    if(document.readyState === 'complete'){
function magnifier () {
    let plus = document.querySelector('.plus');
    let minus = document.querySelector('.minus');
    let dome = document.querySelector('.dome');
    let i = 1;
    if(window.getComputedStyle(dome).transform[7] == 0) {
        i = window.getComputedStyle(dome).transform[7] + window.getComputedStyle(dome).transform[8] + window.getComputedStyle(dome).transform[9];
    }
    i = Number(i);
    plus.addEventListener('click', magnifierPlus);
    minus.addEventListener('click', magnifierMinus);

    function magnifierPlus () {
        if(i <= 2) {
            i += 0.1;
        }
        if(window.getComputedStyle(dome).transform.length > 32) {
            dome.style.transform = 'scale('+i+')';
        }
        dome.style.transform = 'scale('+i+')';
    }
    function magnifierMinus () {
        if(i >= 0.4) {
            i -= 0.1;
        }
        if(window.getComputedStyle(dome).transform.length > 32 ) {
        dome.style.transform = 'scale('+i+')';
        
        }
        dome.style.transform = 'scale('+i+')';
    }
}
magnifier()

    }
}

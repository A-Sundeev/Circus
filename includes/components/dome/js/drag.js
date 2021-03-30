let draggableElems = document.querySelectorAll('.draggable');
let draggies = []; 
        for ( let i=0; i < draggableElems.length; i++ ) {
            let draggableElem = draggableElems[i];
            let draggie = new Draggabilly( draggableElem, {
        });
        draggies.push( draggie );
        }


        let occupied_places = document.querySelector('.occupied_places');
        let mainDome = document.querySelector('.main_dome');
        if(occupied_places) {
            for(let i = 0; i < occupied_places.children.length; i++) {
                let elem = occupied_places.children[i].classList[0];
                let elem2 = mainDome.querySelector('.'+ elem);
                elem2.setAttribute("style","background-color:gray !important;cursor: default !important")
                elem2.classList.add("disable_place");
                
            }
        }

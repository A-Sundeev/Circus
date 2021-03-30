
function checkPlace () {
    document.addEventListener('mouseover', function(e) {
        let place = e.target;
        if(place.classList.contains('vip')) {
            let centerCircul = document.querySelector('.center_circul_two');
            addBlockInVipPlace(centerCircul, place);
        }
        if(place.classList.contains('place')) {
            let placeParent = place.parentNode;

            installZIndexInPlace(placeParent, 'row1');
            installZIndexInPlace(placeParent, 'row2');
            installZIndexInPlace(placeParent, 'row3');
            installZIndexInPlace(placeParent, 'row4');
            installZIndexInPlace(placeParent, 'row5');
            installZIndexInPlace(placeParent, 'row6');
            installZIndexInPlace(placeParent, 'row7');
            installZIndexInPlace(placeParent, 'row8');
            function installZIndexInPlace (placeParent, activeElem) {
                if(placeParent.classList.contains(activeElem)) {
                    if(activeElem != 'row1') addZIndex('row1');
                    if(activeElem != 'row2') addZIndex('row2');
                    if(activeElem != 'row3') addZIndex('row3');
                    if(activeElem != 'row4') addZIndex('row4');
                    if(activeElem != 'row5') addZIndex('row5');
                    if(activeElem != 'row6') addZIndex('row6');
                    if(activeElem != 'row7') addZIndex('row7');
                    if(activeElem != 'row8') addZIndex('row8');
                    placeParent.style.zIndex = '';
                    function addZIndex (unnecessary) {
                        let elems = document.querySelectorAll('.' + unnecessary);
                        for(let elem of elems) {
                            elem.style.zIndex = 1;
                        }
                    }
                }
            }

            // Row 1
            connectARow(placeParent, place, 'lateral_fourth_sector_first_row',
                                            'lateral_first_sector_first_row', 
                                            'central_tritium_sector_first_row', 
                                            'central_second_sector_first_row', '1', '1200', '1200'
            );
            // \ Row 1

            // Row 2
            connectARow(placeParent, place, 'lateral_fourth_sector_second_row',
                                            'lateral_first_sector_second_row', 
                                            'central_tritium_sector_second_row', 
                                            'central_second_sector_second_row', '2', '1000', '1200'
            );
            // \ Row 2

            // Row 3
            connectARow(placeParent, place, 'lateral_fourth_sector_terium_row',
                                            'lateral_first_sector_terium_row', 
                                            'central_tritium_sector_terium_row', 
                                            'central_second_sector_terium_row', '3', '900', '1000'
            );
            // \ Row 3
            
            // Row 4
            connectARow(placeParent, place, 'lateral_fourth_sector_fourth_row',
                                            'lateral_first_sector_fourth_row', 
                                            'central_tritium_sector_fourth_row', 
                                            'central_second_sector_fourth_row', '4', '900', '1000'
            );
            // \ Row 4
            
            // Row 5
            connectARow(placeParent, place, 'lateral_fourth_sector_fifth_row',
                                            'lateral_first_sector_fifth_row', 
                                            'central_tritium_sector_fifth_row', 
                                            'central_second_sector_fifth_row', '5', '800', '900'
            );
            // \ Row 5
            
            // Row 6
            connectARow(placeParent, place, 'lateral_fourth_sector_sixth_row',
                                            'lateral_first_sector_sixth_row', 
                                            'central_tritium_sector_sixth_row', 
                                            'central_second_sector_sixth_row', '6', '700', '800'
            );
            // \ Row 6
            
            // Row 7
            connectARow(placeParent, place, 'lateral_fourth_sector_seventh_row',
                                            'lateral_first_sector_seventh_row', 
                                            'central_tritium_sector_seventh_row', 
                                            'central_second_sector_seventh_row', '7', '600', '700'
            );
            // \ Row 7
            
            // Row 8
            connectARow(placeParent, place, 'lateral_fourth_sector_eighth_row',
                                            'lateral_first_sector_eighth_row', 
                                            'central_tritium_sector_eighth_row', 
                                            'central_second_sector_eighth_row', '8', '500', '600'
            );
            // \ Row 8
        }
    })
    function connectARow(placeParent, place, topLeft, topRight, bottomLeft, bottomRight, row, priceLateral, priceCentral) {
        insertPlaceParrent(placeParent, place, topLeft, topRight, row, priceLateral, 'боковой');
        insertPlaceParrent(placeParent, place, bottomLeft, bottomRight, row, priceCentral, 'центральный');
    }
    function insertPlaceParrent (placeParent, place, one, two, row, price, sector) {
        if( placeParent.classList.contains(one)   ||
            placeParent.classList.contains(two)
        ) {
            if(place.childNodes.length == 1) {
                addBlockInPlace(place, row, price, sector);
            }
        }
    }

    function addBlockInPlace (place, row, price, sector) {
        let div = document.createElement('div');
        div.classList.add('checkPlace', 'checkPlaceRow'+ row);
        div.innerHTML = '<p>Сектор: ' + sector + '</p><p>ряд: ' + row + '</p><p>место: ' + place.innerHTML + '</p><p>цена: ' + price + '</p>';
        place.append(div);
        removeBlockInPlace(div);
    }

    function removeBlockInPlace (div, centerCircul) {
        document.addEventListener('mouseout', function(e) {
            if(!div.classList.contains('checkPlaceVip')) {
                removeZIndex('row1');
                removeZIndex('row2');
                removeZIndex('row3');
                removeZIndex('row4');
                removeZIndex('row5');
                removeZIndex('row6');
                removeZIndex('row7');
                removeZIndex('row8');
            } else {
                centerCircul.innerHTML = '<div class="center_circul_text">манеж</div>';
            }
            div.remove();
        })
    }
    function removeZIndex (unnecessary) {
        let elems = document.querySelectorAll('.' + unnecessary);
        for(let elem of elems) {
            elem.style.zIndex = '';
        }
    }

    function addBlockInVipPlace (centerCircul, place) {
        let div = document.createElement('div');
        div.classList.add('checkPlaceVip');
        div.innerHTML = '<p>VIP-ложа</p><p>' + place.innerHTML + '</p><p>цена: 1400</p>';
        centerCircul.innerHTML = '';
        centerCircul.append(div)
        removeBlockInPlace(div, centerCircul)
    }
}
    
checkPlace();


document.addEventListener('click', function (e) {
    let sectorRowPlaceInput = document.querySelector('.sectorRowPlaceInput');
    if(e.target.classList.contains('place')) {
        let elem = e.target.classList[0];
        let placeNameClass = elem.split('_');

        let nameSector = placeNameClass[0];
        let secondNameSector = placeNameClass[1];
        let nameRow = placeNameClass[3]; 
        let place = placeNameClass[6];
        let placeElem = document.querySelector('.'+elem);

        if(!sectorRowPlaceInput.querySelector('.'+elem)) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sectorRowPlace[${nameSector}][${secondNameSector}][${nameRow}][${place}]`;
            input.value = place;
            input.classList.add(elem);
            sectorRowPlaceInput.append(input);
            placeElem.style.backgroundColor = 'red';
        } else {
            let removeItem = sectorRowPlaceInput.querySelector('.'+elem);
            
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sectorRowPlaceRemove[${nameSector}][${secondNameSector}][${nameRow}][${place}]`;
            input.value = elem;
            input.classList.add('removeItemDome');
            sectorRowPlaceInput.append(input);

            removeItem.remove();
            
            if(nameRow === 'first') {
                placeElem.style.backgroundColor = 'rgb(255, 255, 139)';
            } else if(nameRow === 'second') {
                placeElem.style.backgroundColor = 'rgb(255, 208, 122)';
            } else if(nameRow === 'terium') {
                placeElem.style.backgroundColor = 'rgb(255, 138, 157)';
            } else if(nameRow === 'fourth') {
                placeElem.style.backgroundColor = 'rgb(255, 98, 255)';
            } else if(nameRow === 'fifth') {
                placeElem.style.backgroundColor = 'rgb(205, 98, 255)';
            } else if(nameRow === 'sixth') {
                placeElem.style.backgroundColor = 'rgb(141, 141, 255)';
            } else if(nameRow === 'seventh') {
                placeElem.style.backgroundColor = 'rgb(167, 255, 252)';
            } else if(nameRow === 'eighth') {
                placeElem.style.backgroundColor = 'rgb(161, 255, 161)';
            }
        }

    } else if(e.target.classList.contains('vip')) {
        let elem = e.target.classList[1];
        let placeNameClass = elem.split('_');
        
        let placeNameWord = placeNameClass[1]; 
        let place = placeNameClass[3];
        let placeElem = document.querySelector('.'+elem);

        if(!sectorRowPlaceInput.querySelector('.'+elem)) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sectorVipPlace[${placeNameWord}]`;
            input.value = place;
            input.classList.add(elem);
            sectorRowPlaceInput.append(input);
            placeElem.style.backgroundColor = 'red';
        } else {
            let removeItem = sectorRowPlaceInput.querySelector('.'+elem);
            
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sectorVipPlaceRemove[${placeNameWord}]`;
            input.value = elem;
            input.classList.add('removeItemDome');
            sectorRowPlaceInput.append(input);

            removeItem.remove();
            placeElem.style.backgroundColor = 'rgb(160, 221, 68)';
        }
    }
})

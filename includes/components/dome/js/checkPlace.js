    let all_price = document.querySelector('.all_price');
    
    let central_sector_price_first_row      = all_price.querySelector('.central_sector_price_first_row').value;
    let central_sector_price_second_row     = all_price.querySelector('.central_sector_price_second_row').value;
    let central_sector_price_terium_row     = all_price.querySelector('.central_sector_price_terium_row').value;
    let central_sector_price_fourth_row     = all_price.querySelector('.central_sector_price_fourth_row').value;
    let central_sector_price_fifth_row      = all_price.querySelector('.central_sector_price_fifth_row').value;
    let central_sector_price_sixth_row      = all_price.querySelector('.central_sector_price_sixth_row').value;
    let central_sector_price_seventh_row    = all_price.querySelector('.central_sector_price_seventh_row').value;
    let central_sector_price_eighth_row     = all_price.querySelector('.central_sector_price_eighth_row').value;

    let lateral_sector_price_first_row      = all_price.querySelector('.lateral_sector_price_first_row').value;
    let lateral_sector_price_second_row     = all_price.querySelector('.lateral_sector_price_second_row').value;
    let lateral_sector_price_terium_row     = all_price.querySelector('.lateral_sector_price_terium_row').value;
    let lateral_sector_price_fourth_row     = all_price.querySelector('.lateral_sector_price_fourth_row').value;
    let lateral_sector_price_fifth_row      = all_price.querySelector('.lateral_sector_price_fifth_row').value;
    let lateral_sector_price_sixth_row      = all_price.querySelector('.lateral_sector_price_sixth_row').value;
    let lateral_sector_price_seventh_row    = all_price.querySelector('.lateral_sector_price_seventh_row').value;
    let lateral_sector_price_eighth_row     = all_price.querySelector('.lateral_sector_price_eighth_row').value;

    let vip_price_row                       = all_price.querySelector('.vip_price_row').value;

function checkPlace () {
    document.addEventListener('mouseover', function(e) {
        let place = e.target;
        if(place.classList.contains('vip') && !place.classList.contains('disable_place')) {
            let centerCircul = document.querySelector('.center_circul_two');
            addBlockInVipPlace(centerCircul, place);
        }
        if(place.classList.contains('place') && !place.classList.contains('disable_place')) {
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
                                            'central_second_sector_first_row', '1',
                                            lateral_sector_price_first_row,
                                            central_sector_price_first_row
            );
            // \ Row 1

            // Row 2
            connectARow(placeParent, place, 'lateral_fourth_sector_second_row',
                                            'lateral_first_sector_second_row', 
                                            'central_tritium_sector_second_row', 
                                            'central_second_sector_second_row', '2', 
                                            lateral_sector_price_second_row,
                                            central_sector_price_second_row
            );
            // \ Row 2

            // Row 3
            connectARow(placeParent, place, 'lateral_fourth_sector_terium_row',
                                            'lateral_first_sector_terium_row', 
                                            'central_tritium_sector_terium_row', 
                                            'central_second_sector_terium_row', '3', 
                                            lateral_sector_price_terium_row,
                                            central_sector_price_terium_row
            );
            // \ Row 3
            
            // Row 4
            connectARow(placeParent, place, 'lateral_fourth_sector_fourth_row',
                                            'lateral_first_sector_fourth_row', 
                                            'central_tritium_sector_fourth_row', 
                                            'central_second_sector_fourth_row', '4', 
                                            lateral_sector_price_fourth_row,
                                            central_sector_price_fourth_row
            );
            // \ Row 4
            
            // Row 5
            connectARow(placeParent, place, 'lateral_fourth_sector_fifth_row',
                                            'lateral_first_sector_fifth_row', 
                                            'central_tritium_sector_fifth_row', 
                                            'central_second_sector_fifth_row', '5', 
                                            lateral_sector_price_fifth_row,
                                            central_sector_price_fifth_row
            );
            // \ Row 5
            
            // Row 6
            connectARow(placeParent, place, 'lateral_fourth_sector_sixth_row',
                                            'lateral_first_sector_sixth_row', 
                                            'central_tritium_sector_sixth_row', 
                                            'central_second_sector_sixth_row', '6', 
                                            lateral_sector_price_sixth_row,
                                            central_sector_price_sixth_row
            );
            // \ Row 6
            
            // Row 7
            connectARow(placeParent, place, 'lateral_fourth_sector_seventh_row',
                                            'lateral_first_sector_seventh_row', 
                                            'central_tritium_sector_seventh_row', 
                                            'central_second_sector_seventh_row', '7', 
                                            lateral_sector_price_seventh_row,
                                            central_sector_price_seventh_row
            );
            // \ Row 7
            
            // Row 8
            connectARow(placeParent, place, 'lateral_fourth_sector_eighth_row',
                                            'lateral_first_sector_eighth_row', 
                                            'central_tritium_sector_eighth_row', 
                                            'central_second_sector_eighth_row', '8', 
                                            lateral_sector_price_eighth_row,
                                            central_sector_price_eighth_row
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
        div.innerHTML = '<p>VIP-ложа</p><p>' + place.innerHTML + '</p><p>цена: '+ vip_price_row +'</p>';
        centerCircul.innerHTML = '';
        centerCircul.append(div)
        removeBlockInPlace(div, centerCircul)
    }
}
    
checkPlace();
let totalPrice = 0;

let lateral_first_row_first_count       = 0;
let lateral_first_row_second_count      = 0;
let lateral_first_row_terium_count      = 0;
let lateral_first_row_fourth_count      = 0;
let lateral_first_row_fifth_count       = 0;
let lateral_first_row_sixth_count       = 0;
let lateral_first_row_seventh_count     = 0;
let lateral_first_row_eighth_count      = 0;

let lateral_fourth_row_first_count      = 0;
let lateral_fourth_row_second_count     = 0;
let lateral_fourth_row_terium_count     = 0;
let lateral_fourth_row_fourth_count     = 0;
let lateral_fourth_row_fifth_count      = 0;
let lateral_fourth_row_sixth_count      = 0;
let lateral_fourth_row_seventh_count    = 0;
let lateral_fourth_row_eighth_count     = 0;

let central_second_row_first_count      = 0;
let central_second_row_second_count     = 0;
let central_second_row_terium_count     = 0;
let central_second_row_fourth_count     = 0;
let central_second_row_fifth_count      = 0;
let central_second_row_sixth_count      = 0;
let central_second_row_seventh_count    = 0;
let central_second_row_eighth_count     = 0;

let central_tritium_row_first_count     = 0;
let central_tritium_row_second_count    = 0;
let central_tritium_row_terium_count    = 0;
let central_tritium_row_fourth_count    = 0;
let central_tritium_row_fifth_count     = 0;
let central_tritium_row_sixth_count     = 0;
let central_tritium_row_seventh_count   = 0;
let central_tritium_row_eighth_count    = 0;

let vip_row_count                       = 0;



let lateral_first_row_first_stock_num       = 0;
let lateral_first_row_second_stock_num      = 0;
let lateral_first_row_terium_stock_num      = 0;
let lateral_first_row_fourth_stock_num      = 0;
let lateral_first_row_fifth_stock_num       = 0;
let lateral_first_row_sixth_stock_num       = 0;
let lateral_first_row_seventh_stock_num     = 0;
let lateral_first_row_eighth_stock_num      = 0;

let lateral_fourth_row_first_stock_num      = 0;
let lateral_fourth_row_second_stock_num     = 0;
let lateral_fourth_row_terium_stock_num     = 0;
let lateral_fourth_row_fourth_stock_num     = 0;
let lateral_fourth_row_fifth_stock_num      = 0;
let lateral_fourth_row_sixth_stock_num      = 0;
let lateral_fourth_row_seventh_stock_num    = 0;
let lateral_fourth_row_eighth_stock_num     = 0;

let central_second_row_first_stock_num      = 0;
let central_second_row_second_stock_num     = 0;
let central_second_row_terium_stock_num     = 0;
let central_second_row_fourth_stock_num     = 0;
let central_second_row_fifth_stock_num      = 0;
let central_second_row_sixth_stock_num      = 0;
let central_second_row_seventh_stock_num    = 0;
let central_second_row_eighth_stock_num     = 0;

let central_tritium_row_first_stock_num     = 0;
let central_tritium_row_second_stock_num    = 0;
let central_tritium_row_terium_stock_num    = 0;
let central_tritium_row_fourth_stock_num    = 0;
let central_tritium_row_fifth_stock_num     = 0;
let central_tritium_row_sixth_stock_num     = 0;
let central_tritium_row_seventh_stock_num   = 0;
let central_tritium_row_eighth_stock_num    = 0;

let vip_row_stock_num                       = 0;

let all_action_active_section = document.querySelector('.all_action_active_section');
let stock_items = all_action_active_section.querySelectorAll('.stock_item');
for(let i = 0; i < stock_items.length; i++) {
    let stockItemSplit = stock_items[i].value.split('_');
    let sectionName = stockItemSplit[0];
    let sectionSubName = stockItemSplit[1];
    let rowName = stockItemSplit[3];
    let stockNum = stockItemSplit[4];
    if(sectionName == 'lateral') {
        if(sectionSubName == 'first') {

            if(rowName == 'first') {
                lateral_first_row_first_stock_num = stockNum;
            }
            if(rowName == 'second') {
                lateral_first_row_second_stock_num = stockNum;
            }
            if(rowName == 'tritium') {
                lateral_first_row_terium_stock_num = stockNum;
            }
            if(rowName == 'fourth') {
                lateral_first_row_fourth_stock_num = stockNum;
            }
            if(rowName == 'fifth') {
                lateral_first_row_fifth_stock_num = stockNum;
            }
            if(rowName == 'sixth') {
                lateral_first_row_sixth_stock_num = stockNum;
            }
            if(rowName == 'seventh') {
                lateral_first_row_seventh_stock_num = stockNum;
            }
            if(rowName == 'eighth') {
                lateral_first_row_eighth_stock_num = stockNum;
            }
        }
        else if(sectionSubName == 'fourth') {
            if(rowName == 'first') {
                lateral_fourth_row_first_stock_num = stockNum;
            }
            if(rowName == 'second') {
                lateral_fourth_row_second_stock_num = stockNum;
            }
            if(rowName == 'tritium') {
                lateral_fourth_row_terium_stock_num = stockNum;
            }
            if(rowName == 'fourth') {
                lateral_fourth_row_fourth_stock_num = stockNum;
            }
            if(rowName == 'fifth') {
                lateral_fourth_row_fifth_stock_num = stockNum;
            }
            if(rowName == 'sixth') {
                lateral_fourth_row_sixth_stock_num = stockNum;
            }
            if(rowName == 'seventh') {
                lateral_fourth_row_seventh_stock_num = stockNum;
            }
            if(rowName == 'eighth') {
                lateral_fourth_row_eighth_stock_num = stockNum;
            }
        }
    } 
    else if(sectionName == 'central') {
        if(sectionSubName == 'second') {
            if(rowName == 'first') {
                central_second_row_first_stock_num = stockNum;
            }
            if(rowName == 'second') {
                central_second_row_second_stock_num = stockNum;
            }
            if(rowName == 'terium') {
                central_second_row_terium_stock_num = stockNum;
            }
            if(rowName == 'fourth') {
                central_second_row_fourth_stock_num = stockNum;
            }
            if(rowName == 'fifth') {
                central_second_row_fifth_stock_num = stockNum;
            }
            if(rowName == 'sixth') {
                central_second_row_sixth_stock_num = stockNum;
            }
            if(rowName == 'seventh') {
                central_second_row_seventh_stock_num = stockNum;
            }
            if(rowName == 'eighth') {
                central_second_row_eighth_stock_num = stockNum;
            }
        }
        else if(sectionSubName == 'tritium') {
            if(rowName == 'first') {
                central_tritium_row_first_stock_num = stockNum;
            }
            if(rowName == 'second') {
                central_tritium_row_second_stock_num = stockNum;
            }
            if(rowName == 'terium') {
                central_tritium_row_terium_stock_num = stockNum;
            }
            if(rowName == 'fourth') {
                central_tritium_row_fourth_stock_num = stockNum;
            }
            if(rowName == 'fifth') {
                central_tritium_row_fifth_stock_num = stockNum;
            }
            if(rowName == 'sixth') {
                central_tritium_row_sixth_stock_num = stockNum;
            }
            if(rowName == 'seventh') {
                central_tritium_row_seventh_stock_num = stockNum;
            }
            if(rowName == 'eighth') {
                central_tritium_row_eighth_stock_num = stockNum;
            }
        }
    }
    else if(sectionName == 'vip') {
        let stockItemSplit = stock_items[i].value.split('_')
        vip_row_stock_num = stockItemSplit[2];

    }

}

document.addEventListener('click', function (e) {
    let dome_footer_event_price = document.querySelector('.dome_footer_event_price');

    let dome_footer_event_selected_place_wrapper = document.querySelector('.dome_footer_event_selected_place_wrapper');

    let dome_footer_form = document.querySelector('.dome_footer_form');
    if(e.target.classList.contains('place') && !e.target.classList.contains('disable_place')) {
        let elem = e.target.classList[0];
        let placeNameClass = elem.split('_');
        let nameSector = placeNameClass[0];
        let secondNameSector = placeNameClass[1];
        let nameRow = placeNameClass[3]; 
        let place = placeNameClass[6];
        let placeElem = document.querySelector('.'+elem);

        let nameSectorRu;
        let secondNameSectorRu;
        let nameRowRu;
        let price;


        if(nameSector       == 'lateral') nameSectorRu          = 'боковой'; 
        if(nameSector       == 'central') nameSectorRu          = 'центральный'; 
        if(secondNameSector == 'first') secondNameSectorRu      = 'первый'; 
        if(secondNameSector == 'second') secondNameSectorRu     = 'второй'; 
        if(secondNameSector == 'tritium') secondNameSectorRu    = 'третий'; 
        if(secondNameSector == 'fourth') secondNameSectorRu     = 'четвертый';

        if(nameRow == 'first') nameRowRu    = 'первый'; 
        if(nameRow == 'second') nameRowRu   = 'второй';
        if(nameRow == 'terium') nameRowRu   = 'третий'; 
        if(nameRow == 'fourth') nameRowRu   = 'четвертый'; 
        if(nameRow == 'fifth') nameRowRu    = 'пятый'; 
        if(nameRow == 'sixth') nameRowRu    = 'шестой'; 
        if(nameRow == 'seventh') nameRowRu  = 'седьмой'; 
        if(nameRow == 'eighth') nameRowRu   = 'восьмой'; 

       
        if (nameSector == 'lateral' && nameRow == 'first') {
            price = lateral_sector_price_first_row;
        }
        if (nameSector == 'lateral' && nameRow == 'second') {
            price = lateral_sector_price_second_row;
        }
        if (nameSector == 'lateral' && nameRow == 'terium') {
            price = lateral_sector_price_terium_row;
        }
        if (nameSector == 'lateral' && nameRow == 'fourth') {
            price = lateral_sector_price_fourth_row;
        }
        if (nameSector == 'lateral' && nameRow == 'fifth') {
            price = lateral_sector_price_fifth_row;
        }
        if (nameSector == 'lateral' && nameRow == 'sixth') {
            price = lateral_sector_price_sixth_row;
        }
        if (nameSector == 'lateral' && nameRow == 'seventh') {
            price = lateral_sector_price_seventh_row;
        }
        if (nameSector == 'lateral' && nameRow == 'eighth') {
            price = lateral_sector_price_eighth_row;
        }

        if (nameSector == 'central' && nameRow == 'first') {
            price = central_sector_price_first_row;
        }
        if (nameSector == 'central' && nameRow == 'second') {
            price = central_sector_price_second_row;
        }
        if (nameSector == 'central' && nameRow == 'terium') {
            price = central_sector_price_terium_row;
        }
        if (nameSector == 'central' && nameRow == 'fourth') {
            price = central_sector_price_fourth_row;
        }
        if (nameSector == 'central' && nameRow == 'fifth') {
            price = central_sector_price_fifth_row;
        }
        if (nameSector == 'central' && nameRow == 'sixth') {
            price = central_sector_price_sixth_row;
        }
        if (nameSector == 'central' && nameRow == 'seventh') {
            price = central_sector_price_seventh_row;
        }
        if (nameSector == 'central' && nameRow == 'eighth') {
            price = central_sector_price_eighth_row;
        }
        
        if(!dome_footer_event_selected_place_wrapper.querySelector('.'+elem)) {
            if(nameSector == 'lateral') {
                if(secondNameSector == 'first') {

                    if(nameRow == 'first') {
                        lateral_first_row_first_count++
                    }
                    if(nameRow == 'second') {
                        lateral_first_row_second_count++
                    }
                    if(nameRow == 'terium') {
                        lateral_first_row_terium_count++
                    }
                    if(nameRow == 'fourth') {
                        lateral_first_row_fourth_count++
                    }
                    if(nameRow == 'fifth') {
                        lateral_first_row_fifth_count++
                    }
                    if(nameRow == 'sixth') {
                        lateral_first_row_sixth_count++
                    }
                    if(nameRow == 'seventh') {
                        lateral_first_row_seventh_count++
                    }
                    if(nameRow == 'eighth') {
                        lateral_first_row_eighth_count++
                    }
                }
                else if(secondNameSector == 'fourth') {
                    if(nameRow == 'first') {
                        lateral_fourth_row_first_count++
                    }
                    if(nameRow == 'second') {
                        lateral_fourth_row_second_count++
                    }
                    if(nameRow == 'terium') {
                        lateral_fourth_row_terium_count++
                    }
                    if(nameRow == 'fourth') {
                        lateral_fourth_row_fourth_count++
                    }
                    if(nameRow == 'fifth') {
                        lateral_fourth_row_fifth_count++
                    }
                    if(nameRow == 'sixth') {
                        lateral_fourth_row_sixth_count++
                    }
                    if(nameRow == 'seventh') {
                        lateral_fourth_row_seventh_count++
                    }
                    if(nameRow == 'eighth') {
                        lateral_fourth_row_eighth_count++
                    }
                }
            } 
            else if(nameSector == 'central') {
                if(secondNameSector == 'second') {
                    if(nameRow == 'first') {
                        central_second_row_first_count++
                    }
                    if(nameRow == 'second') {
                        central_second_row_second_count++
                    }
                    if(nameRow == 'terium') {
                        central_second_row_terium_count++
                    }
                    if(nameRow == 'fourth') {
                        central_second_row_fourth_count++
                    }
                    if(nameRow == 'fifth') {
                        central_second_row_fifth_count++
                    }
                    if(nameRow == 'sixth') {
                        central_second_row_sixth_count++
                    }
                    if(nameRow == 'seventh') {
                        central_second_row_seventh_count++
                    }
                    if(nameRow == 'eighth') {
                        central_second_row_eighth_count++
                    }
                }
                else if(secondNameSector == 'tritium') {
                    if(nameRow == 'first') {
                        central_tritium_row_first_count++
                    }
                    if(nameRow == 'second') {
                        central_tritium_row_second_count++
                    }
                    if(nameRow == 'terium') {
                        central_tritium_row_terium_count++
                    }
                    if(nameRow == 'fourth') {
                        central_tritium_row_fourth_count++
                    }
                    if(nameRow == 'fifth') {
                        central_tritium_row_fifth_count++
                    }
                    if(nameRow == 'sixth') {
                        central_tritium_row_sixth_count++
                    }
                    if(nameRow == 'seventh') {
                        central_tritium_row_seventh_count++
                    }
                    if(nameRow == 'eighth') {
                        central_tritium_row_eighth_count++
                    }
                }
            }

            let div = document.createElement('div');
            div.classList.add('dome_footer_event_selected_place', elem);
            div.innerHTML = `<div>Сектор: ${nameSectorRu} ${secondNameSectorRu}</div>
            <div>Ряд: ${nameRowRu}</div>
            <div>Место: ${place}</div>
            <div>Цена: ${price}</div>`;
            
            dome_footer_event_selected_place_wrapper.append(div)
            placeElem.style.backgroundColor = "#fff";
            placeElem.style.border = "2px solid #fff";
            placeElem.style.color = "red";
            totalPrice += +price;
            dome_footer_event_price.innerHTML = totalPrice;

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sectorRowPlace[${nameSector}][${secondNameSector}][${nameRow}][${place}]`;
            input.value = place;
            input.classList.add(elem);
            dome_footer_form.prepend(input);

            create_dome_footer_event_selected_place(lateral_first_row_first_count, lateral_first_row_first_stock_num, 'lateral_first_row_first_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_second_count, lateral_first_row_second_stock_num, 'lateral_first_row_second_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_terium_count, lateral_first_row_terium_stock_num, 'lateral_first_row_terium_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_fourth_count, lateral_first_row_fourth_stock_num, 'lateral_first_row_fourth_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_fifth_count, lateral_first_row_fifth_stock_num, 'lateral_first_row_fifth_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_sixth_count, lateral_first_row_sixth_stock_num, 'lateral_first_row_sixth_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_seventh_count, lateral_first_row_seventh_stock_num, 'lateral_first_row_seventh_stock_num');
            create_dome_footer_event_selected_place(lateral_first_row_eighth_count, lateral_first_row_eighth_stock_num, 'lateral_first_row_eighth_stock_num');
            
            create_dome_footer_event_selected_place(lateral_fourth_row_first_count, lateral_fourth_row_first_stock_num, 'lateral_fourth_row_first_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_second_count, lateral_fourth_row_second_stock_num, 'lateral_fourth_row_second_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_terium_count, lateral_fourth_row_terium_stock_num, 'lateral_fourth_row_terium_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_fourth_count, lateral_fourth_row_fourth_stock_num, 'lateral_fourth_row_fourth_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_fifth_count, lateral_fourth_row_fifth_stock_num, 'lateral_fourth_row_fifth_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_sixth_count, lateral_fourth_row_sixth_stock_num, 'lateral_fourth_row_sixth_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_seventh_count, lateral_fourth_row_seventh_stock_num, 'lateral_fourth_row_seventh_stock_num');
            create_dome_footer_event_selected_place(lateral_fourth_row_eighth_count, lateral_fourth_row_eighth_stock_num, 'lateral_fourth_row_eighth_stock_num');

            create_dome_footer_event_selected_place(central_second_row_first_count, central_second_row_first_stock_num, 'central_second_row_first_stock_num');
            create_dome_footer_event_selected_place(central_second_row_second_count, central_second_row_second_stock_num, 'central_second_row_second_stock_num');
            create_dome_footer_event_selected_place(central_second_row_terium_count, central_second_row_terium_stock_num, 'central_second_row_terium_stock_num');
            create_dome_footer_event_selected_place(central_second_row_fourth_count, central_second_row_fourth_stock_num, 'central_second_row_fourth_stock_num');
            create_dome_footer_event_selected_place(central_second_row_fifth_count, central_second_row_fifth_stock_num, 'central_second_row_fifth_stock_num');
            create_dome_footer_event_selected_place(central_second_row_sixth_count, central_second_row_sixth_stock_num, 'central_second_row_sixth_stock_num');
            create_dome_footer_event_selected_place(central_second_row_seventh_count, central_second_row_seventh_stock_num, 'central_second_row_seventh_stock_num');
            create_dome_footer_event_selected_place(central_second_row_eighth_count, central_second_row_eighth_stock_num, 'central_second_row_eighth_stock_num');

            create_dome_footer_event_selected_place(central_tritium_row_first_count, central_tritium_row_first_stock_num, 'central_tritium_row_first_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_second_count, central_tritium_row_second_stock_num, 'central_tritium_row_second_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_terium_count, central_tritium_row_terium_stock_num, 'central_tritium_row_terium_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_fourth_count, central_tritium_row_fourth_stock_num, 'central_tritium_row_fourth_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_fifth_count, central_tritium_row_fifth_stock_num, 'central_tritium_row_fifth_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_sixth_count, central_tritium_row_sixth_stock_num, 'central_tritium_row_sixth_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_seventh_count, central_tritium_row_seventh_stock_num, 'central_tritium_row_seventh_stock_num');
            create_dome_footer_event_selected_place(central_tritium_row_eighth_count, central_tritium_row_eighth_stock_num, 'central_tritium_row_eighth_stock_num');
            function create_dome_footer_event_selected_place (count, stock, name) {
                let elem = dome_footer_event_selected_place_wrapper.querySelector('.'+name);
                if(!elem) {
                    if(count == +stock + 1 && +stock > 0) {
                        let div = document.createElement('div');
                        div.classList.add(name, 'stock_active_text');
                        div.innerHTML = 'Цена по акции!';
                        dome_footer_event_selected_place_wrapper.append(div)
                        totalPrice -= +price;
                        dome_footer_event_price.innerHTML = totalPrice;
                    }
                }
            }
        } else {

            if(nameSector == 'lateral') {
                if(secondNameSector == 'first') {
                    if(nameRow == 'first') {
                        lateral_first_row_first_count--
                    }
                    if(nameRow == 'second') {
                        lateral_first_row_second_count--
                    }
                    if(nameRow == 'terium') {
                        lateral_first_row_terium_count--
                    }
                    if(nameRow == 'fourth') {
                        lateral_first_row_fourth_count--
                    }
                    if(nameRow == 'fifth') {
                        lateral_first_row_fifth_count--
                    }
                    if(nameRow == 'sixth') {
                        lateral_first_row_sixth_count--
                    }
                    if(nameRow == 'seventh') {
                        lateral_first_row_seventh_count--
                    }
                    if(nameRow == 'eighth') {
                        lateral_first_row_eighth_count--
                    }
                }
                else if(secondNameSector == 'fourth') {
                    if(nameRow == 'first') {
                        lateral_fourth_row_first_count--
                    }
                    if(nameRow == 'second') {
                        lateral_fourth_row_second_count--
                    }
                    if(nameRow == 'terium') {
                        lateral_fourth_row_terium_count--
                    }
                    if(nameRow == 'fourth') {
                        lateral_fourth_row_fourth_count--
                    }
                    if(nameRow == 'fifth') {
                        lateral_fourth_row_fifth_count--
                    }
                    if(nameRow == 'sixth') {
                        lateral_fourth_row_sixth_count--
                    }
                    if(nameRow == 'seventh') {
                        lateral_fourth_row_seventh_count--
                    }
                    if(nameRow == 'eighth') {
                        lateral_fourth_row_eighth_count--
                    }
                }
            } 
            else if(nameSector == 'central') {
                if(secondNameSector == 'second') {
                    if(nameRow == 'first') {
                        central_second_row_first_count--
                    }
                    if(nameRow == 'second') {
                        central_second_row_second_count--
                    }
                    if(nameRow == 'terium') {
                        central_second_row_terium_count--
                    }
                    if(nameRow == 'fourth') {
                        central_second_row_fourth_count--
                    }
                    if(nameRow == 'fifth') {
                        central_second_row_fifth_count--
                    }
                    if(nameRow == 'sixth') {
                        central_second_row_sixth_count--
                    }
                    if(nameRow == 'seventh') {
                        central_second_row_seventh_count--
                    }
                    if(nameRow == 'eighth') {
                        central_second_row_eighth_count--
                    }
                }
                else if(secondNameSector == 'tritium') {
                    if(nameRow == 'first') {
                        central_tritium_row_first_count--
                    }
                    if(nameRow == 'second') {
                        central_tritium_row_second_count--
                    }
                    if(nameRow == 'terium') {
                        central_tritium_row_terium_count--
                    }
                    if(nameRow == 'fourth') {
                        central_tritium_row_fourth_count--
                    }
                    if(nameRow == 'fifth') {
                        central_tritium_row_fifth_count--
                    }
                    if(nameRow == 'sixth') {
                        central_tritium_row_sixth_count--
                    }
                    if(nameRow == 'seventh') {
                        central_tritium_row_seventh_count--
                    }
                    if(nameRow == 'eighth') {
                        central_tritium_row_eighth_count--
                    }
                }
            }

            let removeItem = dome_footer_event_selected_place_wrapper.querySelector('.'+elem);
            removeItem.remove();
            totalPrice -= +price;
            dome_footer_event_price.innerHTML = totalPrice;

            let removeInput = dome_footer_form.querySelector('.'+elem);
            removeInput.remove();

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
            placeElem.style.border = "1px solid #000";
            placeElem.style.color = "#000";


            remove_dome_footer_event_selected_place(lateral_first_row_first_count, lateral_first_row_first_stock_num, 'lateral_first_row_first_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_second_count, lateral_first_row_second_stock_num, 'lateral_first_row_second_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_terium_count, lateral_first_row_terium_stock_num, 'lateral_first_row_terium_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_fourth_count, lateral_first_row_fourth_stock_num, 'lateral_first_row_fourth_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_fifth_count, lateral_first_row_fifth_stock_num, 'lateral_first_row_fifth_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_sixth_count, lateral_first_row_sixth_stock_num, 'lateral_first_row_sixth_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_seventh_count, lateral_first_row_seventh_stock_num, 'lateral_first_row_seventh_stock_num');
            remove_dome_footer_event_selected_place(lateral_first_row_eighth_count, lateral_first_row_eighth_stock_num, 'lateral_first_row_eighth_stock_num');

            remove_dome_footer_event_selected_place(lateral_fourth_row_first_count, lateral_fourth_row_first_stock_num, 'lateral_fourth_row_first_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_second_count, lateral_fourth_row_second_stock_num, 'lateral_fourth_row_second_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_terium_count, lateral_fourth_row_terium_stock_num, 'lateral_fourth_row_terium_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_fourth_count, lateral_fourth_row_fourth_stock_num, 'lateral_fourth_row_fourth_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_fifth_count, lateral_fourth_row_fifth_stock_num, 'lateral_fourth_row_fifth_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_sixth_count, lateral_fourth_row_sixth_stock_num, 'lateral_fourth_row_sixth_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_seventh_count, lateral_fourth_row_seventh_stock_num, 'lateral_fourth_row_seventh_stock_num');
            remove_dome_footer_event_selected_place(lateral_fourth_row_eighth_count, lateral_fourth_row_eighth_stock_num, 'lateral_fourth_row_eighth_stock_num');

            remove_dome_footer_event_selected_place(central_second_row_first_count, central_second_row_first_stock_num, 'central_second_row_first_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_second_count, central_second_row_second_stock_num, 'central_second_row_second_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_terium_count, central_second_row_terium_stock_num, 'central_second_row_terium_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_fourth_count, central_second_row_fourth_stock_num, 'central_second_row_fourth_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_fifth_count, central_second_row_fifth_stock_num, 'central_second_row_fifth_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_sixth_count, central_second_row_sixth_stock_num, 'central_second_row_sixth_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_seventh_count, central_second_row_seventh_stock_num, 'central_second_row_seventh_stock_num');
            remove_dome_footer_event_selected_place(central_second_row_eighth_count, central_second_row_eighth_stock_num, 'central_second_row_eighth_stock_num');

            remove_dome_footer_event_selected_place(central_tritium_row_first_count, central_tritium_row_first_stock_num, 'central_tritium_row_first_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_second_count, central_tritium_row_second_stock_num, 'central_tritium_row_second_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_terium_count, central_tritium_row_terium_stock_num, 'central_tritium_row_terium_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_fourth_count, central_tritium_row_fourth_stock_num, 'central_tritium_row_fourth_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_fifth_count, central_tritium_row_fifth_stock_num, 'central_tritium_row_fifth_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_sixth_count, central_tritium_row_sixth_stock_num, 'central_tritium_row_sixth_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_seventh_count, central_tritium_row_seventh_stock_num, 'central_tritium_row_seventh_stock_num');
            remove_dome_footer_event_selected_place(central_tritium_row_eighth_count, central_tritium_row_eighth_stock_num, 'central_tritium_row_eighth_stock_num');
            function remove_dome_footer_event_selected_place (count, stock, name) {
                let elem = dome_footer_event_selected_place_wrapper.querySelector('.'+name);
                if(elem) {
                    if(count == +stock && +stock > 0) {
                        elem.remove();
                        totalPrice += +price;
                        dome_footer_event_price.innerHTML = totalPrice;
                    }
                }

            }
        }

    } else if (e.target.classList.contains('vip') && !e.target.classList.contains('disable_place')) {

        let elem = e.target.classList[1];
        let placeNameClass = elem.split('_');
        let place = placeNameClass[3];
        let placeElem = document.querySelector('.'+elem);
        let placeNameWord = placeNameClass[1]; 
        if(!dome_footer_event_selected_place_wrapper.querySelector('.'+elem+'_item')) {
            vip_row_count++;
            let div = document.createElement('div');
            div.classList.add('dome_footer_event_selected_place', elem + '_item');
            div.innerHTML = `<div>Сектор: Вип ложа</div>
            <div>Место: ${place}</div>
            <div>Цена: ${vip_price_row}</div>`;
            dome_footer_event_selected_place_wrapper.append(div)
            placeElem.style.backgroundColor = "#fff";
            placeElem.style.border = "2px solid #fff";
            placeElem.style.color = "red";
            totalPrice += +vip_price_row;
            dome_footer_event_price.innerHTML = totalPrice;

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = `sectorVipPlace[${placeNameWord}]`;
            input.value = place;
            input.classList.add(elem);
            dome_footer_form.prepend(input);

            create_dome_footer_event_selected_place(vip_row_count, vip_row_stock_num, 'vip_row_stock_num');
            function create_dome_footer_event_selected_place (count, stock, name) {
                let elem = dome_footer_event_selected_place_wrapper.querySelector('.'+name);
                if(!elem) {
                    if(count == +stock + 1 && +stock > 0) {
                        let div = document.createElement('div');
                        div.classList.add(name, 'stock_active_text');
                        div.innerHTML = 'Цена по акции!';
                        dome_footer_event_selected_place_wrapper.append(div)
                        totalPrice -= +vip_price_row;
                        dome_footer_event_price.innerHTML = totalPrice;
                    }
                }
            }

        } else {
            vip_row_count--;
            let removeItem = dome_footer_event_selected_place_wrapper.querySelector('.'+elem +'_item');
            removeItem.remove();
            totalPrice -= +vip_price_row;
            dome_footer_event_price.innerHTML = totalPrice;
            placeElem.style.backgroundColor = 'rgb(160, 221, 68)';
            placeElem.style.border = "1px solid #000";
            placeElem.style.color = "#000";

            let removeInput = dome_footer_form.querySelector('.'+elem);
            removeInput.remove();

            remove_dome_footer_event_selected_place(vip_row_count, vip_row_stock_num, 'vip_row_stock_num');
            function remove_dome_footer_event_selected_place (count, stock, name) {
                let elem = dome_footer_event_selected_place_wrapper.querySelector('.'+name);
                if(elem) {
                    if(count == +stock && +stock > 0) {
                        elem.remove();
                        totalPrice += +vip_price_row;
                        dome_footer_event_price.innerHTML = totalPrice;
                    }
                }
            }
        }
    }
})
document.onreadystatechange = function(){
    if(document.readyState === 'complete'){
        let search = document.querySelector('.circus_shapito_sold_search');
        let output_event_sold_wrapper = document.querySelector('.output_event_sold_wrapper');
        let output_event_sold = output_event_sold_wrapper.querySelectorAll('.output_event_sold');
        
        let output_event_sold_second_classes = unique(output_event_sold);
        
        if(search) {
            let inputLetters = search.value

            if(inputLetters.length > 0) {
                removeTickets(output_event_sold);

                showHideTickets(inputLetters, output_event_sold_wrapper, output_event_sold, output_event_sold_second_classes);
            }

            search.addEventListener('keyup', function () {
                inputLetters = this.value;
                
                removeTickets(output_event_sold);

                showHideTickets(inputLetters, output_event_sold_wrapper, output_event_sold, output_event_sold_second_classes);
            })
        }
    }
}



function removeTickets(output_event_sold) {
    //при вводе первого символа, скрывает все элементы
    for(let i = 0; i < output_event_sold.length; i++) {
        output_event_sold[i].style.display = 'none';
    }
}

function showHideTickets(inputLetters, output_event_sold_wrapper, output_event_sold, output_event_sold_second_classes) {
    let foundNumbers = [];
    //ищет все номера, в которых присутствует все вводимые символы
    for(let elem of output_event_sold_second_classes) {
        let result = elem.match(inputLetters.toUpperCase());
        if(result != null) {
            foundNumbers.push(result.input);
        }
    }

    //отображает на странице все найденые элементы если введен хоть один символ
    if(inputLetters.length > 0) {
        let foundElems = [];
        for(let i = 0; i < foundNumbers.length; i++) {
            foundElems.push(output_event_sold_wrapper.querySelectorAll('.'+foundNumbers[i]));
        }

        for(let i = 0; i < foundElems.length; i++) {
            for(let j = 0; j < foundElems[i].length; j++) {
                foundElems[i][j].style.display = 'grid';
            }
        }
    } else {
        for(let i = 0; i < output_event_sold.length; i++) {
            output_event_sold[i].style.display = 'grid';
        }
    }
}

//возвращает уникальную коллекцию номеров
function unique(arr) {
    let set = new Set();
    for(let i = 0; i < arr.length; i++) {
        set.add(arr[i].classList[1])
    }
    return set;
}
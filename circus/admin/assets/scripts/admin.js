document.onreadystatechange = function(){
    if(document.readyState === 'complete'){

        var dateInputCount = 1;

        function addMoreDate () {
            let buttonAdd = document.querySelector('.addMoreDate');
            
            if(buttonAdd !== null) {
                buttonAdd.addEventListener('click', () => {
                    dateInputCount++;
                    let inputTimeWrapper = document.querySelector('.inputTimeWrapper');
                    inputTimeWrapper.insertAdjacentHTML('beforeend',
                        `<div class="inputTime">
                            <div>Дата *<input type="date" required name="date_${dateInputCount}"></div>
                            <div>Время начала *<input type="time" required name="timeStart_${dateInputCount}"></div>
                        </div>`
                    );
                })
            }
        }
        addMoreDate();

        function removeLastDate () {
            let buttonRemove  = document.querySelector('.inputTimeRemove');
                buttonRemove.addEventListener('click', () => {
                    let inputTime = document.querySelectorAll('.inputTime');
                    inputTime[inputTime.length -1].remove();
                    dateInputCount--;
            });
        }
        removeLastDate();
    }
 }
//  onclick="this.parentNode.remove();"



let active_date = ['29-10-2020','03-11-2020', '17-11-2020'];

// количество дней в месяце
function daysInMonth (date, month = date.getMonth()) {
    return 33 - new Date(date.getFullYear(), month, 33).getDate();
}
//возвращает название месяца
function get_name_of_month (date, n = 0) {
    let name_of_months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
    let month = date.getMonth() + n;
    if(month == '-1') month = 11;
    else if(month == '12') month = 0;
    return name_of_months[month];
}

//создание ячейки
function create_cell (i, date) {
    let a = document.createElement('a');
        a.classList.add('days_of_month_item');
        a.classList.add('date' + add_zerro(i) + '-' + add_zerro(date.getMonth()+1) + '-' + date.getFullYear());
    let button = document.createElement('button');
        button.classList.add('days_of_month_item_button');
        button.innerHTML = (i);
        a.append(button);
        return a;
}

function add_zerro (num) {
    if(num < 10) return '0' + num;
    return num;
}

function create_fake_cell () {
    let div = document.createElement('div');
    div.classList.add('fake_cell');
    return div;
}

//генерация календаря
function add_current_calendary (date) {
    let section_days_of_month = document.querySelector('#days_of_month');
    section_days_of_month.innerHTML = '';
    let firs_day_month = date.getDay();
    if(firs_day_month == 0) firs_day_month = 7;
    for(let i = 1; i < firs_day_month; i ++) {
        section_days_of_month.append(create_fake_cell());
    }
    let days_in_month = daysInMonth(date);
    
    for(let i = 1; i <= days_in_month; i++) {
        section_days_of_month.append(create_cell(i, date));
    }
    let last_day_of_month = new Date(date.getFullYear(), date.getMonth(), days_in_month).getDay();

    if(last_day_of_month != 0) {
        for(let i = last_day_of_month; i < 7; i++) {
            section_days_of_month.append(create_fake_cell());
        }
    } 
    
    add_name_of_months_and_year(date)
    addActiveDate();
}

//получаем элементы в которых выводятся месяца и год
let prev_month = document.querySelector('.prev_month');
let current_month = document.querySelector('.current_month');
let next_month = document.querySelector('.next_month');
let section_year = document.querySelector('#section_year');

//возвращает объект даты с первым числом месяца
let current_date = (month) => {
    let date = new Date();
    return new Date(date.getFullYear(), month, 1);
};

//выводит на страницу год и название месяцев
function add_name_of_months_and_year (date) {
    prev_month.innerHTML = '<button>&#8249; ' + get_name_of_month(date, -1) + '</button>';
    current_month.innerHTML = get_name_of_month(date);
    next_month.innerHTML = '<button>' + get_name_of_month(date , 1) + ' &#8250;</button>';
    section_year.innerHTML = date.getFullYear();
}

//номер месяца
let num_month = new Date().getMonth();

//первый вывод календаря
let flag = true;
if(flag) {
    add_current_calendary(current_date(num_month));
    flag = false;
}

//Смена месяца
prev_month.addEventListener('click', () => {
    num_month -= 1;
    add_current_calendary(current_date(num_month));
    addActiveDate();
})

next_month.addEventListener('click', () => {
    num_month += 1;
    add_current_calendary(current_date(num_month));
    addActiveDate();
})


function addActiveDate() {
    let events_date = document.querySelectorAll('.events_date');
    
    for(let i = 0; i < events_date.length; i++) {
        let event_date = events_date[i].value.split('_');
        let sub_id_event = event_date[1];
        let activeDates = document.querySelector('.date' + event_date[0])
        if(activeDates) {
            let params = window
                .location
                .search
                .replace('?','')
                .split('&')
                .reduce(
                    function(p,e){
                        var a = e.split('=');
                        p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                        return p;
                    },
                    {}
                );
            activeDates.children[0].classList.add('active_date');
            activeDates.href = '?id='+ params['id'] +'&sub_id='+ sub_id_event + '&date='+ event_date[0];
        }
    }
}
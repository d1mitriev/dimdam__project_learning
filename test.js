// Получаем элементы DOM
var myInput = document.getElementById('myInput');
var modal = document.getElementById('myModal');
var closeModal = document.getElementById('closeModal');
var calendar = document.getElementById('calendar');

// Открывает модальное окно
myInput.addEventListener('click', function() {
    modal.style.display = 'block';
    createCalendar();
});

// Закрывает модальное окно при клике на "Закрыть"
closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
});

// Закрывает модальное окно при клике вне окна
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});

// Функция для создания календаря
function createCalendar() {
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1;
    
    var calendarHTML = '<table>';
    calendarHTML += '<thead><tr><th colspan="7">' + year + ' / ' + month + '</th></tr></thead>';
    calendarHTML += '<tr><th>Вс</th><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th></tr>';
    
    var firstDay = new Date(year, month - 1, 1);
    var lastDay = new Date(year, month, 0);
    var daysInMonth = lastDay.getDate();
    
    var dayOfWeek = firstDay.getDay();
    
    calendarHTML += '<tr>';
    
    for (var i = 0; i < dayOfWeek; i++) {
        calendarHTML += '<td></td>';
    }
    
    for (var day = 1; day <= daysInMonth; day++) {
        calendarHTML += '<td><a href="#" onclick="selectDate(' + day + ')">' + day + '</a></td>';
        if ((day + dayOfWeek) % 7 == 0) {
            calendarHTML += '</tr><tr>';
        }
    }
    
    calendarHTML += '</tr>';
    calendarHTML += '</table>';
    
    calendar.innerHTML = calendarHTML;
}

// Функция для выбора даты
function selectDate(day) {
    myInput.value = day;
    modal.style.display = 'none';
}

Плагин разработан специально для цирка шапито под wordpress, для определенного купола.
При использовании этого плагина, могут быть несостыковки в верстке, 
так как плагин писался под тему colibry-wp.
В плагине есть 2 части, одна - админ панель, вторая - для пользователя
В админ панеле есть инструкция со скриншотами о том, как пользоваться этим плагином,
страница добавления мероприятий, страница просмотра всех записей с подробной настройкой каждой даты и каждого места,
страница для отображения всех купленных мест с поиском по номеру билета и удалением билета.


Инструкция по установке:

Добавить в конец файла function.php который находится в папке темы следующий код:

get_template_part('includes/shortcodes');
date_default_timezone_set('Europe/Moscow');

Для полноценной работы, добавьте следующий шорткод на нужную вам страницу [circus_zvezdnuy]

Папку "includes" добавить в папку с темой
Папку "circus" добавить в папку к плагинам

![Image alt](https://github.com/A-Sundeev/Circus/raw/master/preview/calendary.png)
![Image alt](https://github.com/A-Sundeev/Circus/raw/master/preview/dome.png)

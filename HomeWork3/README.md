# <b>Home work3</b>

Задание 1.<br>

Создайте в базе данных две связанные таблицы Countries и Cities:

Countries<br>
<br>
id int, //primary key<br>
country varchar(64) //country name<br>
)<br>
и<br>
Cities<br>
(<br>
id int, //primary key<br>
city varchar(64), //city name<br>
countryid int //foreign key for relationship with Countries<br>
)<br>

Создайте страницу lists.php, в которой создайте элемент select, отображающий перечень стран из таблицы Countries.<br>
Средствами AJAX сделайте так, чтобы при выборе страны в этом элементе select, под ним появлялась таблица (тег table), содержащая список городов выбранной страны. Никаких кнопок на странице быть не должно.


<br>Задание 2.<br>

Снова поработаем с регистрацией пользователей <br>
В этот раз вам надо выполнить такую работу. Вы прекрасно понимаете, что при регистрации пользователей надо соблюдать уникальность их описания. В нашем случае надо следить за тем, чтобы login у каждого пользователя был уникальным. Сейчас вы делали это непосредственно при записи пользователя в файл или в базу данных. Однако, такую проверку можно сделать еще до того, как пользователь нажмет кнопку submit и отправит заполненную форму на сервер. Это можно сделать с помощью AJAX.<br>
Сделайте так, чтобы при заполнении в форме поля login, и еще до нажатия кнопки submit, создавался AJAX запрос к серверу. Этот запрос должен пересылать на сервер занесенный в форму login, проверять его там на уникальность, и в случае нарушения уникальности, сообщать об этом в форму регистрации.

# <b>Примечание</b>

Сначала создаем базу банных и таблицу. Скрипт создания прилагаю (файл Скрипт.sql)

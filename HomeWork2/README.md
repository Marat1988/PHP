# <b>Home work2</b>

Задание 1.<br>

Создать страницу с формой регистрации пользователя (форму регистрации можно использовать из предыдущих уроков).<br>
Создать класс User. В этом классе создать свойства, соответствующие полям в форме регистрации. Например, набор свойств может быть таким: $login, $pass, $email и т.д. Также создать кон- структор с параметрами для всех свойств класса.<br>
Кроме этого надо создать в классе метод show(), который должен отображать на странице описание пользователя, т.е. выводить значения его свойств, например в элементе div.<br>
Написать обработчик для формы, который будет:
<ul>
<li>создавать объект класса User на основании данных, занесенных в форму;</li>
<li>вызывать метод show() для созданного объекта, отображая на странице информацию о зарегистрировавшемся пользователе.</li>
</ul>
Обратите внимание, что в этом задании мы не сохраняем информацию о пользователе, просто создаем объект класса по данным из формы и вызываем для этого объекта метод show().<br>
Для подключения к базе данных создать класс с методом:<br>
<br>
connect($host,$user,$pass,$dbname)<br>
<br>
который можно будет использовать в других заданиях, где будет необходимость работать с базой данных.<br>
Этот класс можно будет подключать с помощью include().

<br>Задание 2.<br>

Это задание является доработкой предыдущего домашнего задания.<br>

Что необходимо доработать.<br>

В базе данных создать таблицу Users соответствующую классу User. Другими словами, для каждого свойства класса в таблице должно быть соответствующее поле с таким же именем, как у свойства и с подходящим типом данных. Кроме этих полей в таблице должно быть еще поле id, для первичных ключей. Подумайте, надо ли добавлять свойство $id в класс User?<br>
В классе User, созданном в предыдущем задании надо добавить еще метод toDb(), который должен заносить информацию о пользователе в таблицу Users в базу данных.<br>
Изменить обработчик для формы, чтобы он мог:<br>
<ul>
<li>создавать объект класса User на основании данных, занесенных в форму;</li>
<li>вызывать для созданного объекта метод toDb(), добавляя созданный объект в базу данных в таблицу Users.</li>
</ul>

# <b>Примечание</b>

Сначала создает базу банных и таблицу. Скрипт создания прилагаю (файл Скрипт.sql)

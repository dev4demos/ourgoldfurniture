# ourgold/furniture

Добрый день. 
Вот тестовое задание:
Нужно создать микросервис, отображающий историю о том, какая мебель была в квартире и как была расположена.
Должна выводиться информация о том, в какой квартире в какой комнате какая мебель имеется на определённую дату, список всей мебели, когда либо бывавшей в квартире, и справочная информация - кол-во комнат в квартире, тип комнаты(кухня, ванная, прихожая, гостиная). В одной комнате может находиться несколько одинаковых элементов  мебели(например, стулья), при этом, в разных комнатах столы и стулья могут быть разные.
Можно только апишку, но если будет простенький интерфейс - это в плюс)

![First](public/img/uml.png?raw=true "Uml Screen Shot")

### RU – Русский
Время, затраченное на проектное время, составляет 4,5 часа.

#### Установка
Этот пакет использует Composer для управления своими зависимостями. Убедитесь, что Composer установлен на вашем компьютере.

Для этого пакета требуется фреймворк Laravel. Чтобы установить laravel, выполните следующую команду
```
composer create-project --prefer-dist laravel/laravel:^7.0 app
```
Измените свой каталог на только что созданный проект. В команде Windows:
```
cd app
```
Выполните следующую команду, чтобы установить этот пакет.
```
composer require ourgold/furniture
```
Вы можете использовать любую реляционную базу данных, поддерживаемую фреймворком laravel.
Просто запустите команду миграции, чтобы установить таблицы пакетов.

Для вашего удобства этот пакет поставляется с демонстрационными данными в формате json.
Чтобы использовать эти демонстрационные данные, запустите команду package seed:
```
php artisan furniture:seed
```
Используйте встроенный сервер разработки PHP для запуска приложения. В Windows выполните следующую команду:
```
php artisan serve --port=7070
```
Откройте веб-браузер по адресу: http://127.0.0.1:7070/api/furniture.

Попробуйте разные параметры, например:

http://127.0.0.1:7070/api/furniture?apartment_id=3

http://127.0.0.1:7070/api/furniture?apartment_id=3&room_id=5

http://127.0.0.1:7070/api/furniture?room_id=5


### EN - English
Time spent on project time is 4.5 hours.

#### Installation
This package uses Composer to manage its dependencies. Make sure Composer is installed on your computer. 

This package requires the Laravel framework. To install laravel run the following command
```
composer create-project --prefer-dist laravel/laravel:^7.0 app
```
Change your directory to the newly created project. On windows command:
```
cd app
```
Run the following command to install this package.
```
composer require ourgold/furniture
```
You can use any relational database supported by laravel framework. 
Just run the migration command to install package tables.

For your convenience, this package comes with demo data in json format. 
To use this demo data, run the package seed command:
```
php artisan furniture:seed
```
Use the built-in PHP development server to run the app. On Windows, run the following command:
```
php artisan serve --port=7070
```
Open a web browser at: http://127.0.0.1:7070/api/furniture

Try out different parameters like this:

http://127.0.0.1:7070/api/furniture?apartment_id=3

http://127.0.0.1:7070/api/furniture?apartment_id=3&room_id=5

http://127.0.0.1:7070/api/furniture?room_id=5
# ourgoldfurniture

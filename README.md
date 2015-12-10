Yii 2 Basic Project For Learning Purposes
============================

Training tasks
--------------
#1 Create CRUD for model Book related with model Author (One Author can related to many books).
Creating both tables, foreign key, fill initial data with migrations.

Сделать на Yii2 возможность только зарегистрированным пользователям просматривать,
удалять, редактировать записи в таблице "books"
|books|
id,
name,
date_create, / дата создания записи
date_update, / дата обновления записи
preview, / путь к картинке превью книги
date, / дата выхода книги
author_id / ид автора в таблице авторы

|authors| 
id,
firstname, / имя автора
lastname,  / фамилия автора

редактирование таблицы авторов не нужно, необходимо ее просто заполнить тестовыми данными.

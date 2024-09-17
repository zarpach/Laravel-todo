# Laravel X Vue.js Todo App

Этот файл призван помочь вам запустить данный проект.

## Рекомендуемые среды разработки

[PHP Storm](https://www.jetbrains.com/phpstorm/promo/?source=google&medium=cpc&campaign=CIS_en_CIS_PhpStorm_Branded&term=phpstorm&content=697162717393&gad_source=1&gclid=Cj0KCQjwrp-3BhDgARIsAEWJ6SyPp8wTNcyLsm3nCs7SKHtHshScvQ-gM_rB0cZ8vj63Ttt98OSruucaAvn1EALw_wcB)

## Запуск Vue.js
Не забудьте перейти в директорию _todo_frontend_


### 1. Загрузка зависимостей

```
npm install
```

### 2. Запуск в режиме разработчика

```
npm run dev
```


## Запуск Laravel сервера

Не забудьте перейти в директорию _todo_backend_

### 1. Загрузка зависимостей
```
compose install
```
### 2. Создайте файл _`.env`_ и скопируйте туда содержимое `.env.example`

### 3. Про миграцию не забываем
```
php artisan migrate
```

### 4. Генерируем ключ
```
php artisan key:generate
```

### 5. Сид для базы данных
```
php artisan make:seeder --class=DatabaseSeeder
```

### 6. Запускаем сервер
```
php artisan serve
```




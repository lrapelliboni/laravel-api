# laravel-api

- Para configurar a base de dados:

$ mv .env.example .env

E modificar as chaves:

DB_DATABASE=[your database]

DB_USERNAME=[your user]

DB_PASSWORD=[your pass]


- Para configurar autenticação e o client:

php artisan migrate

php artisan passport:install

php artisan passport:client --password


- Para criar usuário da aplicação:

$ php artisan tinker

>>> $user = new App\User();

>>> $user->email = 'test@test.com';

>>> $user->name = 'test';

>>> $user->password = Hash::make('test');

>>> $user->save();

>>> exit


- Por fim, para executar a aplicação:

$ php artisan serve



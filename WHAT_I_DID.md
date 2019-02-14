## Getting driver error?

```
sudo apt-get install php7.2-mysql
```

Also, try to restart the server.
```
sudo service apache2 restart
```


## How to start the server?

```
php artisan serve
```

## What command is typed?

```sh
# Create migrations definition
php artisan make:migration create_authors_book_table --create=authors_book
php artisan make:migration create_books_table        --create=books
php artisan make:migration create_publishers_table   --create=publishers
php artisan make:migration create_authorss_table     --create=authors

# Run the migration
php artisan migrate

# Create modul
php artisan make:model Book
php artisan make:model Publisher
php artisan make:model Author

# Create controllers
php artisan make:controller AuthorController
php artisan make:controller BookController
php artisan make:controller PublisherController

# Create API resources
php artisan make:resource AuthorResource
php artisan make:resource PublisherResource
php artisan make:resource BookResource

# Create API resource collections
php artisan make:resource AuthorCollection
php artisan make:resource PublisherCollection
php artisan make:resource BookCollection
```

## How to show migration sql?

```
php artisan migrate --pretend
```

## How to remigrate?

```
mysql -uroot -p
drop database laravel_project;
create database laravel_project;
php artisan migrate
```

## How to try the API?

Use HTTPie (download from Internet).

```sh
# For authors
http GET    http://localhost:8000/api/authors
http GET    http://localhost:8000/api/authors/1
echo '{"name": "Lee"}' | http POST   http://localhost:8000/api/authors
echo '{"name": "newLee"}' | http PUT    http://localhost:8000/api/authors/1
http DELETE http://localhost:8000/api/authors/1 

# For publishers
http GET    http://localhost:8000/api/publishers
http GET    http://localhost:8000/api/publishers/1
echo '{"name": "Leepublisher"}' | http POST   http://localhost:8000/api/publishers
echo '{"name": "new publisher"}' | http PUT    http://localhost:8000/api/publishers/1
http DELETE http://localhost:8000/api/publishers/1 

# For books
http GET    http://localhost:8000/api/books
http GET    http://localhost:8000/api/books/1
echo '{"isbn": "888", "title": "abook", "year": 1998, "publisher_id": 1, "authors": [1]}' | http POST   http://localhost:8000/api/books 
http PUT    http://localhost:8000/api/books/1 
http DELETE http://localhost:8000/api/books/1 
```
```
http://localhost:8000/api/authors
```


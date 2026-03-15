# Task Manager API

REST API built with Laravel for managing tasks and integrating an external API.

## Tech Stack

* PHP
* Laravel
* MySQL
* REST API
* External API integration
* Git version control

## Features

* CRUD operations for tasks
* Input validation
* External API consumption
* Error handling
* Clean architecture using Service Layer

## API Endpoints

### Task CRUD

GET /api/items
GET /api/items/{id}
POST /api/items
PUT /api/items/{id}
DELETE /api/items/{id}

### External API

GET /api/external-posts

Returns the first 15 posts from an external API.

### Health Check

GET /api/health

Returns API status.

## Run the Project

Install dependencies:

composer install

Run migrations:

php artisan migrate

Start the server:

php artisan serve

The API will run on:

http://127.0.0.1:8000

## Example Request (POST)

POST /api/items

{
"title": "Test task",
"description": "Example description",
"status": "pending"
}

## Author

Tatiana Fuentes Vásquez

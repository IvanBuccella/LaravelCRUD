# LaravelCRUD

This is a PHP software that implements a CRUD and includes paginated elements listing.
It's developed using PHP Laravel framework.

## Project Guidelines

### Database Structure

TAB1 - items

```
- id
- name
```

## Tutorial Structure

- **[Installation](#installation)**
  - **[Prerequisites](#prerequisites)**
  - **[Repository](#repository)**
  - **[Environment Variables](#environment-variables)**
  - **[Build](#build)**
  - **[Run Docker Services](#run-docker-services)**

## Installation

### Prerequisites

- [Docker and Docker Compose](https://www.docker.com) (Application containers engine)

### Repository

Clone the repository:

```sh
$ git clone https://github.com/IvanBuccella/LaravelCRUD
```

### Environment Variables

Set your own environment variables by using the `.env.example` file. You can just duplicate and rename it in `.env`.

### Build

Build the local environment with Docker:

```sh
$ docker-compose build
```

### Run Docker Services

```sh
$ docker-compose up
```

### Enjoy

You can test the different endpoints with [Postman](https://www.postman.com/).

- Get all items with pagination (GET): `http://localhost:${APP_PORT}/items/{pageNumber?}`
- Get one item (GET): `http://localhost:${APP_PORT}/item/{id}`
- Add an item (POST): `http://localhost:${APP_PORT}/item`. Specify the `name` field in the body request.
- Edit an item (PUT): `http://localhost:${APP_PORT}/item/{id}`. Specify the `name` field in the body request.
- Delete an item (DELETE): `http://localhost:${APP_PORT}/item/{id}`

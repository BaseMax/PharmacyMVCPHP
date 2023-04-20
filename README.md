# Pharmacy API-based PHP MVC Project

This is a project for a Pharmacy Management System built with PHP using the MVC architecture. The system will provide API endpoints for managing the inventory and orders of a pharmacy.

## Getting Started

To get started with this project, you will need to follow these steps:

- Clone the repository to your local machine using `git clone https://github.com/BaseMax/PharmacyMVCPHP.git`
- Install the required dependencies using `composer install`
- Create a new MySQL database and configure the connection details in the `.env` file
- Run the database migrations using `php migrate`
- Seed the database with sample data using `php seed`
- Once you have completed these steps, you should be ready to start using the API.

## API Endpoints

The API provides the following endpoints for managing the pharmacy inventory and orders:

### Inventory

- `GET /api/inventory` - Get a list of all products in the inventory
- `GET /api/inventory/{id}` - Get the details of a specific product by ID
- `POST /api/inventory` - Add a new product to the inventory
- `PUT /api/inventory/{id}` - Update the details of a product by ID
- `DELETE /api/inventory/{id}` - Remove a product from the inventory by ID

### Orders

- `GET /api/orders` - Get a list of all orders
- `GET /api/orders/{id}` - Get the details of a specific order by ID
- `POST /api/orders` - Create a new order
- `PUT /api/orders/{id}` - Update the details of an order by ID
- `DELETE /api/orders/{id}` - Remove an order by ID

### Authentication

- `POST /api/auth/login` - Authenticate a user and get an access token
- `POST /api/auth/register` - Register a new user account

## Authentication

The API uses JWT authentication to protect the endpoints. To access the protected endpoints, you will need to include a valid access token in the Authorization header of the request.

To obtain an access token, you can send a POST request to the /api/auth/login endpoint with valid user credentials. The response will include an access token, which you can use to access the protected endpoints.

To register a new user account, you can send a POST request to the /api/auth/register endpoint with a valid email address and password.

## Testing

The project includes PHPUnit tests for the API endpoints. You can run the tests using the following command:

```bash
php test
```

## Conclusion

This project is a simple example of a PHP MVC API-based project for a Pharmacy Management System. It can be used as a starting point for building more complex systems or as a reference for learning PHP and the MVC architecture.

# Authors

- Ali Ahmadi
- Max Base

Copyright 2023, Max Base

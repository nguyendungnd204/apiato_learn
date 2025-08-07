# Product Container

This container handles all Product-related functionalities following Apiato architecture patterns.

## Features

- ✅ Complete CRUD operations for products
- ✅ Repository pattern implementation
- ✅ Action-based architecture
- ✅ API Controllers with proper validation
- ✅ Factory for seeding test data
- ✅ Unit and functional tests

## Structure

```
Product/
├── Actions/                    # Business logic actions
├── Data/
│   ├── Factories/             # Model factories
│   ├── Migrations/            # Database migrations
│   ├── Repositories/          # Repository pattern
│   └── Seeders/               # Data seeders
├── Models/                    # Eloquent models
├── Tasks/                     # Repository tasks
├── Tests/                     # Unit and functional tests
└── UI/
    └── API/
        ├── Controllers/       # API controllers
        ├── Requests/         # Form request validation
        ├── Routes/           # Route definitions
        └── Transformers/     # API response transformers
```

## API Endpoints

All endpoints require authentication (`Bearer token`).

- `GET /v1/products` - List all products
- `GET /v1/products/{id}` - Get product by ID
- `POST /v1/products` - Create a new product
- `PATCH /v1/products/{id}` - Update product
- `DELETE /v1/products/{id}` - Delete product

## Usage Examples

### Create Product
```bash
curl -X POST http://your-domain.com/v1/products \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -d '{
    "name": "Laptop Dell XPS 13",
    "description": "High-performance ultrabook with 13-inch display",
    "price": 999.99,
    "stock": 25
  }'
```

### List Products
```bash
curl -X GET http://your-domain.com/v1/products \
  -H "Authorization: Bearer YOUR_TOKEN"
```

### Update Product
```bash
curl -X PATCH http://your-domain.com/v1/products/abc123 \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -d '{
    "price": 899.99,
    "stock": 30
  }'
```

## Database Migration

Run the migration to create the products table:

```bash
php artisan migrate
```

## Seeding Test Data

Seed some test products:

```bash
php artisan db:seed --class=App\\Containers\\AppSection\\Product\\Data\\Seeders\\ProductSeeder
```

## Running Tests

```bash
# Run all product tests
php artisan test --group=product

# Run unit tests only
php artisan test --group=unit app/Containers/AppSection/Product

# Run functional tests only
php artisan test --group=functional app/Containers/AppSection/Product
```

## Postman Collection

Import this JSON into Postman for easy testing:

```json
{
  "info": {
    "name": "Product API",
    "description": "API endpoints for Product management",
    "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
  },
  "variable": [
    {
      "key": "baseUrl",
      "value": "http://localhost",
      "type": "string"
    },
    {
      "key": "token",
      "value": "YOUR_AUTH_TOKEN_HERE",
      "type": "string"
    }
  ],
  "item": [
    {
      "name": "Create Product",
      "request": {
        "method": "POST",
        "header": [
          {
            "key": "Content-Type",
            "value": "application/json"
          },
          {
            "key": "Authorization",
            "value": "Bearer {{token}}"
          }
        ],
        "body": {
          "mode": "raw",
          "raw": "{\n  \"name\": \"Gaming Laptop\",\n  \"description\": \"High-end gaming laptop with RTX 4080\",\n  \"price\": 1899.99,\n  \"stock\": 15\n}"
        },
        "url": {
          "raw": "{{baseUrl}}/v1/products",
          "host": ["{{baseUrl}}"],
          "path": ["v1", "products"]
        }
      }
    },
    {
      "name": "List Products",
      "request": {
        "method": "GET",
        "header": [
          {
            "key": "Authorization",
            "value": "Bearer {{token}}"
          }
        ],
        "url": {
          "raw": "{{baseUrl}}/v1/products",
          "host": ["{{baseUrl}}"],
          "path": ["v1", "products"]
        }
      }
    },
    {
      "name": "Get Product by ID",
      "request": {
        "method": "GET",
        "header": [
          {
            "key": "Authorization",
            "value": "Bearer {{token}}"
          }
        ],
        "url": {
          "raw": "{{baseUrl}}/v1/products/{{productId}}",
          "host": ["{{baseUrl}}"],
          "path": ["v1", "products", "{{productId}}"]
        }
      }
    },
    {
      "name": "Update Product",
      "request": {
        "method": "PATCH",
        "header": [
          {
            "key": "Content-Type",
            "value": "application/json"
          },
          {
            "key": "Authorization",
            "value": "Bearer {{token}}"
          }
        ],
        "body": {
          "mode": "raw",
          "raw": "{\n  \"price\": 1699.99,\n  \"stock\": 20\n}"
        },
        "url": {
          "raw": "{{baseUrl}}/v1/products/{{productId}}",
          "host": ["{{baseUrl}}"],
          "path": ["v1", "products", "{{productId}}"]
        }
      }
    },
    {
      "name": "Delete Product",
      "request": {
        "method": "DELETE",
        "header": [
          {
            "key": "Authorization",
            "value": "Bearer {{token}}"
          }
        ],
        "url": {
          "raw": "{{baseUrl}}/v1/products/{{productId}}",
          "host": ["{{baseUrl}}"],
          "path": ["v1", "products", "{{productId}}"]
        }
      }
    }
  ]
}
```

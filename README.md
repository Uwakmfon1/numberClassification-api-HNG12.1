# Number Classification Api
This API provides a system for classifying numbers and getting interesting mathemaical properties of the number 
---

## Setup Instructions

### Requirements
- PHP 8.2+ 
- Laravel ^11.4+

### Installation
1. Clone the repository:
  On your terminal, in your preferred directory, copy and paste the code below:
  ```bash
     git clone https://github.com/Uwakmfon1/numberClassification-api-HNG12.1.git
  ```
2. Navigate into the Project directory:
  ```bash 
    cd numberClassification-api-HNG12.1.git
  ```
3. Install PHP dependencies:
  ```bash
    composer install
  ```
4. Copy the .env.example file to .env and configure your environment variables, including any other necessary configuration.
  ```bash
    cp .env.example .env
  ```
5. Generate an application key
  ```bash
    php artisan key:generate
  ```

7. Start the development server
```bash
  php artisan serve
```

## API Documentation

### Overview
  Below is the main API endpoint with an example for requests and responses

### Endpoints

| Method | Endpoint          |   Description               |
|--------|-------------------|-----------------------------|
| GET    |/api/number/{temp} | Get records of the user     |


### Example: Fetch user details
#### Request: GET http://localhost:8000/api/number/23

#### Response to the above request:
  ```bash
   {
    "number": 23,
    "is_prime": true,
    "is_perfect": false,
    "is_odd": true,
    "fun_fact": "23 is the number of minutes that all flashbacks take place before the assassination attempt on the president in the film Vantage Point.",
    "properties": [
        "not armstrong",
        "odd"
    ]
}
  ```
#### Request: GET http://localhost:8000/api/number/a
```bash
    {
        "number": "alphabet",
        "error": true
    }
```
 





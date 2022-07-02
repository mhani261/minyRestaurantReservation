## Restaurant Reservation
 
This is collection of APIs that serve table with limited capacity,
meals with availability number of stock, validation on available time for every table before reservation

### Used for development

- **[Laravel framework v8](https://laravel.com/docs/8.x/)**
- **[PHP 7.4](https://www.php.net/)**
- **[PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)**

### Installation

- composer install
- php artisan migrate --seed
- php artisan key:generate
- php artisan serve

### Available Endpoints

- **[Get Reservations](https://minyresturant.herokuapp.com/api/forSale/reservation/reservations)**
- **[Create Reservation](https://minyresturant.herokuapp.com/api/forSale/reservation/create)**
- **[Place Order](https://minyresturant.herokuapp.com/api/forSale/orders/placeOrder)**
- **[Get Available Meals](https://minyresturant.herokuapp.com/api/forSale/meals/availableMeals)**
- **[Checkout](https://minyresturant.herokuapp.com/api/forSale/orders/checkout/:table_id)**

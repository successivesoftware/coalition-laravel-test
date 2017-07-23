# Coalition Laravel Test

Have created two commits first for commiting files added by framework 
Second commit has the application code, refer to that for code review.


### Following pieces of code has been written 

* A controller called product controller in app/Controllers. 
    * It has two methods one to get the products listing along with the product submission form.Other to save the data
* A model for Product. 
* A migration for products table. Simple table with 3 fields. 
* A layout and a view. 



### Libraries used
* Twitter Bootstrap
* Jquery


### Code Flow
* Have kept it pretty basic. 
* The form submits the data to saveProducts methods which stores it in the database. 
* The list is displayed at first getting all the products from the table. 
* Subsequent products are added to the HTML table via JavaScript.
* Total value is calculated using JavaScript( can be error prone);


### TBD
* Add proper server side validations. 
* Make total calculation better. 
* Add formatting to values like Prices. 
* Add x-editable library to make in place editing possible. 


## Setup
* Add database creds to .env file
* `composer install`
* `php artisan migrate`
* `php artisan server`
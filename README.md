
# sw-product-review

This is a simple customer review application for Sweetwater purchases.


This project is for demonstration purposes only.  It is a Laravel app with a Vue.js frontend.  The app allows users to write product reviews for Sweetwater purchases, as well as view all other reviews.  Users also have the ability to delete their reviews.  Admin privileges exist on some users, providing them with the ability to delete reviews as well.




## Installation

Install my-project with npm

#### 1. Clone repo:
  - `git clone git@github.com:matthewshort-dev/sw-product-review.git`
#### 2. Navigate to the project root
#### 3. Install dependencies:
    `composer install`
    `npm install`
#### 4. Copy .env.example file to a new file named .env:
  - `cp .env.example .env`
#### 5. Generate application key:
  - `php artisan key:generate`
#### 6. Run migration and seed the database:
  - `php artisan migrate --seed`
  - If you've already run migrations and want to reseed the db, be sure to run `php artisan migrate:fresh --seed` to avoid potential conflicts.
#### 7. In separate terminal tabs (both in the project root):
  - Start frontend server -- `npm run dev`
  - Start backend server -- `php artisan serve`
- Navigate to `localhost:8000`


    
## Usage
Members of the team all have been added to the seed file and can log in using the following:

Username: [first name]@hausmail.com

Password: 'password'

If you would like to login as an admin to test some functionality you can use:

Username: camwham@hausmail.com
Password: 'admin'

The only functionality added for admins is the ability to delete any review.  Non-admin users can only delete their own reviews.


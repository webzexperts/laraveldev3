## About API

## Some Important Command

**For Migrate Database**: php artisan migrate

**For Create seeder**: php artisan db:seed --class=PropertySeeder

**For start laravel serve**: php artisen serve

**To run Unit test**: php artisan test

## API LIST

**1. List**

Type: GET

Url: http://localhost:8000/api/property/list


**2. Show**

Type: POST

Url: http://localhost:8000/api/property/show

Param: property_id


**3. Add**

Type: POST

Url: http://localhost:8000/api/property/add

Param: 

name

real_state_type

street

external_number

Internal_number

neighborhood

city

country

rooms

bathrooms

comments

**4. Update**

Type: POST

Url: http://localhost:8000/api/property/update

Param: 

**Required**

id 

**Optional**

name

real_state_type

street

external_number

Internal_number

neighborhood

city

country

rooms

bathrooms

comments

**5. Destroy**

Type: POST

Url: http://localhost:8000/api/property/destroy

Param: 

**Required**

id 


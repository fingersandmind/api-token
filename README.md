# Project Title

LIB BACKEND EXAMINATION.

## Technologies and Packages used

Below are the details of the system based on the given API Documentation.

## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Postman](https://www.getpostman.com/) -  The most popular tools used in API testing
* [Laragon](https://laragon.org/) - Universal development environment for PHP, Node. js, Python, Java, Go, Ruby


## Routes

```python
routes/api.php

Route::group(['namespace' => 'Api'], function(){

    /**
     * ***** [AUTHENTICATION ROUTES] *****
     */
    Route::post('register', 'AuthenticationController@register');
    Route::post('login', 'AuthenticationController@login');

});
```

## END POINTS

```python

/**
* ***** [For Registration] *****
    Method type: POST
    http://localhost:8000/api/register

    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9....",
        "token_type": "bearer",
        "expires_at": "2020-03-20 11:43:41"
    }
*/

/**
* ***** [For Login] *****
    Method type: POST
    http://localhost:8000/api/login

    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9....",
        "token_type": "bearer",
        "expires_at": "2020-03-20 11:43:41"
    }
*/

```

## Time Spent
CODING STARTED 18/03/2020 07:05 PM
| CODING ENDED   18/03/2020 07:45 PM


#### Powered By
@fingersandmind
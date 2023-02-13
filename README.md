<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## install & setting

```composer install ```

``` php artisan migrate ```

``` php artisan db:seed ```

##Routing

``` GET:/api/equipment ```

optional parameters: ```"id", "type_id","sn"```

``` GET:/api/equipment/{id} ```

none params

``` POST:/api/equipment ```

params ```"sn" or sn[]``` 

``` PUT:/api/equipment/{id}```

none params

response: ```{
"data": {
"status": true
}
}```

response: ```{
"data": {
"status": true
}
}```

``` DELETE:/api/equipment/{id}```

none params

response: ```{
"data": {
"status": true
}
}```

``` GET:/api/equipment-type```

optional parameters: ```"id", "name","mask_sn"```

``` POST:/api/user/login```

params: ```"email", "password"```

response: ```{
    "data": {
        "tokin": "YourTokin"
    }
}```





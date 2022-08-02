<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.13.0/echo.iife.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>user show with broadcasting</title>
    </head>
    <body >
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div class="flex flex-col items-center justify-center text-center">
                    <div class="text-lg my-2">
                        Name: <i class="fa-solid fa-user"> </i> <span id="name"></span>
                    </div>
                    <div class="text-lg my-2 ">
                        Email: <i class="fa-solid fa-envelope"></i> <p id="email"></p>
                    </div>
                    <div class="text-lg my-2 ">
                        City: <i class="fa-solid fa-city"></i> <p id="city"></p>
                    </div>
                    <div class="text-lg my-2 ">
                        Mobile: <i class="fa-solid fa-mobile"></i> <p id="mobile"></p>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.Echo = new Echo({
                broadcaster: 'socket.io',
                host: 'http://127.0.0.1:6001',
                client : io
            });
            window.Echo.channel('EveryoneChannel')
                .listen('.UpdateUser',function(e){
                    var name = e.name;
                    document.getElementById("name").innerHTML = name;
                    var email = e.email;
                    document.getElementById("email").innerHTML = email;
                    var city = e.city;
                    document.getElementById("city").innerHTML = city;
                    var mobile = e.mobile;
                    document.getElementById("mobile").innerHTML = mobile;
                })
        </script>
    </body>
</html>
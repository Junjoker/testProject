<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <title>Site junior</title>
</head>
<body style="font-family: 'Raleway', sans-serif;">
<div class="container-fluid m-0 d-flex justify-content-center align-items-center p-5 bg-dark text-white " style="height : 100vh">
    <div class="mx-auto mt-n5 text-center p-5" style="height: max-content;">
    <img src="{{asset('images/logo.png')}}" alt="logo" class="img mb-4" style="width:15rem;height : 12rem">
    <h1 class="text-uppercase text-white font-bold mb-3">Plan your task</h1>
    <h3 class="text-secondary mb-5"><span class="font-bold">Plan your task</span>, une application de gestion de tâches !</h3>
    <div class="d-flex mx-auto justify-content-center">
        <a class="btn btn-secondary text-white py-3 px-5 font-bold-500 mr-2 br" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="500" href="{{route('login')}}">Connexion</a> 
         <a class="btn btn-success py-3 px-5 font-bold-500 br" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1500" href="{{route('register')}}">Inscription </a>
    </div>
    </div>
</div>
</body>
</html>
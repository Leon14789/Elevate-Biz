<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/icofont.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

   
    
    <title>  @yield('title')</title>
</head>
<body class="hide-sidebar">
<x-header /> 
<x-left-menu />

<main class="content">
    @yield('content')

    </main>
   


<x-footer /> 
</body>
</html>

  <!-- Scripts -->
  <script src="/assets/js/menu-togle.js"></script>
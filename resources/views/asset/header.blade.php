   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Url') }}</title>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="images/favicon.ico" type="image/ico" />

   <!-- Bootstrap -->
   <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('vendors/bootstrap/dist/css/b4vtabs.css') }}" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
   <!-- NProgress -->
   <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">


   <!-- Custom Theme Style -->
   <link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">

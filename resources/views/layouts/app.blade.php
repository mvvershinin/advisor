<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.header')
<body>
@include('menus.main')
@yield('content')

</body>
</html>

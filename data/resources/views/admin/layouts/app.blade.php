<!DOCTYPE html>
<html lang="en" data-footer="true" data-navcolor="dark" data-color="light-red">
   <head>
        @include('admin.layouts.head')
   </head>
   <body>
      <div id="root">
         @include('admin.layouts.header')
         <main>
            @yield('content')
         </main>
        @include('admin.layouts.footer')
        
   </body>
</html>
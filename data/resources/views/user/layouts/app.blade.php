<!DOCTYPE html>
<html lang="en" data-footer="true" data-navcolor="dark" data-color="light-green">
   <head>
        @include('user.layouts.head')
   </head>
   <body>
      <div id="root">
         @include('user.layouts.header')
         <main>
            @yield('content')
         </main>
        @include('user.layouts.footer')
         </div>
   </body>
</html>
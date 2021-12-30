 @php
    $sidebars = [
         1 => "superadmin_sidebar",
         2 => "admin_sidebar",
         3 => "user_sidebar",
     ]
 @endphp
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
        @include("layouts.main.partials.".@$sidebars[Auth::user()->role_id])
     </ul>
 </nav>

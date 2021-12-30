 @php
 $sidebars = [
    1 => "superadmin_sidebar",
    2 => "admin_sidebar"
 ];

 $img = "/template/img/avatar.png";
 if(!blank(Auth::user()->avatar)){
    $img = Auth::user()->avatar;
 }
 @endphp


 <aside class="aside-container">
     <!-- START Sidebar (left)-->
     <div class="aside-inner">
         <nav class="sidebar" data-sidebar-anyclick-close="">
             <!-- START sidebar nav-->
             <ul class="sidebar-nav">

                 <li class="has-user-block">
                     <div class="collapse" id="user-block">
                         <div class="item user-block">
                             <!-- User picture-->
                             <div class="user-block-picture">
                                 <div class="user-block-status"><img class="img-thumbnail rounded-circle" src="{{url('/').$img}}" alt="Avatar" width="60" height="60">
                                     <div class="circle bg-success circle-lg"></div>
                                 </div>
                             </div><!-- Name and Job-->
                             <div class="user-block-info"><span class="user-block-name">Hello, {{Auth::user()->first_name." ".Auth::user()->last_name}}</span><span class="user-block-role">{{Auth::user()->role == 1 ? "Admin" : "Super Admin"}}</span></div>
                         </div>
                     </div>
                 </li><!-- END user info-->

                 <!-- Iterates over all sidebar items-->

                 @include("layouts.main.partials.".@$sidebars[Auth::user()->role_id])
             </ul><!-- END sidebar nav-->
         </nav>
     </div><!-- END Sidebar (left)-->
 </aside><!-- offsidebar-->
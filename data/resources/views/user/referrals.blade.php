@extends('user.layouts.app')

@section('content')
<div class="container">
   <div class="page-title-container">
      <div class="row">
         <div class="col-12 col-md-12">
            <a class="muted-link pb-2 d-inline-block hidden" href="#">
            <span class="align-middle lh-1 text-small">&nbsp;</span>
            </a>
            <h1 class="mb-0 pb-0 display-4 text-center" id="title">Share with others the TRUSTMINING platform and get a reward for it.</h1>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-12 col-xxl-auto mb-5">
         <h2 class="small-title"></h2>
         <div class="card h-100-card sw-xxl-40">
            <div class="card-body row g-0 text-center">
               <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                  <div class="mb-1 w-100">
                     <label class="form-label">Referral link:</label>
                     <input type="text"  id="myInput" class="form-control " value="https://testing.com/referral?1xosdf">
                  </div>
                  <a onclick="myFunction()" class="btn btn-icon btn-icon-start btn-outline-primary">
                  <i data-acorn-icon="plus"></i>
                  <span>Copy</span>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="page-title-container">
      <div class="row">
         <div class="col-12 col-md-12">
            <a class="muted-link pb-2 d-inline-block hidden" href="#">
            <span class="align-middle lh-1 text-small">&nbsp;</span>
            </a>
            <h1 class="mb-0 pb-0 display-5 text-center" id="">The TRUSTMINING referral program gives everyone the opportunity to earn 20% on the deposits of the people you invite.</h1>
         </div>
      </div>
   </div>   
   <div class="page-title-container">
      <div class="row">
         <div class="col-12 col-md-12">
            <a class="muted-link pb-2 d-inline-block hidden" href="#">
            <span class="align-middle lh-1 text-small">&nbsp;</span>
            </a>
            <h1 class="mb-0 pb-0 display-6 text-center" id="">You invited a friend, he bought a mining contract for $ 1000, you will receive $ 200.</h1>
         </div>
      </div>
   </div>
   <br><br><br><br>
   <div class="row">
      <div class="col-12 col-xxl-auto mb-5">
         <h2 class="small-title"></h2>
         <h1 class="mb-0 pb-0 display-4 text-center" id="title">Income History </h1>
         <br>
         <br>

         <div class="card h-100-card sw-xxl-40">
            <div class="card-body row g-0 text-center">
               <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Date</th>
                           <th>Referral</th>
                           <th>Deposit amount</th>
                           <th>Your bonus</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td colspan=4>There is no data</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<br>
<br>
<script type="text/javascript">
   function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
}
</script>
@endsection

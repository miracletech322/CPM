@extends('user.layouts.app')

@section('content')
<div class="container">

   <div class="row">
      <div class="col-12">
         <div class="mb-5">
            <div class="row g-2">
               <div class="col-12 col-md-4 col-lg-4">
                  <div class="card h-100 hover-scale-up cursor-pointer">
                     <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                           <i data-acorn-icon="dollar" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Number of miners</div>
                        <div class="text-primary cta-4">0 M</div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-4 col-lg-4">
                  <div class="card h-100 hover-scale-up cursor-pointer">
                     <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                           <i data-acorn-icon="cart" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Your balance</div>
                        <div class="text-primary cta-4">0.00000000</div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-4 col-lg-4">
                  <div class="card h-100 hover-scale-up cursor-pointer">
                     <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                           <i data-acorn-icon="server" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Income for today</div>
                        <div class="text-primary cta-4">0.00000000 BTC</div>
                        <div class="text-primary cta-4 text-warning">0.00 $</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-12 col-xxl-auto mb-5">
         <h2 class="small-title"></h2>
         <h1 class="mb-0 pb-0 display-4 text-center" id="title">Income statistics</h1>
         <br>
         <br>

         <div class="card h-100-card sw-xxl-40">
            <div class="card-body row g-0 text-center">
               <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                  <div>
                     <div class="mb-3 cta-3 text-primary">There is no data</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
      <br><br><br><br>
   <div class="row">
      <div class="col-12 col-xxl-auto mb-5">
         <h2 class="small-title"></h2>
         <h1 class="mb-0 pb-0 display-4 text-center" id="title">Statement of income</h1>
         <br>
         <br>

         <div class="card h-100-card sw-xxl-40">
            <div class="card-body row g-0 text-center">
               <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Description</th>
                           <th>Miner</th>
                           <th>Description</th>
                           <th>Amount</th>
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
@endsection

@extends('user.layouts.app')

@section('content')
<div class="container">
               <div class="row mb-n5">
                  <div class="col-xl-12">
                     <div class="mb-5">
                        <h2 class="large-title text-center">ID confirmation</h2>
                        <div class="card">
                           <div class="card-body">
                              <form>
                                 <div class="mb-3">
                                    <label class="form-label">Upload passport photo Format: PNG, JPG, Maximum size: 1MB, Maximum number: 4 *</label>
                                    <input type="file" class="form-control">
                                 </div>

                                 <button class="btn btn-icon btn-icon-start btn-outline-primary">
                                 <span>Send</span>
                                 </button>

                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="mb-5">
                        <h2 class="small-title">Personal data</h2>
                        <div class="card">
                           <div class="card-body">
                              <form>
                                 <div class="mb-3">
                                    <label class="form-label">E-mail *</label>
                                    <input type="text" class="form-control" value="{{Auth()->user()->email}}" readonly>
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" value="{{Auth()->user()->name}}">
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">Phone *</label>
                                    <input type="text" class="form-control" value="{{Auth()->user()->phone}}">
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">Additional Phone</label>
                                    <input type="text" class="form-control" value="{{Auth()->user()->ephone}}">
                                 </div>
                                 <button class="btn btn-icon btn-icon-start btn-outline-primary">
                                 <span>Submit</span>
                                 </button>

                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="mb-5">
                        <h2 class="small-title">Change Password</h2>
                        <div class="card">
                           <div class="card-body">
                              <form>
                                 <div class="mb-3">
                                    <label class="form-label">Old Password *</label>
                                    <input type="password" class="form-control" value="">
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">New Password *</label>
                                    <input type="password" class="form-control" value="">
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">Confirm new password *</label>
                                    <input type="password" class="form-control" value="">
                                 </div>
                                     <button class="btn btn-icon btn-icon-start btn-outline-primary">
                                 <span>Change Password</span>
                                 </button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
@endsection

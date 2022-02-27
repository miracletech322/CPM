<div class="row">
    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">First Name <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="first_name" id="first_name" placeholder="Enter First Name" type="text" value="{{@$record->first_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Last Name <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="last_name" id="last_name" placeholder="Enter Last Name" type="text" value="{{@$record->last_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>


    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Email <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="email" id="email" placeholder="Enter Email" type="text" value="{{@$record->email}}">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Phone Number</label>
        <input class="form-control form-control-xl" name="phone_number" id="phone_number" placeholder="Enter Phone" type="text" value="{{@$record->phone}}">
    </div>

    <div class="col-12 pb-3 mb-md-4">
        <span class="text-danger" style="font-size: inherit;"><b>Note:</b> Add password only if you want to change it.</span>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Password <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="password" placeholder="Enter Password" id="password" type="password">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Confirm Password <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" type="password">
    </div>
</div>
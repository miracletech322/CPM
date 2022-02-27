<div class="row">
    <div class="col-md-6 pb-3 mb-md-4">
       <label class="form-label form-label-lg">First Name <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="first_name" id="first_name" type="text" value="{{@$record->first_name}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter First Name">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
       <label class="form-label form-label-lg">Last Name <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="last_name" id="last_name" type="text" value="{{@$record->last_name}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Last Name">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
       <label class="form-label form-label-lg">Email Address<i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="email" id="email" type="text" value="{{@$record->email}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Email Address">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
       <label class="form-label form-label-lg">Phone Number</label>
        <input class="form-control form-control-xl" name="phone_number" id="phone_number" type="text" value="{{@$record->phone}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Phone Number">
    </div>


    @if(@$record->id && @$is_show != 1)
    @else
    <div class="col-md-6 pb-3 mb-md-4">
       <label class="form-label form-label-lg">Role<i class="text-danger">*</i></label>
        <select name="role" class="form-control form-control-xl" id="role" {{@$is_show == 1 ? "disabled" : ""}}>
            <option value="">Select Role</option>
            <option value="1" {{@$record->role_id == 1 ? "selected": ""}}>Superadmin</option>
            <option value="2" {{@$record->role_id == 2 ? "selected": ""}}>Admin</option>
        </select>
    </div>
    @endif
</div>


<div class="row">
    @if (@$record->id && @$is_show != 1)
    <div class="col-12 pb-3 mb-md-4">
        <span class="text-danger" style="font-size: inherit;"><b>Note:</b> Add password only if you want to change it.</span>
    </div>
    @endif

    <div class="col-md-6 {{@$is_show == 1 ? "d-none" : ""}} pb-3 mb-md-4">
       <label class="form-label form-label-lg">Password <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="password" id="password" type="password" placeholder="Enter Password">
    </div>

    <div class="col-md-6 {{@$is_show == 1 ? "d-none" : ""}} pb-3 mb-md-4">
       <label class="form-label form-label-lg">Confirm Password <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
    </div>
</div>
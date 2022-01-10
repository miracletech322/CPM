<div class="">
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label>First Name <i class="text-danger">*</i></label>
            <input class="form-control" name="first_name" id="first_name" type="text" value="{{@$record->first_name}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter First Name">
        </div>

        <div class="col-md-6">
            <label>Last Name <i class="text-danger">*</i></label>
            <input class="form-control" name="last_name" id="last_name" type="text" value="{{@$record->last_name}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Last Name">
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label>Email Address<i class="text-danger">*</i></label>
            <input class="form-control" name="email" id="email" type="text" value="{{@$record->email}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Email Address">
        </div>

        <div class="col-md-6">
            <label>Phone Number</label>
            <input class="form-control" name="phone_number" id="phone_number" type="text" value="{{@$record->phone}}" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Phone Number">
        </div>
    </div>


    @if(@$record->id && @$is_show != 1)
    @else
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label>Role<i class="text-danger">*</i></label>
            <select name="role" class="form-control" id="role" {{@$is_show == 1 ? "disabled" : ""}}>
                <option value="">Select Role</option>
                <option value="1" {{@$record->role_id == 1 ? "selected": ""}}>Superadmin</option>
                <option value="2" {{@$record->role_id == 2 ? "selected": ""}}>Admin</option>
            </select>
        </div>
    </div>
    @endif

    @if (@$record->id && @$is_show != 1)
    <div class="row form-group mb-3">
        <div class="col-12">
            <span class="text-danger" style="font-size: inherit;"><b>Note:</b> Add password only if you want to change it.</span>
        </div>
    </div>
    @endif

    <div class="row form-group mb-3 {{@$is_show == 1 ? "d-none" : ""}}">
        <div class="col-md-6">
            <label>Password <i class="text-danger">*</i></label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Enter Password">
        </div>

        <div class="col-md-6">
            <label>Confirm Password <i class="text-danger">*</i></label>
            <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
        </div>
    </div>
</div>
<div class="">

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label>First Name <i class="text-danger">*</i></label>
            <input class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" type="text" value="{{@$record->first_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>

        <div class="col-md-6">
            <label>Last Name <i class="text-danger">*</i></label>
            <input class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" type="text" value="{{@$record->last_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label>Email <i class="text-danger">*</i></label>
            <input class="form-control" name="email" id="email" placeholder="Enter Email" type="text" value="{{@$record->email}}">
        </div>

        <div class="col-md-6">
            <label>Phone Number</label>
            <input class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone" type="text" value="{{@$record->phone}}">
        </div>
    </div>


    <div class="row form-group mb-3">
        <div class="col-12">
            <span class="text-danger" style="font-size: inherit;"><b>Note:</b> Add password only if you want to change it.</span>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label>Password <i class="text-danger">*</i></label>
            <input class="form-control" name="password" placeholder="Enter Password" id="password" type="password">
        </div>

        <div class="col-md-6">
            <label>Confirm Password <i class="text-danger">*</i></label>
            <input class="form-control" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" type="password">
        </div>
    </div>
</div>
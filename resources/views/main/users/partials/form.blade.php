<div class="">

    <div class="row form-group mb-3">
        <div class="col-lg-6">

            <label>First Name <i class="text-danger">*</i></label>
            <input class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" type="text" value="{{@$record->first_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>

        <div class="col-lg-6">

            <label>Last Name <i class="text-danger">*</i></label>
            <input class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" type="text" value="{{@$record->last_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>
    </div>


    <div class="row form-group mb-3">
        <div class="col-lg-6">
            <label>Email <i class="text-danger">*</i></label>
            <input class="form-control" name="email" placeholder="Enter Email" id="email" type="text" value="{{@$record->email}}" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>

        <div class="col-lg-6">
            <label>Phone Number<i class="text-danger">*</i></label>
            <input class="form-control" name="phone_number" placeholder="Enter Phone Number" id="phone_number" type="text" value="{{@$record->phone}}" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>
    </div>


    @if (@$record->id && @$is_show != 1)
    <div class="row form-group mb-3">
        <div class="col-lg-12">
            <span class="text-danger" style="font-size: inherit;"><b>Note:</b> Add password only if you want to change it.</span>
        </div>
    </div>
    @endif


    @if (@$is_show != 1)

    <div class="row form-group mb-3">
        <div class="col-lg-6">
            <label>Password <i class="text-danger">*</i></label>
            <input class="form-control" placeholder="Enter Password" name="password" id="password" type="password">
        </div>

        <div class="col-lg-6" {{@$is_show == 1 ? "d-none" : ""}}>
            <label>Confirm Password <i class="text-danger">*</i></label>
            <input class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" type="password">
        </div>
    </div>
    @endif
</div>
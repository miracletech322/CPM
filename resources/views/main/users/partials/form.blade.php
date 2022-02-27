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
        <input class="form-control form-control-xl" name="email" placeholder="Enter Email" id="email" type="text" value="{{@$record->email}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Phone Number</label>
        <input class="form-control form-control-xl" name="phone_number" placeholder="Enter Phone Number" id="phone_number" type="text" value="{{@$record->phone}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>

</div>

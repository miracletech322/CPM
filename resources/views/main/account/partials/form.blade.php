<div class="row">
    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("First Name")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="first_name" id="first_name" placeholder="{{__("Enter First Name")}}" type="text" value="{{@$record->first_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Last Name")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="last_name" id="last_name" placeholder="{{__("Enter Last Name")}}" type="text" value="{{@$record->last_name}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>


    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Email")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="email" id="email" placeholder="{{__("Enter Email")}}" type="text" value="{{@$record->email}}">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Phone Number")}}</label>
        <input class="form-control form-control-xl" name="phone_number" id="phone_number" placeholder="{{__("Enter Phone")}}" type="text" value="{{@$record->phone}}">
    </div>

    <div class="col-12 pb-3 mb-md-4">
        <span class="text-danger" style="font-size: inherit;"><b>{{__("Note")}}:</b> {{__("Add password only if you want to change it.")}}</span>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Password")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="password" placeholder="{{__("Enter Password")}}" id="password" type="password">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Confirm Password")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" name="password_confirmation" placeholder="{{__("Confirm Password")}}" id="password_confirmation" type="password">
    </div>
</div>
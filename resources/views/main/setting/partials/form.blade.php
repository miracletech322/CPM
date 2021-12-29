<div class="">
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="site_name">Site Name <i class="text-danger">*</i></label>
            <input value="{{count(@$errors) > 0 ? old('site_name') : @$record->site_name}}" placeholder="Enter Site Name" class="form-control" name="site_name" id="site_name" type="text">
        </div>

        <div class="col-md-6">
            <label for="site_logo">Site Logo <i class="text-danger">*</i></label>
             @if(!blank(@$record->site_logo))
                <a class="ml-2" href="{{url('/').@$record->site_logo}}" target="_blank">(Show Logo)</a>
            @endif
            <input value="{{@$record->site_logo}}" class="form-control" name="site_logo" id="site_logo" type="file">
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="site_logo">Site Icon <i class="text-danger">*</i></label>
            @if(!blank(@$record->site_icon))
                <a class="ml-2" href="{{url('/').@$record->site_icon}}" target="_blank">(Show Icon)</a>
            @endif
            <input value="{{@$record->site_icon}}" class="form-control" name="site_icon" id="site_icon" type="file">
        </div>
    </div>

</div>

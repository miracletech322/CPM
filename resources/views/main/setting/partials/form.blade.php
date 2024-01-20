<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Settings</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="site_name">Site Name <i class="text-danger">*</i></label>
                    <input value="{{@$record->site_name}}" placeholder="Enter Site Name" class="form-control form-control-xl" name="site_name" id="site_name" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="site_logo">Site Logo </label>
                    @if(!blank(@$record->site_logo))
                    <a class="ml-2" href="{{url('/').@$record->site_logo}}" target="_blank">(Show Logo)</a>
                    @endif
                    <input value="{{@$record->site_logo}}" class="form-control form-control-xl" name="site_logo" id="site_logo" type="file">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="site_name">VAT <i class="text-danger">*</i></label>
                    <input value="{{@$record->vat}}" placeholder="Enter VAT" class="form-control form-control-xl" name="vat" id="vat" type="number">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Account Settings</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="account_number">Account Number <i class="text-danger">*</i></label>
                    <input value="{{@$record->account_number}}" placeholder="Enter Account Number" class="form-control form-control-xl" name="account_number" id="account_number" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="swift_bic">Swift BIC <i class="text-danger">*</i></label>
                    <input value="{{@$record->swift_bic}}" placeholder="Enter Swift BIC" class="form-control form-control-xl" name="swift_bic" id="swift_bic" type="text">
                </div>
            </div>
        </div>
    </div>
</div>
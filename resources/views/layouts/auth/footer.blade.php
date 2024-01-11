<footer>
    <div class="row">
        <div class="col-lg-12 col-md-12 text-center">
            <a href='{{url('lang/en')}}' class='text-primary {{session()->get('locale') == "en" ? "fw-bold" : ""}}'>{{__("English")}}</a> |
            <a href='{{url('lang/de')}}' class='text-primary {{session()->get('locale') == "de" ? "fw-bold" : ""}}'>{{__("German")}}</a>
        </div>
    </div>
</footer>
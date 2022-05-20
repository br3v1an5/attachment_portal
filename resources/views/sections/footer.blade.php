<div class="footer-wrap pd-20 mb-20 card-box">
    @if(!App\Models\Setting::where('key','application_deadline')->first() == null && App\Models\Setting::where('key','application_status')->first()->value =='OPEN' )
    @php
    $date = Carbon\Carbon::parse(App\Models\Setting::where('key','application_deadline')->first()->value);
    @endphp
    <h4 class="text-center">{{$date->diffInDays(today())}} Days To Attachment Application Deadline</h4>
    @endif
    POWERED BY <a href="https://treestate.ac.ke" target="_blank">TREESTATE AFRICA-EMPOWERING COMMINICATION </a>
    <br>
    <centre>
        <h5>
            Version 2.0
        </h5>
    </centre>

</div>
@component('mail::message')
# Hello {{$student->user->name}} once more

<p>You have successfully been allocated a supervisor.</p>
@component('mail::panel')
## SUPERVISOR DETAILS
### NAME : {{$supervisor->user->name}}
### EMAIL : {{$supervisor->user->email}}
### PHONE NUMBER: {{$supervisor->phone_number}}
### ALTERNATIVE PHONE NUMBER: {{$supervisor->alt_phone}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
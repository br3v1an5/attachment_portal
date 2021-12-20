@component('mail::message')
# Hello {{$supervisor->user->name}}

<p>You have been allocated to asses {{$student->user->name}} </p>
@component('mail::panel')
@component('mail::panel')
# PRIMARY DETAILS
## STUDENT PRMARY PHONE: {{$student->phone_number}}
## STUDENT EMAIL: {{$student->user->email}}
## STUDENT ALTERNATIVE PHONE: {{$student->alt_phone}}
@endcomponent
@component('mail::panel')
# ORGANISATION DETAILS
### ORGANAIZATION : {{$student->attachment_application->org_name}}
### DEPARTMENT : {{$student->attachment_application->attached_dep}}
### ORGANIZATION EMAIL : {{$student->attachment_application->org_email}}
### ORGANIZATION CONTACT: {{$student->attachment_application->org_no}}
### INSURED: : {{$student->attachment_application->insurance}}
### START DATE : {{$student->attachment_application->start_date}}
### COMPLETION DATE : {{$student->attachment_application->completion_date}}
### TOWN : {{$student->attachment_application->town}}
@endcomponent
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
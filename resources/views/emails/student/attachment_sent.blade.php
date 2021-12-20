@component('mail::message')
# Hello {{$student->user->name}}

<p>We have received your attachment application data as below</p>
@component('mail::panel')
### ORGANAIZATION : {{$student->attachment_application->org_name}}
### DEPARTMENT : {{$student->attachment_application->attached_dep}}
### ORGANIZATION EMAIL : {{$student->attachment_application->org_email}}
### ORGANIZATION CONTACT: {{$student->attachment_application->org_no}}
### INSURED: : {{$student->attachment_application->insurance}}
### START DATE : {{$student->attachment_application->start_date}}
### COMPLETION DATE : {{$student->attachment_application->completion_date}}
### TOWN : {{$student->attachment_application->town}}
@endcomponent
<p>We will send another email once you have been allocated a supervisor</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@component('mail::message')
# Bonjour Admin !

The body of your message.

- {{$name}}
- {{$mail}}
@component('mail::panel')
  {{$msg}}  
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

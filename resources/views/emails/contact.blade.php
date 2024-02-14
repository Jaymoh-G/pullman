@component('mail::message') # Welcome to {{ config("app.name") }}

Hello,<br>
Form fill for contact us page on powershift.org/contact-us <br>
Name: {{$name}} <br>
Email: {{$email}}<br>
Subject: {{$subject}}<br>
Message: {{$message}}<br>

Thanks,<br />
{{ config("app.name") }}
@endcomponent

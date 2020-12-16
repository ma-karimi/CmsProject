@component('mail::message')
# Welcome

Welcome to CMS Project.

@component('mail::button', ['url' => '127.0.0.1/auth/login'])
ورود
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

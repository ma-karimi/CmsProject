@component('mail::message')
Hi $user

Your last post is published now.

@component('mail::button', ['url' => '127.0.0.1/users/posts'])
Click to show
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

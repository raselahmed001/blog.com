@component('mail::message')

<p>Hello {{ $user->name }}</p>
<p>We understand it happens.</p>

@component('mail::button',['url'=> url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

<p>In case you have any issues recovering your password, pleace contact us.</p>

Thanks <br/>
{{ config('app.name') }}

@endcomponent

@component('mail::message')
# Welcome New User

Hi <strong>{{$name}}</strong>, you have successfully created your account. Change your password immediately.

@component('mail::panel')
Your password is: <strong>defaultpassword</strong>
@endcomponent


Thanks,<br>
Provincial Capitol of Pampanga
@endcomponent

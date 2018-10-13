@component('mail::message')
# Welcome New User

Hi <strong>{{$arr2['name']}}</strong>, you have successfully created your account. Change your password immediately.

@component('mail::panel')
Your password is: <strong>{{$arr2['pass']}}</strong>
@endcomponent


Thanks,<br>
Provincial Capitol of Pampanga
@endcomponent

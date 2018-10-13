@component('mail::message')
# Welcome New Applicant

Hi <strong>{{$arr['name']}}</strong>, you have successfully created your account. Change your password immediately.

@component('mail::panel')
Your password is: <strong>{{$arr['pass']}}</strong>
@endcomponent


Thanks,<br>
Provincial Capitol of Pampanga
@endcomponent

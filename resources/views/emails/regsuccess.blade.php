@component('mail::message')
# New Applicant

Hi <strong>{{$name}}</strong>, you have successfully create your account. Change your password immediately.

@component('mail::panel')
Your password is: <strong>pampangascholar</strong>
@endcomponent


Thanks,<br>
Provincial Capitol of Pampanga
@endcomponent

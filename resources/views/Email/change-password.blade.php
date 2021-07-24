@component('mail::message')
<b>Hello, {{$admin->first_name}} {{$admin->last_name}},<br>
Do you want to change your password</b><br>
Enter this code to change your password<br>
Your Code : <b><i>{{$admin->remember_token}}</i></b><br>

@component('mail::button', ['url' => URL::SignedRoute('adminProfile.enterOTP')])
Proceed to login
@endcomponent

If you were not the one to enter the password, ignore this mail.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
<b>Hello, {{$admin->first_name}} {{$admin->last_name}} </b>,<br>
Your old email was changed by Super Admin to this email<br>
Your new password is: <b><i>{{$password}}</i></b><br>
Please do change your password after you login.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

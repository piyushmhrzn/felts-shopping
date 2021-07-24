@component('mail::message')
<b>Hello, {{$admin->first_name}} {{$admin->last_name}}, <br>
Welcome To Kasthamandap</b><br>
You have been successfully registered as Admin for Kasthamandap Felts Shopping<br>
Your password is: <b><i>{{$password}}</i></b><br>
Please do change your password after you login.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

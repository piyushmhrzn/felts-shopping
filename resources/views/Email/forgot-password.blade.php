@component('mail::message')

Hey, <b>{{$admin->first_name}} {{$admin->last_name}}</b>,<br>
Did you forget your Kasthamandap password??<br>
If yes, click the Reset Password button below, otherwise ignore this mail.

@component('mail::button', ['url' => URL::SignedRoute('resetForgotPassword',['id'=>$admin->id])])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

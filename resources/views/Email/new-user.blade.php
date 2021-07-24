@component('mail::message')
<b>Hello, {{$user->email}} <br><br>

<h2 style="text-align:center">Welcome To Kasthamandap Felts Shopping</h2>
<br>
<div style="text-align:center">
    <img src="https://pngimg.com/uploads/triangle/triangle_PNG30.png" height="150px" width="150px"><br>
</div>
<p>You have successfully registered for Kasthamandap Felts Shopping.
Thank you for choosing us.</p>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

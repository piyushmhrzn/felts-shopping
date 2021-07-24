@component('mail::message')

<h1 style="text-align:center;">{{$subscriberContent->title}}</h1>
@if(($subscriberContent->image) != null)
    <img src="{{ asset('uploads/Contacts/SubscriberContent/'.$subscriberContent->image) }}">
@endif
<p>{!! $subscriberContent->long_description !!}</p>
<br>

<div style="text-align:center;color:#000">
    <small>
        This email was sent to {{$subscriber->email}}<br>
        You received this email because you are subscribed to Mentor IT.<br>
        If you don't want to get this type of email, then you can unsubscribe by clicking 
        <a href="{{URL::SignedRoute('unsubscribe',['id'=>$subscriber->id])}}" style='text-decoration:none;'> here</a>.
    </small>
</div>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
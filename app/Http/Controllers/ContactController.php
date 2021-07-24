<?php

namespace App\Http\Controllers;

use App\Mail\Subscription;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\SubscriberContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //Notification Page
    public function notification()
    {
        $contacts = Contact::orderBy('created_at','desc')->paginate(20);
        $subscribers = Subscriber::orderBy('created_at','desc')->paginate(20);
        return view('admin.contacts.messages')
                ->with('contacts',$contacts)
                ->with('subscribers',$subscribers);
    }

    //Contact Messages
    public function viewContactMessage($id)
    {
        $contactMessage = Contact::find($id);
        $contactMessage->seen = true;
        $contactMessage->save();
        return view('admin.contacts.messages.viewContactMessage')->with('contact',$contactMessage);
    }

    //Individual Contact Message in Detail
    public function contactMessageJobDone(Request $request)
    {
        $contactMessageJobDone = Contact::find($request->contact_id);
        $contactMessageJobDone->job_done = $request->job_done;
        $contactMessageJobDone->save();
    }

    //Delete Contact Message
    public function deleteContactMessage($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('contacts')->with('success','Contact Message Deleted Successfully!');
    }

    //Delete Subscribers
    public function deleteSubscriber($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();

        return redirect()->route('contacts')->with('success','Subscriber Deleted Successfully!');
    }

    //Create Subscriber Content
    public function createSubscriberContent()
    {
        return view('admin.contacts.subscribers.createSubContent');
    }

    //Create Subscriber Content
    public function subscriberContent(Request $request)
    {
        $subscribers = Subscriber::where('status',1)->get();
        $subscriberContent = new SubscriberContent;

        $subscriberContent->title = $request->input('title');
        $subscriberContent->long_description = $request->input('long_description');

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path() . '/uploads/Contacts/SubscriberContent', $fileNameToStore);
            $subscriberContent->image=$fileNameToStore;
        } 
        
        if($subscriberContent->save()){
            foreach($subscribers as $subscriber){
                Mail::to($subscriber)->send(new Subscription($subscriber, $subscriberContent));
            }
            return redirect()->route('contacts')->with('success','Subscription Email Sent Successfully!');
        }else{
            return redirect()->route('contacts')->with('error','Subscription Email could not be sent');
        }
    }

    //View Previous Subscriber Content
    public function previousSubscriberContents()
    {
        $subscriberContents = SubscriberContent::orderBy('created_at','desc')->paginate(20);
        return view('admin.contacts.subscribers.previousSubContents')->with('subscriberContents',$subscriberContents);
    }

    //View Previous Subscriber Content in Detail
    public function previousContentDetail($id)
    {
        $subscriberContent = SubscriberContent::find($id);
        return view('admin.contacts.subscribers.previousContentDetails')->with('subscriberContent',$subscriberContent);
    }

    //Resend Previous Subscriber Content in Detail
    public function resendPreviousContent($id)
    {
        $subscriberContent = SubscriberContent::find($id);
        $subscribers = Subscriber::where('status',1)->get();

        foreach($subscribers as $subscriber){
            Mail::to($subscriber)->send(new Subscription($subscriber, $subscriberContent));
        }

        return redirect()->route('contacts')->with('success','Previous Subscription Email Resent Successfully!');
    }

    //Delete Subscriber Contents
    public function deleteSubscriberContent($id)
    {
        $subscriberContent = SubscriberContent::find($id);
        if($subscriberContent->image != null){
            File::delete("uploads/Contacts/SubscriberContent/" . $subscriberContent->image);
        }
        $subscriberContent->delete();

        return redirect()->route('contacts.previousSubscriberContents')->with('success','Subscription Content Deleted Successfully!');
    }
}

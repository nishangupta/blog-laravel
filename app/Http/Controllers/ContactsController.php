<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
// Created this controller for the api route of contacts chat app
class ContactsController extends Controller
{
    public function get()
    {
        // get all users except the authenticated ones
        $contacts = User::where('id', '<>', auth()->id())->get();

        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as message_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $contacts = $contacts->map(function ($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });

        return response()->json($contacts);
    }
    public function getMessagesFor($id)
    {
        $messages = Message::where(function ($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })->get();

        return response()->json($messages);
    }
    public function send(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        //event for sending new message
        event(new NewMessage($message));
        return response()->json($message);
    }
}

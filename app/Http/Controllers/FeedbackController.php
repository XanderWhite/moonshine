<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\FeedbackReceived;
use Illuminate\Support\Facades\Mail;

class FeedbackController
{
    public function show()
    {
        return view('pages.feedback');
    }

    public function submit(FeedbackRequest $request)
    {
        $validated = $request->validated();

        $data = $request->only(['name', 'email', 'message']);

        $attachments = [];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                if ($file->isValid()) {
                  $attachments[] = [
                        'path' => $file->store('feedback_attachments'), 
                        'original_name' => $file->getClientOriginalName(),
                        'mime_type' => $file->getMimeType(),
                        'size' => $file->getSize(),
                    ];
                }
            }
        }

        Mail::to(config('mail.from.address'))->send(new FeedbackReceived($data, $attachments));

        return back()->with('success', 'Сообщение отправлено!');
    }
}

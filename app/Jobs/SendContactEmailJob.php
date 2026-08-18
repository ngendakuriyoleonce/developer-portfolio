<?php

namespace App\Jobs;

use App\Models\ContactMessage;
use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public ContactMessage $message
    ) {}

    public function handle(): void
    {
        $profile = Profile::first();
        
        // In a real app, you'd send an email here
        // Mail::to($profile->email)->send(new ContactReceivedMail($this->message));
        
        \Log::info('Contact email sent for: ' . $this->message->email);
    }
}

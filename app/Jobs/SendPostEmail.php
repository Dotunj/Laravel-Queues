<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Post;

class SendPostEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $post;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        //
        $this->post= $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     $data= array(
     'title'=> $this->post->title,
     'body'=> $this->post->body,
    );

    Mail::send('emails.post', $data, function($message){
     $message->from('info@eduonix.com', 'Laravel Queues');
     $message->to('dotunjolaosho@yahoo.com')->subject('There is a new post');
  });

    }
}

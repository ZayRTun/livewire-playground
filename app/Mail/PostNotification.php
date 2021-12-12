<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostNotification extends Mailable
{
	use Queueable, SerializesModels;

	public Post $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('admin@goldenland-realestate.com', 'Golden Land Real Estate')
			->view('emails.post-notification');
	}
}

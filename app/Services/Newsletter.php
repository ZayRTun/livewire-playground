<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Collection;
use Postmark\PostmarkClient;

class Newsletter
{
	const NEWSTEMPLATE = '25833874';

	public function broadcast(Collection $subscribers, Post $post)
	{
		$client = new PostmarkClient(config('services.postmark.token'));

		$messages = [];

		foreach ($subscribers as $subscriber) {
			array_push($messages, [
				'To' => $subscriber->email,
				'TemplateID' => self::NEWSTEMPLATE,
				'TemplateModel' => [
					"name" => $subscriber->name,
					"post_title" => $post->title,
					"post_body" => $post->body,
					"post_url" => route('show-post', $post->id),
					'contact_us_url' => route('contact-us'),
					"sender_name" => 'Zayar Tun',
					"user_email" => $subscriber->email,
					'company_name' => config('app.name'),
					'company_address' => config('app.address'),
				],
				'From' => "noreply@goldenland-realestate.com",
				'MessageStream' => 'notifications'
			]);
		}

		return $client->sendEmailBatchWithTemplate($messages);
	}
}

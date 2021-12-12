<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Post\PostCreate;
use App\Http\Livewire\Post\PostIndex;
use App\Http\Livewire\Post\PostShow;
use App\Models\Post;
use App\Models\Subscriber;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/signed', function () {
	return URL::signedRoute('unsubscribe', ['subscriber' => 2]);
});

Route::get('/unsubscribe/{subscriber}', function (Subscriber $subscriber) {
	if (!request()->hasValidSignature()) {
		abort(401);
	}

	dd('removing' . $subscriber->name);
})->name('unsubscribe');

Route::get('/test', function () {
	$post = Post::find(21);

	$responses = (new Newsletter)->broadcast(Subscriber::all(), $post);

	ddd($responses);
});

Route::post('newsletter', function () {
	request()->validate(['email-address' => 'required|email']);

	$mailchimp = new \MailchimpMarketing\ApiClient();

	$mailchimp->setConfig([
		'apiKey' => config('services.mailchimp.key'),
		'server' => 'us20'
	]);

	$response = $mailchimp->lists->addListMember('7e9a0e342f', [
		"email_address" => request('email-address'),
		"status" => "subscribed",
	]);

	return back()->with('success', 'You are now signed up for our newsletter');
});

Route::get('/', Home::class)->name('home');

Route::get('/posts', PostIndex::class)->name('posts');
Route::get('/posts/create', PostCreate::class)->name('create-post');
Route::get('/posts/{post}', PostShow::class)->name('show-post');


Route::get('contact-us', function () {
	return 'Contact Us';
})->name('contact-us');

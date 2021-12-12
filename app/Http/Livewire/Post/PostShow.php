<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
	public Post $post;

	public function render()
	{
		return view('livewire.post.post-show')
			->layout('layouts.app');
	}
}

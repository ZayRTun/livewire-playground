<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
	public function render()
	{
		return view('livewire.post.post-index', [
			'posts' => Post::all(),
		])
			->layout('layouts.app');
	}
}

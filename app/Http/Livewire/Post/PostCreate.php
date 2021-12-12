<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
	use WithFileUploads;

	public Post $post;

	public $photos = [];

	protected $rules = [
		'post.title' => 'required|string',
		'post.body' => 'required|string',
		'post.author' => 'required|string',
		'post.photo_sm' => 'nullable|image',
		'post.photo_md' => 'nullable|image',
		'post.photo_lg' => 'nullable|image',
	];

	public function save()
	{
		$this->validate();

		$this->post->save();

		return redirect()->route('posts');
	}

	public function removeAttachment($attachment)
	{
		Storage::delete($attachment);
	}

	public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent)
	{

		foreach ($this->photos as $photo) {
			if ($photo->getFilename() == $uploadedUrl) {
				$newFilename = $photo->store('blog');

				$url = Storage::url($newFilename);

				$this->dispatchBrowserEvent($trixUploadCompletedEvent, [
					'url' => $url,
					'href' => $url,
					'path' => $newFilename,
				]);
			}
		}
	}

	public function mount()
	{
		$this->post = new Post();
		$this->post->body = 'Some text';
	}

	public function render()
	{
		return view('livewire.post.post-create')
			->layout('layouts.app');
	}
}

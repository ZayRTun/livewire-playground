<div>
	<p class="text-sm text-gray-500">
		<time datetime="2020-03-16">{{ $post->created_at->diffForHumans()  }}</time>
	</p>

	<a href="#" class="mt-2 mb-3 block">
		<p class="text-xl font-semibold text-gray-900">
			{{ $post->title  }}
		</p>

	</a>

	{{-- <p class="mt-12 bg-red-300 text-base text-gray-500"> --}}
		<section class="post-body">
			{!! $post->body  !!}
		</section>
	{{-- </p> --}}

	<footer class="mt-3">
		<a href="{{ route('show-post', $post->id)  }}" class="text-indigo-600 hover:text-indigo-500 text-base font-semibold">
			Read full story
		</a>
	</footer>
</div>
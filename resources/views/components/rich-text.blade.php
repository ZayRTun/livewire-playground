@props([
	'model',
	'value',
])

@php
	$trixId = 'trix-' . uniqid();
@endphp

<link rel="stylesheet" href="{{ asset('/css/trix.css') }}">

<div x-data="trix()" wire:ignore>
	<input id="{{ $trixId }}" type="hidden" name="content" value="{{ $value }}">

	<trix-editor
		input="{{ $trixId  }}"
		@trix-file-accept="validateFile($event.file.type)"
		@trix-attachment-add="uploadTrixImage($event.attachment)"
		@trix-change="uploadContent($event)"
		@trix-attachment-remove="removeAttachment($event.attachment)">
	</trix-editor>

	@error('post.body')
		<p>{{ $message }}</p>
	@enderror
</div>

<script>
	function trix() {
		return {
			removeAttachment(attachment) {
				@this.call('removeAttachment', attachment.getAttribute('path'));
			},

			uploadContent(event) {
				@this.set('{{ $model }}', event.target.value);
			},

			validateFile(type) {
				let mimeTypes = ["image/png", "image/jpeg", "image/jpg"];

				if (! mimeTypes.includes(type) ) {
					return event.preventDefault();
				}
			},

			uploadTrixImage(attachment) {
				@this.upload(
					'photos',
					attachment.file,
					// Success callback
					(uploadedURL) => {
						const trixUploadCompletedEvent = `trix-upload-completed:${btoa(uploadedURL)}`;

						const trixUploadCompletedListener = function(event) {
							attachment.setAttributes(event.detail);
							window.removeEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
						}

						window.addEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);

						@this.call('completeUpload', uploadedURL, trixUploadCompletedEvent);
					},
					// Error Callback
					() => {},
					// Event progress
					(event) => {
						attachment.setUploadProgress(event.detail.progress)
					}
				)
			},
		}
	}
</script>

<script src="{{ asset('js/trix.js') }}"></script>
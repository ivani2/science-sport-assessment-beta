 @csrf

 <label>Title</label>
 <input name="title" value="{{ old('title', $post->title ?? '') }}" class="block w-full rounded
  border-gray-300">

 <label class="mt-4 block">Subtitle</label>
 <input name="subtitle" value="{{ old('subtitle', $post->subtitle ?? '') }}"
     class="block w-full
  rounded border-gray-300">

 <label class="mt-4 block">Event Date</label>
 <input type="date" name="event_date"
     value="{{ old('event_date', optional($post->event_date ?? null)->format('Y-m-d')) }}"
     class="block w-full rounded border-gray-300">

 <label class="mt-4 block">Location</label>
 <input name="location" value="{{ old('location', $post->location ?? '') }}"
     class="block w-full
  rounded border-gray-300">

 <label class="mt-4 block">Excerpt</label>
 <textarea name="excerpt" class="block w-full rounded border-gray-300">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>

 <label class="mt-4 block">Body</label>
 <textarea name="body" rows="8" class="block w-full rounded border-gray-300">{{ old('body', $post->body ?? '') }}</textarea>

 <label class="mt-4 block">Sponsorship Details</label>
 <textarea name="sponsorship_details" rows="5" class="block w-full rounded border-gray-
  300">{{ old('sponsorship_details', $post->sponsorship_details ?? '') }}</textarea>

 <label class="mt-4 block">CTA Label</label>
 <input name="cta_label" value="{{ old('cta_label', $post->cta_label ?? '') }}"
     class="block w-full
  rounded border-gray-300">

 <label class="mt-4 block">CTA URL</label>
 <input name="cta_url" value="{{ old('cta_url', $post->cta_url ?? '') }}"
     class="block w-full rounded
  border-gray-300">

 <label class="mt-4 flex items-center gap-2">
     <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published ?? false))>
     Published
 </label>

 @if ($errors->any())
     <ul class="mt-4 rounded bg-red-50 p-4 text-sm text-red-700">
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 @endif

 <button class="mt-6 rounded bg-gray-900 px-4 py-2 text-white">
     {{ $buttonText }}
 </button>

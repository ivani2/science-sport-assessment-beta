<x-app-layout>
    <section class="container" id="details-tournament-post">
        <div class="py-12">
            <article class="mx-auto max-w-4xl bg-white p-8 shadow sm:rounded">
                <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>

                @if ($post->subtitle)
                    <p class="mt-2 text-lg text-gray-600">{{ $post->subtitle }}</p>
                @endif

                <div class="mt-6 text-gray-700">
                    {{ $post->body }}
                </div>

                @if ($post->sponsorship_details)
                    <pre class="mt-6 whitespace-pre-wrap rounded bg-gray-100 p-4 text-
                    sm">{{ $post->sponsorship_details }}</pre>
                @endif
            </article>
        </div>

    </section>
</x-app-layout>

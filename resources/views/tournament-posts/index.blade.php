 <x-app-layout>
     <section class="container" id="index-tournament-posts">
         <div class="py-12">
             <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
                 <div>
                     <h1 class="text-2xl font-semibold text-gray-900">Tournament Posts</h1>
                 </div>
                 @can('create', 'App\\Models\TournamentPost')
                     <div>
                         <a href="{{ route('tournament-posts.create') }}" class="rounded bg-gray-900 px-4 py-2 text-white">
                             create
                         </a>
                     </div>
                 @endcan

                 <div class="mt-6 space-y-4">
                     @foreach ($posts as $post)
                         <article class="rounded bg-white p-6 shadow">
                             <h2 class="text-xl font-semibold">
                                 <a href="{{ route('tournament-posts.show', $post) }}">
                                     {{ $post->title }}
                                 </a>
                             </h2>
                             @can('update', $post)
                                 <a href="{{ route('tournament-posts.edit', $post) }}"
                                     class="rounded bg-gray-900 px-4 py-2 text-white">
                                     Edit
                                 </a>
                             @endcan
                             @can('delete', $post)
                                 <form method="POST" action="{{ route('tournament-posts.destroy', $post) }}"
                                     class="mt-4">
                                     @csrf
                                     @method('DELETE')
                                     <button class="rounded bg-red-700 px-4 py-2 text-white">Delete</button>
                                 </form>
                             @endcan

                             <p class="mt-2 text-gray-600">{{ $post->excerpt }}</p>
                         </article>
                     @endforeach
                 </div>

                 <div class="mt-6">
                     {{ $posts->links() }}
                 </div>
             </div>
         </div>

     </section>
 </x-app-layout>

 <x-app-layout>
     <section class="container">
         <div class="py-12">
             <form method="POST" action="{{ route('tournament-posts.store') }}"
                 class="mx-auto max-w-4xl
          bg-white p-8 shadow sm:rounded">
                 <h1 class="text-2xl font-semibold">Create Tournament Post</h1>

                 <div class="mt-6">
                     @include('tournament-posts._form', [
                         'post' => new \App\Models\TournamentPost(),
                         'buttonText' => 'Create Post',
                     ])
                 </div>
             </form>
         </div>
     </section>
 </x-app-layout>

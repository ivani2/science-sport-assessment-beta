<x-app-layout>
    <section class="container" id="edit-tournament-posts">
        <div class="py-12">
            <form method="POST" action="{{ route('tournament-posts.update', $post) }}"
                class="mx-auto
          max-w-4xl bg-white p-8 shadow sm:rounded">
                @method('PATCH')

                <h1 class="text-2xl font-semibold">Edit Tournament Post</h1>

                <div class="mt-6">
                    @include('tournament-posts._form', [
                        'post' => $post,
                        'buttonText' => 'Update Post',
                    ])
                </div>
            </form>
        </div>
    </section>
</x-app-layout>

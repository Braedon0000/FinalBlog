<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p>
                    <strong>Creadted: </strong> {{$blog->created_at}}
                </p>
                <p>
                    <strong>Updated: </strong> {{$blog->updated_at}}
                </p>
                <a href="{{route ('blogs.edit',$blog->uuid)}}" class="x-primary-button ml-auto"> Edit</a>
                <form action="{{route ('blogs.destroy',$blog->uuid)}}" method="POST">
                    @method('delete')
                    @csrf
                    <x-danger-button type="submit" class="ml-4"> DELETE BLOG</x-button>

                </form>


            </div>
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <<h2 class="font-bold text-2xl text-gray-900" >
                {{$blog->title}}
            </h2>
            <p class=" font-bold text-2xl text-gray-900 mt-3">
                {{($blog->text)}}
            </p>
        </div>

            </div>
        </div>
    </div>


    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <h3 class="font-semibold text-xl text-gray-800">Comments</h3>

        @forelse ($blog->comments as $comment)
            <div class="comment mb-4">
                <p>{{ $comment->content }}</p>
                <span class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <hr class="thick-hr">
        @empty
            <p class="text-gray-800">No comments yet.</p>
        @endforelse
    </div>
</div>
</div>


</x-app-layout>

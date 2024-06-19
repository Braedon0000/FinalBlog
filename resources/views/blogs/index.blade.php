<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route ('blogs.create')}}"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"> +Post New Blog</a>


            @forelse ($blogs as $blog )
        {{-- <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg"> --}}
            <div class="comment-box my-4 p-4 bg-gray-100 border border-gray-300 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800" >
                <a href="{{route('blogs.show',$blog->uuid)}}">{{$blog->title}}</a>
            </h2>
           <h1>

                <p class="mt-2 text-gray-800">{{$blog->text}}</p>

            </h1>
            <span class="text-gray-800">{{$blog->updated_at->diffForHumans()}}</span>
            @include('components.comment-box')
        <hr class="thick-hr">
            {{-- @auth()
        <form action="{{ route('comment.store', $blog->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <x-primary-button type="submit" class="btn btn-primary btn-sm"> Post Comment </x-button>
            </div>
        </form>
    @endauth
        </div> --}}
        @empty
        <p> You have no BLOGS yet</p>
            @endforelse
            {{$blogs->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
<@section('scripts')
<script>
    CKEDITOR.replace('content')
    </script>

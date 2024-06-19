<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
{{--
            @foreach ($errors->all as $error)
                <p>{{$error}}</p>
            @endforeach --}}
            <form action="{{route('blogs.store')}}" method="POST">
                @csrf
                <x-text-input type="text" name="title" placeholder="Title" class="text-gray-800"></x-input>
                    @error('title')
                    {{$message}}
                    @enderror

                <textarea name="text" rows="10" placeholder="TYPE OVER HERE" class="text-gray-800"></textarea>
                @error('text')
                {{$message}}
                @enderror
                <x-primary-button class=mt-6>Post Blogs</x-button>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>
<@section('scripts')
<script>
    CKEDITOR.replace('text')
    </script>

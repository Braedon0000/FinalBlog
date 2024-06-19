{{-- auth() --}}
        <form action="{{ route('blogs.comment.store', $blog->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <x-primary-button type="submit" class="btn btn-primary btn-sm"> Post Comment </x-button>
            </div>
        </form>
    {{-- @endauth --}}
        @foreach ($blog->comments as $comment )
        <div>
        <p>{{$comment->content}}</p>
        </div>

        @endforeach

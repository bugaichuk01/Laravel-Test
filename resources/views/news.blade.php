<x-layout>
    <h1>{{ $currentCategory->title. ' - '. $posts_in }}</h1>


    @foreach($popular as $pop)

        <div class="border p-3 m-3 flex">
            <a href="{{strtolower(route('show-post', [$pop->category->title, $pop->id, $pop->title]))}}">
                <p>{{ $pop->title }}</p>
            </a>
        </div>

    @endforeach

    @foreach($posts as $post)
        <div class="border p-3 m-3">
            <img src="{{asset('/images/'.$post->image) }}" width="400px" height="400px" alt="">
            <a href="{{ strtolower(route('show-post', [$post->category->title, $post->id, $pop->title])) }}">
                <p>{{$post->title}}</p>
            </a>
            <p>{{ date('Y.m.d h:i',strtotime($post->published_at)) }}</p>
            <p>{!! $post->announcement !!}</p>
        </div>
    @endforeach

    {{ $posts->links() }}
</x-layout>

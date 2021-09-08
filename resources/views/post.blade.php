<x-layout>

    @foreach($popular as $pop)

        <div class="border p-3 m-3 flex">
            <a href="{{strtolower(route('show-post', [$pop->category->title, $pop->id, $pop->title]))}}">
                <p>{{ $pop->title }}</p>
            </a>
        </div>

    @endforeach

    <div>
        <h1>{{ $post->title }}</h1>
        <a href="{{ strtolower(route('show-category', $post->category->title)) }}">
            <h2>{{ $post->category->title }}</h2>
        </a>
        <p>Views : {{$post->view_count}} </p>
        <p>Published at {{ date('Y.m.d h:i', strtotime($post->published_at)) }}</p>
        <hr>
        <p>{!! $post->body !!}</p>
    </div>

</x-layout>

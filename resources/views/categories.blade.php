<x-layout>

    <h1>Categories:</h1>

    @foreach($categories as $index => $item)
        <div class="border p-3 m-3 flex">
            <a href="{{ strtolower(route('show-category', $item->title)) }}">
                <p>{{ $item->title }}</p>
            </a>
            <p class="pl-1">{{ ' - ' . $item->posts_count }}</p>
        </div>
    @endforeach

    <h1>Most popular posts:</h1>
        @foreach($popular as $index => $pop)
        <div class="border p-3 m-3 flex">
            <a href="{{strtolower(route('show-post', [$pop->category->title, $pop->id, $pop->title]))}}">
                <p>{{ $pop->title }}</p>
            </a>
        </div>
        @endforeach


</x-layout>

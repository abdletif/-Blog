

    @foreach ($tags as $tag)
        <span class="badge badge-success">
            {{ $tag->name }}
        </span>
    @endforeach

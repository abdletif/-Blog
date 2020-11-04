

<div class="card">
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($elements as $element)
               <li class="list-group-item">
                   {{ $element->title ?? $element->name}}
                    <span class="badge badge-success">{{ $element->comments_count ?? $element->posts_count  }}</span>
               </li>
            @endforeach
    </div>
</div>

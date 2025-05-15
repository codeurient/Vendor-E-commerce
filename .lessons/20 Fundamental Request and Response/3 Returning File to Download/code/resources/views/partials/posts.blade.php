@foreach ($posts as $post)
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $post->title }}</h4>
                <p>{{ $post->description }}</p>
                <ul style="list-style-type: none; display:flex; gap:10px; flex-wrap:wrap;">
                    @foreach ($post->tags as $tag)
                        <li style="color:blue;">{{ '#'.$tag->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endforeach

<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $content->user->name }}" alt="{{ $content->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $content->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('contents.destroy', $content->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('contents.edit', $content->id) }}">Edit</a>
                    <a href="{{ route('contents.show', $content->id) }}">View</a>
                    <button class="ms-1 btn btn-danger btn-sm">x</button>

                </form>

            </div>
        </div>

    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('contents.update', $content->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="content" rows="3" name="content">{{ $content->content }}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger mt-1 d-block"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark btn-sm mb-2"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $content->content }}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $content->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $content->created_at }} </span>
            </div>
        </div>
      @include('shared.comment-box')
    </div>
</div>

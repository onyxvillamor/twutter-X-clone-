<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                    @error('name')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                @auth
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="mt-3">
            <label for="">Profile Picture</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <div class="mb-3">
                <textarea class="form-control" id="bio" rows="3" name="bio">    </textarea>
                @error('bio')
                    <span class="fs-6 text-danger mt-1 d-block"> {{ $message }} </span>
                @enderror
            </div>
            <button class="btn btn-dark btn-sm mb-3">Save</button>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fa-solid fa-kiwi-bird">
                    </span> {{ $user->contents()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @auth
                @if (Auth::id() !== $user->id)
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm"> Follow </button>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>

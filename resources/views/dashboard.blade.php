@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-content')

            <hr>

            @forelse ($twutters as $content)
                <div class="mt-3">
                    @include('shared.twutter-card')
                </div>
            @empty
                <h3 class="text-center">No Results Found.</h3>
            @endforelse

            <div class="mt-2">
                {{ $twutters->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')

        </div>
    </div>
@endsection

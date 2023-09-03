@extends ('backend.layouts.app')

@section('content')

    <div class="container">
        <h1>Select Winner</h1>

        <p>Click the button below to select a winner for the campaign:</p>

        <form method="POST" action="{{ route('campaigns.do-select-winner', ['campaignId' => $campaignId]) }}">
            @csrf
            <button type="submit" class="btn btn-primary">Select Winner</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>


@endsection

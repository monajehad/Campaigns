@extends('backend.layouts.app')

@section('content')
    <h1>Campaign Details</h1>

    <h2>{{ $campaign->name }}</h2>
    <p>Description: {{ $campaign->description }}</p>
    <p>Target: {{ $campaign->target }}</p>
    <p>Price: {{ $campaign->price }}</p>
    <p>Close Campaign After: {{ $campaign->close_campaign_after }}</p>

    <!-- Display Campaign Features -->
    <h2>Campaign Features</h2>
    @if ($campaign->features !== null && $campaign->features->count() > 0)
        <ul>
            @foreach ($campaign->features as $feature)
                <li>
                    {{ $feature->title }}
                    {{ $feature->description }}
                    <img src="{{ asset('storage/' . $feature->image) }}"  alt="Campaign Feature Image" style="width: 200px; height: 150px;">

                    <form action="{{ route('campaigns.features.destroy', [$campaign, $feature]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this feature?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No features available.</p>
    @endif

    <!-- Add Campaign Feature -->
    <h3>Add Campaign Feature</h3>
    <form action="{{ route('campaigns.features.store', $campaign) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Feature</button>
    </form>
@endsection

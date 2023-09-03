@extends('backend.layouts.app')

@section('content')
    <h1>Edit Campaign</h1>

    <form action="{{ route('campaigns.update', $campaign) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $campaign->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $campaign->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="target">Target</label>
            <input type="number" class="form-control" id="target" name="target" value="{{ $campaign->target }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" id="price" name="price" value="{{ $campaign->price }}" required>
        </div>
        {{-- <div class="form-group">
            <label for="close_campaign_after">Close Campaign After</label>
            <input type="date" class="form-control" id="close_campaign_after" name="close_campaign_after" value="{{ $campaign->close_campaign_after }}" required>
        </div> --}}
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

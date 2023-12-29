<!-- resources/views/profile/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card card-danger">
        <div class="card-header ">{{ __('Delete Account') }}</div>

        <div class="card-body">
            <p>
                Are you sure you want to delete your account? This action cannot be undone.
            </p>

            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">{{ __('Delete My Account') }}</button>
            </form>
        </div>
    </div>
@endsection

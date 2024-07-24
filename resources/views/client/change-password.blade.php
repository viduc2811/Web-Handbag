@extends('main')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center" style="margin: 90px 0 50px 0;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Đổi mật khẩu') }}</div>

                <div class="card-body">

                    <form action="{{ route('client.change-password.update', ['id' => $user->id]) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Mật khẩu hiện tại:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                >
                                @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password">Mật khẩu mới:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" >
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">Nhập lại mật khẩu mới:</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation" >
                                @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout/layout-common')

@section('space-work')
    <div style="background-color: #f4f4f4; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div style="width: 400px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: white;">
            <div style="text-align: center; padding: 20px;">
                <h2 style="margin-bottom: 20px;">Forget Password</h2>

                <!-- Error and success messages -->
                @if($errors->any())
                    <div style="color: red;">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if(Session::has('error'))
                    <div style="color: red;">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif

                @if(Session::has('success'))
                    <div style="color: green;">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <!-- Form for password reset -->
                <form action="{{ route('forgetPassword') }}" method="POST" style="padding: 0 20px;">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <input type="email" name="email" placeholder="Enter Email" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                    <button type="submit" style="width: 100%; padding: 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px;">Reset Password</button>
                </form>

                <!-- Login link -->
                <p style="margin-top: 20px;">Remember your password? <a href="/" style="text-decoration: none; color: #007BFF;">Login</a></p>
            </div>
        </div>
    </div>
@endsection

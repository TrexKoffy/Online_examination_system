@extends('layout/layout-common')

@section('space-work')
    <div style="max-width: 400px; margin: 50px auto; background-color: #3498db; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; margin-bottom: 30px; color: #fff; font-size: 28px; text-transform: uppercase;">Register Student</h1>

        @if($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('studentRegister') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <input type="text" name="name" placeholder="Your Name" style="padding: 15px; width: 100%; border: 1px solid #fff; border-radius: 5px; font-size: 16px; color: #000;">
            </div>
            <div style="margin-bottom: 20px;">
                <input type="email" name="email" placeholder="Your Email" style="padding: 15px; width: 100%; border: 1px solid #fff; border-radius: 5px; font-size: 16px; color: #000;">
            </div>
            <div style="margin-bottom: 20px;">
                <input type="password" name="password" placeholder="Password" style="padding: 15px; width: 100%; border: 1px solid #fff; border-radius: 5px; font-size: 16px; color: #000;">
            </div>
            <div style="margin-bottom: 20px;">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" style="padding: 15px; width: 100%; border: 1px solid #fff; border-radius: 5px; font-size: 16px; color: #000;">
            </div>
            <button type="submit" style="padding: 15px; width: 100%; background-color: #fff; color: #3498db; border: none; border-radius: 5px; font-size: 18px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; cursor: pointer;">Register Now</button>
        </form>

        @if(Session::has('success'))
            <div style="color: #fff; margin-top: 30px; text-align: center;">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
    </div>
@endsection

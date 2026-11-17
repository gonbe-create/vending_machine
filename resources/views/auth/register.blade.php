@extends('layouts.app')

@section('content')
<div class="container d-flex flex-colum align-items-center justify-content-center" style="min-height: 80vh;">
    <form method="POST" action="{{ route('register') }}" style="width: 100%; max-width: 450px;"> 
        
    @csrf
        <h2 class="mb-5 text-center fw-normal">ユーザー新規登録画面</h2>
        
        <div class="mb-4">
            <input type="email" class="form-control form-control-lg bg-light text-muted @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="アドレス" required autocomplete="email">
            @error('email')
                  <div class="text-denger small mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="md-5">
            <input type="password" class="form-control form-control-lg bg-light text-muted @error('email') is-invalid @enderror" name="password" placeholder="パスワード" required autocomplate="new-password">
            @error('password')
                  <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>
              
        <div class="d-flex justify-content-between gap-5 px-3 mt-5 pt-3">
            <button type="submit" class="btn btn-warning text-white rounded-pill px-4 py-2 flex-fill">新規登録</button>
            <a href="{{ route('login') }}" class="btn btn-info text-white rounded-pill px-4 py-2 flex-fill text-center">戻る</a>
        </div>
    </form>
</div>
@endsection

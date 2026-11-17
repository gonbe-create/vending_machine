@extends('layouts.app')

@section('content')
<div class="container d-flex flex-colunm align-items-center justify-content-center" style="min-height: 80vh;">
   <form method="POST" action="{{ route('login') }}" style="width: 100%; max-width: 450px;">
        @csrf
        
        <h2 class="mb-5 text-center fw-normal">ユーザーログイン画面</h2>
        
        <div style="margin-bottom: 50px;">
             <input type="email" class="form-control form-control-lg bg-light text-muted" name="email" value="{{ old('email') }}" placeholder="アドレス" required autocomplete="email">
        </div>


        <div class="mb-4">
            <input type="password" class="form-control form-control-lg bg-light text-muted" name="password" placeholder="パスワード" required autocomplete="current-password">
        </div>
                                 
        <div class="d-flex justify-content-between gap-5 px-3 mt-5 pt-3">
            <a href="{{ route('register') }}" class="btn btn-warning text-white rounded-pill px-4 py-2 flex-fill text-center">新規登録</a>
            <button type="submit" class="btn btn-info text-white rounded-pill px-4 py-2 flex-fill">ログイン</button>
        </div>
     </form>
</div>
@endsection

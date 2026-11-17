@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">商品一覧画面</h2>
        
    <!-- 検索フォーム　＆　新規登録エリア -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form method="GET" action="#" class="d-flex gap-3 align-items-center">
            <input type="text" name="keyword" class="form-control" placeholder="検索キーワード" style="width: 250px;">
            <select name="manufacturer" class="form-select" style="width: 200px;">
                <option value="">メーカー名</optione>
                <!-- 後でDBからメーカー一覧をループで表示 -->
            </select>
            <button type="submit" class="btn btn-secondary px-4">検索</button>
        </form>

        <a href="{{ route('products.create') }}" class="btn btn-warning text-white px-4">新規登録</a>
</div>

<!-- 商品一覧テーブル -->
 <div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <td class="ps-4">ID</td>
                    <td>商品画像</td>
                    <td>商品名</td>
                    <td>価格</td>
                    <td>在庫数</td>
                    <td class="text-end pe-4" style="width: 150px;">操作</th>
                </tr>
            </thead>
                <!-- サンプルデータ -->
                 <tr>
                    <td class="ps-4">1</td>
                    <td>商品画像</td>
                    <td>コーラ</td>
                    <td>¥130</td>
                    <td>10</td>
                    <td>Coca-Cola</td>
                    <td class="text-end pe-4">
                        <a href="{{ route('products.show', 1) }}" class="btn btn-info btn-sm text-white me-1">詳細</a>
                        <button type="button" class="btn btn-danger btn-sm">削除</button>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">2</td>
                    <td>商品画像</td>
                    <td>お茶</td>
                    <td>¥130</td>
                    <td>6</td>
                    <td>サントリー</td>
                    <td class="text-end pe-4">
                        <a href="{{ route('products.show', 2) }}" class="btn btn-info btn-ms text-white me-1">詳細</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

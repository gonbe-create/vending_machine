<!COCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
    <style>
        body { font-family: san-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px text-align: left; }
        th { background-color: #f4f4f4; }
        .search-box { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>商品一覧</h1>

    <!-- 検索フォーム -->
    <div class="search-box">
        <form action="{{ url('/products') }}" method="GET">
            <input type="text" name="keyword" placeholder="商品名を入力" value="{{ request('keyword') }}">
            <button type="submit">検索</button>
        </form>
</div>

<!-- 商品一覧テーブル -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>操作</th>
        </tr>
    </thead>
<tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}円</td>
            <td>{{ $product->stock }}</td>
            <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">詳細</a></td>
        </tr>
    @endforeach
</tbody>
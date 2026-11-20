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
    <div class="search-box" style="display: flex; gap: 10px; align-items: center;">
        <form action="{{ route('products.index') }}" method="GET" style="display: flex; gap: 10px; align-items: center;">
            <input type="text" name="keyword" placeholder="商品名を入力" value="{{ request('keyword') }}">
            <select name="company_id">
                <option value="">メーカー名</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                    {{ $company->company_name }}
                </option>
                @endforeach
            </select>
            <button type="submit">検索</button>
        </form>
        <a href="{{ route('products.create') }}" style="background-color: #e69138; color: white; padding: 6px 14px; border-radius: 4px; text-decoration: none;">新規登録</a>
    </div>

<!-- 商品一覧テーブル -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th>操作</th>
        </tr>
    </thead>
<tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>
                @if ($product->img_path)
                <img src="{{ asset('storage/' . $product->img_path) }}" alt="商品画像" style="max-width: 80px;">
                @else
                    画像なし
                @endif
            </td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}円</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company->company_name ?? '' }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}">詳細</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
</body>
</html>
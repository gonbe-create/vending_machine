<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品情報詳細画面</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background-color: #f9f9f9; }
        .detail-container { max-wdth: 650px; background: #fff; border: 1px solid #999; padding: 30px; box-sizing: border-box; }
        .detail-row { display: flex; margin-bottom: 16px; align-items: flex-start; }
        .detail-label { width: 150px; font-weight: bold; }
        .detail-value { flex: 1; }
        .btn-area { margin-top: 30px; display: flex; gap; 15px; }
        .btn-edit { background-color: #e69138; color: white; padding: 8px 20px; border-radius: 4px; text-decoration: none; font-size: 14px; }
        .btn-back { background-color: #11a684; color: white; padding: 8px 20px; border-radius: 4px; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <h2>商品情報詳細画面</h2>

    <div class="detail-container">
        <div class="detail-row">
            <div class="detail-label">ID</div>
            <div class="detail-value">{{ $product->id }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">商品画像</div>
            <div class="detail-value">
                @if ($product->img_path)
                    <img src="{{ asset('storage/' . $product->img_path) }}" alt="商品画像" style="max-width: 150px;">
                @else
                    画像なし
                @endif
            </div>
        </div>
        <div class="detail-row">
            <div class="detail-label">商品名</div>
            <div class="detail-value">{{ $product->product_name }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">メーカー</div>
            <div class="detail-value">{{ $product->company->company_name ?? '' }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">価格</div>
            <div class="detail-value">¥{{ $product->price }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">在庫数</div>
            <div class="detail-value">{{ $product->stock }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">コメント</div>
            <div class="detail-value">{{ $product->comment }}</div>
        </div>

        <div class="btn-area">
            <a href="{{ url('/products/' .$product->id . '/edit') }}" class="btn-edit">編集</a>
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
        </div>
    </div>
</body>
</html>
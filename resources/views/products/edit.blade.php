<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品情報編集画面</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background-color: #f9f9f9; } 
        .form-container {
            max-width: 650px;
            background: #fff;
            border: 1px solid #999;
            padding: 30px;
            box-sizing: border-box;
        }
        .form-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .form-group label {
            width: 150px;
            font-weight: bold;
            font-size: 16px;
            padding-top: 5px;
        }
        .required {
            color: red;
            margin-left: 4px;
        }
        .form-control {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid #888;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        textarea.form-control {
            height: 80px;
            resize: vertical;
        }
        .btn-area {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }
        .btn-submit {
            background-color: #e69138;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-back {
            background-color: #11a684;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h2>商品情報編集画面</h2>
    
    <div class="form-container">
        @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="form-group">
            <label>ID</label>
            <div>{{ $product->id }}</div>
        </div>

        <div class="form-group">
            <label>商品名<span class="required">*</span></label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
        </div>

        <div class="form-group">
            <label>メーカー名<span class="required">*</span></label>
            <select name="company_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id  }}" {{ old('company_id', $product->company_id) == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>価格<span class="required">*</span></label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label>在庫数</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div class="form-group">
            <label>コメント</label>
            <textarea name="comment" class="form-control">{{ old('comment', $product->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label>商品画像</label>
            <input type="file" name="img_path">
        </div>

        <div class="btn-area">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('products.show', $product->id) }}" class="btn-back">戻る</a>
        </div>
    </form>
</div>
</body>
</html>
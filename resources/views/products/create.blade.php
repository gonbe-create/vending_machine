<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品新規登録画面</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
            background-color: #f9f9f9;
        }
        h2 {
            font-size: 20px;
            margin-buttom: 20px;
        }
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
            padding: 6px 12px;
            border: 1px solid #888;
            border-radius: 2px;
            font-size: 1px;
            background-color: #fff;
            height: auto;
        }
        select.form-control {
            height: 32px;
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
            display: inline-block;
            text-align: center;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
    </style>
</head>
<body>
    <h2>商品新規登録画面</h2>
    
    <div class="form-container">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
        <ur style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif


        @csrf

        <div class="form-group">
            <label>商品名<span class="required">*</span></label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="商品名を入力">
        </div>

        <div class="form-group">
            <label>メーカー名<span class="required">*</span></label>
            <select name="company_id" class="form-control" required>
                <option value="">選択してください</option>
                <!-- *社名データがある場合は動的に生成 -->
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>価格<span class="required">*</span></label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>在庫数<span class="required">*</span></label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="form-group">
            <label>コメント</label>
            <textarea name="comment" class="form-control" ></textarea>
        </div>

        <div class="form-group">
            <label>商品画像</label>
            <input type="file" name="img_path">
        </div>

        <div class="btn-area">
            <button type="submit" class="btn-submit">新規登録</button>
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
        </div>
    </form>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate | Admin</title>
    
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_index.css') }}">
    
</head>
<body>
    
    {{-- ヘッダー領域 --}}
    <header class="header">
        <h1 class="header__title">管理システム</h1>
        
        {{-- ログアウトボタン --}}
        <form method="POST" action="/logout" class="header__logout">
            @csrf
            <button type="submit" class="logout-button">ログアウト</button>
        </form>
    </header>

    
    <main>
   <div class="container">
    <h2>Confirm</h2>
    
    <form method="POST" action="/thanks"> 
        @csrf
        
        {{-- 全てのデータを hidden フィールドとして保持 --}}
        @foreach ($data as $key => $value)
            {{-- tel_part1, 2, 3 は結合後の'tel'を使うため除外。不要なキーも除外 --}}
            @if (!in_array($key, ['_token', 'tel_part1', 'tel_part2', 'tel_part3', 'gender_text']))
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach

        {{-- ★ここから <table> を使用 --}}
        <table class="confirm-table">
            
            {{-- 1. お名前 --}}
            <tr>
                <th class="confirm-label">お名前</th>
                {{-- last_name と first_name を結合し、間に全角スペースを挿入 --}}
                <td class="confirm-value onamae">
                    {{ $data['last_name'] }}　{{ $data['first_name'] }}
                </td>
            </tr>
            
            {{-- 2. 性別 --}}
            <tr>
                <th class="confirm-label">性別</th>
                <td class="confirm-value">
                    {{-- $data['gender_text'] は '男性' '女性' などに変換済みの値（Controllerで設定） --}}
                    {{ $data['gender_text'] }}
                </td>
            </tr>

            {{-- 3. メールアドレス --}}
            <tr>
                <th class="confirm-label">メールアドレス</th>
                <td class="confirm-value">{{ $data['email'] }}</td>
            </tr>

            {{-- 4. 電話番号 --}}
            <tr>
                <th class="confirm-label">電話番号</th>
                <td class="confirm-value">{{ $data['tel'] }}</td>
            </tr>

            {{-- 5. 住所 --}}
            <tr>
                <th class="confirm-label">住所</th>
                <td class="confirm-value">{{ $data['address'] }}</td>
            </tr>

            {{-- 6. 建物名 --}}
            <tr>
                <th class="confirm-label">建物名</th>
                <td class="confirm-value">{{ $data['building'] }}</td>
            </tr>

            {{-- 7. お問い合わせの種類 --}}
            <tr>
                <th class="confirm-label">お問い合わせの種類</th>
                {{-- content は文字列として渡されている想定 --}}
                <td class="confirm-value">{{ $data['content'] }}</td>
            </tr>

            {{-- 8. お問い合わせ内容 --}}
            <tr>
                <th class="confirm-label">お問い合わせ内容</th>
                {{-- detail-content クラスで改行などを保持して表示 --}}
                <td class="confirm-value detail-content">{{ $data['detail'] }}</td>
            </tr>

        </table>
        {{-- ★<table> ここまで --}}

        <div class="form__button--confirm">
            <button type="submit" class="submit-button">送信</button>
            {{-- history.back() で一つ前のページに戻る --}}
            <button type="button" class="back-button" onclick="history.back()">修正</button>
        </div>

    </form>
</div>

    
</body>
</html>
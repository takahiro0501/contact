<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contact.css') }}">
    <title>お問い合わせ</title>

    <style>
    .form__group-ctl-input{
        border: none;
        padding-top: 10px;
    }
    .form__fix-button{
        border: none;
        margin-top: 10px;
        font-size: 16px;
        text-decoration: underline;
        cursor: pointer;
    }
    </style>

</head>

<body>

<form class="form" action="/register" method="POST">
    @csrf
    <h1 class="form__ttl">内容確認</h1>
    <div class="form__group" >
        <div class="form__group-label">
            <label>お名前</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">{{ $fullname }}</p>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-label">
            <label>性別</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">
                @if($gender == 1)
                    男性
                @elseif($gender == 2)
                    女性
                @endif
            </p>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-label">
            <label>メールアドレス</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">{{ $email }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>郵便番号</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">{{ $postcode }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>住所</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">{{ $address }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>建物名</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">{{ $building_name }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>ご意見</label>
        </div>
        <div class="form__group-ctl">
            <p class="form__group-ctl-input">{{ $opinion }}</p>
        </div>
    </div>

    <div class="form__submit">
        <input type="submit" value="送信"  class="form__submit-button">
    </div>
    <div class="form__submit">
        <input type="submit" name="back" value="修正する" class="form__fix-button">
    </div>

</form>

</body>

</html>


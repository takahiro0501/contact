<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contact.css') }}">
    <title>お問い合わせ</title>
</head>

<body>
    <form action="/comfirm" method="POST" class="form h-adr">
    @csrf
    <h1 class="form__ttl">お問い合わせ</h1>
    <div class="form__group" >
        <div class="form__group-label">
            <label>お名前<strong>※</strong></label>
        </div>
        <div class="form__group-rapper">
            <div class="form__group-rapper-ctl right">
                <input 
                    type="text" 
                    name="lastname"
                    value="{{ old('lastname') }}"
                    class="form__rapper-ctl-input @if(!empty($errors->first('lastname'))) inpError @endif" 
                    id="lastnameInp"
                >
                <div id="lastnameErrorJs" class="errorColor"></div>
                @error('lastname')
                    <div id="lastnameErrorLa" class="errorColor">{{ $message }}</div>
                @enderror
                <p class="form__group-ctl-ex">例）山田</p>
            </div>
            <div class="form__group-rapper-ctl">
                <input 
                    type="text" 
                    name="firstname"
                    value="{{ old('firstname') }}" 
                    class="form__rapper-ctl-input @if(!empty($errors->first('firstname'))) inpError @endif"
                    id="firstnameInp"
                >
                <div id="firstnameErrorJs" class="errorColor"></div>
                @error('firstname')
                    <div class="errorColor" id="firstnameErrorLa">{{ $message }}</div>
                @enderror
                    <p class="form__group-ctl-ex">例）太郎</p>
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>性別<strong>※</strong></label>
        </div>
        <div class="form__group-ctl">
            <input 
                type="radio" 
                name="gender" 
                value="1" 
                class="form__group-ctl-radio" 
                id="genderInp" 
                {{ old('gender',1)=='1' ? 'checked' : '' }}
                >
            <label>男性</label>
            <input 
                type="radio"
                name="gender" 
                value="2" 
                class="form__group-ctl-radio" 
                id="genderInp"
                {{ old('gender')=='2' ? 'checked' : '' }}
                >
            <label>女性</label>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>メールアドレス<strong>※</strong></label>
        </div>
        <div class="form__group-ctl">
            <input 
                type="text" 
                name="email"
                value="{{ old('email') }}" 
                class="form__group-ctl-input @if(!empty($errors->first('email'))) inpError @endif" 
                id="emailInp"
            >
            <div id="emailErrorJs" class="errorColor"></div>
            @error('email')
                <div class="errorColor" id="emailErrorLa">{{ $message }}</div>
            @enderror

            <p class="form__group-ctl-ex">例）test@example.com</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>郵便番号<strong>※</strong></label>
        </div>
        <div class="form__group-ctl flex">
            <div class="form__group-ctl-post">〒</div>
            <div class="form__group-ctl-parts">
                <span class="p-country-name" style="display:none;">Japan</span>
                <input 
                    type="text"
                    name="postcode" 
                    value="{{ old('postcode') }}"
                    class="form__group-ctl-input p-postal-code @if(!empty($errors->first('postcode'))) inpError @endif"
                    id="postcodeInp"
                    size="8"
                    maxlength="8"
                >
                <div id="postcodeErrorJs" class="errorColor"></div>
                @error('postcode')
                    <div class="errorColor" id="postcodeErrorLa">{{ $message }}</div>
                @enderror
                <p class="form__group-ctl-ex">例）123-4567</p>
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>住所<strong>※</strong></label>
        </div>
        <div class="form__group-ctl">
            <input 
                type="text" 
                name="address" 
                value="{{ old('address') }}"
                class="form__group-ctl-input 
                        p-region p-locality p-street-address p-extended-address
                        @if(!empty($errors->first('address'))) inpError @endif"  
                id="addressInp"
            >
            <div id="adressErrorJs" class="errorColor"></div>
            @error('address')
                <div class="errorColor" id="addressErrorLa">{{ $message }}</div>
            @enderror
            <p class="form__group-ctl-ex">例）東京都渋谷区千駄ヶ谷1-2-3</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>建物名</label>
        </div>
        <div class="form__group-ctl">
            <input 
                type="text" 
                name="building_name" 
                value="{{ old('building_name') }}"
                class="form__group-ctl-input" 
                id="buildingInp"
            >
            <p class="form__group-ctl-ex">例）千駄ヶ谷マンション101</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-label">
            <label>ご意見<strong>※</strong></label>
        </div>
        <div class="form__group-ctl">
            <textarea 
                name="opinion"
                class="form__group-ctl-text @if(!empty($errors->first('opinion'))) inpError @endif"
                id="opinionText">{{ old('opinion') }}</textarea>
            <div id="opinionErrorJs" class="errorColor"></div>
            @error('opinion')
                <div class="errorColor" id="opinionErrorLa">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form__submit">
        <input type="submit" value="確認" class="form__submit-button" >
    </div>

</form>

<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script src="{{ asset('js/contact.js') }}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <title>お問い合わせ管理画面</title>
</head>

<body>
    <div class="admin">
        <p class="admin__ttl">管理システム</p>
        <form action="/adminSearch" method="POST" class="admin__search">
            @csrf
            <div class="flex">
                <div class="admin__search-name">
                    <label class="namelabel">お名前</label>
                    <input type="text" name="fullname" value="{{$fullname}}">
                </div>
                <div class="admin__search-gender">
                    <label class="genderlabel">性別</label>
                    <input 
                        type="radio" 
                        name="gender" 
                        value="0" 
                        {{ $gender !== '1' && $gender !== '2'  ? 'checked' : '' }}
                    >
                    <label class="genderall">全て</label>
                    <input 
                        type="radio" 
                        name="gender" 
                        value="1" 
                        {{ $gender == '1' ? 'checked' : '' }}
                    >
                    <label class="genderman">男性</label>
                    <input 
                        type="radio" 
                        name="gender" 
                        value="2"
                        {{ $gender == '2' ? 'checked' : '' }}
                    >
                    <label class="genderman">女性</label>
                </div>
            </div>
            <div class="admin__search-date">
                <label>登録日</label>
                <input type="date" name="from" value="{{$from}}">
                <span>~</span>
                <input type="date" name="to" value="{{$to}}">
            </div>
            <div class="admin__search-email">
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{$email}}">
            </div>
            <div class="admin__search-btns">
                <div class="admin__search-btn-exec">
                    <input type="submit" value="検索" name="search">
                </div>
                <div class="admin__search-btn-reset">
                    <input type="submit" value="リセット" formaction="{{ route('reset') }}" formmethod="GET" name="reset">
                </div>
            </div>
        </form>

        <div class="admin__result">
            @isset($results)
                @if(count($results) > 0)
                    {{ $results->appends(
                        [
                            'fullname'=>$fullname ,
                            'gender'=>$gender ,
                            'from'=>$from ,
                            'to'=>$to ,
                            'email'=>$email
                        ]
                    )->links('vendor.pagination.contactLink') }}
                    <table class="admin__result-tbl">
                        <tr class="admin__result-tbl-ttl">
                            <th class="admin__result-tbl-id">ID</th>
                            <th class="admin__result-tbl-name">お名前</th>
                            <th class="admin__result-tbl-gender">性別</th>
                            <th class="admin__result-tbl-email">メールアドレス</th>
                            <th class="admin__result-tbl-opinion">ご意見</th>
                            <th class="admin__result-tbl-delete"></th>
                        </tr>
                    @foreach ($results as $item)
                        <tr class="admin__result-tbl-data">
                            <td class="admin__result-tbl-id">
                                {{$item->id}}
                            </td>
                            <td class="admin__result-tbl-name">
                                {{$item->fullname}}
                            </td>
                            <td class="admin__result-tbl-gender">
                                @if($item->gender == 1)
                                    男性
                                @elseif($item->gender == 2)
                                    女性
                                @endif
                            </td>
                            <td class="admin__result-tbl-email">
                                {{$item->email}}
                            </td>
                            <td class="admin__result-tbl-opinion">
                                <div class="opinion-short" title="{{ $item->opinion }}">
                                    {{ Str::limit($item->opinion,50)}}
                                </div>
                            </td>
                            <td>
                                <form action="
                                    {{ route('adminSearch', 
                                        [
                                            'id' => $item->id ,
                                            'fullname'=>$fullname ,
                                            'gender'=>$gender ,
                                            'from'=>$from ,'to'=>$to ,
                                            'email'=>$email
                                        ]
                                    ) }}" 
                                    method="POST" 
                                    class="admin__result-form">
                                    @csrf
                                    <input type="submit" value="削除" name="delete"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @else
                <p>該当データなし</p>
                @endif
            @endisset
            </div>
    </div>
</body>

</html>
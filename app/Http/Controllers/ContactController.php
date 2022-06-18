<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ContactController extends Controller
{
    //問い合わせフォーム初期ページ表示
    public function form()
    {
        return view('ContactForm');
    }

    //問い合わせフォーム確認ボタン押下時
    public function comfirm(ClientRequest $request)
    {
        //フォームデータを確認画面用に成形
        $item = [
            'fullname' => $request->lastname.' '.$request->firstname,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion
        ];

        //セッションに書き込む
        $request->session()->put('form_input', $item);

        return view('ComfirmForm',$item);
    }

    //確認画面「送信」「修正する」ボタン操作処理
    public function register(Request $request)
    {
        //セッションのデータを取り出す
        $input = $request->session()->get('form_input');

        //「修正する」が押された時の処理
        if($request->has("back")){
			return redirect()->action([ContactController::class, 'form'])->withInput($input);
		}

        //DBにInsertする
        $item = Contact::create($input);

        //セッションを破棄する
        $request->session()->forget('form_input');

        return view('ThanksPage');
    }


    //管理システム画面
    public function admin()
    {
        //検索条件用変数
        $fullname = '';
        $gender = '';
        $email = '';
        $from = '';
        $to = '';

        return view('AdminPage',compact('fullname','gender','from','to','email'));
    }

    //管理システム画面検索結果
    public function adminSearch(Request $request)
    {

        //削除ボタンが押された場合
        if($request->has('delete')){
            Contact::destroy($request->id);
        }

        //検索データ取得
        $fullname = $request->fullname;
        $gender = $request->gender;
        $email = $request->email;
        $from = $request->from;
        $to = $request->to;

        //クエリ準備
        $query = Contact::query();
        
        //「お名前」「メールアドレス」を検索条件に含める
        if(!empty($fullname) || !empty($email)){        
            foreach ($request->only(['fullname', 'email']) as $key => $value) {
                $query->where($key, 'like', '%'.$value.'%');
            }
        }
        
        //「性別」を検索条件に含める
        if(!empty($gender)){
            if($gender == 1 || $gender == 2){
                $query->Where('gender', $gender);
            }
        }

        //登録日」を検索条件に含める
        if(!empty($from)){
            $query->whereDate("created_at", '>=' , $from);
        }
        if(!empty($to)){
            $query->whereDate("created_at", '<=' , $to);
        }

        //検索結果データ作成
        $results = $query->Paginate(6);

        return view('AdminPage',compact('results','fullname','gender','from','to','email'));
    }

}

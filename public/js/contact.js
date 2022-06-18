
window.onload = function () {

  //バリデーション対象のinput要素を取得する
  const lastnameInp = document.getElementById('lastnameInp');
  const lastnameErrorJs = document.getElementById('lastnameErrorJs');
  const firstnameInp = document.getElementById('firstnameInp');
  const firstnameErrorJs = document.getElementById('firstnameErrorJs');
  const emailInp = document.getElementById('emailInp');
  const emailErrorJs = document.getElementById('emailErrorJs');
  const postcodeInp = document.getElementById('postcodeInp');
  const postcodeErrorJs = document.getElementById('postcodeErrorJs');
  const addressInp = document.getElementById('addressInp');
  const addressErrorJs = document.getElementById('addressErrorJs');
  const opinionText = document.getElementById('opinionText');
  const opinionErrorJs = document.getElementById('opinionErrorJs');

  //メール・郵便番号用バリデーション
  const mailReg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
  const postcodeReg = /^\d{3}-\d{4}$/;

  //lastnameのイベント定義
  lastnameInp.addEventListener('blur', function (event) {
    //laravelバリデーションのエラーがある場合は重複するので消す
    if (document.getElementById('lastnameErrorLa') != null) {
      document.getElementById('lastnameErrorLa').textContent = '';
    }
    //JSエラー判定
    if (lastnameInp.value.trim() == '') {
      lastnameInp.classList.add('inpError');
      lastnameErrorJs.textContent = '名前を入力してください';
    } else if (lastnameInp.value !== '') {
      lastnameInp.classList.remove('inpError');
      lastnameErrorJs.textContent = '';
    }
  })

  //firstnameのイベント定義
  firstnameInp.addEventListener('blur', function (event) {
    //laravelバリデーションのエラーがある場合は重複するので消す
    if (document.getElementById('firstnameErrorLa') != null) {
      document.getElementById('firstnameErrorLa').textContent = '';
    }
    //JSエラー判定
    if (firstnameInp.value.trim() == '') {
      firstnameInp.classList.add('inpError');
      firstnameErrorJs.textContent = '名前を入力してください';
    } else if (firstnameInp.value !== '') {
      firstnameInp.classList.remove('inpError');
      firstnameErrorJs.textContent = '';
    }
  })

  //emailのイベント定義
  emailInp.addEventListener('blur', function (event) {
    //laravelバリデーションのエラーがある場合は重複するので消す
    if (document.getElementById('emailErrorLa') != null) {
      document.getElementById('emailErrorLa').textContent = '';
    }
    //JSエラー判定
    if (emailInp.value.trim() == '') {
      emailInp.classList.add('inpError');
      emailErrorJs.textContent = 'メールアドレスを入力してください';
    } else if (!mailReg.test(emailInp.value)) {
      emailInp.classList.add('inpError');
      emailErrorJs.textContent = 'メールアドレスの形式で入力してください';
    } else {
      emailInp.classList.remove('inpError');
      emailErrorJs.textContent = '';
    }
  })

  //postcodeのイベント定義(バリデーション)
  postcodeInp.addEventListener('blur', function (event) {
    //半角文字に変換
    let postcode = postcodeInp.value;
    postcode = postcode.replace(/[０-９]|[－]/g,
      function( tmpStr ) {
        return String.fromCharCode( tmpStr.charCodeAt(0) - 0xFEE0 );
      }
    );
    postcodeInp.value = postcode;

    //laravelバリデーションのエラーがある場合は重複するので消す
    if (document.getElementById('postcodeErrorLa') != null) {
      document.getElementById('postcodeErrorLa').textContent = '';
    }
    //JSエラー判定
    if (postcodeInp.value.trim() == '') {
      postcodeInp.classList.add('inpError');
      postcodeErrorJs.textContent = '郵便番号を入力してください';
    } else if (!postcodeReg.test(postcodeInp.value)) {
      postcodeInp.classList.add('inpError');
      postcodeErrorJs.textContent = '郵便番号の形式で入力してください';
    } else {
      postcodeInp.classList.remove('inpError');
      postcodeErrorJs.textContent = '';
    }
  })

  //addressのイベント定義
  addressInp.addEventListener('blur', function (event) {
    //laravelバリデーションのエラーがある場合は重複するので消す
    if (document.getElementById('addressErrorLa') != null) {
      document.getElementById('addressErrorLa').textContent = '';
    }
    //JSエラー判定
    if (addressInp.value.trim() == '') {
      addressInp.classList.add('inpError');
      addressErrorJs.textContent = '住所を入力してください';
    } else if (addressInp.value !== '') {
      addressInp.classList.remove('inpError');
      addressErrorJs.textContent = '';
    }
  })

  //opinionのイベント定義
  opinionText.addEventListener('blur', function (event) {
    //laravelバリデーションのエラーがある場合は重複するので消す
    if (document.getElementById('opinionErrorLa') != null) {
      document.getElementById('opinionErrorLa').textContent = '';
    }
    //JSエラー判定
    if (opinionText.value.trim() == '') {
      opinionText.classList.add('inpError');
      opinionErrorJs.textContent = 'ご意見を入力してください';
    } else if (opinionText.value.length > 121) {
      opinionText.classList.add('inpError');
      opinionErrorJs.textContent = 'ご意見は、１２０文字以内で入力してください';
    } else {
      opinionText.classList.remove('inpError');
      opinionErrorJs.textContent = '';
    }
  })
};


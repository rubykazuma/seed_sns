<?php

  //セッションを使うページに必ず入れる
  session_start();
  //エラー情報を保持する
  $error = array();

  //check.phpにPOST送信していた部分をindex.phpに送信するように変更しましょう
  //POST送信されたら、入力チェックを行いましょう
 //入力されていない場合は、「入力してください」というエラーメッセージを入力欄の下に表示しましょう。

 // $error_nickname = '';
 // $error_email = '';
 // $error_password = '';


 if (isset($_POST)  && !empty($_POST)){

  //ニックネームが未入力の場合
  if(empty($_POST['nick_name'])){
    // $error_nickname = 'ニックネームを入力してください。';
    $error['nick_name'] = 'blank';
  }
  //メールアドレスが未入力の場合
  if(empty($_POST['email'])){
    // $error_email = 'メールアドレスを入力してください。';
    $error['email'] = 'blank';
  }
  //パスワードが未入力の場合
  if(empty($_POST['password'])){
  //   $error_password = 'パスワードを入力してください。';
    $error['password'] = 'blank';
  }elseif(strlen($_POST['password']) < 4){
    //パスワードが４文字より少ない
    $error['password'] = 'length';
  }

  //エラーがない場合
  if (empty($error)) {
    //セッションに値を保存
    $session['join'] = $_POST;

    //check.phpに移動
    header('Location:check.php');
    exit();
  }
 }

 ?>





<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeedSNS</title>

    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../assets/css/form.css" rel="stylesheet">
    <link href="../../assets/css/timeline.css" rel="stylesheet">
    <link href="../../assets/css/main.css" rel="stylesheet">
    <!--
      designフォルダ内では2つパスの位置を戻ってからcssにアクセスしていることに注意！
     -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"><span class="strong-title"><i class="fa fa-twitter-square"></i> Seed SNS</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 content-margin-top">
        <legend>会員登録</legend>
        <form method="post" action="" class="form-horizontal" role="form">
          <!-- ニックネーム -->
          <div class="form-group">
            <label class="col-sm-4 control-label">ニックネーム</label>
            <div class="col-sm-8">
            <?php if (isset($_POST['nick_name'])) { ?>
              <input type="text" name="nick_name" class="form-control" placeholder="例： Seed kun" value="<?php echo htmlspecialchars($_POST['nick_name']);?>">
              <?php }else{ ?>
              <input type="text" name="nick_name" class="form-control" placeholder="例： Seed kun">
              <?php } ?>
              <?php if (isset($error['nick_name']) && $error['nick_name'] == 'blank'):?>
                <p class="error">ニックネームを入力して下さい</p>
              <?php endif; ?>
            </div>
          </div>
          <!-- メールアドレス -->
          <div class="form-group">
            <label class="col-sm-4 control-label">メールアドレス</label>
            <div class="col-sm-8">
              <?php if (isset($_POST['email'])) { ?>
              <input type="email" name="email" class="form-control" placeholder="例： seed@nex.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
              <?php }else{ ?>
              <input type="email" name="email" class="form-control" placeholder="例： seed@nex.com">
              <?php } ?>
              <?php if(isset($error['email']) && $error['email'] == 'blank'):?>
                <p class="error">メールアドレスを入力して下さい</p>
              <?php endif; ?>
            </div>
          </div>
          <!-- パスワード -->
          <div class="form-group">
            <label class="col-sm-4 control-label">パスワード</label>
            <div class="col-sm-8">
              <?php if (isset($_POST['password'])) { ?>
              <input type="password" name="password" class="form-control" placeholder="" value="<?php echo htmlspecialchars($_POST['password']); ?>">
              <?php }else{ ?>
              <input type="password" name="password" class="form-control" placeholder="">
              <?php } ?>
              <?php if(isset($error['nick_name']) && $error['password'] == 'blank'):?>
                <p class="error">パスワードを入力して下さい</p>
              <?php endif; ?>
              <?php if(isset($error['nick_name']) && $error['password'] == 'length'):?>
                <p class="error">パスワードは４文字以上で入力して下さい</p>
              <?php endif; ?>
            </div>
          </div>
          <!-- プロフィール写真 -->
          <div class="form-group">
            <label class="col-sm-4 control-label">プロフィール写真</label>
            <div class="col-sm-8">
              <input type="file" name="picture_path" class="form-control">
            </div>
          </div>

          <input type="submit" class="btn btn-default" value="確認画面へ">
        </form>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

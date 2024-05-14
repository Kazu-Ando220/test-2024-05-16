<?php

require_once('config/status_codes.php');

$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
$option = htmlspecialchars($_POST['option'], ENT_QUOTES);

if (!$option) {
  header('Location: index.php');→index.phpで解答の選択肢を選ばなかった時にindex.phpに遷移される
}

foreach ($status_codes as $status_code) {
  if ($status_code['code'] === $answer_code) {
    $code = $status_code['code'];
    $description = $status_code['description'];
  }→status_codeのコードがanswer_codeと合致したなら、$status_codeの'コード'は$codeに代入し、$status_codeの'説明'は$descriptionに代入する
}

$result = $option === $code;→$optionと$codeが合致したものが$resultとなる

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/result.css">
</head>

<body>
<header class="header">
  <div class="header__inner">
    <a class="header__logo" href="/">
      Status Code Quiz
    </a>
  </div>
</header>

<main>
  <div class="result__content"> mainタグ内側全体を囲むタグ
    <div class="result"> h2タグ2つを囲むタグ
      <?php if ($result): ?>
      <h2 class="result__text--correct">正解</h2>→答えのコードと選択したものが同じである時
      <?php else: ?>
      <h2 class="result__text--incorrect">不正解</h2>→答えのコードと選択したものが異なる時
      <?php endif; ?>
    </div>
    <div class="answer-table"> tableタグを囲むタグ
      <table class="answer-table__inner"> trタグ2つを囲むタグ
      <tr class="answer-table__row">
        <th class="answer-table__header">ステータスコード</th>
        <td class="answer-table__text">
        <?php echo $code ?>→正解のコードを出力
        </td>
      </tr>
      <tr class="answer-table__row">
        <th class="answer-table__header">説明</th>
        <td class="answer-table__text">
        <?php echo $description ?>→正解の説明を出力
      </td>
      </tr>
      </table>
    </div>
  </div>
</main>
</body>

</html>
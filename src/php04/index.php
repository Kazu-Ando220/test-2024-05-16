<?php

require_once('config/status_codes.php');→configディレクトリ内のstatus_codes.phpから1回だけ要求する

$random_indexes = array_rand($status_codes, 4);→$status_codesの配列からランダムに４つのキーを取り出し$random_indexesに代入

foreach ($random_indexes as $index) {→$random_indexes配列の各要素を順番に取り出し各要素を$index変数に代入してループを実行
  $options[] = $status_codes[$index];→$status_codes配列の$index変数に格納されたキーを$optionsに代入
}

$question = $options[mt_rand(0, 3)];→$options配列の中から一つを正解として新しい配列$questionに代入

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
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <header class="header">→ヘッダー全体を囲むタグ
    <div class="header__inner">→タグを囲むタグ
      <a class="header__logo" href="/">
        Status Code Quiz
      </a>
    </div>
  </header>

  <main>
    <div class="quiz__content">→mainタグ内側全体を囲むタグ
      <div class="question">→pタグ2つを囲むタグ
        <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでください</p>
        <p class="question__text">
          <?php echo $question['description'] ?>→問題文の説明を出力
        </p>
      </div>
      <form class="quiz-form" action="result.php" method="post">
        <input type="hidden" name="answer_code" value="→回答データをブラウザに表示せずに送信<?php echo $question['code'] ?>">→問題文のコードを出力
        <div class="quiz-form__item">→選択肢全体を囲むタグ
          <?php foreach ($options as $option) : ?>→$options配列の各要素を順番に取り出し、各要素を$option変数に代入してループを実行
            <div class="quiz-form__group">→選択肢それぞれを囲むタグ
              <input class="quiz-form__radio" id="<?php echo $option['code'] ?>"→labelタグのfor属性と同じものを指定しinputタグと紐づける type="radio" name="option" value="<?php echo $option['code'] ?>">
              <label class="quiz-form__label" for="<?php echo $option['code'] ?>">→inputタグのid属性と同じものを指定しinputタグと紐づける
                <?php echo $option['code'] ?>
              </label>
            </div>
          <?php endforeach; ?>→<?php foreach ($options as $option) : ?>`で始まる`foreach`ループの終了
        </div>
        <div class="quiz-form__button">
          <button class="quiz-form__button-submit" type="submit">
            回答
          </button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
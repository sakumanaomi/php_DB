<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>パーソナルカラー診断</title>
</head>
<body>
  <form action="s_create.php" method="POST">
    <fieldset>
      <legend>(入力画面）</legend>
      <a href="s_read/php">一覧画面</a>
      <div>
        髪の量は：
        <input type="radio" name="hairVolume" value="A" >猫っ毛で量は少なめ	
        <input type="radio" name="hairVolume" value="B">量は普通～多め
        <input type="radio" name="hairVolume" value="C">量は少なめ～普通
        <input type="radio" name="hairVolume" value="D">量は多い
      </div>
      
      <div>
        髪質は：
        <input type="radio" name="hairQuality" value="A" >艶があり、ハリがない	
        <input type="radio" name="hairQuality" value="B">艶がなく、ハリがある
        <input type="radio" name="hairQuality" value="C">艶もハリも少なめ
        <input type="radio" name="hairQuality" value="D">艶もハリもある
      </div>
      <div>
       髪の色は：
       <input type="radio" name="hairColor" value="A" >深みのあるブラウン
       <input type="radio" name="hairColor" value="B">ソフトで柔らかい質感質感の黒
        <input type="radio" name="hairColor"value="C" >コシが強い黒
        <input type="radio" name="hairColor" value="D">陽に当たるとブラウン
      </div>
      <div>
        瞳の色は：
        <input type="radio" name="eyeColor" value="A" >明るめブラウン
        <input type="radio" name="eyeColor" value="B">赤み
        <input type="radio" name="eyeColor" value="C">ダークブラウン
       <input type="radio" name="eyeColor" value="D">ブラック
      </div>
      <div>
        肌の色は：
        <input type="radio" name="skinColor" value="A">明るいアイボリー
        <input type="radio" name="skinColor" value="B">オークル系
        <input type="radio" name="skinColor"value="C" >血色の良い明るめピンク
        <input type="radio" name="skinColor" value="D">ピンク系の色白肌もしくは地黒肌
      </div>
      <div>
        日焼けすると：
        <input type="radio" name="suntan" value="A">明るいアイボリー
        <input type="radio" name="suntan" value="B">オークル系
        <input type="radio" name="suntan" value="C">血色の良い明るめピンク
        <input type="radio" name="suntan" value="D">ピンク系の色白肌もしくは地黒肌
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
</body>
</html>
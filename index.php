<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sample Form</title>
  <link rel="stylesheet" href="./styles/index.css" />
  <?php require "readExcel.php" ?>
</head>
<body>
  <div class="formSample">
    <h1>Form Sample</h1>
  </div>
  <form action="/writeExcel.php" method="post" id="infos-form">
    <?php
      $excelData = getData("A3:D8");
      foreach ($excelData as $row => $column) {
        $name = $column['A'];
    ?>
    <div class="person-container">
      <table class="personalInfo">
        <h1 class="name"><?= $name ?></h1>
        <tr class="sex">
          <th class="info-item">性別</th>
          <td class="info-body">
            <select name="<?= $name ?>[sex]" class="select-sex">
              <option value="男" <?php if($column["B"] == "男") echo "selected"?>>男性</option>
              <option value="女" <?php if($column["B"] == "女") echo "selected"?>>女性</option>
            </select>
          </td>
        </tr>
        <tr id="stature">
          <th class="info-item">身長</th>
          <td class="info-body">
            <input type="number" value=<?php echo $column["C"] ?> name="<?= $name ?>[stature]" />
            <span class="unit">cm</span>
          </td>
        </tr>
        <tr id="bodyWeight">
          <th class="info-item">体重</th>
          <td class="info-body">
            <input type="number" value=<?php echo $column["D"] ?> name="<?= $name ?>[bodyWeight]" />
            <span class="unit">kg</span>
          </td>
        </tr>
      </table>
    </div>
    <?php
      }
    ?>

    <div class="submit-btn-wrapper">
      <input id="submit-btn" type="submit" value="送信" />
    </div>
  </form>
</body>
</html>
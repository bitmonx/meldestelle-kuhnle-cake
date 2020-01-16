<style>
    .flash-message-success {
      text-align: center;
      padding: 10px;
      background-color: rgba(104, 170, 166, 0.2);
      color: #68AAA8;
      /* font-weight: bold; */
    }

    .flash-message-error {
      text-align: center;
      padding: 10px;
      background-color: #F8D7DA;
      color: #B73A45;
      /* font-weight: bold; */
    }
</style>

<?php
    if (!isset($params['escape']) || $params['escape'] !== false) {
        $message = h($message);
    }

    $array = explode('+', $message);
?>

<div class="flash-message-<?= ($array[0] == 'success')?'success':'error'?>" onclick="this.classList.add('hidden');">
    <strong><?= $array[1] ?></strong><br />
    <?= $array[2] ?>
</div>

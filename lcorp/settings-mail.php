<?php
require 'core/initialize.php';
$user = new wcms\classes\auth\Login;
$user->require_login();

$page_title = 'Настройки';
$page = 'Настройки';
?>

<?php include('includes/header.php') ?>

<section>
  <div class="container">
    <h1 class="ui-title-1">Настройки</h1>
  </div>
</section>

<section>
  <div class="container container--small">
    <form class="settings__form" action="settings-mail-form-handler.php" method="POST">
      <h2 class="ui-title-2">Общие настройки почты</h2>
      <!-- Исходящий e-mail -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">Исходящий e-mail (e-mail, который указывается в графе "Отправитель"):
          <input type="text" name="outbound_email" value="<?=$settings['outbound_email']?>">
        </label>
      </div>

      <!-- Тема письма -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">Тема письма:
          <input type="text" name="subject" value="<?=$settings['subject']?>">
        </label>
      </div>

      <!-- Логин от почты -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">Логин от почты:
          <input type="text" name="username" value="<?=$settings['username']?>">
        </label>
      </div>

      <!-- Пароль от почты -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">Пароль от почты:
          <input type="password" name="password" value="<?=$settings['password']?>">
        </label>
      </div>

      <!-- Адрес отправки заявок -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">Адрес отправки заявок:
          <input type="text" name="inbound_email" value="<?=$settings['inbound_email']?>">
        </label>
      </div>

      <h2 class="ui-title-2">Настройки SMTP</h2>

      <!-- Использовать SMTP -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">Использовать SMTP:
          <input type="checkbox" name="use_SMTP" value="1" <?=$settings['use_SMTP'] ? 'checked' : '' ?> >
        </label>

        <!-- Порт SMTP -->
        <label class="ui-text-regular">Порт SMTP:
          <input type="text" name="SMTP_port" value="<?=$settings['SMTP_port']?>">
        </label>
      </div>

      <!-- SMTP-хост -->
      <div class="setting__wrapper">
        <label class="ui-text-regular">SMTP-хост:
          <input type="text" name="SMTP_host" value="<?=$settings['SMTP_host']?>">
        </label>
      </div>

      <!-- Кнопка "Сохранить" -->
      <div class="button-list">
        <button class="button button-primary button--round" type="submit">Сохранить</button>
      </div>

    </form>
  </div>
  
</section>


<?php include('includes/footer.php') ?>

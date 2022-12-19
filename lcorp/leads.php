<?php

use Jajo\JSONDB;
use wcms\classes\lead\Lead;
use wcms\classes\test\Test;

require 'core/initialize.php';
$user = new wcms\classes\auth\Login;
$user->require_login();?>

<?php
    $page_title = 'Принятые заявки';
    $page = 'html';

    //Загрузка лидов из базы данных
    $pagination = Lead::paginate( $_GET['pos'] ?? 0, 10, JSONDB::DESC);
    $leads = $pagination->data;

    $json = '[{"id": 1, "name": "test_01","phone": "+7 000 000 00 01","mailed": 0,"created_at": "17 March 2022, 12:11"},{"id": 2,"name": "test_02","phone": "+7 000 000 00 02","mailed": 0,"created_at": "17 March 2022, 12:13"},{"name": "test_03","phone": "+7 000 000 00 03","mailed": 1,"created_at": "17 March 2022, 13:42","id": 3}]';
?>

<!-- Хедер -->
<?php include('includes/header.php') ?>

<!-- Основная часть -->
<section>
  <div class="container">
    <div class="common-header__center">
        <h2 class="ui-title-2" style="margin-bottom:0;"> Список принятых заявок </h2>
    </div>

    <table class="ui-table ui-table--hover">
        <thead>
            <tr>
                <td colspan="6" style="text-align:center">
                    <?=$pagination->links?>
                </td>
            </tr>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Отправлено на почту</th>
                <th>Дата создания</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if(count($leads) < 1){
            ?>
                <tr>
                    <td colspan="6">
                        Заявок пока что не поступало
                    </td>
                </tr>
            <?php
                }
            ?>

            <?php
                foreach($leads as $lead){
            ?>
                <tr>
                    <td><?=$lead->id?></td>
                    <td><?=$lead->name?></td>
                    <td><?=$lead->email?></td>
                    <td><?=$lead->phone?></td>
                    <td><?=$lead->mailed ? "Да" : "Нет"?></td>
                    <td><?=$lead->created_at?></td>
                    <td>
                        <a href="leads-delete-handler.php/?id=<?=$lead->id?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align:center">
                    <?=$pagination->links?>
                </td>
            </tr>
        </tfoot>
    </table>

  </div>
</section>

<!-- Футер -->
<?php include('includes/footer.php'); ?>

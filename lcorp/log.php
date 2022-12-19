<?php
require 'core/initialize.php';

use wcms\classes\log\Log;
use Jajo\JSONDB;

$user = new wcms\classes\auth\Login;
$user->require_login();

$page_title = 'Лог';
$page = 'Лог';

//Загрузка записей из базы данных
// $log = Log::load();
$pagination = Log::paginate( $_GET['pos'] ?? 0, 10, JSONDB::DESC);
$log = $pagination->data;

?>

<?php include('includes/header.php') ?>

<!-- Основная часть -->
<section>
  <div class="container">
    <div class="common-header__center">
        <h2 class="ui-title-2" style="margin-bottom:0;"> Список записей в журнале </h2>
    </div>

    <table class="ui-table ui-table--hover">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">
                    <?=$pagination->links?>
                </th>
            </tr>
            <tr>
                <th>Дата</th>
                <th>Запись</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if(count($log) < 1){
            ?>
                <tr>
                    <td colspan="2">
                        Заявок пока что не поступало
                    </td>
                </tr>
            <?php
                }
            ?>

            <?php
                foreach($log as $entry){
            ?>
                <tr>
                    <td><?=$entry->created_at?></td>
                    <td><?=$entry->text?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align:center">
                    <?=$pagination->links?>
                </td>
            </tr>
        </tfoot>
    </table>

  </div>
</section>

<?php include('includes/footer.php') ?>
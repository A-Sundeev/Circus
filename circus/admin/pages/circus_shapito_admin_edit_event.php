<?php
// префикс l_ - переменные из полей
// префикс n_ - имена таблиц из бд
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
   
    $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
    $id_name_event = (int) $_GET['id_name_event'];

    $pref = $wpdb -> prefix;

    $n_circus_shapito_event = $pref . 'circus_shapito_event';
    $n_circus_shapito_name_event = $pref . 'circus_shapito_name_event';

    $n_circus_shapito_vip_price = $pref . 'circus_shapito_vip_price';
    $n_circus_shapito_lateral_sector_price = $pref . 'circus_shapito_lateral_sector_price';
    $n_circus_shapito_central_sector_price = $pref . 'circus_shapito_central_sector_price';
    $n_circus_shapito_lateral_first_sector_stock = $pref . 'circus_shapito_lateral_first_sector_stock';
    $n_circus_shapito_central_second_sector_stock = $pref . 'circus_shapito_central_second_sector_stock';
    $n_circus_shapito_central_tritium_sector_stock = $pref . 'circus_shapito_central_tritium_sector_stock';
    $n_circus_shapito_lateral_fourth_sector_stock = $pref . 'circus_shapito_lateral_fourth_sector_stock';
    $n_circus_shapito_sector_vip_row_stock = $pref . 'circus_shapito_sector_vip_row_stock';

    $n_circus_shapito_sold_seats = $pref . 'circus_shapito_sold_seats';

    // переменная для ошибки либо успеха
    $errorMessage;
    $successMessage;

    if(isset($_GET['id_remove_event'])) {
        $id_remove_event = (int) $_GET['id_remove_event'];

        $callback_remove_circus_shapito_sector_vip_row_stock = $wpdb -> delete(
            $n_circus_shapito_sector_vip_row_stock,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_lateral_fourth_sector_stock = $wpdb -> delete(
            $n_circus_shapito_lateral_fourth_sector_stock,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_central_tritium_sector_stock = $wpdb -> delete(
            $n_circus_shapito_central_tritium_sector_stock,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_central_second_sector_stock = $wpdb -> delete(
            $n_circus_shapito_central_second_sector_stock,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_lateral_first_sector_stock = $wpdb -> delete(
            $n_circus_shapito_lateral_first_sector_stock,
            array('id_event' => $id_remove_event),
            array('%d')
        );
        
        $callback_remove_circus_shapito_central_sector_price = $wpdb -> delete(
            $n_circus_shapito_central_sector_price,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_lateral_sector_price = $wpdb -> delete(
            $n_circus_shapito_lateral_sector_price,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_vip_price = $wpdb -> delete(
            $n_circus_shapito_vip_price,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_sold_seats = $wpdb -> delete(
            $n_circus_shapito_sold_seats,
            array('id_event' => $id_remove_event),
            array('%d')
        );

        $callback_remove_circus_shapito_event = $wpdb -> delete(
            $n_circus_shapito_event,
            array('id' => $id_remove_event),
            array('%d')
        );

        
       

        
        if( $callback_remove_circus_shapito_sector_vip_row_stock            === false || 
            $callback_remove_circus_shapito_lateral_fourth_sector_stock     === false ||
            $callback_remove_circus_shapito_central_tritium_sector_stock    === false ||
            $callback_remove_circus_shapito_central_second_sector_stock     === false ||
            $callback_remove_circus_shapito_lateral_first_sector_stock      === false ||
            $callback_remove_circus_shapito_central_sector_price            === false ||
            $callback_remove_circus_shapito_lateral_sector_price            === false ||
            $callback_remove_circus_shapito_vip_price                       === false ||
            $callback_remove_circus_shapito_sold_seats                      === false ||
            $callback_remove_circus_shapito_event                           === false
        ) {
            $errorMessage = "Произошла ошибка при удалении данных!";
        } 
        else if($callback_remove_circus_shapito_sector_vip_row_stock            === 1 || 
                $callback_remove_circus_shapito_lateral_fourth_sector_stock     === 1 ||
                $callback_remove_circus_shapito_central_tritium_sector_stock    === 1 ||
                $callback_remove_circus_shapito_central_second_sector_stock     === 1 ||
                $callback_remove_circus_shapito_lateral_first_sector_stock      === 1 ||
                $callback_remove_circus_shapito_central_sector_price            === 1 ||
                $callback_remove_circus_shapito_lateral_sector_price            === 1 ||
                $callback_remove_circus_shapito_vip_price                       === 1 ||
                $callback_remove_circus_shapito_sold_seats                      === 1 ||
                $callback_remove_circus_shapito_event                           === 1
        ) {
            $successMessage = "Запись успешно удалена";
        }
    }







if(isset($_POST['buttonUpdate'])) {
    if(!empty($_POST['nameShou'])) {
        if(!empty($_POST['location'])) {
            $l_name_shou    = htmlspecialchars(trim($_POST['nameShou']));
            $l_location     = htmlspecialchars(trim($_POST['location']));

            // обновление название мероприятия
            $callback_circus_shapito_name_event = $wpdb->update(
                $n_circus_shapito_name_event,
                array(
                    'name_event' => $l_name_shou,
                ),
                array('id' => $id_name_event),
                array('%s'),
                array('%d')
            );

            if($callback_circus_shapito_name_event === false) {
                $errorMessage = "Произошла ошибка при изменении названия шоу";
            }
            
            //обновление место проведение и временная зона
            $callback_circus_shapito_event = $wpdb->update(
                $n_circus_shapito_event,
                array(
                    'location' => $l_location,
                ),
                array('id_name_event' => $id_name_event),
                array('%s'),
                array('%d')
            );

            if($callback_circus_shapito_event === false) {
                $errorMessage = "Произошла ошибка при изменении места проведения и временной зоны!";
            } else if($callback_circus_shapito_event > 0 || $callback_circus_shapito_name_event === 1) {
                $successMessage = "Все данные успешно изменены!";
            }
        }
    }
} else if (isset($_POST['buttonAdd'])) {
    if(!empty($_POST['date_1'])) {
        if(!empty($_POST['timeStart_1'])) {
            $l_location         = htmlspecialchars(trim($_POST['location']));
            $l_date_1           = htmlspecialchars(trim($_POST['date_1']));
            $l_timeStart_1      = htmlspecialchars(trim($_POST['timeStart_1']));

            $callback_circus_shapito_event = $wpdb->insert(
                $n_circus_shapito_event,
                array ( 'id_name_event' => $id_name_event, 
                        'location' => $l_location, 
                        'date' => $l_date_1,
                        'time_start' => $l_timeStart_1,
                    ),
                array ( '%d', '%s', '%s', '%s')
            );

            //последний вставленный айди
            $last_id = $wpdb->insert_id;

            $callback_circus_shapito_vip_price = $wpdb->insert(
                $n_circus_shapito_vip_price,
                array ( 'id_event' => $last_id, 
                    ),
                array ( '%d')
            );

            $callback_circus_shapito_lateral_sector_price = $wpdb->insert(
                $n_circus_shapito_lateral_sector_price,
                array ( 'id_event' => $last_id, 
                    ),
                array ( '%d')
            );

            $callback_circus_shapito_central_sector_price = $wpdb->insert(
                $n_circus_shapito_central_sector_price,
                array ( 'id_event' => $last_id, 
                    ),
                array ( '%d')
            );

            //акции боковой первый сектор
            $callback_circus_shapito_lateral_first_sector_stock = $wpdb->insert(
                $n_circus_shapito_lateral_first_sector_stock,
                array ( 'id_event' => $last_id, 
                        'first_row' => '',
                        'second_row' => '',
                        'terium_row' => '',
                        'fourth_row' => '',
                        'fifth_row' => '',
                        'sixth_row' => '',
                        'seventh_row' => '',
                        'eighth_row' => '',
                    ),
                array ( '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' )
            );

            //акции центральный второй сектор
            $callback_circus_shapito_central_second_sector_stock = $wpdb->insert(
                $n_circus_shapito_central_second_sector_stock,
                array ( 'id_event' => $last_id, 
                        'first_row' => '',
                        'second_row' => '',
                        'terium_row' => '',
                        'fourth_row' => '',
                        'fifth_row' => '',
                        'sixth_row' => '',
                        'seventh_row' => '',
                        'eighth_row' => '',
                    ),
                array ( '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' )
            );

            //акции центральный третий сектор
            $callback_circus_shapito_central_tritium_sector_stock = $wpdb->insert(
                $n_circus_shapito_central_tritium_sector_stock,
                array ( 'id_event' => $last_id, 
                        'first_row' => '',
                        'second_row' => '',
                        'terium_row' => '',
                        'fourth_row' => '',
                        'fifth_row' => '',
                        'sixth_row' => '',
                        'seventh_row' => '',
                        'eighth_row' => '',
                    ),
                array ( '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' )
            );

            //акции боковой четвертый сектор
            $callback_circus_shapito_lateral_fourth_sector_stock = $wpdb->insert(
                $n_circus_shapito_lateral_fourth_sector_stock,
                array ( 'id_event' => $last_id, 
                        'first_row' => '',
                        'second_row' => '',
                        'terium_row' => '',
                        'fourth_row' => '',
                        'fifth_row' => '',
                        'sixth_row' => '',
                        'seventh_row' => '',
                        'eighth_row' => '',
                    ),
                array ( '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' )
            );

            //акции вип сектор
            $callback_circus_shapito_sector_vip_row_stock = $wpdb->insert(
                $n_circus_shapito_sector_vip_row_stock,
                array ( 'id_event' => $last_id, 
                        'vip_row' => '',
                    ),
                array ( '%d', '%d' )
            );

            if($callback_circus_shapito_event                           === false || 
               $callback_circus_shapito_vip_price                       === false ||
               $callback_circus_shapito_lateral_sector_price            === false ||
               $callback_circus_shapito_central_sector_price            === false ||
               $callback_circus_shapito_lateral_first_sector_stock      === false ||
               $callback_circus_shapito_central_second_sector_stock     === false ||
               $callback_circus_shapito_central_tritium_sector_stock    === false ||
               $callback_circus_shapito_lateral_fourth_sector_stock     === false ||
               $callback_circus_shapito_sector_vip_row_stock            === false
            ) {
                $errorMessage = "Произошла ошибка при добавлении новой даты!";
            } else if($callback_circus_shapito_event === 1) {
                $successMessage = "Новая дата успешно добавленна!";
            }
        }
    }
}

    //основаная таблица
    $_query = "SELECT * FROM $n_circus_shapito_event WHERE `id_name_event` = $id_name_event";
    $wpdb->query( $_query );

    $circus_shapito_event_id            = wp_list_pluck( $wpdb->last_result, 'id' );
    if(!empty($circus_shapito_event_id)) {

    $circus_shapito_event_id_name_event = wp_list_pluck( $wpdb->last_result, 'id_name_event' );
    $circus_shapito_event_location      = wp_list_pluck( $wpdb->last_result, 'location' );
    $circus_shapito_event_date          = wp_list_pluck( $wpdb->last_result, 'date' );
    $circus_shapito_event_time_start    = wp_list_pluck( $wpdb->last_result, 'time_start' );

    //имя ивента
    $_circus_shapito_name_event = "SELECT * FROM $n_circus_shapito_name_event WHERE `id` = $id_name_event";
    $wpdb->query( $_circus_shapito_name_event );

    $circus_shapito_name_event          = wp_list_pluck( $wpdb->last_result, 'name_event' );

    //без обратных слэшей
    $circus_shapito_name_event          = removeBackSlash($circus_shapito_name_event[0]);
    $circus_shapito_event_id_name_event = removeBackSlash($circus_shapito_event_id_name_event[0]);
    $circus_shapito_event_location      = removeBackSlash($circus_shapito_event_location[0]);
?>
<div class="circus_container">
    <div class="circus_body">
        <?php
            if(isset($_POST['buttonUpdate']) || isset($_POST['buttonAdd']) || isset($_GET['id_remove_event'])) {
                if(!empty($errorMessage)) {
                    echo '<div class="message_status_error success_message">'.$errorMessage.'</div>';
                } else if(!empty($successMessage)) {
                    echo '<div class="message_status_success success_message">'.$successMessage.'</div>';
                }
            }
        ?>
        <div class="circus_header">
            <h2><?= $id_name_event . ' - ' . $circus_shapito_name_event ?></h2>
        </div>
        <div class="name_output_event">
            <div>Номер мероприятия</div>
            <div>Дата</div>
            <div>Время начала</div>
            <div class="fake_name_output_event"></div>
            <div class="fake_name_output_event"></div>
        </div>
        <div class="output_event_wrapper">
            <?php 
                for($i = 0; $i < count($circus_shapito_event_id); $i++) {
                    $date = date('d-m-Y', strtotime($circus_shapito_event_date[$i]));
                    $time = date('H:i', strtotime($circus_shapito_event_time_start[$i]));

                    echo "<div class=\"output_event\">
                    <div class=\"output_event_id_events\">$circus_shapito_event_id[$i]</div>
                    <div class=\"\">$date</div>
                    <div class=\"\">$time</div>
                    <a href=\"?page=circus_shapito_admin_show_all_record&sub_id_name_event=$circus_shapito_event_id[$i]\"><div class=\"button_edit_event_group button_edit_event\">Редактировать</div></a>
                    <a href=\"?page=circus_shapito_admin_show_all_record&id_name_event=$id_name_event&id_remove_event=$circus_shapito_event_id[$i]\"><div class=\"button_edit_event_group button_remove_event\">Удалить</div></div></a>";
                }
            ?>
        </div>
        <div class="settings_event">
            <div class="circus_header">
                <h2>Глобальные настройки</h2>
            </div>
            <form action="#" method="POST">
                <p>НАЗВАНИЕ ШОУ *</p><input type="text" name="nameShou" required size="50px" placeholder="Название шоу" value="<?= htmlspecialchars(htmlspecialchars_decode($circus_shapito_name_event)) ?>">
                <p>МЕСТО ПРОВЕДЕНИЯ *</p><input type="text" name="location" required size="50px" placeholder="Место проведения" value="<?= htmlspecialchars(htmlspecialchars_decode($circus_shapito_event_location)) ?>"><br><br>
                <input type="submit" name="buttonUpdate" value="Сохранить" class="button">
            </form>
        </div>
        <div class="settings_event">
            <div class="circus_header">
                <h2>Добавить еще дату</h2>
            </div>
            <form action="#" method="POST">
            <div class="inputTimeWrapper">
                <div class="inputTime"> 
                    <div>Дата *<input type="date" required name="date_1"></div>
                    <div>Время начала *<input type="time" required name="timeStart_1"></div>
                    <input type="text" name="nameShou" value="<?=$circus_shapito_name_event?>" hidden>
                    <input type="text" name="location" value="<?=$circus_shapito_event_location?>" hidden>
                </div>
            </div>
            <input type="submit" name="buttonAdd" value="Добавить" class="button">
        </form>
        <div>
    </div>
</div>
<?php
} else {
    $wpdb -> delete(
        $n_circus_shapito_name_event,
        array('id' => $id_name_event),
        array('%d')
    );
?>
<div class="circus_container ">
    <div class="circus_header">
        <h3 style="color:red">Записей не обнаружено</h2>
    </div>
    <div class="return_to_home">
        <div class="return_to_home_header">
            <h3>Добавте новую запись или вернитесь к просмотру всех записей</h3>
        </div>
        <div>
        <a href="?page=circus_shapito_admin_add_new_record"><button class="button_edit_event_group">Добавить новую запись</button></a>
        <a href="?page=circus_shapito_admin_show_all_record"><button class="button_edit_event_group">Просмотреть все записи</button></a>
        </div>
    </div>
</div>
<?php 
}
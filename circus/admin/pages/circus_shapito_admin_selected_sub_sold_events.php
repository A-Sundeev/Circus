<?php
global $wpdb;

    $sub_id_name_event = (int) $_GET['sub_id_name_event'];
    //префикс
    $pref = $wpdb -> prefix;

    //имена бд
    //проданные места
    $n_circus_shapito_sold_seats = $pref . 'circus_shapito_sold_seats';
    //акции
    $n_circus_shapito_stock = $pref . 'circus_shapito_stock';

    $errorMessage = '';
    $successMessage = '';
    $ticketNumberTwo = '';
    $id_ticket = '';
    if(isset($_GET['id_ticket'])) {
        $id_ticket = (string) $_GET['id_ticket'];

        $circus_shapito_sold_seats = "SELECT * FROM $n_circus_shapito_sold_seats WHERE `id`= $id_ticket AND `id_event`= $sub_id_name_event AND `admin` = 0";
        $wpdb->query($circus_shapito_sold_seats);
        $ticketNumber = wp_list_pluck( $wpdb->last_result, 'ticket_number' );
       
        $callback_circus_shapito_sold_seats = $wpdb -> delete(
            $n_circus_shapito_sold_seats,
            array('id' => $id_ticket, 'id_event' => $sub_id_name_event),
            array('%d', '%d')
        );

        if($callback_circus_shapito_sold_seats === false) {
            $errorMessage = "Произошла ошибка при удалении данных!";
        } else if ($callback_circus_shapito_sold_seats === 1) {
            $successMessage = "Билет удален успешно";
            $ticketNumberTwo = $ticketNumber[0];
        }
    }

    $circus_shapito_sold_seats = "SELECT * FROM $n_circus_shapito_sold_seats WHERE `id_event`= $sub_id_name_event AND `admin` = 0";
    $wpdb->query($circus_shapito_sold_seats);
    
    $id = wp_list_pluck( $wpdb->last_result, 'id' );
    $ticket_number = wp_list_pluck( $wpdb->last_result, 'ticket_number' );
    $section = wp_list_pluck( $wpdb->last_result, 'section' );
    $row = wp_list_pluck( $wpdb->last_result, 'row' );
    $place = wp_list_pluck( $wpdb->last_result, 'place' );
    $price = wp_list_pluck( $wpdb->last_result, 'price' );
    $phone = wp_list_pluck( $wpdb->last_result, 'phone' );
    $email = wp_list_pluck( $wpdb->last_result, 'email' );
    $stock = wp_list_pluck( $wpdb->last_result, 'stock' );
?>
<div class="circus_container">
    <div class="circus_header">
        <h2>Список купленных мест</h2>
    </div>
    <div class="circus_body">
    <?php
        if(isset($_GET['id_ticket'])) {
            if(!empty($errorMessage)) {
                echo '<div class="message_status_error success_message">'.$errorMessage.'</div>';
            } else if(!empty($successMessage)) {
                echo '<div class="message_status_success success_message">'.$successMessage.'</div>';
            }
        }
    ?>
    <input type="text" class="circus_shapito_sold_search" value="<?= $ticketNumberTwo ?>" placeholder="Начните вводить номер билета . . .">
    <div class="name_output_sold_event">
        <div>Номер билета</div>
        <div>Сектор</div>
        <div>Ряд</div>
        <div>Место</div>
        <div>Цена</div>
        <div>Телефон</div>
        <div>Почта</div>
        <div>Место по акции</div>
        <div class="fake_name_column"></div>

    </div>
    <div class="output_event_sold_wrapper">
        
        <?php
            $ru_section = '';
            $ru_row = '';

            for($i = 0; $i < count($id); $i++) {
                $circus_shapito_stock = "SELECT * FROM $n_circus_shapito_stock WHERE `id`= $stock[$i]";
                $wpdb->query($circus_shapito_stock);
                $stock2 = wp_list_pluck( $wpdb->last_result, 'stock' );
                if(empty($stock2)) {
                    $stock2[0] = '';
                }
                //перевод сектора
                if($section[$i] == 'lateral_first') $ru_section = 'Боковой первый';
                else if($section[$i] == 'lateral_fourth') $ru_section = 'Боковой четвертый';
                else if($section[$i] == 'central_second') $ru_section = 'Центральный второй';
                else if($section[$i] == 'central_tritium') $ru_section = 'Центральный третий';
                else if($section[$i] == 'vip') $ru_section = 'Вип';

                //перевод ряда
                if($section[$i] == 'vip') $ru_row = '';
                else if($row[$i] == 'first') $ru_row = 'первый';
                else if($row[$i] == 'second') $ru_row = 'второй';
                else if($row[$i] == 'terium') $ru_row = 'третий';
                else if($row[$i] == 'fourth') $ru_row = 'четвертый';
                else if($row[$i] == 'fifth') $ru_row = 'пятый';
                else if($row[$i] == 'sixth') $ru_row = 'шестой';
                else if($row[$i] == 'seventh') $ru_row = 'седьмой';
                else if($row[$i] == 'eighth') $ru_row = 'восьмой';
                
                ?>
                <div class="output_event_sold <?= $ticket_number[$i] ?>">
                    <div style="letter-spacing: 4px"><?= $ticket_number[$i] ?></div>
                    <div><?= $ru_section ?></div>
                    <div><?= $ru_row ?></div>
                    <div><?= $place[$i] ?></div>
                    <div><?= $price[$i] ?></div>
                    <div><?= $phone[$i] ?></div>
                    <div><?= $email[$i] ?></div>
                    <div><?= $stock2[0] ?></div>
                    <a href="?page=circus_shapito_admin_show_all_bought&sub_id_name_event=<?=$sub_id_name_event?>&id_ticket=<?=$id[$i]?>"><div class="button_remove_buy_ticket">Удалить</div></a>
                </div>
                <?php
            }
        ?>
    </div>
</div>
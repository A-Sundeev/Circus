<?php
// q_ - запрос к бд
// n_ - название таблиц
// d_ - переменные для купола
// r_ - ряд
    global $wpdb;
    $pref = $wpdb -> prefix;
    $circus_shapito_event = $pref . 'circus_shapito_event';
    $circus_shapito_name_event = $pref . 'circus_shapito_name_event';

    $n_circus_shapito_stock = $pref . 'circus_shapito_stock';
    

    $q_circus_shapito_name_event = "SELECT * FROM $circus_shapito_name_event WHERE status_event = true";
    $wpdb->query( $q_circus_shapito_name_event );
    $circus_shapito_name_event_name_events = wp_list_pluck( $wpdb->last_result, 'name_event' );
    $circus_shapito_name_event_id = wp_list_pluck( $wpdb->last_result, 'id' );

    wp_register_style( 'event_css', get_template_directory_uri() . '/includes/components/events/styles/style.css', array(), '1.2', 'screen');
    wp_enqueue_style( 'event_css');

    $return_to_home = ' <div class="return_to_home">
                            <h3 class="not_found">Мероприятие не найдено</h3>
                            <a href="/" class="button_return_to_home">Вернуться на главную</a>
                        </div>';
    $return_to_home_error = '   <div class="return_to_home">
                                    <h3 class="not_found">Произошла ошибка.<br> Повторите попытку или попробуйте позже</h3>
                                    <a href="/" class="button_return_to_home">Вернуться на главную</a>
                                </div>';

        if(empty($_GET)) {
    ?>

        <div class="circus_events_wrapper">
            <?php for($i = 0; $i < count($circus_shapito_name_event_id); $i++) { ?>
                <a href="<?='?id=' . $circus_shapito_name_event_id[$i] ?>" class="circus_event">
                    <div class="circus_event_name"><?= htmlspecialchars(htmlspecialchars_decode(removeBackSlash($circus_shapito_name_event_name_events[$i]))) ?></div>
                </a>
                
            <?php } ?>
        </div>

        <?php
    } else if (isset($_GET['id']) && count($_GET) == 1) {
        $id_name_event = (int) htmlspecialchars(trim($_GET['id']));
        if($id_name_event !== 0) {
            $q_circus_shapito_name_event_two = "SELECT * FROM $circus_shapito_name_event WHERE `id` = $id_name_event";
            $wpdb->query( $q_circus_shapito_name_event_two );
            $circus_shapito_name_event_two = wp_list_pluck( $wpdb->last_result, 'status_event' );
            if(!empty($circus_shapito_name_event_two) &&  $circus_shapito_name_event_two[0]== 1) {


            $q_circus_shapito_event = "SELECT * FROM $circus_shapito_event WHERE `id_name_event` = $id_name_event";
            $wpdb->query( $q_circus_shapito_event );
            $circus_shapito_event_id = wp_list_pluck( $wpdb->last_result, 'id' );
            if(count($circus_shapito_event_id) !== 0) {
                $circus_shapito_event_date = wp_list_pluck( $wpdb->last_result, 'date' );
                $circus_shapito_event_time_start = wp_list_pluck( $wpdb->last_result, 'time_start' );
                $now = time();
                for($i = 0; $i < count($circus_shapito_event_id); $i++) {
                    $then = strTotime($circus_shapito_event_date[$i] . ' ' . $circus_shapito_event_time_start[$i]);
                    $seconds_left  = $then-$now;
                    $days_left = $seconds_left/60*60*24;
                    $event_date = date('d-m-Y', strtotime($circus_shapito_event_date[$i]));
                    if($days_left > 0) {
                        echo "<input type=\"hidden\" class=\"events_date\" value=\"$event_date". '_' ."$circus_shapito_event_id[$i]\" />";
                    }
                }
                get_template_part('includes/components/calendary/calendary');
            } else {
                echo $return_to_home;
            }
        }else {
            echo $return_to_home;
        }
        } else {
            echo $return_to_home;
        }
    } else if (isset($_GET['id']) && isset($_GET['sub_id']) && isset($_GET['date']) && count($_GET) == 3) {
        

        
        $id_name_event = (int) htmlspecialchars(trim($_GET['id']));
        $sub_id_event = (int) htmlspecialchars(trim($_GET['sub_id']));
        $event_date = (string) htmlspecialchars(trim($_GET['date']));
        $date = date("Y-m-d", strtotime($event_date));

        $q_circus_shapito_event = "SELECT * FROM $circus_shapito_event WHERE `id_name_event` = $id_name_event AND `id` = $sub_id_event";
        $wpdb->query( $q_circus_shapito_event );
        $circus_shapito_event_id = wp_list_pluck( $wpdb->last_result, 'id' );
        $circus_shapito_event_date = wp_list_pluck( $wpdb->last_result, 'date' );
        $circus_shapito_event_time_start = wp_list_pluck( $wpdb->last_result, 'time_start' );
        
        if(!empty($circus_shapito_event_id)) {


        if($circus_shapito_event_date[0] == $date && count($circus_shapito_event_id) !== 0 ) {
            $now = time();
            $then = strTotime($circus_shapito_event_date[0] . ' ' . $circus_shapito_event_time_start[0]);
            $seconds_left  = $then-$now;
            $days_left = $seconds_left/60*60*24;
            if($days_left > 0) {

            $circus_shapito_event_timestart = wp_list_pluck( $wpdb->last_result, 'time_start' );
            $circus_shapito_event_location = wp_list_pluck( $wpdb->last_result, 'location' );



            //кол-во мест
            $n_circus_shapito_central_second_sector = $pref . 'circus_shapito_central_second_sector';
            $n_circus_shapito_central_tritium_sector = $pref . 'circus_shapito_central_tritium_sector';
            $n_circus_shapito_lateral_first_sector = $pref . 'circus_shapito_lateral_first_sector';
            $n_circus_shapito_lateral_fourth_sector = $pref . 'circus_shapito_lateral_fourth_sector';
            $n_circus_shapito_vip_sector = $pref . 'circus_shapito_vip_sector';

            //акции
            $n_circus_shapito_lateral_first_sector_stock = $pref . 'circus_shapito_lateral_first_sector_stock';
            $n_circus_shapito_central_second_sector_stock = $pref . 'circus_shapito_central_second_sector_stock';
            $n_circus_shapito_central_tritium_sector_stock = $pref . 'circus_shapito_central_tritium_sector_stock';
            $n_circus_shapito_lateral_fourth_sector_stock = $pref . 'circus_shapito_lateral_fourth_sector_stock';
            $n_circus_shapito_sector_vip_row_stock = $pref . 'circus_shapito_sector_vip_row_stock';

            //цены
            $n_circus_shapito_central_sector_price = $pref . 'circus_shapito_central_sector_price';
            $n_circus_shapito_lateral_sector_price = $pref . 'circus_shapito_lateral_sector_price';
            $n_circus_shapito_vip_price = $pref . 'circus_shapito_vip_price';

            //проданные места
            $n_circus_shapito_sold_seats = $pref . 'circus_shapito_sold_seats';

            

            
            $q_circus_shapito_central_sector_price = "SELECT * FROM $n_circus_shapito_central_sector_price WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_central_sector_price );
            $circus_shapito_central_sector_price_first_row = wp_list_pluck( $wpdb->last_result, 'first_row' );
            $circus_shapito_central_sector_price_second_row = wp_list_pluck( $wpdb->last_result, 'second_row' );
            $circus_shapito_central_sector_price_terium_row = wp_list_pluck( $wpdb->last_result, 'terium_row' );
            $circus_shapito_central_sector_price_fourth_row = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
            $circus_shapito_central_sector_price_fifth_row = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
            $circus_shapito_central_sector_price_sixth_row = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
            $circus_shapito_central_sector_price_seventh_row = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
            $circus_shapito_central_sector_price_eighth_row = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

            $q_circus_shapito_lateral_sector_price = "SELECT * FROM $n_circus_shapito_lateral_sector_price WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_lateral_sector_price );
            $circus_shapito_lateral_sector_price_first_row = wp_list_pluck( $wpdb->last_result, 'first_row' );
            $circus_shapito_lateral_sector_price_second_row = wp_list_pluck( $wpdb->last_result, 'second_row' );
            $circus_shapito_lateral_sector_price_terium_row = wp_list_pluck( $wpdb->last_result, 'terium_row' );
            $circus_shapito_lateral_sector_price_fourth_row = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
            $circus_shapito_lateral_sector_price_fifth_row = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
            $circus_shapito_lateral_sector_price_sixth_row = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
            $circus_shapito_lateral_sector_price_seventh_row = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
            $circus_shapito_lateral_sector_price_eighth_row = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

            $q_circus_shapito_vip_price = "SELECT * FROM $n_circus_shapito_vip_price WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_vip_price );
            $circus_shapito_vip_price_row = wp_list_pluck( $wpdb->last_result, 'vip_price' );





        // акции
            $q_circus_shapito_lateral_first_sector_stock = "SELECT * FROM $n_circus_shapito_lateral_first_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_lateral_first_sector_stock );
            $circus_shapito_lateral_first_sector_stock_first_row = wp_list_pluck( $wpdb->last_result, 'first_row' );
            $circus_shapito_lateral_first_sector_stock_second_row = wp_list_pluck( $wpdb->last_result, 'second_row' );
            $circus_shapito_lateral_first_sector_stock_terium_row = wp_list_pluck( $wpdb->last_result, 'terium_row' );
            $circus_shapito_lateral_first_sector_stock_fourth_row = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
            $circus_shapito_lateral_first_sector_stock_fifth_row = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
            $circus_shapito_lateral_first_sector_stock_sixth_row = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
            $circus_shapito_lateral_first_sector_stock_seventh_row = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
            $circus_shapito_lateral_first_sector_stock_eighth_row = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

            $q_circus_shapito_central_second_sector_stock = "SELECT * FROM $n_circus_shapito_central_second_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_central_second_sector_stock );
            $circus_shapito_central_second_sector_stock_first_row = wp_list_pluck( $wpdb->last_result, 'first_row' );
            $circus_shapito_central_second_sector_stock_second_row = wp_list_pluck( $wpdb->last_result, 'second_row' );
            $circus_shapito_central_second_sector_stock_terium_row = wp_list_pluck( $wpdb->last_result, 'terium_row' );
            $circus_shapito_central_second_sector_stock_fourth_row = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
            $circus_shapito_central_second_sector_stock_fifth_row = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
            $circus_shapito_central_second_sector_stock_sixth_row = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
            $circus_shapito_central_second_sector_stock_seventh_row = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
            $circus_shapito_central_second_sector_stock_eighth_row = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

            $q_circus_shapito_central_tritium_sector_stock = "SELECT * FROM $n_circus_shapito_central_tritium_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_central_tritium_sector_stock );
            $circus_shapito_central_tritium_sector_stock_first_row = wp_list_pluck( $wpdb->last_result, 'first_row' );
            $circus_shapito_central_tritium_sector_stock_second_row = wp_list_pluck( $wpdb->last_result, 'second_row' );
            $circus_shapito_central_tritium_sector_stock_terium_row = wp_list_pluck( $wpdb->last_result, 'terium_row' );
            $circus_shapito_central_tritium_sector_stock_fourth_row = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
            $circus_shapito_central_tritium_sector_stock_fifth_row = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
            $circus_shapito_central_tritium_sector_stock_sixth_row = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
            $circus_shapito_central_tritium_sector_stock_seventh_row = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
            $circus_shapito_central_tritium_sector_stock_eighth_row = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

            $q_circus_shapito_lateral_fourth_sector_stock = "SELECT * FROM $n_circus_shapito_lateral_fourth_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_lateral_fourth_sector_stock );
            $circus_shapito_lateral_fourth_sector_stock_first_row = wp_list_pluck( $wpdb->last_result, 'first_row' );
            $circus_shapito_lateral_fourth_sector_stock_second_row = wp_list_pluck( $wpdb->last_result, 'second_row' );
            $circus_shapito_lateral_fourth_sector_stock_terium_row = wp_list_pluck( $wpdb->last_result, 'terium_row' );
            $circus_shapito_lateral_fourth_sector_stock_fourth_row = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
            $circus_shapito_lateral_fourth_sector_stock_fifth_row = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
            $circus_shapito_lateral_fourth_sector_stock_sixth_row = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
            $circus_shapito_lateral_fourth_sector_stock_seventh_row = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
            $circus_shapito_lateral_fourth_sector_stock_eighth_row = wp_list_pluck( $wpdb->last_result, 'eighth_row' );


            $q_circus_shapito_sector_vip_row_stock = "SELECT * FROM $n_circus_shapito_sector_vip_row_stock WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_sector_vip_row_stock );
            $circus_shapito_sector_vip_row_stock = wp_list_pluck( $wpdb->last_result, 'vip_row' );
            
            $lateral_first_stock = [];
            $central_second_stock = [];
            $central_tritium_stock = [];
            $lateral_fourth_stock = [];
            $vip_row_stock = [];

            function getStock($id) {
                global $wpdb;
                $pref = $wpdb -> prefix;
                //названия акций
                $n_circus_shapito_stock = $pref . 'circus_shapito_stock';
                return $wpdb->get_var( "SELECT `stock` FROM $n_circus_shapito_stock WHERE `id` = $id[0]");
            }
        // Акции боковой первый
            echo '<div class="all_action_active_section">';
            if($circus_shapito_lateral_first_sector_stock_first_row[0] != 0) {
                array_push($lateral_first_stock, ['Первый ряд', getStock($circus_shapito_lateral_first_sector_stock_first_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_first_'.$circus_shapito_lateral_first_sector_stock_first_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_second_row[0] != 0) {
                array_push($lateral_first_stock, ['Второй ряд', getStock($circus_shapito_lateral_first_sector_stock_second_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_second_'.$circus_shapito_lateral_first_sector_stock_second_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_terium_row[0] != 0) {
                array_push($lateral_first_stock, ['Третий ряд', getStock($circus_shapito_lateral_first_sector_stock_terium_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_tritium_'.$circus_shapito_lateral_first_sector_stock_terium_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_fourth_row[0] != 0) {
                array_push($lateral_first_stock, ['Четвертый ряд', getStock($circus_shapito_lateral_first_sector_stock_fourth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_fourth_'.$circus_shapito_lateral_first_sector_stock_fourth_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_fifth_row[0] != 0) {
                array_push($lateral_first_stock, ['Пятый ряд', getStock($circus_shapito_lateral_first_sector_stock_fifth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_fifth_'.$circus_shapito_lateral_first_sector_stock_fifth_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_sixth_row[0] != 0) {
                array_push($lateral_first_stock, ['Шестой ряд', getStock($circus_shapito_lateral_first_sector_stock_sixth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_sixth_'.$circus_shapito_lateral_first_sector_stock_sixth_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_seventh_row[0] != 0) {
                array_push($lateral_first_stock, ['Седьмой ряд', getStock($circus_shapito_lateral_first_sector_stock_seventh_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_seventh_'.$circus_shapito_lateral_first_sector_stock_seventh_row[0].'" />';
            }
            if($circus_shapito_lateral_first_sector_stock_eighth_row[0] != 0) {
                array_push($lateral_first_stock, ['Восьмой ряд', getStock($circus_shapito_lateral_first_sector_stock_eighth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_first_row_eighth_'.$circus_shapito_lateral_first_sector_stock_eighth_row[0].'" />';
            }
        // Акции центральный второй
            if($circus_shapito_central_second_sector_stock_first_row[0] != 0) {
                array_push($central_second_stock, ['Первый ряд', getStock($circus_shapito_central_second_sector_stock_first_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_first_'.$circus_shapito_central_second_sector_stock_first_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_second_row[0] != 0) {
                array_push($central_second_stock, ['Второй ряд', getStock($circus_shapito_central_second_sector_stock_second_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_second_'.$circus_shapito_central_second_sector_stock_second_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_terium_row[0] != 0) {
                array_push($central_second_stock, ['Третий ряд', getStock($circus_shapito_central_second_sector_stock_terium_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_terium_'.$circus_shapito_central_second_sector_stock_terium_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_fourth_row[0] != 0) {
                array_push($central_second_stock, ['Четвертый ряд', getStock($circus_shapito_central_second_sector_stock_fourth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_fourth_'.$circus_shapito_central_second_sector_stock_fourth_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_fifth_row[0] != 0) {
                array_push($central_second_stock, ['Пятый ряд', getStock($circus_shapito_central_second_sector_stock_fifth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_fifth_'.$circus_shapito_central_second_sector_stock_fifth_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_sixth_row[0] != 0) {
                array_push($central_second_stock, ['Шестой ряд', getStock($circus_shapito_central_second_sector_stock_sixth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_sixth_'.$circus_shapito_central_second_sector_stock_sixth_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_seventh_row[0] != 0) {
                array_push($central_second_stock, ['Седьмой ряд', getStock($circus_shapito_central_second_sector_stock_seventh_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_seventh_'.$circus_shapito_central_second_sector_stock_seventh_row[0].'" />';
            }
            if($circus_shapito_central_second_sector_stock_eighth_row[0] != 0) {
                array_push($central_second_stock, ['Восьмой ряд', getStock($circus_shapito_central_second_sector_stock_eighth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_second_row_eighth_'.$circus_shapito_central_second_sector_stock_eighth_row[0].'" />';
            }
        // Акции центральный третий
            if($circus_shapito_central_tritium_sector_stock_first_row[0] != 0) {
                array_push($central_tritium_stock, ['Первый ряд', getStock($circus_shapito_central_tritium_sector_stock_first_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_first_'.$circus_shapito_central_tritium_sector_stock_first_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_second_row[0] != 0) {
                array_push($central_tritium_stock, ['Второй ряд', getStock($circus_shapito_central_tritium_sector_stock_second_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_second_'.$circus_shapito_central_tritium_sector_stock_second_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_terium_row[0] != 0) {
                array_push($central_tritium_stock, ['Третий ряд', getStock($circus_shapito_central_tritium_sector_stock_terium_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_terium_'.$circus_shapito_central_tritium_sector_stock_terium_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_fourth_row[0] != 0) {
                array_push($central_tritium_stock, ['Четвертый ряд', getStock($circus_shapito_central_tritium_sector_stock_fourth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_fourth_'.$circus_shapito_central_tritium_sector_stock_fourth_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_fifth_row[0] != 0) {
                array_push($central_tritium_stock, ['Пятый ряд', getStock($circus_shapito_central_tritium_sector_stock_fifth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_fifth_'.$circus_shapito_central_tritium_sector_stock_fifth_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_sixth_row[0] != 0) {
                array_push($central_tritium_stock, ['Шестой ряд', getStock($circus_shapito_central_tritium_sector_stock_sixth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_sixth_'.$circus_shapito_central_tritium_sector_stock_sixth_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_seventh_row[0] != 0) {
                array_push($central_tritium_stock, ['Седьмой ряд', getStock($circus_shapito_central_tritium_sector_stock_seventh_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_seventh_'.$circus_shapito_central_tritium_sector_stock_seventh_row[0].'" />';
            }
            if($circus_shapito_central_tritium_sector_stock_eighth_row[0] != 0) {
                array_push($central_tritium_stock, ['Восьмой ряд', getStock($circus_shapito_central_tritium_sector_stock_eighth_row)]);
                echo '<input type="hidden" class="stock_item" value="central_tritium_row_eighth_'.$circus_shapito_central_tritium_sector_stock_eighth_row[0].'" />';
            }
        // Акции боковой четвертый
            if($circus_shapito_lateral_fourth_sector_stock_first_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Первый ряд', getStock($circus_shapito_lateral_fourth_sector_stock_first_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_first_'.$circus_shapito_lateral_fourth_sector_stock_first_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_second_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Второй ряд', getStock($circus_shapito_lateral_fourth_sector_stock_second_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_second_'.$circus_shapito_lateral_fourth_sector_stock_second_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_terium_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Третий ряд', getStock($circus_shapito_lateral_fourth_sector_stock_terium_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_terium_'.$circus_shapito_lateral_fourth_sector_stock_terium_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_fourth_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Четвертый ряд', getStock($circus_shapito_lateral_fourth_sector_stock_fourth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_fourth_'.$circus_shapito_lateral_fourth_sector_stock_fourth_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_fifth_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Пятый ряд', getStock($circus_shapito_lateral_fourth_sector_stock_fifth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_fifth_'.$circus_shapito_lateral_fourth_sector_stock_fifth_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_sixth_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Шестой ряд', getStock($circus_shapito_lateral_fourth_sector_stock_sixth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_sixth_'.$circus_shapito_lateral_fourth_sector_stock_sixth_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_seventh_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Седьмой ряд', getStock($circus_shapito_lateral_fourth_sector_stock_seventh_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_seventh_'.$circus_shapito_lateral_fourth_sector_stock_seventh_row[0].'" />';
            }
            if($circus_shapito_lateral_fourth_sector_stock_eighth_row[0] != 0) {
                array_push($lateral_fourth_stock, ['Восьмой ряд', getStock($circus_shapito_lateral_fourth_sector_stock_eighth_row)]);
                echo '<input type="hidden" class="stock_item" value="lateral_fourth_row_eighth_'.$circus_shapito_lateral_fourth_sector_stock_eighth_row[0].'" />';
            }
        // Акции вип зоны
            if($circus_shapito_sector_vip_row_stock[0] != 0) {
                array_push($vip_row_stock, ['Вип ложа', getStock($circus_shapito_sector_vip_row_stock)]);
                echo '<input type="hidden" class="stock_item" value="vip_row_'.$circus_shapito_sector_vip_row_stock[0].'" />';
            }
            echo '</div>';
        //занятые места
            $q_circus_shapito_sold_seats = "SELECT * FROM $n_circus_shapito_sold_seats WHERE id_event = $circus_shapito_event_id[0]";
            $wpdb->query( $q_circus_shapito_sold_seats );
            $circus_shapito_sold_seats_section = wp_list_pluck( $wpdb->last_result, 'section' );
            if(count($circus_shapito_sold_seats_section) !== 0) {
                $circus_shapito_sold_seats_row = wp_list_pluck( $wpdb->last_result, 'row' );
                $circus_shapito_sold_seats_place = wp_list_pluck( $wpdb->last_result, 'place' );
                echo "<div class=\"occupied_places\">";
                    for($i = 0; $i < count($circus_shapito_sold_seats_section); $i++) {
                        if($circus_shapito_sold_seats_section[$i] !== "vip") {
                            echo '<input type="hidden" value="'. $circus_shapito_sold_seats_place[$i] 
                            .'" class="'. $circus_shapito_sold_seats_section[$i] 
                            .'_sector_'. $circus_shapito_sold_seats_row[$i] 
                            .'_row_place_' . $circus_shapito_sold_seats_place[$i] .'">';
                        } else {
                            echo '<input type="hidden" value="'. $circus_shapito_sold_seats_place[$i] 
                            .'" class="vip_'.$circus_shapito_sold_seats_row[$i].'_bed_'
                            . $circus_shapito_sold_seats_place[$i] .'">';
                        }
                    }
                echo "</div>";
            }







//сбор данных
    if(isset($_POST['button'])) {
        if(!empty($_POST['tel'])) {
            $phone = htmlspecialchars(trim($_POST['tel']));
            if(!empty($_POST['email'])) {
                $email = htmlspecialchars(trim($_POST['email']));
                $selectedPlaces = [
                    'lateral' => [
                        'first' => [
                            'first'     => [],
                            'second'    => [],
                            'terium'    => [],
                            'fourth'    => [],
                            'fifth'     => [],
                            'sixth'     => [],
                            'seventh'   => [],
                            'eighth'    => [],
                        ],
                        'fourth' => [
                            'first'     => [],
                            'second'    => [],
                            'terium'    => [],
                            'fourth'    => [],
                            'fifth'     => [],
                            'sixth'     => [],
                            'seventh'   => [],
                            'eighth'    => [],
                        ],
                    ],
                
                    'central' => [
                        'second' => [
                            'first'     => [],
                            'second'    => [],
                            'terium'    => [],
                            'fourth'    => [],
                            'fifth'     => [],
                            'sixth'     => [],
                            'seventh'   => [],
                            'eighth'    => [],
                        ],
                
                        'tritium' => [
                            'first'     => [],
                            'second'    => [],
                            'terium'    => [],
                            'fourth'    => [],
                            'fifth'     => [],
                            'sixth'     => [],
                            'seventh'   => [],
                            'eighth'    => [],
                        ],
                    ],
                
                    'vip' => [],
                ];
                $selectedPlacesStocks = [
                    'lateral' => [
                        'first' => [
                            'first'     => 0,
                            'second'    => 0,
                            'terium'    => 0,
                            'fourth'    => 0,
                            'fifth'     => 0,
                            'sixth'     => 0,
                            'seventh'   => 0,
                            'eighth'    => 0,
                        ],
                        'fourth' => [
                            'first'     => 0,
                            'second'    => 0,
                            'terium'    => 0,
                            'fourth'    => 0,
                            'fifth'     => 0,
                            'sixth'     => 0,
                            'seventh'   => 0,
                            'eighth'    => 0,
                        ],
                    ],
                
                    'central' => [
                        'second' => [
                            'first'     => 0,
                            'second'    => 0,
                            'terium'    => 0,
                            'fourth'    => 0,
                            'fifth'     => 0,
                            'sixth'     => 0,
                            'seventh'   => 0,
                            'eighth'    => 0,
                        ],
                
                        'tritium' => [
                            'first'     => 0,
                            'second'    => 0,
                            'terium'    => 0,
                            'fourth'    => 0,
                            'fifth'     => 0,
                            'sixth'     => 0,
                            'seventh'   => 0,
                            'eighth'    => 0,
                        ],
                    ],
                
                    'vip' => 0,
                ];
                $totalPrice = 0;

                if(isset($_POST['sectorRowPlace']['lateral'])) {
                    $d_lateral = $_POST['sectorRowPlace']['lateral'];
                    if(isset($d_lateral['first'])) {
                        $d_lateral_first = $d_lateral['first'];
                        if(isset($d_lateral_first['first'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 1";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            
                            foreach($d_lateral_first['first'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_first_num_seats) {
                                    $place = htmlspecialchars(trim($elem));
                                    
                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'first' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['first'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['second'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 2";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['second'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_second_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'second' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['second'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['terium'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 3";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['terium'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_terium_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'terium' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['terium'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['fourth'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 4";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['fourth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_fourth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'fourth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['fourth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['fifth'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 5";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['fifth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_fifth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'fifth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['fifth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['sixth'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 6";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['sixth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_sixth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'sixth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['sixth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['seventh'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 7";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['seventh'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_seventh_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'seventh' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['seventh'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_first['eighth'])) {
                            $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 8";
                            $wpdb->query( $circus_shapito_lateral_first_sector );

                            $circus_shapito_lateral_first_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_first['eighth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_eighth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_first' AND `row` = 'eighth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['first']['eighth'], $place);
                                    }
                                }
                            }
                        }
                    }
                    if(isset($d_lateral['fourth'])) {
                        $d_lateral_fourth = $d_lateral['fourth'];

                        if(isset($d_lateral_fourth['first'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 1";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['first'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_first_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'first' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['first'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['second'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 2";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['second'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_second_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'second' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['second'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['terium'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 3";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['terium'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_terium_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'terium' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['terium'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['fourth'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 4";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['fourth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_fourth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));
                                    
                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'fourth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['fourth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['fifth'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 5";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['fifth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_fifth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'fifth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['fifth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['sixth'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 6";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['sixth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_sixth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'sixth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['sixth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['seventh'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 7";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['seventh'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_seventh_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'seventh' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['seventh'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_lateral_fourth['eighth'])) {
                            $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 8";
                            $wpdb->query( $circus_shapito_lateral_fourth_sector );

                            $circus_shapito_lateral_fourth_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_lateral_fourth['eighth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_eighth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'lateral_fourth' AND `row` = 'eighth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['lateral']['fourth']['eighth'], $place);
                                    }
                                }
                            }
                        }  
                    }
                }

                if(isset($_POST['sectorRowPlace']['central'])) {

                    $d_central = $_POST['sectorRowPlace']['central'];

                    if(isset($d_central['second'])) {
                        $d_central_second = $d_central['second'];
                        if(isset($d_central_second['first'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 1";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['first'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_first_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'first' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['first'], $place);
                                    }
                                }
                            }

                        }
                        if(isset($d_central_second['second'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 2";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['second'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_second_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'second' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['second'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_second['terium'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 3";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['terium'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_terium_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'terium' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['terium'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_second['fourth'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 4";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['fourth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_fourth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'fourth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['fourth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_second['fifth'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 5";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['fifth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_fifth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'fifth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['fifth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_second['sixth'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 6";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['sixth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_sixth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'sixth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['sixth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_second['seventh'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 7";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['seventh'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_seventh_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'seventh' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['seventh'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_second['eighth'])) {
                            $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = ";
                            $wpdb->query( $circus_shapito_central_second_sector );

                            $circus_shapito_central_second_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_second['eighth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_eighth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_second' AND `row` = 'eighth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['second']['eighth'], $place);
                                    }
                                }
                            }
                        }
                    }
                    if(isset($d_central['tritium'])) {
                        $d_central_tritium = $d_central['tritium'];
                        if(isset($d_central_tritium['first'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 1";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['first'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_first_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'first' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['first'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['second'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 2";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['second'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_second_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'second' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['second'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['terium'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 3";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['terium'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_terium_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'terium' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['terium'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['fourth'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 4";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['fourth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_fourth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'fourth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['fourth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['fifth'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 5";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['fifth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_fifth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'fifth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['fifth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['sixth'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 6";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['sixth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_sixth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'sixth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['sixth'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['seventh'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 7";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['seventh'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_seventh_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'seventh' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['seventh'], $place);
                                    }
                                }
                            }
                        }
                        if(isset($d_central_tritium['eighth'])) {
                            $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 8";
                            $wpdb->query( $circus_shapito_central_tritium_sector );

                            $circus_shapito_central_tritium_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                            foreach($d_central_tritium['eighth'] as $elem) {
                                if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_eighth_num_seats) {
                                    $place = htmlspecialchars(trim($elem));

                                    $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'central_tritium' AND `row` = 'eighth' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['central']['tritium']['eighth'], $place);
                                    }
                                }
                            }
                        }
                    }
                }

                if(isset($_POST['sectorVipPlace'])) {
                    $circus_shapito_vip_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_vip_sector` WHERE id = 1";
                    $wpdb->query( $circus_shapito_vip_sector );

                    $circus_shapito_vip_sector_row_num = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($_POST['sectorVipPlace'] as $key => $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_vip_sector_row_num) {
                            $place = htmlspecialchars(trim($elem));
                            
                            $query = "SELECT `id` FROM `$n_circus_shapito_sold_seats` WHERE `id_event` = $circus_shapito_event_id[0] AND `section` = 'vip' AND `place` = $place";
                                    $wpdb->query($query);

                                    $id = wp_list_pluck( $wpdb->last_result, 'id');
                                    if(!empty($id)) {
                                        echo $return_to_home_error;
                                        return;
                                    } else {
                                        array_push($selectedPlaces['vip'], $place);
                                    }
                        }
                    }
                }

                function getSelectedPlaces ($arr) {
                    $result = [];
                    foreach($arr as $elem) {
                        if(is_array($elem)) {
                            f($elem);
                        } else {
                            array_push($result, $elem);
                        }
                    }
                    return $result;
                }

                function getPrice ($sector, $sectorNum, $sectorNum2, $row, $selectedPlaces, $price2) {
                    if(count(getSelectedPlaces($selectedPlaces[$sector][$sectorNum][$row])) > 0 || count(getSelectedPlaces($selectedPlaces[$sector][$sectorNum2][$row])) > 0) {
                        return $price2[0] * (count(getSelectedPlaces($selectedPlaces[$sector][$sectorNum][$row])) + count(getSelectedPlaces($selectedPlaces[$sector][$sectorNum2][$row])));
                    }
                }
                function getPriceVip ($selectedPlaces, $price2) {
                    if(count(getSelectedPlaces($selectedPlaces['vip'])) > 0) {
                        return $price2[0] * (count(getSelectedPlaces($selectedPlaces['vip'])));
                    }
                }
                //установка цен
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'first', $selectedPlaces, $circus_shapito_lateral_sector_price_first_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'second', $selectedPlaces, $circus_shapito_lateral_sector_price_second_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'terium', $selectedPlaces, $circus_shapito_lateral_sector_price_terium_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'fourth', $selectedPlaces, $circus_shapito_lateral_sector_price_fourth_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'fifth', $selectedPlaces, $circus_shapito_lateral_sector_price_fifth_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'sixth', $selectedPlaces, $circus_shapito_lateral_sector_price_sixth_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'seventh', $selectedPlaces, $circus_shapito_lateral_sector_price_seventh_row);
                    $totalPrice += getPrice('lateral', 'first', 'fourth', 'eighth', $selectedPlaces, $circus_shapito_lateral_sector_price_eighth_row);

                    $totalPrice += getPrice('central', 'second', 'tritium', 'first', $selectedPlaces, $circus_shapito_central_sector_price_first_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'second', $selectedPlaces, $circus_shapito_central_sector_price_second_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'terium', $selectedPlaces, $circus_shapito_central_sector_price_terium_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'fourth', $selectedPlaces, $circus_shapito_central_sector_price_fourth_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'fifth', $selectedPlaces, $circus_shapito_central_sector_price_fifth_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'sixth', $selectedPlaces, $circus_shapito_central_sector_price_sixth_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'seventh', $selectedPlaces, $circus_shapito_central_sector_price_seventh_row);
                    $totalPrice += getPrice('central', 'second', 'tritium', 'eighth', $selectedPlaces, $circus_shapito_central_sector_price_eighth_row);

                    $totalPrice += getPriceVip($selectedPlaces, $circus_shapito_vip_price_row);

                
                // Акции боковой первый
                    if($circus_shapito_lateral_first_sector_stock_first_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['first']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_first_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_first_row[0];
                            $selectedPlacesStocks['lateral']['first']['first'] = $circus_shapito_lateral_first_sector_stock_first_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_second_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['second']));
                        if($count == $circus_shapito_lateral_first_sector_stock_second_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_second_row[0];
                            $selectedPlacesStocks['lateral']['first']['second'] = $circus_shapito_lateral_first_sector_stock_second_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_terium_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['terium']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_terium_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_terium_row[0];
                            $selectedPlacesStocks['lateral']['first']['terium'] = $circus_shapito_lateral_first_sector_stock_terium_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_fourth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['fourth']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_fourth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_fourth_row[0];
                            $selectedPlacesStocks['lateral']['first']['fourth'] = $circus_shapito_lateral_first_sector_stock_fourth_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_fifth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['fifth']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_fifth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_fifth_row[0];
                            $selectedPlacesStocks['lateral']['first']['fifth'] = $circus_shapito_lateral_first_sector_stock_fifth_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_sixth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['sixth']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_sixth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_sixth_row[0];
                            $selectedPlacesStocks['lateral']['first']['sixth'] = $circus_shapito_lateral_first_sector_stock_sixth_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_seventh_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['seventh']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_seventh_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_seventh_row[0];
                            $selectedPlacesStocks['lateral']['first']['seventh'] = $circus_shapito_lateral_first_sector_stock_seventh_row[0];
                        }
                    }
                    if($circus_shapito_lateral_first_sector_stock_eighth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['first']['eighth']));
                        if($count >= $circus_shapito_lateral_first_sector_stock_eighth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_eighth_row[0];
                            $selectedPlacesStocks['lateral']['first']['eighth'] = $circus_shapito_lateral_first_sector_stock_eighth_row[0];
                        }
                    }
                    
                // Акции центральный второй
                    if($circus_shapito_central_second_sector_stock_first_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['first']));
                        if($count >= $circus_shapito_central_second_sector_stock_first_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_first_row[0];
                            $selectedPlacesStocks['central']['second']['first'] = $circus_shapito_central_second_sector_stock_first_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_second_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['second']));
                        if($count >= $circus_shapito_central_second_sector_stock_second_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_second_row[0];
                            $selectedPlacesStocks['central']['second']['second'] = $circus_shapito_central_second_sector_stock_second_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_terium_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['terium']));
                        if($count >= $circus_shapito_central_second_sector_stock_terium_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_terium_row[0];
                            $selectedPlacesStocks['central']['second']['terium'] = $circus_shapito_central_second_sector_stock_terium_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_fourth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['fourth']));
                        if($count >= $circus_shapito_central_second_sector_stock_fourth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_fourth_row[0];
                            $selectedPlacesStocks['central']['second']['fourth'] = $circus_shapito_central_second_sector_stock_fourth_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_fifth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['fifth']));
                        if($count >= $circus_shapito_central_second_sector_stock_fifth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_fifth_row[0];
                            $selectedPlacesStocks['central']['second']['fifth'] = $circus_shapito_central_second_sector_stock_fifth_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_sixth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['sixth']));
                        if($count >= $circus_shapito_central_second_sector_stock_sixth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_sixth_row[0];
                            $selectedPlacesStocks['central']['second']['sixth'] = $circus_shapito_central_second_sector_stock_sixth_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_seventh_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['seventh']));
                        if($count >= $circus_shapito_central_second_sector_stock_seventh_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_seventh_row[0];
                            $selectedPlacesStocks['central']['second']['seventh'] = $circus_shapito_central_second_sector_stock_seventh_row[0];
                        }
                    }
                    if($circus_shapito_central_second_sector_stock_eighth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['second']['eighth']));
                        if($count >= $circus_shapito_central_second_sector_stock_eighth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_eighth_row[0];
                            $selectedPlacesStocks['central']['second']['eighth'] = $circus_shapito_central_second_sector_stock_eighth_row[0];
                        }
                    }

                // Акции центральный третий
                    if($circus_shapito_central_tritium_sector_stock_first_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['first']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_first_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_first_row[0];
                            $selectedPlacesStocks['central']['tritium']['first'] = $circus_shapito_central_tritium_sector_stock_first_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_second_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['second']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_second_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_second_row[0];
                            $selectedPlacesStocks['central']['tritium']['second'] = $circus_shapito_central_tritium_sector_stock_second_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_terium_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['terium']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_terium_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_terium_row[0];
                            $selectedPlacesStocks['central']['tritium']['terium'] = $circus_shapito_central_tritium_sector_stock_terium_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_fourth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['fourth']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_fourth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_fourth_row[0];
                            $selectedPlacesStocks['central']['tritium']['fourth'] = $circus_shapito_central_tritium_sector_stock_fourth_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_fifth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['fifth']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_fifth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_fifth_row[0];
                            $selectedPlacesStocks['central']['tritium']['fifth'] = $circus_shapito_central_tritium_sector_stock_fifth_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_sixth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['sixth']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_sixth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_sixth_row[0];
                            $selectedPlacesStocks['central']['tritium']['sixth'] = $circus_shapito_central_tritium_sector_stock_sixth_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_seventh_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['seventh']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_seventh_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_seventh_row[0];
                            $selectedPlacesStocks['central']['tritium']['seventh'] = $circus_shapito_central_tritium_sector_stock_seventh_row[0];
                        }
                    }
                    if($circus_shapito_central_tritium_sector_stock_eighth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['central']['tritium']['eighth']));
                        if($count >= $circus_shapito_central_tritium_sector_stock_eighth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_central_sector_price_eighth_row[0];
                            $selectedPlacesStocks['central']['tritium']['eighth'] = $circus_shapito_central_tritium_sector_stock_eighth_row[0];
                        }
                    }
                // Акции боковой четвертый
                    if($circus_shapito_lateral_fourth_sector_stock_first_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['first']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_first_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_first_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['first'] = $circus_shapito_lateral_fourth_sector_stock_first_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_second_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['second']));
                        if($count == $circus_shapito_lateral_fourth_sector_stock_second_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_second_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['second'] = $circus_shapito_lateral_fourth_sector_stock_second_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_terium_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['terium']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_terium_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_terium_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['terium'] = $circus_shapito_lateral_fourth_sector_stock_terium_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_fourth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['fourth']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_fourth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_fourth_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['fourth'] = $circus_shapito_lateral_fourth_sector_stock_fourth_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_fifth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['fifth']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_fifth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_fifth_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['fifth'] = $circus_shapito_lateral_fourth_sector_stock_fifth_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_sixth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['sixth']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_sixth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_sixth_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['sixth'] = $circus_shapito_lateral_fourth_sector_stock_sixth_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_seventh_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['seventh']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_seventh_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_seventh_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['seventh'] = $circus_shapito_lateral_fourth_sector_stock_seventh_row[0];
                        }
                    }
                    if($circus_shapito_lateral_fourth_sector_stock_eighth_row[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['lateral']['fourth']['eighth']));
                        if($count >= $circus_shapito_lateral_fourth_sector_stock_eighth_row[0] + 1) {
                            $totalPrice -= $circus_shapito_lateral_sector_price_eighth_row[0];
                            $selectedPlacesStocks['lateral']['fourth']['eighth'] = $circus_shapito_lateral_fourth_sector_stock_eighth_row[0];
                        }
                    }
                // Акции вип зоны
                    if($circus_shapito_sector_vip_row_stock[0] != 0) {
                        $count = count(getSelectedPlaces($selectedPlaces['vip']));
                        if($count >= $circus_shapito_sector_vip_row_stock[0] + 1) {
                            $totalPrice -= $circus_shapito_vip_price_row[0];
                            $selectedPlacesStocks['vip'] = $circus_shapito_sector_vip_row_stock[0];
                        }
                    }
                // добавление в бд после успешной покупки
                    function generateRandomString($length = 9) {
                        // добавляет первую букву, что бы при добавлении в калсс, первым символом была буква
                        $firstLetter = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNPRSTUVWXYZ', ceil(1/strlen($x)) )),1,1);
                        return $firstLetter . substr(str_shuffle(str_repeat($x='123456789ABCDEFGHIJKLMNPRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
                    }
                    $ticket_number = generateRandomString();
                    
                    function insertBuyTickets($wpdb, $selectedPlaces, $sector, $sectionName, $row, $ticket_number, $selectedPlacesStocks, $bdPrice, $id, $n_circus_shapito_sold_seats, $phone, $email) {
                        if($sector != 'vip') {
                            if(!empty($selectedPlaces[$sector][$sectionName][$row])) {
                                
                                $section = $sector.'_'.$sectionName;
                                for($i = 0; $i < count($selectedPlaces[$sector][$sectionName][$row]); $i++) {
                                    $place = $selectedPlaces[$sector][$sectionName][$row][$i];
                                    
                                    if($selectedPlacesStocks[$sector][$sectionName][$row] > 0) {
                                        $price = 0;
                                        $stock = $selectedPlacesStocks[$sector][$sectionName][$row];
                                        $selectedPlacesStocks[$sector][$sectionName][$row] = 0;
                                    } else {
                                        $price = $bdPrice[0];
                                        $stock = 0;
                                    }
            
                                    $wpdb->insert(
                                        $n_circus_shapito_sold_seats,
                                        array ( 'id_event' => $id[0],
                                                'ticket_number' => $ticket_number,
                                                'section' => $section,
                                                'row' => $row,
                                                'place' => $place,
                                                'price' => $price,
                                                'phone' => $phone,
                                                'email' => $email,
                                                'stock' => $stock
                                            ),
                                            array ( '%d', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s' )
                                    );
                                }
                            }
                        } else if( $sector == 'vip') {
                            if(count($selectedPlaces[$sector]) > 0) {
                                
                                for($i = 0; $i < count($selectedPlaces[$sector]); $i++) {
                                    $place = $selectedPlaces[$sector][$i];
                                    
                                    if($selectedPlacesStocks[$sector] > 0) {
                                        $price = 0;
                                        $stock = $selectedPlacesStocks[$sector];
                                        $selectedPlacesStocks[$sector] = 0;
                                    } else {
                                        $price = $bdPrice[0];
                                        $stock = 0;
                                    }
            
                                    $nameRow = '';
                                    if($place == 1) $nameRow = 'first';
                                    else if ($place == 2) $nameRow = 'second';
                                    else if ($place == 3) $nameRow = 'terium';
                                    else if ($place == 4) $nameRow = 'fourth';
                                    else if ($place == 5) $nameRow = 'fifth';
                                    else if ($place == 6) $nameRow = 'sixth';
                                    else if ($place == 7) $nameRow = 'seventh';
                                    else if ($place == 8) $nameRow = 'eighth';
                                    else if ($place == 9) $nameRow = 'nine';
                                    else if ($place == 10) $nameRow = 'ten';
                                    else if ($place == 11) $nameRow = 'eleven';
                                    else if ($place == 12) $nameRow = 'twelve';
                                    else if ($place == 13) $nameRow = 'thirteen';

                                    $wpdb->insert(
                                        $n_circus_shapito_sold_seats,
                                        array ( 'id_event' => $id[0],
                                                'ticket_number' => $ticket_number,
                                                'section' => $sector,
                                                'row' => $nameRow,
                                                'place' => $place,
                                                'price' => $price,
                                                'phone' => $phone,
                                                'email' => $email,
                                                'stock' => $stock
                                            ),
                                            array ( '%d', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s' )
                                    );
                                }
                            }
                        }
                    }

                /* 
                    Здесь происходит интеграция с платежной системой
                    В зависимости от кодов ответа реализовать соответсвующее ответы для пользователя
                    Если оплата прошла удачно, то должно происходить добавление информации в бд,
                    и отправка билета на почту. (В условии ниже просто заменить true на ответ платежки) 
                    и желательно сделать проверки что добавление в бд происходит без ошибок.

                    И после успеха оплаты и добавления в бд, полбзователя должно перенаправлять на страницу с информацией о его покупке
                */
                if(true) {
                    //вставка боковой первый сектор
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'first',   $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_first_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'second',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_second_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'terium',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_terium_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'fourth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_fourth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'fifth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_fifth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'sixth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_sixth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'seventh', $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_seventh_row, $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'first', 'eighth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_eighth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);

                    //вставка центральный второй сектор
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'first',   $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_first_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'second',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_second_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'terium',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_terium_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'fourth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_fourth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'fifth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_fifth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'sixth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_sixth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'seventh', $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_seventh_row, $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'second', 'eighth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_eighth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);

                    //вставка центральный третий сектор
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'first',   $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_first_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'second',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_second_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'terium',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_terium_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'fourth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_fourth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'fifth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_fifth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'sixth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_sixth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'seventh', $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_seventh_row, $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'central', 'tritium', 'eighth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_central_sector_price_eighth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);

                    //вставка боковой четвертый сектор
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'first',   $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_first_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'second',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_second_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'terium',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_terium_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'fourth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_fourth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'fifth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_fifth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'sixth',   $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_sixth_row,   $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'seventh', $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_seventh_row, $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);
                        insertBuyTickets($wpdb, $selectedPlaces, 'lateral', 'fourth', 'eighth',  $ticket_number, $selectedPlacesStocks, $circus_shapito_lateral_sector_price_eighth_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);

                        insertBuyTickets($wpdb, $selectedPlaces, 'vip', '', '', $ticket_number, $selectedPlacesStocks, $circus_shapito_vip_price_row,  $circus_shapito_event_id, $n_circus_shapito_sold_seats, $phone, $email);

                        
                }
            }
        }
    }
?>
            <div class="all_price">
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_first_row[0] ?>" class="central_sector_price_first_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_second_row[0] ?>" class="central_sector_price_second_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_terium_row[0] ?>" class="central_sector_price_terium_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_fourth_row[0] ?>" class="central_sector_price_fourth_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_fifth_row[0] ?>" class="central_sector_price_fifth_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_sixth_row[0] ?>" class="central_sector_price_sixth_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_seventh_row[0] ?>" class="central_sector_price_seventh_row" />
                <input type="hidden" value="<?= $circus_shapito_central_sector_price_eighth_row[0] ?>" class="central_sector_price_eighth_row" />

                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_first_row[0] ?>" class="lateral_sector_price_first_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_second_row[0] ?>" class="lateral_sector_price_second_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_terium_row[0] ?>" class="lateral_sector_price_terium_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_fourth_row[0] ?>" class="lateral_sector_price_fourth_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_fifth_row[0] ?>" class="lateral_sector_price_fifth_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_sixth_row[0] ?>" class="lateral_sector_price_sixth_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_seventh_row[0] ?>" class="lateral_sector_price_seventh_row" />
                <input type="hidden" value="<?= $circus_shapito_lateral_sector_price_eighth_row[0] ?>" class="lateral_sector_price_eighth_row" />

                <input type="hidden" value="<?= $circus_shapito_vip_price_row[0] ?>" class="vip_price_row" />
            </div>
                <div class="circus_dome_wrapper_content">
                <div class="dome_header_wrapper">
                <div class="dome_header">
                    <div class="dome_header_sector">
                        <h4>Боковые сектора</h4>
                        <div clas="lateral_price">
                            <div class="price_row wrapper_price_row_one">
                                <div>Первый ряд</div>
                                <div class="price_row_one price_row_item"><?= $circus_shapito_lateral_sector_price_first_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_two">
                                <div>Второй ряд</div>
                                <div class="price_row_two price_row_item"><?= $circus_shapito_lateral_sector_price_second_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_three">
                                <div>Третий ряд</div>
                                <div class="price_row_three price_row_item"><?= $circus_shapito_lateral_sector_price_terium_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_four">
                                <div>Четвертый ряд</div>
                                <div class="price_row_four price_row_item"><?= $circus_shapito_lateral_sector_price_fourth_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_five">
                                <div>Пятый ряд</div>
                                <div class="price_row_five price_row_item"><?= $circus_shapito_lateral_sector_price_fifth_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_sixth">
                                <div>Шестой ряд</div>
                                <div class="price_row_sixth price_row_item"><?= $circus_shapito_lateral_sector_price_sixth_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_seven">
                                <div>Седьмой ряд</div>
                                <div class="price_row_seven price_row_item"><?= $circus_shapito_lateral_sector_price_seventh_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_eighth">
                                <div>Восьмой ряд</div>
                                <div class="price_row_eighth price_row_item"><?= $circus_shapito_lateral_sector_price_eighth_row[0] ?> р</div>
                            </div>
                        </div>
                    </div>
                    <div class="dome_header_sector">
                        <h4>Центральные сектора</h4>
                        <div class="central_price">
                            <div class="price_row wrapper_price_row_one">
                                <div>Первый ряд</div>
                                <div class="price_row_one price_row_item"><?= $circus_shapito_central_sector_price_first_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_two">
                                <div>Второй ряд</div>
                                <div class="price_row_two price_row_item"><?= $circus_shapito_central_sector_price_second_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_three">
                                <div>Третий ряд</div>
                                <div class="price_row_three price_row_item"><?= $circus_shapito_central_sector_price_terium_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_four">
                                <div>Четвертый ряд</div>
                                <div class="price_row_four price_row_item"><?= $circus_shapito_central_sector_price_fourth_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_five">
                                <div>Пятый ряд</div>
                                <div class="price_row_five price_row_item"><?= $circus_shapito_central_sector_price_fifth_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_sixth">
                                <div>Шестой ряд</div>
                                <div class="price_row_sixth price_row_item"><?= $circus_shapito_central_sector_price_sixth_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_seven">
                                <div>Седьмой ряд</div>
                                <div class="price_row_seven price_row_item"><?= $circus_shapito_central_sector_price_seventh_row[0] ?> р</div>
                            </div>
                            <div class="price_row wrapper_price_row_eighth">
                                <div>Восьмой ряд</div>
                                <div class="price_row_eighth price_row_item"><?= $circus_shapito_lateral_sector_price_eighth_row[0] ?> р</div>
                            </div>
                        </div>
                    </div>
                    <div class="dome_header_sector">
                        <h4>Вип ложа</h4>
                        <div class="vip_price"><?= $circus_shapito_vip_price_row[0] ?> р</div>
                    </div>
                    <div class="dome_header_sector">
                        <h4 style="color: gray">Серый цвет - занятые места</h4>
                    </div>
                    <div class="dome_header_sector">
                        <h4>Активные акции</h4>
                        <div class="dome_header_active_stock_wrapper">
                            <div class="dome_header_active_stock">
                            <?php
                            if( count($lateral_first_stock) === 0 &&
                                count($central_second_stock) === 0 && 
                                count($central_tritium_stock) === 0 && 
                                count($lateral_fourth_stock) === 0 && 
                                count($vip_row_stock) === 0) {
                                    echo '<div style="color:gray">Активных акций нет</div>';
                            } else {
                                if(count($lateral_first_stock) > 0) {
                                    echo  "<div style=\"font-weight: bold\">Боковой первый сектор:</div>";
                                    for($i = 0; $i < count($lateral_first_stock); $i++) {
                                    ?>
                                    <div><?= $lateral_first_stock[$i][0] .': '. $lateral_first_stock[$i][1]?></div>
                                    <?php
                                    }
                                }
                                if(count($central_second_stock) > 0) {
                                    echo  "<div style=\"font-weight: bold\">Центральный второй сектор:</div>";
                                    for($i = 0; $i < count($central_second_stock); $i++) {
                                        ?>
                                        <div><?= $central_second_stock[$i][0] .': '. $central_second_stock[$i][1]?></div>
                                        <?php
                                    }
                                }
                                if(count($central_tritium_stock) > 0) {
                                    echo  "<div style=\"font-weight: bold\">Центральный третий сектор:</div>";
                                    for($i = 0; $i < count($central_tritium_stock); $i++) {
                                        ?>
                                        <div><?= $central_tritium_stock[$i][0] .': '. $central_tritium_stock[$i][1]?></div>
                                        <?php
                                    }
                                }
                                if(count($lateral_fourth_stock) > 0) {
                                    echo  "<div style=\"font-weight: bold\">Боковой четвертый сектор:</div>";
                                    for($i = 0; $i < count($lateral_fourth_stock); $i++) {
                                        ?>
                                        <div><?= $lateral_fourth_stock[$i][0] .': '. $lateral_fourth_stock[$i][1]?></div>
                                        <?php
                                    }
                                }
                                if(count($vip_row_stock) > 0) {
                                    echo  "<div style=\"font-weight: bold\">Вип ложа:</div>";
                                    for($i = 0; $i < count($vip_row_stock); $i++) {
                                        ?>
                                            <div><?= $vip_row_stock[$i][0] .': '. $vip_row_stock[$i][1]?></div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                get_template_part('includes/components/dome/dome');
                ?>
                <div class="dome_footer_wrapper">
                <div class="dome_footer">
                    <div class="dome_footer_event_name"><?= removeBackSlash($circus_shapito_name_event_name_events[0]); ?></div>
                    <div class="dome_footer_event_location">Место проведения: <?= removeBackSlash($circus_shapito_event_location[0]) ?></div>
                    <div class="dome_footer_event_date">Дата проведения: <?= date("d.m.Y", strtotime($event_date)); ?></div>
                    <div class="dome_footer_event_timeStart">Время начала по Московскому времени:<br> <?= date("H:i", strtotime($circus_shapito_event_timestart[0])); ?></div>
                    <div class="dome_footer_event_selected_place_wrapper">
                        <div class="dome_footer_event_selected_place_header">
                            Выбранные места
                        </div>
                    </div>
                    <div class="dome_footer_event_price_wrapper">Итоговая цена: 
                        <span class="dome_footer_event_price">0</span> р.
                    </div>
                    <form action="" method="post" class="dome_footer_form">
                        <input type="tel" name="tel" class="dome_footer_tel" placeholder="Введите телефон" required>
                        <input type="email" name="email" class="dome_footer_email" placeholder="Введите почту" required>
                        <input type="submit" name="button" class="dome_footer_button" value="Перейти к оплате">
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
    }else {
        echo $return_to_home;
    }
    } else {
        echo $return_to_home;
    }
} else {
    echo $return_to_home;
}

    

    
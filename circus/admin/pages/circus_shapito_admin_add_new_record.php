<?php 
$message = '';
$message_status = '';
if(isset($_POST['button'])) {
        
        global $wpdb;

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
   
        $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

        $table_prefix = $wpdb->get_blog_prefix();
        $dateInputCount = (count($_POST) - 3) / 2;
        
        function circus_shapito_insert_values_in_event ($wpdb, $table_prefix, $dateInputCount) {
            $name_show = htmlspecialchars(trim($_POST['nameShow']));
            $callback_circus_shapito_name_event = $wpdb->insert(
                $table_prefix . 'circus_shapito_name_event',
                array ( 'name_event' => $name_show, 
                    ),
                array ( '%s')
            );
            if($callback_circus_shapito_name_event === false) return -1;
            else if($callback_circus_shapito_name_event === 1) {
            
            $id_name_event = $wpdb->insert_id;

            for($i = 1; $i <= $dateInputCount; $i++) {
                $callback_circus_shapito_event = $wpdb->insert(
                    $table_prefix . 'circus_shapito_event',
                    array ( 'id_name_event' => $id_name_event, 
                            'location' => htmlspecialchars(trim($_POST['location'])), 
                            'date' => htmlspecialchars(trim($_POST['date_'.$i])),
                            'time_start' => htmlspecialchars(trim($_POST['timeStart_'.$i])),
                        ),
                    array ( '%d', '%s', '%s', '%s')
                );
                if($callback_circus_shapito_event === false) return -1;
                else if($callback_circus_shapito_event === 1) {
                    //последний вставленный айди
                    $last_id = $wpdb->insert_id;

                    $callback_circus_shapito_vip_price = $wpdb->insert(
                        $table_prefix . 'circus_shapito_vip_price',
                        array ( 'id_event' => $last_id, 
                            ),
                        array ( '%d')
                    );
                    if($callback_circus_shapito_vip_price === false) return -1;
                    else if($callback_circus_shapito_vip_price === 1) {
                        $callback_circus_shapito_lateral_sector_price = $wpdb->insert(
                            $table_prefix . 'circus_shapito_lateral_sector_price',
                            array ( 'id_event' => $last_id, 
                                ),
                            array ( '%d')
                        );
                        if($callback_circus_shapito_lateral_sector_price === false) return -1;
                        else if($callback_circus_shapito_lateral_sector_price === 1) {
                            $callback_circus_shapito_central_sector_price = $wpdb->insert(
                                $table_prefix . 'circus_shapito_central_sector_price',
                                array ( 'id_event' => $last_id, 
                                    ),
                                array ( '%d')
                            );
                            if($callback_circus_shapito_central_sector_price === false) return -1;
                            else if($callback_circus_shapito_central_sector_price === 1) {
                                //акции боковой первый сектор
                                $callback_circus_shapito_lateral_first_sector_stock = $wpdb->insert(
                                    $table_prefix . 'circus_shapito_lateral_first_sector_stock',
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
                                if($callback_circus_shapito_lateral_first_sector_stock === false) return -1;
                                else if($callback_circus_shapito_lateral_first_sector_stock === 1) {
                                    //акции центральный второй сектор
                                    $callback_circus_shapito_central_second_sector_stock = $wpdb->insert(
                                        $table_prefix . 'circus_shapito_central_second_sector_stock',
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
                                    if($callback_circus_shapito_central_second_sector_stock === false) return -1;
                                    else if($callback_circus_shapito_central_second_sector_stock === 1) {
                                        //акции центральный третий сектор
                                        $callback_circus_shapito_central_tritium_sector_stock = $wpdb->insert(
                                            $table_prefix . 'circus_shapito_central_tritium_sector_stock',
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
                                        if($callback_circus_shapito_central_tritium_sector_stock === false) return -1;
                                        else if($callback_circus_shapito_central_tritium_sector_stock === 1) {
                                            //акции боковой четвертый сектор
                                            $callback_circus_shapito_lateral_fourth_sector_stock = $wpdb->insert(
                                                $table_prefix . 'circus_shapito_lateral_fourth_sector_stock',
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
                                            if($callback_circus_shapito_lateral_fourth_sector_stock === false) return -1;
                                            else if($callback_circus_shapito_lateral_fourth_sector_stock === 1) {
                                                //акции вип сектор
                                                $callback_circus_shapito_sector_vip_row_stock = $wpdb->insert(
                                                    $table_prefix . 'circus_shapito_sector_vip_row_stock',
                                                    array ( 'id_event' => $last_id, 
                                                            'vip_row' => '',
                                                        ),
                                                    array ( '%d', '%d' )
                                                );
                                                if($callback_circus_shapito_sector_vip_row_stock === false) return -1;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
            


            
        }
        $circus_shapito_insert_values_in_event_result = circus_shapito_insert_values_in_event($wpdb, $table_prefix, $dateInputCount);
        if($circus_shapito_insert_values_in_event_result != -1) {
            $message = 'Запись добавлена! Перед окончательной публикацией - зайдите в раздел "Все записи", отредактируйте если это требуется и нажмите опубликовать';
            $message_status = 'success';
        } else {
            $message = 'Произошла ошибка! Проверте правильность заполнения полей, если проблема не решилась то, напишите разработчику, предоставив скриншоты и описав последовательность выполнения ваших действий.';
            $message_status = 'error';
        }
}
    
?>
<div class="circus_container">
    <div class="circus_header">
        <h2>Добавить новое событие</h2>
    </div>
    <div class="circus_body">
        <div class="success_message message_status_<?=$message_status?>"><?= $message ?></div>
        <form action="#" method="POST">
            <div class="message_status_attention">Формат названия шоу должно быть:<br> Цирк-шапито "Звездный" с шоу "Территория тигров" в г.Чита с 25 сентября по 18 октября!</div>
            <p>НАЗВАНИЕ ШОУ *</p><input type="text" name="nameShow" required size="50px" placeholder="Название шоу">
            <div class="message_status_attention">Указать полный адрес проведения, пример:<br> г.Чита, ул. Ленина 15</div>
            <p>МЕСТО ПРОВЕДЕНИЯ *</p><input type="text" name="location" required size="50px" placeholder="Место проведения">
            
            <div class="inputTimeWrapper">
                <div class="message_status_attention">
                    ВРЕМЯ УКАЗЫВАТЬ СТРОГО ПО МОСКОВСКОМУ ЧАСОВОМУ ПОЯСУ!!!
                </div>
                <div class="inputTime"> 
                    <div>Дата *<input type="date" required name="date_1"></div>
                    <div>Время начала *<input type="time" required name="timeStart_1"></div>
                </div>
            </div>
            <div class="button addMoreDate">Добавить еще одну дату</div>
            <div class="inputTimeRemove button" style="height:20px;">Удалить последнию дату</div><br>
            <input type="submit" name="button" value="Добавить" class="button">
        </form>
    </div>
</div>



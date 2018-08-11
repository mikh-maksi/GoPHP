<?php

add_action('admin_menu', 'register_scavenger_menu_page');

function register_scavenger_menu_page()
{
    add_menu_page(
        'Scavenger',
        'Scavenger',
        'manage_options',
        'scavenger_page',
        'scavenger_menu_page',
        plugins_url('contact-form-7-db-scavenger/images/icon.png'),
        75
    );

    add_submenu_page(
        'scavenger_page',
        "Get all email's",
        "Get all email's",
        'manage_options',
        'scavenger_all_emails',
        'all_emails'
    );
}

function scavenger_menu_page()
{
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/css/uikit.almost-flat.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/css/components/form-select.almost-flat.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/css/components/datepicker.almost-flat.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/js/uikit.min.js"></script>
    <script src="<?php echo plugins_url('contact-form-7-db-scavenger/js/xlsx.min.js');?>"></script>
    <script src="<?php echo plugins_url('contact-form-7-db-scavenger/js/FileSaver.min.js');?>"></script>
    <script src="<?php echo plugins_url('contact-form-7-db-scavenger/js/xlsx.min.js');?>"></script>
    <script src="http://malsup.github.io/jquery.blockUI.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/js/components/form-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/js/components/datepicker.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#load_data').click(function () {
                var form_name = jQuery('#form_name').val();
                var rows = jQuery('#rows').val();
                var from = jQuery('#from').val();
                var to = jQuery('#to').val();

                if(from != ''){
                    var myDate = from;
                    myDate=myDate.split(".");
                    var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                    from = new Date(newDate).getTime();
                }
                if(to != ''){
                    var myDate = to;
                    myDate=myDate.split(".");
                    var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                    to = new Date(newDate).getTime();
                }
                if((to == '' && from == '') && to < from)
                {
                    alert("Wrong time stamp");
                    return;
                }
                else if( from == to && (to != '' && from == ''))
                {
                    alert("Wrong time stamp");
                    return;
                }
                jQuery('#result_table').block();
                jQuery.ajax({
                    url: '<?php echo site_url()?>/wp-admin/admin-ajax.php',
                    type: "POST",
                    data: {
                        'action': 'cf7dbs_data',
                        'form_name': form_name,
                        'rows':rows,
                        'from': from,
                        'to': to
                    }
                })
                    .done(function (result) {
                        jQuery('#get_xlsx').prop('disabled',false);
                        jQuery('#result_table').html(result);
                        jQuery('#result_table').unblock();
                    });
            });

            jQuery('#get_xlsx').click(function () {

                //var count_cells = 0;
                var data = new Array();
                var temp_data = new Array();
                jQuery('th').each(function(){
                    temp_data.push(jQuery(this).text());
                });
                data.push(temp_data);

                jQuery('tbody tr').each(function()
                {
                    temp_data = new Array();
                    jQuery(this).find('td').each(function(){
                       temp_data.push(jQuery(this).text());
                    });
                    data.push(temp_data);
                });

                /* add worksheet to workbook */
                var wb = new Workbook(), ws = sheet_from_array_of_arrays(data);
                var ws_name = "SheetJS";
                wb.SheetNames.push(ws_name);
                wb.Sheets[ws_name] = ws;
                var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
                saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), "export.xlsx")
            });

            function s2ab(s) {
            	var buf = new ArrayBuffer(s.length);
            	var view = new Uint8Array(buf);
            	for (var i=0; i!=s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
            	return buf;
            }

            function Workbook() {
            	if(!(this instanceof Workbook)) return new Workbook();
            	this.SheetNames = [];
            	this.Sheets = {};
            }

            function sheet_from_array_of_arrays(data, opts) {
	            var ws = {};
	            var range = {s: {c:10000000, r:10000000}, e: {c:0, r:0 }};
	            for(var R = 0; R != data.length; ++R) {
	            	for(var C = 0; C != data[R].length; ++C) {
	            		if(range.s.r > R) range.s.r = R;
	            		if(range.s.c > C) range.s.c = C;
	            		if(range.e.r < R) range.e.r = R;
	            		if(range.e.c < C) range.e.c = C;
	            		var cell = {v: data[R][C] };
	            		if(cell.v == null) continue;
	            		var cell_ref = XLSX.utils.encode_cell({c:C,r:R});

	            		if(typeof cell.v === 'number') cell.t = 'n';
	            		else if(typeof cell.v === 'boolean') cell.t = 'b';
	            		else if(cell.v instanceof Date) {
	            			cell.t = 'n'; cell.z = XLSX.SSF._table[14];
	            			cell.v = datenum(cell.v);
	            		}
	            		else cell.t = 's';

	            		ws[cell_ref] = cell;
	            	}
	            }
	            if(range.s.c < 10000000) ws['!ref'] = XLSX.utils.encode_range(range);
	            return ws;
            }
        });
    </script>
    <h1 class="uk-margin-top-large"><img
            src="<?php echo plugins_url('contact-form-7-db-scavenger/images/logo.png'); ?>"> Scavenger</h1>
    <div class="uk-container uk-container-center uk-margin-top-large">
        <form class="">

            <legend><h2>Search in Data Base (Form: <select id="form_name">
                        <?php
                        global $wpdb;
                        $table_name = $wpdb->prefix . 'cf7dbplugin_submits';
                        $qry = "SELECT DISTINCT form_name FROM " . $table_name;
                        $states = $wpdb->get_results($qry);
                        foreach ($states as $row) {
                            echo '<option value="' . $row->form_name . '">' . $row->form_name . '</option>';
                        }
                        ?>

                    </select>)
                    <input type="button" style="margin-left: 20px;" id="get_xlsx" value="Get .XLSX" disabled>
                </h2></legend>
            <hr class="uk-article-divider">
            <div class="uk-grid">
                <div class="uk-width-1-3">
                    <label for="from">From</label>
                    <input type="text" id="from" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                </div>
                <div class="uk-width-1-3">
                    <label for="to">To</label>
                    <input type="text" id="to" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                </div>
                <div class="uk-width-1-3">
                    <label for="rows">Rows:</label>
                    <select id="rows">
                        <option value="1">1</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="all" selected>All</option>
                    </select>
                    <input type="button" id="load_data" value="Search">
                </div>
            </div>
        </form>

        <table class="uk-table uk-table-striped" id="result_table">

        </table>
    </div>
    <?php
}

function all_emails()
{
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/css/uikit.almost-flat.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.23.0/js/uikit.min.js"></script>
    <script src="<?php echo plugins_url('contact-form-7-db-scavenger/js/xlsx.min.js');?>"></script>
    <script src="<?php echo plugins_url('contact-form-7-db-scavenger/js/FileSaver.min.js');?>"></script>
    <script src="<?php echo plugins_url('contact-form-7-db-scavenger/js/xlsx.min.js');?>"></script>
       <script>
        jQuery(document).ready(function () {
            jQuery('#get_xlsx').click(function () {

                //var count_cells = 0;
                var data = new Array();
                var temp_data = new Array();
                temp_data.push('email');
                data.push(temp_data);
                temp_data = new Array();
                jQuery('.uk-list li').each(function(){
                    temp_data.push(jQuery(this).text());
                    data.push(temp_data);
                    temp_data = new Array();
                });

                jQuery('tbody tr').each(function()
                {
                    temp_data = new Array();
                    jQuery(this).find('td').each(function(){
                       temp_data.push(jQuery(this).text());
                    });
                    data.push(temp_data);
                });

                /* add worksheet to workbook */
                var wb = new Workbook(), ws = sheet_from_array_of_arrays(data);
                var ws_name = "SheetJS";
                wb.SheetNames.push(ws_name);
                wb.Sheets[ws_name] = ws;
                var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
                saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), "export_all_email.xlsx")
            });

            function s2ab(s) {
            	var buf = new ArrayBuffer(s.length);
            	var view = new Uint8Array(buf);
            	for (var i=0; i!=s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
            	return buf;
            }

            function Workbook() {
            	if(!(this instanceof Workbook)) return new Workbook();
            	this.SheetNames = [];
            	this.Sheets = {};
            }

            function sheet_from_array_of_arrays(data, opts) {
	            var ws = {};
	            var range = {s: {c:10000000, r:10000000}, e: {c:0, r:0 }};
	            for(var R = 0; R != data.length; ++R) {
	            	for(var C = 0; C != data[R].length; ++C) {
	            		if(range.s.r > R) range.s.r = R;
	            		if(range.s.c > C) range.s.c = C;
	            		if(range.e.r < R) range.e.r = R;
	            		if(range.e.c < C) range.e.c = C;
	            		var cell = {v: data[R][C] };
	            		if(cell.v == null) continue;
	            		var cell_ref = XLSX.utils.encode_cell({c:C,r:R});

	            		if(typeof cell.v === 'number') cell.t = 'n';
	            		else if(typeof cell.v === 'boolean') cell.t = 'b';
	            		else if(cell.v instanceof Date) {
	            			cell.t = 'n'; cell.z = XLSX.SSF._table[14];
	            			cell.v = datenum(cell.v);
	            		}
	            		else cell.t = 's';

	            		ws[cell_ref] = cell;
	            	}
	            }
	            if(range.s.c < 10000000) ws['!ref'] = XLSX.utils.encode_range(range);
	            return ws;
            }
        });
    </script>
     <h1 class="uk-margin-top-large"><img
            src="<?php echo plugins_url('contact-form-7-db-scavenger/images/logo.png'); ?>"> Scavenger</h1>
    <div class="uk-container uk-container-center uk-margin-top-large">
        <form class="">

            <legend><h2>Search in Data Base for all email's<input type="button" style="margin-left: 20px;" id="get_xlsx" value="Get .XLSX"></h2></legend>
            <ul class="uk-list uk-list-striped">
                    <?php
                        global $wpdb;
                        $table_name = $wpdb->prefix . 'cf7dbplugin_submits';
                        $qry = "SELECT DISTINCT field_value FROM " . $table_name;
                        $states = $wpdb->get_results($qry);
                        foreach ($states as $row) {
                            if (filter_var($row->field_value, FILTER_VALIDATE_EMAIL)) {
                                echo '<li>'.$row->field_value.'</li>';
                            }
                        }
                    ?>
            </ul>
    <?php
}

/**
 *
 */
function return_data()
{
    $form_name = $_POST['form_name'];
    $rows = $_POST['rows'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf7dbplugin_submits';
    $qry = "SELECT DISTINCT field_name FROM " . $table_name . " WHERE form_name='" . $form_name . "'  AND field_name != 'Submitted Login' AND field_name != 'Submitted From' ORDER BY field_order ASC";
    $table_names = $wpdb->get_results($qry);
    $names = array();
    ?>
    <thead>
<tr>
    <th>Date</th>
    <?php
    foreach ($table_names as $row):?>
        <th><?php $names[] = $row->field_name; echo $row->field_name;?></th>
        <?php endforeach;
    ?>
</tr>
    </thead><?php
    $limit = '';
    $where_statement = '';
    if($rows != 'all')
    {
        $limit = ' LIMIT '.$rows*count($names);
    }
    if($from != '')
    {
        $where_statement .= " AND submit_time > '".substr($from,0,10)."'";
    }
    if($to != '')
    {
        $where_statement .= " AND submit_time < '".substr($to,0,10)."'";
    }
    $qry = "SELECT submit_time,field_name,field_value FROM " . $table_name . " WHERE form_name='" . $form_name . "'".$where_statement." AND field_name != 'Submitted Login' AND field_name != 'Submitted From'  ORDER BY submit_time ASC".$limit;
    $table_names = $wpdb->get_results($qry);
    $result_table = array();
    $temp_table = array();
    $count = 0;
    foreach ($table_names as $row){
           $temp_table['date']= date('d.m.Y H:i:s',$row->submit_time);
           $temp_table[$row->field_name] = $row->field_value;
           $count++;
           if($count == count($names))
           {
                echo $count;
                $count=0;
                $result_table[] = $temp_table;
                $temp_table = array();
           }
    }
    ?>
    <tbody>
    <?php
    foreach ($result_table as $row):?>
        <tr>
            <td><?php echo $row['date']; ?></td>
            <?php foreach($names as $name):?>
            <td><?php echo $row[$name]; ?></td>
            <?php endforeach;?>
        </tr>
    <?endforeach;
}

add_action('wp_ajax_cf7dbs_data', 'return_data');


?>
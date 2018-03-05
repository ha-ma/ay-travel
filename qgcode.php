<?php
/**
 * Quote Generator Plus
 * ====================
 * Quote Generator
 * Motto: "Our software will change your business life for the better."
 * The Quote Generator system allows your customer to conveniently receive instant quotes and place orders online.
 * @author      Original author: Vitaliy Zakhodylo <quotegeneratorplus@gmail.com>
 * @license     Code and contributions have Copyright (c) 2016
 *              More details: LICENSE.txt
 * @link        Homepage:     http://QuoteGeneratorPlus.com
 * @version     1.4
 */

$arrsize = 34;
$bgrd = "#fefefe";
$textout='';
$nval = array();
$colspan = 6;
$doshow=0;

$nowyear = date("Y");
$nowmonth = date("m");
$finename = 'calendar/'.$nowyear.'_'.$nowmonth.'.csv';

$file_dato = sprintf("%s/quotegenerator/templates/orderform.xml", plugins_url());
$file_data = sprintf("%s/quotegenerator/templates/datatable.xml", plugins_url());
$file_data2 = "wp-content/plugins/quotegenerator/templates/datatable.xml";
$form_data = "wp-content/plugins/quotegenerator/templates/orderform.xml";
$file_time = sprintf("%s/quotegenerator/templates/time.xml", plugins_url());
$file_csv = sprintf("%s/quotegenerator/templates/".$finename, plugins_url());
$local_csv = 'wp-content/plugins/quotegenerator/templates/'.$finename;
$findate = sprintf("%s/quotegenerator/templates/findate.php", plugins_url());
$file_ppl = sprintf("%s/quotegenerator/templates/paypal.xml", plugins_url());
$paypalf = sprintf("%s/quotegenerator/templates/payment/", plugins_url());
$md5 = sprintf("%s/quotegenerator/templates/md5.js", plugins_url());


if (!file_exists($local_csv)) {
    $myfilen = fopen($local_csv, "w");
    fwrite($myfilen, '2016,12,24,09:00 AM,Marry Christmas'.html_entity_decode("\r\n"));
    fclose($myfilen);
}

if (!file_exists($file_data2)) {
     $myfilen2 = fopen($file_data2, "w");
     fwrite($myfilen2, '<?xml version="1.0" encoding="UTF-8"?><myXMLList>  </myXMLList>');
     fclose($myfilen2);
}

if (!file_exists($form_data)) {
     $myfilen = fopen($form_data, "w");
     fwrite($myfilen, '<?xml version="1.0" encoding="UTF-8"?><myXMLList>  <ListItem>    <c0>Online Order</c0>    <c1>Name</c1>    <c2>E-mail</c2>    <c3>Address</c3>    <c4>Phone</c4>    <c5>When do You need the service?</c5>    <c6>Time</c6>    <c7>1</c7>    <c8>Best time to contact you?</c8>    <c9></c9>    <c10></c10>    <c11></c11>    <c12>Memo</c12>    <c13>Captcha</c13>  </ListItem>  <ListItem>    <c0>show</c0>    <c1>show</c1>    <c2>show</c2>    <c3>show</c3>    <c4>show</c4>    <c5>hide</c5>    <c6>hide</c6>    <c7>show</c7>    <c8>hide</c8>    <c9>hide</c9>    <c10>hide</c10>    <c11>hide</c11>    <c12>show</c12>    <c13>show</c13>  </ListItem>   </myXMLList>');
     fclose($myfilen);
}



//$findate = 'wp-content/plugins/quotegenerator/templates/findate.php';

  for($qx=1;$qx<=$arrsize;$qx++){
      $nval[$qx] = get_option( 'setting_qg'.$qx, $default );
      if(strtolower($nval[$qx])=='hide'){
        $nval[$qx] = 'display:none;';
        $colspan--;
      }
      if(strtolower($nval[$qx])=='show'){
        $nval[$qx] = '';
      }
  }
 
  if($nval[21]!='' && intval($nval[22])>0){
     $show_tax2 = '';
  }else{
     $show_tax2 = 'display:none;';
  }
  if($nval[23]!='' && intval($nval[24])>0){
     $show_tax3 = '';
  }else{
     $show_tax3 = 'display:none;';
  }
  
  function set_html_content_type() {
	return 'text/html';
  }
  
   
   
   
   // -------------- Submit Email -----------------
   if(isset($_POST['oqgb2'])){
    
      $ip = $_SERVER['REMOTE_ADDR'];
      $todayDate = date("Y-m-d H:i:s");
      
      $textouts = '<table style="background:#f5f5f5;color:#555555;margin:0px 0px 6px 0px;width:100%;">';
      $textouts .= '<tr><td style="padding:2px;">Date: '.$todayDate.'</td></tr>';
      $dbfild = '';
      $dbtextouts = '';
      $dbtotl = '';
      
      for($xc=1; $xc<13; $xc++){
	  $nods = "oqgb".$xc;
	  $nodd = $_POST[$nods];
	  $dbfild .= "'".$nodd."',";
	  if($nodd !=""){
	     $textouts .= '<tr><td style="padding:0px 0px 0px 12px;text-align: left;">'.$nodd.'</td></tr>';
	  }
      }
    
      $textouts .= '<tr><td style="padding:0px 0px 0px 12px;text-align: left;">IP: '.$ip.'</td></tr></table>';

      $textouts .= '<table style="text-align: center;width:'. $nval[1].';background: '. $nval[2].'; border:'.$nval[3].'; font-size: '. $nval[8].'; color: '. $nval[7].';">';
      $textouts .= '<tr><th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[25].'</th> <th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[26].'</th> <th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[27].'('. $nval[18].')</th> <th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[28].'</th><th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[29].'('. $nval[18].')</th><th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[30].'('. $nval[18].')</th></tr>';
       $dbtextouts .= '<tr><th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[25].'</th> <th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[26].'</th> <th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[27].'('. $nval[18].')</th> <th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[28].'</th><th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[29].'('. $nval[18].')</th><th style="color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].';text-align: center;">'. $nval[30].'('. $nval[18].')</th></tr>';
       
       $vals = array('');
       $valnames = array('','Subtotal','Discount','Total before Tax',$nval[19],$nval[21],$nval[23],'Total');
       
       for($x=0; $x<$_POST['qgb11']; $x++){
           if ($x%2==0){ $bgr = "#ffffff";}else{ $bgr = "#f7f7f7";}
           if(intval($_POST['amnt'.$x])>0){
	      $textouts .= '<tr style="background: '.$bgr.'"><td>'.($x+1).'</td><td>'.$_POST['name'.$x].'</td><td>'.$_POST['price'.$x].'</td><td>'.$_POST['qty'.$x].'</td><td>'.$_POST['discnt'.$x].'</td><td>'.$_POST['amnt'.$x].'</td></tr>';
	      $dbtextouts .= '<tr style="background: '.$bgr.'"><td>'.($x+1).'</td><td>'.$_POST['name'.$x].'</td><td>'.$_POST['price'.$x].'</td><td>'.$_POST['qty'.$x].'</td><td>'.$_POST['discnt'.$x].'</td><td>'.$_POST['amnt'.$x].'</td></tr>';
           }
           
       }
       
       for($x=1; $x<8; $x++){
           if ($x%2==0){ $bgr = "#f5f5f5";}else{ $bgr = "#f0f0f0";}
           if ($x==7)  { $bgr = $nval[6].';color:'. $nval[4].';';}
	   $nod = 'qgb'.$x;
	   $vals[$x] = $_POST[$nod];
	   $dbtotl .= "'".$_POST[$nod]."',";
	   
           if(intval($vals[$x])>0){
               $textouts .= '<tr style="background: '.$bgr.'"><td colspan="5" style="text-align: right;">'.$valnames[$x].'</td><td>'.$vals[$x].'</td></tr>';
           }
       }
       
       $textouts .= '</table>';
       $textouts2 .= '<table><tr><td style="color:green;font-size:28px;text-align: center;width:'. $nval[1].';padding:10px;background: #efefef;">Your Order has been Submited!</td></tr></table>';
       
       
       add_filter( 'wp_mail_content_type', 'set_html_content_type' );
       $body ='<html><head><title>Online Order</title></head><body>'.$textouts.'</body></html>';
       $subject = 'Online Order';
       $to = get_option( 'admin_email');
       
       wp_mail( $to, $subject, $body );
       remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

       //----------------------------------------------------------
       global $wpdb;
       $tbname = "qg_orders";
       $ofields = '';
       for($ff=1;$ff<12;$ff++){$ofields .= 'field_'.$ff.' VARCHAR(64),'; $ofields2 .= 'field_'.$ff.',';}
       
       $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.$tbname." (
         id mediumint(9) NOT NULL AUTO_INCREMENT,
	 order_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,".$ofields."
	 field_12 VARCHAR(255),
	 ip VARCHAR(32) DEFAULT '' NOT NULL,
	 data_field text,
	 subtotal VARCHAR(32),
	 discount VARCHAR(32),
	 total_before_tax VARCHAR(32),
	 tax_1 VARCHAR(32),
	 tax_2 VARCHAR(32),
	 tax_3 VARCHAR(32),
	 total VARCHAR(32),
	 visible VARCHAR(9),
         UNIQUE KEY id (id)
         );";
       $wpdb->query($sql);
       
       $dbtextouts = mysql_real_escape_string($dbtextouts);
       //$dbfild = mysql_real_escape_string($dbfild);
       $dbtotl = rtrim($dbtotl,",");
       $visible = "yes";
       
       $sql2 = "INSERT INTO ".$wpdb->prefix.$tbname." (order_date,".$ofields2."field_12,ip,data_field,subtotal,discount,total_before_tax,tax_1,tax_2,tax_3,total,visible) VALUES('$todayDate',".$dbfild."'$ip','$dbtextouts',".$dbtotl.",'$visible')";
       $wpdb->query($sql2) or die (mysql_error());
       
       //---------------- Message to Calendar -----------------------------

      //echo getcwd();
       if(isset($_POST['oqgb5'])){
	if($_POST['oqgb5']!=""){
	    
          $ps = explode("-", $_POST['oqgb5']);
          $nowyears = $ps[2];
          $nowmonths = $ps[1];
       
          $local_csv ='calendar/'.$nowyears.'_'.$nowmonths.'.csv';
          $local_csv = 'wp-content/plugins/quotegenerator/templates/'.$local_csv;
       
           if (file_exists($local_csv)) {
               $filel = fopen($local_csv, "r+");
           }else{
               $filel = fopen($local_csv, "w");
           }
       
          $outl = $ps[2].','.$ps[1].','.$ps[0].','.$_POST['oqgb6'].',Order #'.$_POST['oqgb7'].html_entity_decode("\r\n");
          fseek($filel, 0, SEEK_END);
          fputs($filel, $outl);
          fclose($filel);
	}
       }

       //------------------- Add number -----------------------------------
          $total_nods = 14;
	  $dom2x = new DomDocument();
	  $datax2x = file_get_contents($file_dato);
	  $dom2x->loadXML($datax2x);
	  $s2x = simplexml_import_dom($dom2x);
	  $xml2x = new DomDocument('1.0','UTF-8');
	  $xml2x->formatOutput = true;
	  $dataout2x = $xml2x->appendChild($xml2x->createElement('myXMLList'));
	  
	  $title = $dataout2x->appendChild($xml2x->createElement('ListItem'));
           for($xi=0;$xi<$total_nods;$xi++){
	     if($xi==7){
		$c = $title->appendChild($xml2x->createElement("c7"));
		$datx = intval($s2x->ListItem[0]->c7)+1;
                $text = $c->appendChild($xml2x->createTextNode($datx));
	     }else{
		$nod = 'c'.$xi;
                $c = $title->appendChild($xml2x->createElement($nod));
                $text = $c->appendChild($xml2x->createTextNode($s2x->ListItem[0]->$nod));
	     }
               
           }
           $title = $dataout2x->appendChild($xml2x->createElement('ListItem'));
           for($xi=0;$xi<$total_nods;$xi++){
               $nod = 'c'.$xi;
               $c = $title->appendChild($xml2x->createElement($nod));
               $text = $c->appendChild($xml2x->createTextNode($s2x->ListItem[1]->$nod));
           }  
	  
	  $xml2x->save('wp-content/plugins/quotegenerator/templates/orderform.xml');       
       
 
       
       echo $textouts2.$textouts; // Show final Order
       
       
       //-------------- Deposit -------------------------------------------
      

	  $domd = new DomDocument();
	  $dataxd = file_get_contents($file_ppl);
          $domd->loadXML($dataxd);
          $sd = simplexml_import_dom($domd);
       
          $deposit= trim($sd->ListItem[0]->c1);
          $depositx = number_format(floatval($vals[7])* floatval($deposit)/100, 2);
          $deposits = intval(floatval($vals[7])* floatval($deposit));
          
	  if($depositx>0){
	    
            $ppemail= trim($sd->ListItem[0]->c0);
            $cur = trim($sd->ListItem[0]->c2);
	    $livepkey = trim($sd->ListItem[0]->c3);
       
            $deposit_out ='<table style="width:100%;background: #ffffff;margin-top:9px;color: #666666;font-size:10px;"> <tr><td colspan="2" style="background: #9BB092;color:111111;font-size:12px;"> Required deposit: $'.$depositx.' &nbsp; </td></tr>';
            $deposit_out.='<tr>';
          
	    if($ppemail!=''){
	       $deposit_out.='<td style="text-align: left;">&nbsp; &nbsp; <img src="../wp-content/plugins/quotegenerator/templates/images/paypal.png" width="197" height="90" border="0" style="display:block;"/><br>&nbsp; &nbsp; <a href="'.$paypalf.'?id='.$_POST["oqgb7"].'&pln='.$_POST["oqgb2"].'&em='.$depositx.'&prn='.$ppemail.'&cnsy='.$cur.'">Click HERE to make payment.</a></td>';
	    }
	  
	    if($livepkey!=''){
               $deposit_out.='<td style="text-align:center;"> <img src="../wp-content/plugins/quotegenerator/templates/images/stripe.png" width="197" height="90" border="0" style="display:block;"/><br>
       <form action="/charge" method="POST"><script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="'.$livepkey.'"
    data-image="../wp-content/plugins/quotegenerator/templates/images/marketplace.png"
    data-name="'.site_url().'"
    data-description="Online Order '.$_POST["oqgb7"].'"
    data-amount="'.$deposits.'"
    data-currency="'.$cur.'"
    data-locale="auto"
    data-email="'.$_POST["oqgb2"].'"></script></form> </td>';
	    }
            $deposit_out.='</tr>';
       
            $deposit_out.='</table>';
       
            echo $deposit_out;
          }

       //exit(); // The End
       $doshow=1;

   } //--------------- End of Submited Order ------------------------------
    

    
    
    
    
   //--------------- Read XML data file -----------------------------------
   
   //$file_csvdata0 = wp_remote_get($file_csv);
   //$file_csvdata = $file_csvdata0['body'];
   //$file_csv_data = preg_replace('/\n/',"UUU",$file_csvdata);
   
   $dom = new DomDocument();
   $data = file_get_contents($file_data);
   $dom->loadXML($data); 
   $s = simplexml_import_dom($dom);  
   $i = 0;
   
   $style_calc ='background-color: transparent;border:0;padding:4px;width:70px;text-align:right; font-size:'. $nval[8].';color:'. $nval[7].';';
   $style_qntt2 = 'width:180px;text-align:left;margin-left:5px;font-size: '. $nval[8].';color: '. $nval[7].'; background: #f8f1b8;padding:0px 2px 0px 5px; ';
   $style_but = ' background: '. $nval[33].'; height: 28px;color : '. $nval[34].';text-decoration: none;border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius:3px;border:1px solid #999999;text-align: center; width:180px;padding:0px;';
   $thstyle = 'border:none; color:'. $nval[4].'; font-size: '. $nval[5].'; background: '. $nval[6].'; text-align: center;vertical-align: text-top;';
   $imageinfo = sprintf("%s/quotegenerator/templates/images/info.png", plugins_url());
   
   
   while ($s->ListItem[$i]) {
    
           $textout.='<tr><td colspan="'. $colspan.'" style="background-color: transparent;border:0;font-size: 5px;padding:0;height:5px;"> </td></tr>';
           $textout.='<tr style="background:'.$nval[9].';"><td style="'.$thstyle.'">'.($i+1).'</td><td style="text-align: left;vertical-align: text-top;border:none;"><input name="name'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c0.'" /><div style="background-color: transparent;width: 100%; padding:0px 0px 0px 3px; border: none; text-align: left; font-size: '. $nval[8].'; color: '. $nval[7].';">'.$s->ListItem[$i]->c0.'</div>';
           
           if($s->ListItem[$i]->c1!=''){
              $textout2='&nbsp; <img src="'. $imageinfo.'" width="16" height="16" alt="Info" onmouseover="showdesc(1,'.$i.');" onmouseout="showdesc(2,'.$i.');">';
           }else{
              $textout2='';
           }
           
           $textout.= $textout2;
           
           $textout.='<div id="descrpt'.$i.'" style="display:none;position: fixed; font-size:12px;color:#666666;padding:10px;text-align: justify; line-height: 100%;font-family: Arial; width:300px;background-color: #efefef;border:3px solid '. $nval[6].';">'.$s->ListItem[$i]->c1.'</div></td>';
           
           $textout.='<td style="border: none; padding:0px; vertical-align: middle;'. $nval[13].'"><input name="price'.$i.'" type="text" value="'.$s->ListItem[$i]->c2.'" style="background-color: transparent; padding:2px 0px 2px 0px; width: 55px;  border: none; text-align: center; font-size: '. $nval[8].'; color: '. $nval[7].';" /><input name="taxb'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c4.'" /></td>';
           
           $textout.='<td style="vertical-align: middle;border: none;text-align: center;padding:2px 0px 2px 0px;">';
           
           $max_qty = intval($s->ListItem[$i]->c3);
           if($max_qty == 1){
               $textout.=' <input name="checkqty'.$i.'" id="checkqty'.$i.'" type="checkbox" style="width:17px; height:17px;text-align: center;background: #f8f1b8;" onClick="calclat('.$i.');" onkeypress="handle(this,event)">';
               $textout.=' <input name="qty'.$i.'" type="hidden" value="" style="width: 55px;padding:2px 0px 2px 0px;text-align: center;font-size:'.$nval[8].';color:'.$nval[7].';background: #f8f1b8;" onchange="calclat(this)" onkeypress="handle(this,event)"/>';
           }else{
               $textout.=' <input name="qty'.$i.'" type="text" value="" style="width: 55px;padding:2px 0px 2px 0px;text-align: center;font-size:'. $nval[8].';color:'. $nval[7].';background: #f8f1b8;" onchange="calclat(this)" onkeypress="handle(this,event)"/>';
           }
                    
           $textout.='</td>';
           $textout.='<td style="vertical-align: middle;padding:0px;border: none;padding:2px 0px 2px 0px;'. $nval[10].'"><input name="discnt'.$i.'" type="text" value="" style="background-color: transparent; width: 55px; padding:2px 0px 2px 0px; border: none; text-align: center;  font-size: '. $nval[8].'; color: '. $nval[7].';" /> <input name="disa'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c6.'" /> <input name="disb'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c7.'" /> <input name="disc'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c8.'" /> <input name="disd'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c9.'" /> <input name="dise'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c10.'" /> <input name="disf'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c11.'" /> <input name="disg'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c12.'" />  <input name="disj'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c13.'" /> <input name="dish'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c14.'" />  <input name="disprs'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c16.'" />  <input name="disord'.$i.'" type="hidden" value="'.$s->ListItem[$i]->c15.'" /></td><td style="vertical-align: middle;border: none;padding:0px;width: 74px;text-align: center;"><input name="amnt'.$i.'" type="text" value="0" style="background-color: transparent; width: 70px; border: none;border-width: 0;border-style: none;padding:2px; text-align: right;font-size:'. $nval[8].'; color: '. $nval[7].';" /></td></tr>';
      $i++;
   }

   
//-------------------- Read Calendar ---------------------------

$myfilec = fopen($local_csv, "r");
$calendar_event = mysql_real_escape_string(fread($myfilec,filesize($local_csv)));
fclose($myfilec);
  
//----------------------- Time table ---------------------------
   $time_array = '';
   $time_out = '';
   $dom4 = new DomDocument();
   $data4 = file_get_contents($file_time);
   $dom4->loadXML($data4); 
   $s4 = simplexml_import_dom($dom4);  
   $i4 = 0;

   while ($s4->ListItem[$i4]) {
          $time_out .= '<option value="'.$s4->ListItem[$i4]->c0.'"> '.$s4->ListItem[$i4]->c0.' </option>';
	  $time_array .= '"'.$s4->ListItem[$i4]->c0.'",';
          $i4++;
   }
   
   $time_array = rtrim($time_array,",");
//---------------------------------------------------------------

if($doshow==0){
?>
<form method="post" id="quotegen" name="quotegen" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  <script src="<?php echo $md5; ?>"></script>
  <script type="text/javascript">
    var totalelements = "<?php echo $i; ?>";
    var time_array = new Array(<?php echo $time_array; ?>);
     
     function isInArray(value, array) {
       return array.indexOf(value) > -1;
     }
     
    
    function showdesc(nod,idd) {
        var sstyle = "block";
        if (nod==1) {
            sstyle = "block";
        }else{
            sstyle = "none";
        }
        document.getElementById("descrpt"+idd).style.display = sstyle;
    }
    
    function handle(txt,e){
        if(e.keyCode === 13){
           calclat(txt);
        }
        return false;
    }
    
    function calclat(txt){
         var getent = txt.value;
        
         if (parseFloat(getent) > 0) {
            //value is OK
         }else{
            txt.value = "0";
         }
         
         if (totalelements>0) {
           document.quotegen.qgb11.value = totalelements;
           var pr = new Array;
           var qtty = new Array;
           var amt = new Array;
           var subtotal = 0;
           var ord_disc = new Array;
           var prs_disc = new Array;
           var qty_disc = new Array;
           
           var dss1 = new Array;
           var dss2 = new Array;
           var dss3 = new Array;
           var dss4 = new Array;
           var dss5 = new Array;
           var dss6 = new Array;
           var dss7 = new Array;
           var dss8 = new Array;
           var dss9 = new Array;
           var nods ='';
           
           for(var strt=0; strt<totalelements; strt++){
               pr[strt] = eval("document.quotegen.price"+strt+".value");
               qtty[strt] = eval("document.quotegen.qty"+strt+".value");
               
               nods = "checkqty"+strt;
                if (document.getElementById(nods)) {
                  if (document.getElementById(nods).checked) {
                      qtty[strt] = 1;
                      nods = "document.quotegen.qty"+strt+".value = 1;";
                      eval(nods);
                  }else{
                      qtty[strt] = 0;
                      nods = "document.quotegen.qty"+strt+".value = 0;";
                      eval(nods);
                  }
                }
               
               
               amt[strt] = 0;
               ord_disc[strt] = eval("document.quotegen.disord"+strt+".value");
               prs_disc[strt] = eval("document.quotegen.disprs"+strt+".value");
               
               dss1[strt] = eval("document.quotegen.disa"+strt+".value");
               dss2[strt] = eval("document.quotegen.disb"+strt+".value");
               dss3[strt] = eval("document.quotegen.disc"+strt+".value");
               dss4[strt] = eval("document.quotegen.disd"+strt+".value");
               dss5[strt] = eval("document.quotegen.dise"+strt+".value");
               dss6[strt] = eval("document.quotegen.disf"+strt+".value");
               dss7[strt] = eval("document.quotegen.disg"+strt+".value");
               dss8[strt] = eval("document.quotegen.disj"+strt+".value");
               dss9[strt] = eval("document.quotegen.dish"+strt+".value");
               qty_disc[strt] = 0;
               
               if (parseFloat(pr[strt])>0 && parseFloat(qtty[strt])>0) {
                
                   if (parseFloat(qtty[strt])>=parseFloat(dss1[strt]) && parseFloat(qtty[strt])<=parseFloat(dss2[strt]) && parseFloat(dss3[strt])>0 && !isNaN(qtty[strt]) && !isNaN(dss1[strt]) && !isNaN(dss2[strt]) && !isNaN(dss3[strt])) {
                       qty_disc[strt] = (parseFloat(pr[strt])*parseFloat(qtty[strt]))*dss3[strt]/100;
                   }else if (parseFloat(qtty[strt])>=parseFloat(dss4[strt]) && parseFloat(qtty[strt])<=parseFloat(dss5[strt]) && parseFloat(dss6[strt])>0 && !isNaN(qtty[strt]) && !isNaN(dss4[strt]) && !isNaN(dss5[strt]) && !isNaN(dss6[strt])) {
                       qty_disc[strt] = (parseFloat(pr[strt])*parseFloat(qtty[strt]))*dss6[strt]/100;
                   }else if (parseFloat(qtty[strt])>=parseFloat(dss7[strt]) && parseFloat(qtty[strt])<=parseFloat(dss8[strt]) && parseFloat(dss9[strt])>0 && !isNaN(qtty[strt]) && !isNaN(dss7[strt]) && !isNaN(dss8[strt]) && !isNaN(dss9[strt])) {
                       qty_disc[strt] = (parseFloat(pr[strt])*parseFloat(qtty[strt]))*dss9[strt]/100;
                   }
                   
                   amt[strt] = (parseFloat(pr[strt])*parseFloat(qtty[strt])) - qty_disc[strt];
               }
               
            var fnkd = "document.quotegen.discnt"+strt+".value = qty_disc["+strt+"].toFixed(2);";
            eval(fnkd);   
            var fnk = "document.quotegen.amnt"+strt+".value = amt["+strt+"].toFixed(2);";
            eval(fnk);
           }
           
           subtotal = amt.reduce(function(pv, cv) { return pv + cv; }, 0);
           document.quotegen.qgb1.value = subtotal.toFixed(2);
           
           var discount = 0;
           var order_discount = new Array;
           for(strt=0; strt<totalelements; strt++){
              if (parseFloat(ord_disc[strt]) <= subtotal) {
                  order_discount[strt] = amt[strt] * parseFloat(prs_disc[strt])/100;
              }
            
           }
           discount = order_discount.reduce(function(pv, cv) { return pv + cv; }, 0);
           document.quotegen.qgb2.value = discount.toFixed(2);
           
           var t_befor_tax = 0;
           var tax1a = '<?php echo $nval[20]; ?>';
           if (parseFloat(tax1a)>=0) { }else{tax1a=0;}
           var tax1 = 0;
           var tax2a = '<?php echo $nval[22]; ?>';
           if (parseFloat(tax2a)>=0) { }else{tax2a=0;}
           var tax2 = 0;
           var tax3a = '<?php echo $nval[24]; ?>';
           if (parseFloat(tax3a)>=0) { }else{tax3a=0;}
           var tax3 = 0;
           
           var total_amount = 0;
           
           t_befor_tax = subtotal - discount;
           document.quotegen.qgb3.value = t_befor_tax.toFixed(2);
           
           tax1 = t_befor_tax * parseFloat(tax1a)/100;
           document.quotegen.qgb4.value = tax1.toFixed(2);
           tax2 = t_befor_tax * parseFloat(tax2a)/100;
           document.quotegen.qgb5.value = tax2.toFixed(2);
           tax3 = t_befor_tax * parseFloat(tax3a)/100;
           document.quotegen.qgb6.value = tax3.toFixed(2);
           
           total_amount = t_befor_tax + tax1 + tax2 + tax3;
           document.quotegen.qgb7.value = total_amount.toFixed(2);
         }
         
 
    }
    
    function submitf() {
       if( parseFloat(document.quotegen.qgb7.value)>0 ) {
           document.getElementById("subord").style.display = "block";
           document.getElementById("buttn1").style.display = "none";
           return true;
       }else{
           alert("Please fill out this form.");
           return false;
       }
    }
    
    function submitform() {

       var mmm = document.quotegen.oqgb2.value;
       var wersion = document.quotegen.oqgb13.value;
       
       if (typeof CryptoJS.MD5 != 'function') {
             alert("Probably the Server is overloaded, down or unreachable because of a network problem, outage or a website maintenance is in progress. Please wait 1 second and try again.");
	     return false;
       }else if (document.quotegen.oqgb1.value==""){
	     alert("Please enter your Name!");
	     return false;
       } else if ((mmm.indexOf("@") == -1)||(mmm.indexOf(".") == -1)){ 
	     alert("Please enter valid Email Address!");
	     return false;
       }else if (CryptoJS.MD5(wersion) != document.quotegen.oqgb20.value) {
             alert("The reCaptcha code was incorrect.");
	     document.quotegen.oqgb13.value = "";
             return false;
       
       }
       //alert("OK");
       document.quotegen.method = "POST";
       document.quotegen.submit();
       return true;
    }
    
    
    
//================= Calendar Event ===================================    
    
var mySplitXt=new Array;
var Cyy=new Array;
var Cmm=new Array;
var Cdd=new Array;
var Ctt=new Array;
var Caa=new Array;

var nwid = 18;
var nhei = 25;
var nfont = 'font-size:10px; font-family: Arial; color:#111111; text-align:center; background:#f0f0f0;';

var now = new Date;
var sccd=now.getDate();
var sccm=now.getMonth();
var sccy=now.getFullYear();
var ccm=now.getMonth();
var ccy=now.getFullYear();
var selectedd, selectedm, selectedy;
var updobj;
var mn=new Array('January','February','March','April','May','June','July','August','September','October','November','December');
var mnn=new Array('31','28','31','30','31','30','31','31','30','31','30','31');
var mnl=new Array('31','29','31','30','31','30','31','31','30','31','30','31');
var calvalarr=new Array(42);
var datetoday = '';


document.write('<div id="fc" style="display:none;position: absolute;left: 50%;z-index: 1;"><table style="font-family: Arial; width:290px; background:#fff; border:1px solid #999; table-layout:fixed; border-spacing: 2px; border-collapse: separate;position: relative; left: -50%;">');

document.write('<tr style="background:#635548;"><td style="cursor:pointer;font-size:20px;color:#fff;text-align:center;" onclick="upmonth(-1)"> &laquo; </td><td colspan="5" id="mns" style="text-align:center;font-size:16px;color:#fff;"></td><td style="cursor:pointer; font-size:20px; color:#fff; text-align:center;" onclick="upmonth(1)"> &raquo; </td></tr>');

document.write('<tr><td style="'+nfont+'">Sun</td><td style="'+nfont+'">Mon</td><td style="'+nfont+'">Tue</td><td style="'+nfont+'">Wed</td><td style="'+nfont+'">Thu</td><td style="'+nfont+'">Fri</td><td style="'+nfont+'">Sat</td></tr>');

  for(var kk=1;kk<=6;kk++) {
	  document.write('<tr>');
	  for(var tt=1;tt<=7;tt++) {
		num=7 * (kk-1) - (-tt);
		document.write('<td id="v' + num + '" style="vertical-align: text-top;width:'+parseInt(nwid)+'px;height:'+parseInt(nhei)+'px; word-wrap:break-word;"></td>');
	  }
	  document.write('</tr>');
          datetoday = addnull(sccd,sccm+1,sccy);
  }

document.write('</table></div>');
//document.all?document.attachEvent('onclick',checkClick):document.addEventListener('click',checkClick,false);


function AssignDateList(TheData) {
   var mySplitRt = TheData.split("\n");
   x1=0;

   for(i = 0; i < mySplitRt.length; i++){
	   mySplitXt = mySplitRt[i].split(",");
	   if (mySplitXt.length == 5){
		   Cyy[x1] = mySplitXt[0];
		   Cmm[x1] = mySplitXt[1];
		   Cdd[x1] = mySplitXt[2];
		   if(mySplitXt[3] ==''){Ctt[x1]=''}else{Ctt[x1]= mySplitXt[3];}
		   Caa[x1] = mySplitXt[4];
		   x1++;
            }
   }
}

        
function getObj(objID) {
    if (document.getElementById) {return document.getElementById(objID);}
    else if (document.all) {return document.all[objID];}
    else if (document.layers) {return document.layers[objID];}
    return true;
}

function checkClick(e) {
	e?evt=e:evt=event;
	CSE=evt.target?evt.target:evt.srcElement;
	if (CSE.tagName!='SPAN')	
	if (getObj('fc'))
		if (!isChild(CSE,getObj('fc')))
			getObj('fc').style.display='none';
}

function isChild(s,d) {
	while(s) {
		if (s==d) 
			return true;
		s=s.parentNode;
	}
	return false;
}

function Top(obj){
	var curtop = 0;
	if (obj.offsetParent)	{
		while (obj.offsetParent){
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	}
	else if (obj.y)
		curtop += obj.y;
	return curtop;
}

function lcs(ielem) {
	updobj=ielem;   
        getObj('fc').style.top = (Top(ielem)+ielem.offsetHeight-260)+'px';
	getObj('fc').style.display='';
	curdt=ielem.value;
	curdtarr=curdt.split('-');
	isdt=true;
	for(var k=0;k<curdtarr.length;k++) {
		if (isNaN(curdtarr[k]))
			isdt=false;
	}
	if (isdt&(curdtarr.length==3)) {
		ccm=curdtarr[1]-1;
		ccy=curdtarr[2];
		selectedd=parseInt ( curdtarr[0], 10 );
		selectedm=parseInt ( curdtarr[1]-1, 10 );
		selectedy=parseInt ( curdtarr[2], 10 );
		prepcalendar(curdtarr[0],curdtarr[1]-1,curdtarr[2]);
	}
}

function evtTgt(e){
	var el;
	if(e.target)el=e.target;
	else if(e.srcElement)el=e.srcElement;
	if(el.nodeType==3)el=el.parentNode; // defeat Safari bug
	return el;
}

function EvtObj(e){  if(!e)e=window.event;return e;}
function cs_over(e) {evtTgt(EvtObj(e)).style.background='#FFFFFF';}
function cs_out(e) { evtTgt(EvtObj(e)).style.background='#eeeeee';}
function cs_click(e) {
	updobj.value=calvalarr[evtTgt(EvtObj(e)).id.substring(1,evtTgt(EvtObj(e)).id.length)];
	getObj('fc').style.display='none';
        checkcal();
}

function f_cps(obj) {
	obj.style.background='transparent';
	obj.style.font='10px Arial';
	obj.style.textAlign='left';
	obj.style.textDecoration='none';
	obj.style.border='none'; //1px solid #999999
	obj.style.cursor='pointer';
}


// day selected
function prepcalendar(hd,cm,cy) {
	now=new Date();
	sd=now.getDate();
	td=new Date();
	td.setDate(1);
	td.setFullYear(cy);
	td.setMonth(cm);
	cd=td.getDay();
	var col='#333333';
	var pos=0;
        var s='';
        var x1 = 0;
        //var DateList = loadFile("<?php echo $file_csv; ?>");
        var DateList = "<?php echo $calendar_event; ?>";
        AssignDateList(DateList);

        var chekday='';
	
        getObj('mns').innerHTML = mn[cm]+' &nbsp; '+cy+' &nbsp; ';
        
	marr=((cy%4)==0)?mnl:mnn;
	for(var d=1;d<=42;d++) {
		f_cps(getObj('v'+parseInt(d)));
		if ((d >= (cd -(-1)))&&(d<=cd-(-marr[cm]))) {
			dip=((d-cd < sd)&&(cm==sccm)&&(cy==sccy));
			htd=((hd!='')&&(d-cd==hd));

			getObj('v'+parseInt(d)).onmouseover=cs_over;
			getObj('v'+parseInt(d)).onmouseout=cs_out;
			getObj('v'+parseInt(d)).onclick=cs_click;
			
                        col='#003300';
                        var newbgr = '#efefef';
			
                        if ((sccm == cm && sccd == (d-cd) && sccy == cy)){// if today
			    col='#ffff00'; //006600 0f3
                            newbgr = '#cfcfcf';
                        }
			// if selected date
			if (cm == selectedm && cy == selectedy && selectedd == (d-cd) )	{
			    getObj('v'+parseInt(d)).style.background = newbgr; //sellll
                            getObj('v'+parseInt(d)).onmouseout=null;
			}
                        s='';
 
			for(pos=0;pos<Cyy.length; pos++){
			    if((Cdd[pos]==(d-cd) && Cmm[pos]==(cm+1) && Cyy[pos]==cy)){
                                s+='<br />'+Ctt[pos]+' '+Caa[pos];
                                chekday = Caa[pos].toLowerCase().trim();
                                if (chekday == 'fully booked' || chekday == 'closed' || chekday == 'not available') {
                                    col = '#ff0000';
                                    newbgr = '#FFA8A8';
                                    getObj('v'+d).innerHTML='&nbsp;';
			            getObj('v'+parseInt(d)).onmouseover=null;
			            getObj('v'+parseInt(d)).onmouseout=null;
			            getObj('v'+parseInt(d)).onclick=null;
			            getObj('v'+parseInt(d)).style.cursor='default';
                                    
                                }
                                
                            }   
			}
                        getObj('v'+parseInt(d)).style.background = newbgr;
			getObj('v'+parseInt(d)).style.color=col;
			//getObj('v'+parseInt(d)).style.fontSize='10px';
                        //getObj('v'+parseInt(d)).innerHTML='<label><strong style=" font-size: 22px;">'+(d-cd)+'</strong></label>'+s;

                        getObj('v'+parseInt(d)).innerHTML='<span style="font-size: 14px; background:transparent; cursor:text; padding:0px; margin: 0px; text-decoration: none; vertical-align: text-top;text-align:center;pointer-events: none;">'+(d-cd)+'</span>';
			
                        col='#000000';
			calvalarr[d]=addnull(d-cd,cm-(-1),cy);
		}else {
			getObj('v'+d).innerHTML='&nbsp;';
			getObj('v'+parseInt(d)).onmouseover=null;
			getObj('v'+parseInt(d)).onmouseout=null;
			getObj('v'+parseInt(d)).onclick=null;
			getObj('v'+parseInt(d)).style.cursor='default';
	        }
	}
}


function upmonth(s){
	marr=((ccy%4)==0)?mnl:mnn;
	ccm+=s;
	if (ccm>=12){
		ccm-=12;
		ccy++;
	}else if(ccm<0)	{
		ccm+=12;
		ccy--;
	}
	prepcalendar('',ccm,ccy);
}

function addnull(d,m,y){
	var d0='',m0='';
	if (d<10)d0='0';
	if (m<10)m0='0';
	return ''+d0+d+'-'+m0+m+'-'+y;
}

prepcalendar('',ccm,ccy);

function checkcal() {
    var ress = datetoday.split("-");
    var sellct = document.quotegen.oqgb5.value;
    var sellt = sellct.split("-");
     if (parseInt(ress[2]) > parseInt(sellt[2])) {
        document.quotegen.oqgb5.value ='';
        alert("The date you mentioned has already passed.");
     }else if (parseInt(ress[1]) > parseInt(sellt[1])) {
        document.quotegen.oqgb5.value ='';
        alert("The date you mentioned has already passed.");
     }else if (parseInt(ress[0]) > parseInt(sellt[0]) && parseInt(ress[1]) == parseInt(sellt[1])) {
        document.quotegen.oqgb5.value ='';
        alert("The date you mentioned has already passed.");
     }
     
  findate();
}
//---------------------------------------------------------------------    

function my_function2(){
    var selects = document.getElementById('selectime');
    while(selects.options.length > 0){                
          selects.remove(0);
    }
    
    for (var i = 0; i<time_array.length; i++){
	   var opt = document.createElement('option');
           opt.value = time_array[i];
           opt.innerHTML = time_array[i];
           selects.appendChild(opt);
    }
}


function my_function(dat){
    
  var selects = document.getElementById('selectime');
  if("" != dat){
    var seltime = dat.split(";");
  
    while(selects.options.length > 0){                
          selects.remove(0);
    }
    
    for (var i = 0; i<time_array.length; i++){
	if(isInArray(time_array[i], seltime) == false){    
	   var opt = document.createElement('option');
           opt.value = time_array[i];
           opt.innerHTML = time_array[i];
           selects.appendChild(opt);
	}
    }
  }
  
}

function findate(){
    jQuery(document).ready(function () {
       jQuery(function ($) {
            var folldd = "<?php echo $findate; ?>";
            $.post(folldd, $("#quotegen").serialize(), function(data){
		if(data) {my_function(data);}else{my_function2();}
		});

       });
    });
}    
    
    
    
 </script>

 <table style="text-align: center;padding: 0px;border-spacing: 0;width:<?php echo $nval[1]; ?>;background: <?php echo $nval[2]; ?>; border:<?php echo $nval[3]; ?>; font-size: <?php echo $nval[8]; ?>; color: <?php echo $nval[7]; ?>;">
    <tr>
           <th style="<?php echo $thstyle; ?>"><?php echo $nval[25]; ?></th>
           <th style="<?php echo $thstyle; ?>"><?php echo $nval[26]; ?></th>
           <th style="<?php echo $thstyle; ?><?php echo $nval[13]; ?>"><?php echo $nval[27]; ?>(<?php echo $nval[18]; ?>)</th>
           <th style="<?php echo $thstyle; ?>"><?php echo $nval[28]; ?></th>
           <th style="<?php echo $thstyle; ?><?php echo $nval[10]; ?>"><?php echo $nval[29]; ?></th>
           <th style="<?php echo $thstyle; ?>"><?php echo $nval[30]; ?></th>
    </tr>
    
    <?php echo $textout; ?>
    
    <tr style="background: none;">
        <td colspan="<?php echo $colspan; ?>" style="text-align: right;padding: 10px 10px 0px 100px;border:none;">
        
         <table style="text-align: right; background: #dfdfdf; font-size: <?php echo $nval[8]; ?>; width: 100%;border:none;">
            <tr style="<?php echo $nval[14]; ?>">
             <td style="border:none;text-align: right;padding: 5px;">Subtotal(<?php echo $nval[18]; ?>)</td>
             <td style="border:none;width:90px;"><input name="qgb1" type="text" style="<?php echo $style_calc; ?>" value="0" /></td>
            </tr>
            <tr style="<?php echo $nval[11]; ?>">
             <td style="border:none;text-align: right;padding: 5px;">Discount(<?php echo $nval[18]; ?>)</td>
             <td style="border:none;width:90px;"><input name="qgb2" type="text" style="<?php echo $style_calc; ?>" value="0" /></td>
            </tr>        
            <tr style="<?php echo $nval[15]; ?>">
             <td style="border:none;text-align: right;padding: 5px;">Total before Tax(<?php echo $nval[18]; ?>)</td>
             <td style="border:none;width:90px;"><input name="qgb3" type="text" style="<?php echo $style_calc; ?>" value="0" /></td>
            </tr>
            <tr style="<?php echo $nval[16]; ?>">
             <td style="border:none;text-align: right;padding: 5px;"><?php echo $nval[19]; ?> (<?php echo $nval[20]; ?>%)</td>
             <td style="border:none;width:90px;"><input name="qgb4" type="text" style="<?php echo $style_calc; ?>" value="0" /></td>
            </tr>      
            <tr style="<?php echo $nval[16]; ?><?php echo $show_tax2; ?>">
             <td style="border:none;text-align: right;padding: 5px;"><?php echo $nval[21]; ?> (<?php echo $nval[22]; ?>%)</td>
             <td style="border:none;width:90px;"><input name="qgb5" type="text" style="<?php echo $style_calc; ?>" value="0" /></td>
            </tr>
            <tr style="<?php echo $nval[16]; ?><?php echo $show_tax3; ?>">
             <td style="border:none;text-align: right;padding: 5px;"><?php echo $nval[23]; ?> (<?php echo $nval[24]; ?>%)</td>
             <td style="border:none;width:90px;"><input name="qgb6" type="text" style="<?php echo $style_calc; ?>" value="0" /></td>
            </tr>    
    
            <tr style="color:<?php echo $nval[4]; ?>; background: <?php echo $nval[6]; ?>;">
             <td style="border:none;text-align: right;padding: 5px;font-weight: bold;">Total(<?php echo $nval[18]; ?>)</td>
             <td style="border:none;width:90px;border: 0px solid #000;">
               <input name="qgb7" type="text" style="<?php echo $style_calc; ?>color:<?php echo $nval[4]; ?>;" value="0" />
               <input name="qgb11" type="hidden" value="" />
             </td>
            </tr>
        </table>
            
       </td>
    </tr>
    
    <tr>
        <td colspan="<?php echo $colspan; ?>" style="border:none;background:none;height: 5px;"> </td>
    </tr>
    <tr>
        <td colspan="<?php echo $colspan; ?>" style="border:none;padding: 10px;text-align: center;background:<?php echo $nval[9]; ?>;">
            <input type="button" id="buttn1" style="<?php echo $style_but; ?>" onClick="submitf();" value="<?php echo $nval[31]; ?>">
        </td>
    </tr>
       
 </table>
 
 
 
    <div id="subord" style="display:none;width:310px;background: #ffffff; margin: -260px 0px 100px 5px; padding: 7px;position: relative;">
        <table style="width:290px;text-align:center;background:<?php echo $nval[2]; ?>;border:3px solid <?php echo $nval[6]; ?>;font-size:<?php echo $nval[8]; ?>; padding: 5px;">
	
	<?php
	     
             $domo = new DomDocument();
             $dato = file_get_contents($file_dato);
             $domo->loadXML($dato); 
             $so = simplexml_import_dom($domo);
	     $order_f ='';
	     
	     $rend = array(rand(0, 9),rand(0, 9),rand(0, 9));
             $showme = '<span style="font-size: 14px;margin-left:26px;background:#e0e0e0;padding:3px;">'.$rend[0].'&nbsp;<span style="font-size: 20px;font-style: italic;">'.$rend[1].'</span>&nbsp;<span style="font-size: 17px;font-style: bold;">'.$rend[2].'</span></span>';
             $showme2 = md5($rend[0].$rend[1].$rend[2]);
	     
	     if($so->ListItem[1]->c0 == "show"){
	        $order_f .='<tr><th colspan="2" style="text-align:center;border:none;background: #eeeeee;padding:2px;">'.$so->ListItem[0]->c0.' #'.$so->ListItem[0]->c7.' </th></tr>';
	     }
	     
	     for($zx=1;$zx<14;$zx++){ 
		 $nd = "c".$zx;
		 $node1 = $so->ListItem[0]->$nd;
		 $node2 = $so->ListItem[1]->$nd;
		 
		 if($node2=='show'){
		    
		   if($zx==5) {
		       $order_f .='<tr><td colspan="2" style="text-align:left;border:none;padding:2px;">'. $node1.'<input name="oqgb'.$zx.'" type="text" style="'.$style_qntt2.'width:80px;" value="" onFocus="this.select();lcs(this);" onclick="event.cancelBubble=true;this.select();lcs(this);" /></td></tr>';
		   }else if($zx==6){
		    
		       $order_f .='<tr><td style="text-align:right;border:none;padding:2px;">'. $node1.'</td><td style="border:none;text-align:left;padding:2px;"><select id="selectime" name="oqgb'.$zx.'" style="'.$style_qntt2.'">'.$time_out.'</select></td></tr>';
		   
		   }else if($zx==7){
		     //skip the number
		       $order_f .='<input name="oqgb'.$zx.'" type="hidden" value="'.$so->ListItem[0]->c7.'" />';
		   }else if($zx==12){
		       $order_f .='<tr><td style="text-align:right;border:none;vertical-align: text-top;padding:2px;">'. $node1.'</td><td style="border:none;text-align:left;padding:2px;"><textarea name="oqgb'.$zx.'" style="'. $style_qntt2.'height:40px;width:180px;"></textarea></td></tr>';
		   }else if($zx==13){
		       $order_f .='<tr style="background: #f8f8f8;"><td style="text-align:right;border:none;padding:2px;">'. $node1.'</td><td style="border:none;text-align:left;padding:2px;">'.$showme.' <input name="oqgb'.$zx.'" type="text" style="'.$style_qntt2.'width:50px;margin-left:25px;" value="" /><br><span style="margin-left:40px;">Type the numbers.</span></td></tr>';
		   
		   }else{
		       $order_f .='<tr><td style="text-align:right;border:none;padding:2px;">'. $node1.'</td><td style="border:none;text-align:left;padding:2px;"><input name="oqgb'.$zx.'" type="text" style="'.$style_qntt2.'" value="" /></td></tr>';
		   }
		 
		 
		 }else{
		    if($zx==13){
			$order_f .='<input name="oqgb'.$zx.'" type="hidden" value="'.$rend[0].$rend[1].$rend[2].'" />';
		    }else{
		        $order_f .='<input name="oqgb'.$zx.'" type="hidden" value="" />';
		    }
		 }

	     }
	     
	     echo $order_f;
	
 
	?>        
                    <tr>
                        <td colspan="2" style="padding:15px 0px 15px 0px;text-align: center;border:none;">
                            <input name="oqgb20" type="hidden" value="<?php echo $showme2; ?>" />
			    <input type="button" style="<?php echo $style_but; ?>" onClick="submitform();" value="<?php echo $nval[32]; ?>">
                        </td>
                    </tr>
        </table>
    </div>

 
</form>
<?php
}
?>
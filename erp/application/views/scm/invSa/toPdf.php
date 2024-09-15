<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $transType==150601 ? '出库单' :'销售退货单'?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style></style>
</head>
<body>
<?php for($t=1; $t<=$countpage; $t++){?>
<div class="table-c">
			<table width="800" border="0" cellspacing="2" cellpadding="10" align="center">

	    <tr>
        <td   width= "100" align="left" cellspacing="2"></td> 
				
        <td   width= "600" align="center"  style="font-family:'宋体'; font-size:21px; font-weight:bold;" > <?php echo $system['companyName']?>　 </td> 
	
        <td   width= "100" align="left"  style="font-family:'宋体'; font-size:12px; line-height:12px;font-weight:normal;height:12px;"> </td>  

         </tr>
	 <tr>
	         <td   width= "100"  align="left" cellspacing="2"></td> 
				
        <td   width= "600" align="left"  style="font-family:'宋体'; font-size:12px; font-weight:normal;" > 地址：<?php echo $system['companyAddr']?>　 </td> 
	
        <td   width= "100" align="left"  style="font-family:'宋体'; font-size:12px; line-height:12px;font-weight:normal;height:12px;"> </td>  

     </tr>
	 	 <tr>
	         <td   width= "100"  align="left" cellspacing="2"></td> 
				
        <td   width= "600" align="left"  style="font-family:'宋体'; font-size:12px; font-weight:normal;" > 手机：<?php echo $system['phone']?>　 </td> 
	
        <td   width= "100" align="left"  style="font-family:'宋体'; font-size:12px; line-height:17px;font-weight:normal;height:12px;"> </td>  

     </tr>
	 	 	 <tr>
	         <td   width= "100"  align="left" cellspacing="2"></td> 
				
        <td   width= "600" align="left"  style="font-family:'宋体'; font-size:12px; font-weight:normal;" >电话： <?php echo $system['fax']?>　 </td> 
	
        <td   width= "100" align="left"  style="font-family:'宋体'; font-size:12px; line-height:17px;font-weight:normal;height:12px;"> </td>  

     </tr>
	<tr>
	         <td   width= "100"  align="left" cellspacing="2"></td> 
				
        <td   width= "600" align="center"  style="font-family:'宋体'; font-size:20px; font-weight:bold;" ><?php echo $transType==150601 ? '出 库 单' :'销售退货单'?></td> 
	
        <td   width= "100" align="left"  style="font-family:'宋体'; font-size:12px; line-height:17px;font-weight:normal;height:17px;"> 编号：<?php echo $billNo?></td>  

     </tr>
	  <tr>
	         <td   width= "100"  align="left" cellspacing="2">客户：<?php echo $contactName.'/'.$udf02?> </td> 
				
        <td   width= "600" align="center"  style="font-family:'宋体'; font-size:12px; font-weight:normal;" >地址：<?php echo $udf03?></td> 
	
        <td   width= "100" align="left"  style="font-family:'宋体'; font-size:12px; line-height:17px;font-weight:normal;height:17px;"> 日期：<?php echo $billDate?> </td>  

     </tr>
	      
	
	</table>
	</div>
	
		<table width="800" border="1" cellpadding="2" cellspacing="1" align="center" style="border-collapse:collapse;border:solid #000000;border-width:1px 0 0 1px;">   
			<tr style="height:20px">
				    <td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;"  align="center">序号</td>
					<td width="160" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">成品名称</td> 
					<td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">单位</td>
					<td width="70" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">规格</td>
					<td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">数量</td>
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">单价</td>	
	
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">金额</td>	
						
					<td width="100" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">备注</td>	
				</tr>
		       <?php 
			   $i = ($t-1)*$num + 1;
			   foreach($list as $arr=>$row) {
			       if ($row['i']>=(($t-1)*$num + 1) && $row['i'] <=$t*$num) {
			   ?>
				<tr style="border:solid #000000;border-width:0 1px 1px 0;padding:2px;height:15px;font-family:'宋体'; font-size:12px;">
				   <td width="30"  align="center"><?php echo $row['i']?></td>
					<td width="160" style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;"><?php echo $row['goods'];?></td>
					<td width="30" align="center" style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;"><?php echo $row['mainUnit']?></td>
					<td width="80" align="center"><?php echo $row['invSpec']?></td>
					<td width="30" align="center"><?php echo str_money(abs($row['qty']),$system['qtyPlaces'])?></td>
					<td width="60" align="center"><?php echo str_money(abs($row['price']),2)?></td>

					<td width="60" align="center"><?php echo str_money(abs($row['amount']),2)?></td>
					
					<td width="100" align="left"><?php echo $row['description']?></td>
				</tr>
				<?php 
				    $s = $row['i'];
				    }
				    $i++;
				}
				?>
				
				
				<?php 
				//补全
				if ($t==$countpage) {
				    for ($m=$s+1;$m<=$t*$num;$m++) {
				?>
				<tr style="border:solid #000000;border-width:0 1px 1px 0;padding:2px;height:15px;font-family:'宋体'; font-size:12px;">
				   <td width="30" align="center" style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;"><?php echo $m?></td>
					<td width="160"></td>
					<td width="30"></td>
					<td width="70"></td>
					<td width="30"></td>
					<td width="60"></td>
					
					<td width="60"></td>
					
					<td width="60"></td>
				</tr>
				<?php }}?>
				
				 <?php if ($t==$countpage) {?>
				 <tr style="height:20px">
				   <td colspan="3" align="right" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px;height:15px;font-family:'宋体'; font-size:12px;">合计：</td>
				   <td width="80" align="center"></td>
					<td width="30" align="center"><?php echo str_money(abs($totalQty),$system['qtyPlaces'])?></td>
					<td width="60" align="center"></td>
					
					<td width="60" align="center"><?php echo str_money(abs($totalAmount),2)?></td>
					
					<td width="60" align="center"></td>
				</tr>
				  
				 
				<tr target="id">
				    <td colspan="10" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:12px;height:15px;">合计 金额大写： <?php echo str_num2rmb(abs($totalAmount))?> </td> 
				</tr>
				<?php }?>
		</table>
		
		
		
		
		<table  width="800" align="center">
		  <tr height="15" align="center">
				<td align="right" width="200" style="font-family:'宋体'; font-size:12px;height:12px;"><?php echo $transType==150601 ? '本次收款：' :'本次退款：'?> <?php echo str_money(abs($rpAmount),2)?></td>
				<td width="150" style="font-family:'宋体'; font-size:12px;height:25px;"></td>
				<td width="150" style="font-family:'宋体'; font-size:12px;height:25px;"></td>
				<td width="150" style="font-family:'宋体'; font-size:12px;height:25px;">本次欠款：<?php echo str_money(abs($arrears),2)?></td>
				<td width="50" ></td>
 
		  </tr>
		</table>	
		
		<table  width="800" align="center">
		  <tr height="15" align="center">
				<td align="left" width="700" style="font-family:'宋体'; font-size:12px;height:12px;">备注： <?php echo $description?></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
 
		  </tr>
		</table>	 
		
		<table  width="800" align="center">
			<tr height="15" align="left">
				<td align="left" width="200" style="font-family:'宋体'; font-size:12px;height:12px;">制单人：<?php echo $userName?> </td>
				<td width="150" style="font-family:'宋体'; font-size:12px;height:12px;">发货人签字：____________</td>
				<td width="150"></td>
				<td width="150" style="font-family:'宋体'; font-size:12px;height:12px;">客户签字：____________</td>
				
				<td width="50" ></td>
 
			</tr>
		</table>	
<?php echo $t==$countpage?'':'<br>';}?>		
		
		
		 
</body>
</html>		
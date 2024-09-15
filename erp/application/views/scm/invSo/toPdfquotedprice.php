<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>销售报价单</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.table-c table{ background:#FFF}
.table-c table td{ background:#FFF}
</style>
</head>
<body>

<?php for($t=1; $t<=$countpage; $t++){?>
<!--<div class="table-c">-->
			<table width="900" border="0" cellspacing="20" cellpadding="30" align="center">

    			
	     <tr>

				
        <td  align="center"  style="font-family:'宋体'; font-size:18px; font-weight:normal;" > <?php echo $system['companyName']?>　 </td> 
	
        <!--  -->

     </tr>
	      <tr>
		
        <td align="center" style="font-family:'宋体'; font-size:17px; font-weight:normal;" >销售报价单</td>  
		
        <!--<td   width= "100" align="right" style="font-family:'宋体'; line-height:17px;font-size:12px; font-weight:normal;height:17px;" > 　单据日期：<?php echo $billDate?> </td> -->
     </tr>
		</table>
		<!--</div>-->
		<table  width="900"  align="center" cellpadding="0">
			
			
			<tr height="15px">
			<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">客户：<?php echo $contactNo.' '.$contactName?></td>
				<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">供货方：<?php echo $system['companyName']?></td>
			</tr> 
			<tr height="15px">
			<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">联系人：<?php echo $contactName ?></td>
				<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">供方联系人：<?php echo $userName ?></td>
			</tr>
			<tr height="15px">
			<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">联系方式：<?php echo $contactNo ?></td>
				<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">供方联系方式：<?php echo $system['phone']?></td>
			</tr>
			<tr width="700" height="15px">
			<td  style="font-family:'宋体'; font-size:12px; line-height:17px;font-weight:normal;height:17px;"> 编号：<?php echo $billNo?>　日期：<?php echo $billDate?> </td>
			</tr> 
			<tr width="700" height="15px">
			<td  align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">尊敬的客户，非常感谢您的垂询，贵司所需的产品价格如下，请查阅：</td>
			</tr> 	
			
			
		</table>	
	
		
			
		<table width="900" border="1" cellpadding="2" cellspacing="1" align="center" style="border-collapse:collapse;border:solid #000000;border-width:1px 0 0 1px;">   
			<tr style="height:20px">
				    <td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;"  align="center">序号</td>
					<td width="220" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">商品</td> 
					<td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">单位</td>
					<td width="40" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">数量</td>
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">销售单价</td>	
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">折扣率(%)</td>	
					<td width="50" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">折扣额</td>	
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">销售金额</td>	
					<td width="80" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">仓库</td>	
				</tr>
		       <?php 
			   $i = ($t-1)*$num + 1;
			   foreach($list as $arr=>$row) {
			       if ($row['i']>=(($t-1)*$num + 1) && $row['i'] <=$t*$num) {
			   ?>
				<tr style="border:solid #000000;border-width:0 1px 1px 0;padding:2px;height:15px;font-family:'宋体'; font-size:12px;">
				   <td width="30"  align="center"><?php echo $row['i']?></td>
					<td width="220" style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;"><?php echo $row['goods'];?></td>
					<td width="30" align="center" style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;"><?php echo $row['mainUnit']?></td>
					<td width="40" align="right"><?php echo str_money(abs($row['qty']),$system['qtyPlaces'])?></td>
					<td width="60" align="right"><?php echo abs($row['price'])?></td>
					<td width="60" align="right"><?php echo $row['discountRate']?></td>
					<td width="50" align="right"><?php echo $row['deduction']?></td>
					<td width="60" align="right"><?php echo str_money(abs($row['amount']),2)?></td>
					<td width="80"><?php echo $row['locationName']?></td>
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
					<td width="220"></td>
					<td width="30"></td>
					<td width="40"></td>
					<td width="60"></td>
					<td width="60"></td>
					<td width="50"></td>
					<td width="60"></td>
					<td width="80"></td>
				</tr>
				<?php }}?>
				
				 <?php if ($t==$countpage) {?>
				 <tr style="height:20px">
				   <td colspan="3" align="right" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px;height:15px;font-family:'宋体'; font-size:12px;">合计：</td>
					<td width="60" align="right"><?php echo str_money(abs($totalQty),$system['qtyPlaces'])?></td>
					<td width="60" align="center"></td>
					<td width="60" align="center"></td>
					<td width="60" align="center"></td>
					<td width="60" align="right"><?php echo str_money(abs($totalAmount),2)?></td>
					<td width="80" align="center"></td>
				</tr>
				  
				 
				<tr target="id">
				    <td colspan="9" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:12px;height:15px;">合计 金额大写： <?php echo str_num2rmb(abs($totalAmount))?> </td> 
				</tr>
				<?php }?>
		</table>
		
		
		
	 
		
		<table  width="900" align="center">
		  <tr height="15" align="left">
				<td align="left" width="600" style="font-family:'宋体'; font-size:12px;height:25px;">备注： <?php echo $description?></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="100" style="font-family:'宋体'; font-size:12px;height:25px;" >制单人：<?php echo $userName?></td>
 
		  </tr>
		  			<tr height="15px">
				<td align="center" style="font-family:'宋体'; font-size:18px; font-weight:normal;height:50px;"></td>
			</tr> 
		</table>	 
		
		<table  width="900" align="center">
			<tr height="15" align="left">
				
				<td width="250" style="font-family:'宋体'; font-size:12px;height:25px;">客户签字：____________</td>
				<td width="150"></td>

				<td width="150" hight="88" align="right" style="font-family:'宋体'; font-size:12px;height:25px;">供货方签字：____________</td>
 
			</tr>
		</table>	
<?php echo $t==$countpage?'':'<br><br><br>';}?>		
		
		
		 
</body>
</html>		
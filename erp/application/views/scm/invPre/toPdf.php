<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>采购合同</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.table-c table{ background:#FFF}
.table-c table td{ background:#FFF}
</style>
</head>
<body>
<?php for($t=1; $t<=$countpage; $t++){?>
<div class="table-c">
			<table width="900" border="0" cellspacing="20" cellpadding="30" align="center">
		     <tr>
        <td colspan="3" height="5px">

        </td>
    </tr>
	     <tr>
        <td   width= "200" rowspan="2" align="left" cellspacing="20"></td> 
				
        <td   width= "450" align="center"  style="font-family:'宋体'; font-size:18px; font-weight:normal;" > <?php echo $system['companyName']?>　 </td> 
	
        <td   width= "220" align="left"  style="font-family:'宋体'; font-size:12px; line-height:17px;font-weight:normal;height:17px;"> 编号：<?php echo $billNo?>　 </td>  

     </tr>
	      <tr>
		
        <td   width= "450" align="center" style="font-family:'宋体'; font-size:17px; font-weight:normal;" >采购合同</td>  
		
        <td   width= "220" align="left" style="font-family:'宋体'; line-height:17px;font-size:12px; font-weight:normal;height:17px;" > 　单据日期：<?php echo $billDate?> </td> 
     </tr>

			
		</table>
		</div>
		<table  width="900"  align="center" cellpadding="0">
			
			
			<tr height="15px">
			<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">购货方：<?php echo $system['companyName']?></td>
				<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">供货方：<?php echo $contactNo.' '.$contactName?></td>
			</tr> 
			<tr height="15px">
			<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">购货联系人：<?php echo $userName ?></td>
				<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">供方联系人：<?php echo $contactName ?></td>
			</tr>
			<tr height="15px">
			<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">购货联系方式：<?php echo $system['phone']?></td>
				<td width="350" align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">供方联系方式：<?php echo $contactNo ?></td>
			</tr>
			<tr width="700" height="15px">
			<td  align="left" style="font-family:'宋体'; font-size:12px; font-weight:normal;height:12px;">本合同由买卖双方签订，根据下列条件和条款，卖方同意出售、买方同意购买下述货物：</td>
			</tr> 	
			
			
		</table>	




		<!--table  width="800"  align="center">
		     
			<tr height="15px">
				<td align="center" style="font-family:'宋体'; font-size:18px; font-weight:normal;height:50px;"></td>
			</tr> 
		    <tr height="15px">
				<td align="center" style="font-family:'宋体'; font-size:18px; font-weight:normal;"><?php echo $system['companyName']?></td>
			</tr> 
			<tr height="15px">
				<td align="center" style="font-family:'宋体'; font-size:18px; font-weight:normal;height:25px;">采购订单</td>
			</tr>
		</table>	
		
		
		<table width="800" align="center">
			<tr height="15" align="left" >
				<td width="250" style="font-family:'宋体'; font-size:14px;height:20px;">供应商：<?php echo $contactNo.' '.$contactName?> </td>
				<td width="10" ></td>
				<td width="150" >单据日期：<?php echo $billDate?></td>
				<td width="250" >单据编号：<?php echo $billNo?></td>
				<td width="60" >币别：RMB</td>
 
			</tr>
		</table-->	
		
			
		<table width="800" border="1" cellpadding="2" cellspacing="1" align="center" style="border-collapse:collapse;border:solid #000000;border-width:1px 0 0 1px;">
		         
				<tr style="height:20px">
				    <td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;"  align="center">序号</td>
					<td width="220" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">商品</td> 
					<td width="30" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">单位</td>
					<td width="40" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">数量</td>
					<td width="80" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">购货单价</td>	
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">折扣率(%)</td>	
					<td width="50" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">折扣额</td>	
					<td width="60" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">购货金额</td>	
					<td width="80" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;" align="center">仓库</td>	
				</tr>
				
		       <?php 
			   $i = ($t-1)*$num + 1;
			   foreach($list as $arr=>$row) {
			       if ($row['i']>=(($t-1)*$num + 1) && $row['i'] <=$t*$num) {
			   ?>
				<tr style="height:20px">
				   <td width="30"  style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;" align="center"><?php echo $row['i']?></td>
					<td width="220" ><?php echo $row['goods'];?></td>
					<td width="30" align="center"><?php echo $row['mainUnit']?></td>
					<td width="40" align="right"><?php echo $row['qty']?></td>
					<td width="60" align="right"><?php echo $row['price']?></td>
					<td width="60" align="right"><?php echo $row['discountRate']?></td>
					<td width="50" align="right"><?php echo $row['deduction']?></td>
					<td width="60" align="right"><?php echo $row['amount']?></td>
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
				    
					<td width="30" style="border:solid #000000;border-width:0 1px 1px 0;height:15px;font-family:'宋体'; font-size:12px;" align="center"><?php echo $m?></td>
					<td width="220" ></td>
					<td width="30" align="center"></td>
					<td width="40" align="center"></td>
					<td width="60" align="center"></td>
					<td width="60" align="center"></td>
					<td width="50" align="center"></td>
					<td width="60" align="center"></td>
					<td width="80" align="center"></td>
				</tr>
				<?php }}?>
				
				 <?php if ($t==$countpage) {?>
				 <tr style="height:20px">
				   <td colspan="3" align="right" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px;height:15px;font-family:'宋体'; font-size:12px;">合计：</td>
					<td width="30" align="right" ><?php echo str_money(abs($totalQty),$system['qtyPlaces'])?></td>
					<td width="40" align="center"></td>
					<td width="60" align="center"></td>
					<td width="50" align="center"></td>
					<td width="60" align="right" ><?php echo str_money(abs($totalAmount),2)?></td>
					<td width="80" align="center"></td>
				</tr>
				  
				 
				<tr target="id">
				    <td colspan="9" style="border:solid #000000;border-width:0 1px 1px 0;padding:2px; font-family:'宋体'; font-size:14px;height:15px;">合计 金额大写： <?php echo str_num2rmb(abs($totalAmount))?> </td> 
				</tr>
				<?php }?>
		</table>
		
		
		
		
		<table  width="800" align="center">
		  <tr height="25" align="left">
				<td align="left" width="200" style="font-family:'宋体'; font-size:14px;height:25px;">折扣额：<?php echo str_money(abs($disAmount),2)?></td>
				<td width="200" style="font-family:'宋体'; font-size:14px;height:25px;">折扣后金额：<?php echo str_money(abs($amount),2)?></td>
				<td width="200" style="font-family:'宋体'; font-size:14px;height:25px;"><?php echo $transType==150501 ? '本次付款：' :'本次退款：'?><?php echo str_money(abs($rpAmount),2)?></td>
				<td width="200" style="font-family:'宋体'; font-size:14px;height:25px;">本次欠款：<?php echo str_money(abs($arrears),2)?></td>
				<td width="50" style="font-family:'宋体'; font-size:14px;height:25px;"></td>
 
		  </tr>
		</table>	
		
		<table  width="800" align="center">
		  <tr height="25" align="left">
				<td align="left" width="960" style="font-family:'宋体'; font-size:14px;height:25px;">备注： <?php echo $description?></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
 
		  </tr>
		</table>	 
				<table  width="800" align="center">
		  <tr height="25" align="left">
				<td align="left" width="960" style="font-family:'宋体'; font-size:14px;height:25px;">注意：送货单请注明我司所采购物料的编码，谢谢。<br>
1、以上价格含13%增值税，含运费。<br>
2、供应商负责把货品送到采购商指定地点。<br>
3、付款方式：<br>
4、交货时间：<br>
5、质量标准：以购方图纸为标准。<br>
6、如产品质量有问题，采购方有权力7天内退换。<br>
7、违约责任：由双方友好协商解决，无法解决的由购方所在地人民法院裁决。<br>
8、本合同传真件及扫描件具有法律效力。<br></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
				<td width="0" ></td>
 
		  </tr>
		</table>

				<table  width="900" align="center">
			<tr height="15" align="left">
				
				<td width="150" style="font-family:'宋体'; font-size:12px;height:25px;">购货方签字：____________</td>
				<td width="100" hight="88" align="left" ></td>
				

				<td width="250" hight="88" align="right" style="font-family:'宋体'; font-size:12px;height:25px;">供应商签字：</td>
<td width="150"></td>
 
			</tr>
		</table>	
		<!--table  width="800" align="center">
			<tr height="25" align="left">
				<td align="left" width="250" style="font-family:'宋体'; font-size:14px;height:25px;">制单人：<?php echo $userName?> </td>
				<td width="250" style="font-family:'宋体'; font-size:14px;height:25px;">收货人签字：____________</td>
				<td width="250" style="font-family:'宋体'; font-size:14px;height:25px;">供应商签字：____________</td>
				<td width="100" ></td>
				<td width="100" ></td>
 
			</tr>
		</table-->	
<?php echo $t==$countpage?'':'<br><br>';}?>		
		
		
		 
</body>
</html>		
<?php $this->load->view('header');?>

<script type="text/javascript">
var DOMAIN = document.domain;
var WDURL = "";
var SCHEME= "<?php echo sys_skin()?>";
try{
	document.domain = '<?php echo base_url()?>';
}catch(e){
}
//ctrl+F5 增加版本号来清空iframe的缓存的
$(document).keydown(function(event) {
	/* Act on the event */
	if(event.keyCode === 116 && event.ctrlKey){
		var defaultPage = Public.getDefaultPage();
		var href = defaultPage.location.href.split('?')[0] + '?';
		var params = Public.urlParam();
		params['version'] = Date.parse((new Date()));
		for(i in params){
			if(i && typeof i != 'function'){
				href += i + '=' + params[i] + '&';
			}
		}
		defaultPage.location.href = href;
		event.preventDefault();
	}
});
</script>

<style>
#matchCon { width: 280px; }
#print{margin-left:10px;}
a.ui-btn{margin-left:10px;}
#reAudit,#audit{display:none;}
</style>
</head>

<body>
<div class="wrapper">
  <div class="mod-search cf">
    <div class="fl">
      <ul class="ul-inline">
        <li>
          <input type="text" id="matchCon" class="ui-input ui-input-ph" value="请输入单据号或供应商或备注">
        </li>
        <li>
          <label>日期:</label>
          <input type="text" id="beginDate" value="2015-04-09" class="ui-input ui-datepicker-input">
          <i>-</i>
          <input type="text" id="endDate" value="2015-04-15" class="ui-input ui-datepicker-input">
        </li>
        <li><a class="ui-btn mrb" id="search">查询</a></li>
      </ul>
    </div>
	
	<div class="fr">
      <a class="ui-btn ui-btn-sp" id="add">新增</a>
      <a class="ui-btn" id="print" target="_blank" href="javascript:void(0);">打印</a>
	  <a class="ui-btn" id="export" target="_blank" href="javascript:void(0);">导出</a>
      <!-- <a class="ui-btn" id="import" target="_blank" href="javascript:void(0);">导入</a><a class="ui-btn" id="export" target="_blank" href="javascript:void(0);">导出</a> -->
      <!--<div class="ui-btn-menu">
            <a class="ui-btn menu-btn mrb" style="width: 40px;padding-right: 7px;" href="#" id="import" target="_blank" href="javascript:void(0);">导入<b></b></a>
            <div class="con more-operate-con" style="margin-left: 0px;font-size: 14px;width: 54px;padding: 3px;">
              <ul class="more-operate cf" style="border-style:dashed; border-width:1px; border-color:#ccc;">
                <li style="padding-left: 8px;"><a href="#" id="export" target="_blank" href="javascript:void(0);">导出</a></li>
              </ul>
            </div>
      </div>-->
      <!--div class="ui-btn-menu">
        <a href="#" class="ui-btn" id="btn-batchDel">删除</a>
      </div-->
      <!-- <a class="ui-btn dn" id="audit">审核</a><a class="ui-btn" id="reAudit">反审核</a> -->
      <!--div class="ui-btn-menu">
          <a class="ui-btn menu-btn mrb" style="width: 40px;padding-right: 14px;" href="#" id="audit">审核<b></b></a>
          <div class="con more-operate-con" style="margin-left: 0px;font-size: 14px;width: 55px;padding: 6px;">
            <ul class="more-operate cf" style="border-style:dashed; border-width:1px; border-color:#ccc;">
              <li><a href="#" id="reAudit">反审核</a></li>
            </ul>
          </div>
      </div-->
    </div>
  </div>
	
	
	
<!--    <div class="fr"><a class="ui-btn ui-btn-sp" id="add">新增</a><a class="ui-btn" id="print" target="_blank" href="javascript:void(0);">打印</a><a class="ui-btn" id="export" target="_blank" href="javascript:void(0);">导出</a> </div>
  </div>-->
<!--  <div class="mod-toolbar-top cf">
    <div class="fl"><strong class="tit">仓库</strong></div>
    <div class="fr"><a class="ui-btn ui-btn-sp mrb" id="search">新增</a><a class="ui-btn" id="export">导出</a></div>
  </div>-->
  <div class="grid-wrap">
    <table id="grid">
    </table>
    <div id="page"></div>
  </div>
</div>
<script src="<?php echo base_url()?>statics/js/dist/purchaseadvanceList.js?ver=20140430"></script>
</body>
</html>


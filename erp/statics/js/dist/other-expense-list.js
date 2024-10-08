var queryConditions = {
	matchCon: ""
},
	hiddenAmount = !1,
	SYSTEM = system = parent.SYSTEM,
	THISPAGE = {
		init: function(a) {
			SYSTEM.isAdmin !== !1 || SYSTEM.rights.AMOUNT_COSTAMOUNT || (hiddenAmount = !0), this.mod_PageConfig = Public.mod_PageConfig.init("other-expense-list"), this.initDom(), this.loadGrid(), this.addEvent()
		},
		initDom: function() {
			this.$_matchCon = $("#matchCon"), this.$_beginDate = $("#beginDate").val(system.beginDate), this.$_endDate = $("#endDate").val(system.endDate), this.$_matchCon.placeholder(), this.$_beginDate.datepicker(), this.$_endDate.datepicker()
		},
		loadGrid: function() {
			function a(a, b, c) {
				var d = '<div class="operating" data-id="' + c.id + '"><span class="ui-icon ui-icon-pencil" title="修改"></span><span class="ui-icon ui-icon-trash" title="删除"></span></div>';
				return d
			}
			var b = Public.setGrid();
			queryConditions.beginDate = this.$_beginDate.val(), queryConditions.endDate = this.$_endDate.val();
			var c = [{
				name: "operating",
				label: "操作",
				width: 60,
				fixed: !0,
				formatter: a,
				align: "center"
			}, {
				name: "billDate",
				label: "单据日期",
				width: 100,
				align: "center"
			}, {
				name: "billNo",
				label: "单据编号",
				width: 120,
				align: "center"
			}, {
				name: "contactName",
				label: "供应商名称",
				width: 150
			}, {
				name: "amount",
				label: "金额",
				hidden: hiddenAmount,
				width: 100,
				align: "right",
				formatter: "currency"
			}, {
				name: "userName",
				label: "制单人",
				width: 80,
				fixed: !0,
				align: "center",
				title: !0,
				classes: "ui-ellipsis"
			}];
			this.mod_PageConfig.gridReg("grid", c), c = this.mod_PageConfig.conf.grids.grid.colModel, $("#grid").jqGrid({
				url: "../scm/ori?action=listExp",
				postData: queryConditions,
				datatype: "json",
				autowidth: !0,
				height: b.h,
				altRows: !0,
				gridview: !0,
				multiselect: !0,
				multiboxonly: !0,
				colModel: c,
				cmTemplate: {
					sortable: !1,
					title: !1
				},
				page: 1,
				sortname: "number",
				sortorder: "desc",
				pager: "#page",
				rowNum: 100,
				rowList: [100, 200, 500],
				viewrecords: !0,
				shrinkToFit: !1,
				forceFit: !0,
				jsonReader: {
					root: "data.rows",
					records: "data.records",
					repeatitems: !1,
					total: "data.total",
					id: "id"
				},
				loadError: function(a, b, c) {},
				ondblClickRow: function(a, b, c, d) {
					$("#" + a).find(".ui-icon-pencil").trigger("click")
				},
				resizeStop: function(a, b) {
					THISPAGE.mod_PageConfig.setGridWidthByIndex(a, b, "grid")
				}
			}).navGrid("#page", {
				edit: !1,
				add: !1,
				del: !1,
				search: !1,
				refresh: !1
			}).navButtonAdd("#page", {
				caption: "",
				buttonicon: "ui-icon-config",
				onClickButton: function() {
					THISPAGE.mod_PageConfig.config()
				},
				position: "last"
			})
		},
		reloadData: function(a) {
			$("#grid").jqGrid("setGridParam", {
				url: "../scm/ori/listExp?action=listExp",
				datatype: "json",
				postData: a
			}).trigger("reloadGrid")
		},
		addEvent: function() {
			var a = this;
			$(".grid-wrap").on("click", ".ui-icon-pencil", function(a) {
				a.preventDefault();
				var b = $(this).parent().data("id");
				parent.tab.addTabItem({
					tabid: "money-otherExpense",
					text: "其他支出报销",
					url: "../scm/ori?action=editExp&id=" + b
				});
				$("#grid").jqGrid("getDataIDs");
				parent.salesListIds = $("#grid").jqGrid("getDataIDs")
			}), $(".grid-wrap").on("click", ".ui-icon-trash", function(a) {
				if (a.preventDefault(), Business.verifyRight("QTZC_DELETE")) {
					var b = $(this).parent().data("id");
					$.dialog.confirm("您确定要删除该支出记录吗？", function() {
						Public.ajaxGet("../scm/ori/deleteExp?action=deleteExp", {
							id: b
						}, function(a) {
							200 === a.status ? ($("#grid").jqGrid("delRowData", b), parent.Public.tips({
								content: "删除成功！"
							})) : parent.Public.tips({
								type: 1,
								content: a.msg
							})
						})
					})
				}
			}), $("#search").click(function() {
				queryConditions.matchCon = "请输入单据号或供应商名或备注" === a.$_matchCon.val() ? "" : a.$_matchCon.val(), queryConditions.beginDate = a.$_beginDate.val(), queryConditions.endDate = a.$_endDate.val(), THISPAGE.reloadData(queryConditions)
			}), $("#add").click(function(a) {
				a.preventDefault(), Business.verifyRight("QTZC_ADD") && parent.tab.addTabItem({
					tabid: "money-otherExpense",
					text: "其他支出报销",
					url: "../scm/ori?action=initExp"
				})
			}), $("#print").click(function(a) {
				if (!Business.verifyRight("QTZC_PRINT")) return void a.preventDefault();
				var b = $("#grid").jqGrid("getGridParam", "selarrrow"),
					c = b.join(),
					d = c ? "&id=" + c : "",
					e = "../scm/ori/toPdf?action=toPdf&transType=153402" + d;
				$(this).attr("href", e)
			}), $("#export").click(function(a) {
				if (!Business.verifyRight("QTZC_EXPORT")) return void a.preventDefault();
				var b = $("#grid").jqGrid("getGridParam", "selarrrow"),
					c = b.join(),
					d = c ? "&id=" + c : "";
				for (var e in queryConditions) queryConditions[e] && (d += "&" + e + "=" + queryConditions[e]);
				var f = "../scm/ori/exportExp?action=exportExp" + d;
				$(this).attr("href", f)
			}), $(window).resize(function() {
				Public.resizeGrid()
			})
		}
	};
$(function() {
	THISPAGE.init()
});


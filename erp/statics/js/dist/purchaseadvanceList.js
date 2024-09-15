var queryConditions = {
        matchCon: ""
    },
    SYSTEM = system = parent.SYSTEM,
    hiddenAmount = !1,
    billRequiredCheck = system.billRequiredCheck,
    urlParam = Public.urlParam();

queryConditions.transType = "150502" === urlParam.transType ? "150502" : "150501";
var THISPAGE = {
    init: function() {
        SYSTEM.isAdmin !== !1 || SYSTEM.rights.AMOUNT_INAMOUNT || (hiddenAmount = !0), this.initDom(), this.loadGrid(), this.addEvent()
    },
    initDom: function() {
        this.$_matchCon = $("#matchCon"), this.$_beginDate = $("#beginDate").val(system.beginDate), this.$_endDate = $("#endDate").val(system.endDate), this.$_matchCon.placeholder(), this.$_beginDate.datepicker(), this.$_endDate.datepicker()
    },
    loadGrid: function() {
        function a(a, b, c) {
            var d = '<div class="operating" data-id="' + c.id + '"><a class="ui-icon ui-icon-pencil" title="修改"></a><a class="ui-icon ui-icon-trash" title="删除"></a><a class="ui-icon ui-icon-transfer" title="转移到采购入库"></a></div>';
            return d
        }
        var b = Public.setGrid();
        queryConditions.beginDate = this.$_beginDate.val(), queryConditions.endDate = this.$_endDate.val();
        var c = "150501" == queryConditions.transType ? "付" : "退";
        $("#grid").jqGrid({
            url: "../scm/invPuPre?action=list",
            postData: queryConditions,
            datatype: "json",
            autowidth: !0,
            height: b.h,
            altRows: !0,
            gridview: !0,
            multiselect: !0,
            colNames: ["操作", "单据日期", "单据编号", "供应商", "预购金额", "优惠后金额", "已" + c + "款", c + "款状态", "制单人", "审核人", "备注", "订单来源"],
            colModel: [{
                name: "operating",
                width: 90,
                fixed: !0,
                formatter: a,
                align: "center",
                sortable: !1
            }, {
                name: "billDate",
                index: "billDate",
                width: 100,
                align: "center"
            }, {
                name: "billNo",
                index: "billNo",
                width: 120,
                align: "center"
            }, {
                name: "contactName",
                index: "contactName",
                width: 200
            }, {
                name: "totalAmount",
                index: "totalAmount",
                hidden: hiddenAmount,
                width: 100,
                align: "right",
                formatter: "currency"
            }, {
                name: "amount",
                index: "amount",
                hidden: hiddenAmount,
                width: 100,
                align: "right",
                formatter: "currency"
            }, {
                name: "rpAmount",
                index: "rpAmount",
                hidden: hiddenAmount,
                width: 100,
                align: "right",
                formatter: "currency"
            }, {
                name: "hxStateCode",
                index: "hxStateCode",
                width: 80,
                fixed: !0,
                align: "center",
                title: !0,
                classes: "ui-ellipsis",
                formatter: function(a) {
                    switch (a) {
                        case 0:
                            return "未" + c + "款";
                        case 1:
                            return "部分" + c + "款";
                        case 2:
                            return "全部" + c + "款";
                        default:
                            return "&#160"
                    }
                }
            }, {
                name: "userName",
                index: "userName",
                width: 80,
                fixed: !0,
                align: "center",
                title: !0,
                classes: "ui-ellipsis"
            }, {
                name: "checkName",
                index: "checkName",
                width: 80,
                hidden: billRequiredCheck ? !1 : !0,
                fixed: !0,
                align: "center",
                title: !0,
                classes: "ui-ellipsis"
            }, {
                name: "description",
                index: "description",
                width: 200,
                classes: "ui-ellipsis",
                sortable: !1
            }, {
                name: "disEditable",
                label: "不可编辑",
                index: "disEditable",
                hidden: !0
            }],
            cmTemplate: {
                sortable: !0,
                title: !1
            },
            page: 1,
            pager: "#page",
            rowNum: 100,
            rowList: [100, 200, 500],
            viewrecords: !0,
            shrinkToFit: !1,
            forceFit: !1,
            jsonReader: {
                root: "data.rows",
                records: "data.records",
                total: "data.total",
                repeatitems: !1,
                id: "id"
            },
            loadComplete: function(a) {
                if (billRequiredCheck) for (var b = a.data.rows, c = 0; c < b.length; c++) {
                    var d = b[c];
                    d.checked || $("#" + d.id).addClass("gray")
                }
                "150502" == queryConditions.transType && $("#grid").find(".jqgrow").addClass("red")
            },
            loadError: function() {},
            ondblClickRow: function(a) {
                $("#" + a).find(".ui-icon-pencil").trigger("click")
            }
        })
    },
    reloadData: function(a) {
        $("#grid").jqGrid("setGridParam", {
            url: "../scm/invPuPre?action=purList",
            datatype: "json",
            postData: a
        }).trigger("reloadGrid")
    },
    addEvent: function() {
        var a = this;
        if ($(".grid-wrap").on("click", ".ui-icon-pencil", function(a) {
            a.preventDefault();
            var b = $(this).parent().data("id"),
                c = $("#grid").jqGrid("getRowData", b),
                d = 1 == c.disEditable ? "&disEditable=true" : "",
                e = ($("#grid").jqGrid("getDataIDs"), "物料预购"),
                f = "purchase-purchase";
            "150502" == queryConditions.transType ? (e = "预购退货单", f = "purchase-purchaseBack", parent.cacheList.purchaseBackId = $("#grid").jqGrid("getDataIDs")) : parent.cacheList.purchaseId = $("#grid").jqGrid("getDataIDs"), parent.tab.addTabItem({
                tabid: f,
                text: e,
                url: "../scm/invPuPre?action=editPur&id=" + b + "&flag=list" + d + "&transType=" + queryConditions.transType
            })
        }),

            $(".grid-wrap").on("click", ".ui-icon-trash", function(a) {
                if (a.preventDefault(), Business.verifyRight("PU_DELETE")) {
                    var b = $(this).parent().data("id");
                    $.dialog.confirm("您确定要删除该预购记录吗？", function() {
                        Public.ajaxGet("../scm/invPuPre/delete?action=delete", {
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
            }), $(".wrapper").on("click", "#print", function(a) {
            a.preventDefault(), Business.verifyRight("PU_PRINT") && Public.print({
                title: "预购单列表",
                $grid: $("#grid"),
                pdf: "../scm/invPuPre/toPdf?action=toPdf",
                billType: 10101,
                filterConditions: queryConditions
            })
        }),
            $(".grid-wrap").on("click", ".ui-icon-transfer", function(a) {
                a.preventDefault();
                var b = "采购入库单",
                    c = "purchase-purchase" ,
                    d = $(this).parent().data("id");
                parent.tab.addTabItem({
                    tabid: c,
                    text: b,
                    url: "../scm/invPu?action=initPur&transType=" + queryConditions.transType+"&preid=" + d
                })
            }),
            $(".wrapper").on("click", "#export", function(a) {
                if (!Business.verifyRight("PU_EXPORT")) return void a.preventDefault();
                var b = $("#grid").jqGrid("getGridParam", "selarrrow"),
                    c = b.join(),
                    d = c ? "&id=" + c : "";
                for (var e in queryConditions) queryConditions[e] && (d += "&" + e + "=" + queryConditions[e]);
                var f = "../scm/invPuPre/exportInvPu?action=exportInvPu" + d;
                $(this).attr("href", f)
            }), billRequiredCheck) {
            {
                $("#audit").css("display", "inline-block"), $("#reAudit").css("display", "inline-block")
            }
            $(".wrapper").on("click", "#audit", function(a) {
                a.preventDefault();
                var b = $("#grid").jqGrid("getGridParam", "selarrrow"),
                    c = b.join();
                return c ? void Public.ajaxPost("../scm/invPuPre/batchCheckInvPu?action=batchCheckInvPu", {
                    id: c
                }, function(a) {
                    if (200 === a.status) {
                        for (var c = 0, d = b.length; d > c; c++) $("#grid").setCell(b[c], "checkName", system.realName), $("#" + b[c]).removeClass("gray");
                        parent.Public.tips({
                            content: "审核成功！"
                        })
                    } else parent.Public.tips({
                        type: 1,
                        content: a.msg
                    })
                }) : void parent.Public.tips({
                    type: 2,
                    content: "请先选择需要审核的项！"
                })
            }), $(".wrapper").on("click", "#reAudit", function(a) {
                a.preventDefault();
                var b = $("#grid").jqGrid("getGridParam", "selarrrow"),
                    c = b.join();
                return c ? void Public.ajaxPost("../scm/invPuPre/rsBatchCheckInvPu?action=rsBatchCheckInvPu", {
                    id: c
                }, function(a) {
                    if (200 === a.status) {
                        for (var c = 0, d = b.length; d > c; c++) $("#grid").setCell(b[c], "checkName", "&#160;"), $("#" + b[c]).addClass("gray");
                        parent.Public.tips({
                            content: "反审核成功！"
                        })
                    } else parent.Public.tips({
                        type: 1,
                        content: a.msg
                    })
                }) : void parent.Public.tips({
                    type: 2,
                    content: "请先选择需要反审核的项！"
                })
            })
        }
        $("#search").click(function() {
           queryConditions.matchCon = "请输入单据号或供应商或备注" === a.$_matchCon.val() ? "" : a.$_matchCon.val(), queryConditions.beginDate = a.$_beginDate.val(), queryConditions.endDate = a.$_endDate.val(), THISPAGE.reloadData(queryConditions)
        }),
            $("#add").click(function(a) {
                if (a.preventDefault(), Business.verifyRight("PU_ADD")) {
                    var b = "物料预购",
                        c = "purchase-purchase";
                    if ("150502" == queryConditions.transType) var b = "预购退货单",
                        c = "purchase-purchaseBack";
                    parent.tab.addTabItem({
                        tabid: c,
                        text: b,
                        url: "../scm/invPuPre?action=initPur&transType=" + queryConditions.transType
                    })
                }
            }),
            $(window).resize(function() {
                Public.resizeGrid()
            })
    }
};
THISPAGE.init();
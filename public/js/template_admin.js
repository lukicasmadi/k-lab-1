$(document).ready((function(){var a;App.init(),all_operation=(a=route("get_all_operation"),respObj=$.ajax({url:a,data:"",dataType:"json",type:"GET"}),respObj),all_operation.done((function(a,o,t){a.id,a.uuid,a.name,$(a).each((function(){var a=$("<option />");a.attr("value",this.id).text(this.name),$("#poldaList").append(a)}))})),$("body").on("click","#report_polda_all",(function(a){a.preventDefault(),$("#modalReportAllPoldaByOperation").modal("show")}))}));
/* 滚动加载 */
var startHref;
$(function() {
	var p = false;
	$(".page-more a").click(function() {
		var href = $(this).attr("href");
		startHref = href;
		if (href != undefined) {
			$.ajax({
				type: "get",
				cache: false,
				url: startHref,
				success: function(data) {
					var $result = $(data).find(".loop");
					if (p) {
						$(".item-loop").append($result).masonry('appended', $result);
					} else {
						$(".item-loop").append($result);
					}
					var newHref = $(data).find(".page-more a").attr("href");
					if (newHref != "") {
						$(".page-more a").attr("href", newHref);
					} else {
						$(".page-more").html("没有了");
					}
				}
			})
		}
		return false;
	})
	$(window).bind("scroll", function() {
		if ($(document).scrollTop() + $(window).height() > $(document).height() - 70) {
			if ($(".page-more a").attr('href') != startHref) {
				$(".page-more a").trigger("click");
			}
		}
	})
});
/* 更多加载 */
var startHref;
$(function() {
	$(".cpage-more a").click(function() {
		var href = $(this).attr("href");
		startHref = href;
		if (href != undefined) {
			$.ajax({
				type: "get",
				cache: false,
				url: startHref,
				success: function(data) {
					var $result = $(data).find(".cloop");
					$(".citem-loop").append($result);
					var newHref = $(data).find(".cpage-more a").attr("href");
					if (newHref != "") {
						$(".cpage-more a").attr("href", newHref)
					} else {
						$(".cpage-more").html('没有了')
					}
				}
			})
		}
		return false
	})
});
/* 评论加载 */
$(function() {
	$(".form_comment").validator({
		stopOnError: true,
		theme: 'yellow_top',
		ignore: ':hidden',
		valid: function(form) {
			$.fn.tips({
				type: 'loading',
				content: '数据提交中'
			});
			$.ajax({
				url: webroot + "plug/comment.asp?act=add&id=" + infoid,
				type: "post",
				data: $(form).serialize(),
				success: function(data) {
					data = jQuery.parseJSON(data);
					var type = "warn";
					if (data.status == "y") {
						type = "ok"
					}
					$.fn.tips({
						type: type,
						content: data.info
					});
					if (data.status == "y") {
						$(".form_comment")[0].reset();
						var act = data.info.substring(0, 1);
						var info = data.info.substring(1);
						$.fn.tips({
							type: "ok",
							content: info
						});
						if (act == 2) {
							setTimeout(function() {
								location.href = '' + contenturl + '';
							}, 1500)
						}
					}
				}
			})
		}
	})
});
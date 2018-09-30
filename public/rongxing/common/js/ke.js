/* 滚动加载 */
var startHref;
$(function() {
	function item_masonry() {
		$('.item img').load(function() {
			$('.item-loop').masonry({
				itemSelector: '.loop'
			});
		});
		$('.item-loop').masonry({
			itemSelector: '.loop'
		});
	}
	var p = false;
	//瀑布流开关
	//if ($(".item").length > 0) {
	//	p = true;
	//	item_masonry();
	//}
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
						item_masonry();
					} else {
						$(".item-loop").append($result);
					}
					var newHref = $(data).find(".page-more a").attr("href");
					if (newHref != "") {
						$(".page-more a").attr("href", newHref);
					} else {
						$(".page-more").html("");
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
								location.href=''+contenturl+'';
							}, 1500)
						}
					}
				}
			})
		}
	})
});
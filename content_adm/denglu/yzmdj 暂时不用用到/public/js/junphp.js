// 点击图片，添加标记
$(document).on('click','.ip_tooltipImg', function(e){
	var val = $('#iPicture_id').val();
	var status = $(this).attr('data-status');
	var id = $(this).attr('data-id');
	if (status == '1') {
		$(this).attr('data-status', '0');
		$(this).next().remove();
		var str = val.replace(','+id,'');
		$('#iPicture_id').val(str);
		return false;
	}

	if(val == '' || val == ',') {
		$('#iPicture_id').val(','+id+',');
	}else{
		$('#iPicture_id').val(val+id+',');
	}
	var offset = $(this).offset();
	var xx = e.pageX  || e.pageX - offset.left  || 0; // left
    var yy = e.pageY || e.pageY - offset.top || 0; // top

	//alert(yy);
	// 标记图片
	$(this).attr('data-status', '1');
	// 往图片上加标记
	$(this).parent().append('<div class="ip_tooltip ip_img32" style="top: '+yy+'px; left: '+(xx)+'px;z-index:99999999999999999999" data-round="roundBgW"><div class="roundBgW"></div><div class="roundBgWIn"></div><div class="roundBgWInner"></div><div class="button undefined"></div><div class="descrContainer"><div class="pass-ltr"></div><div class="ip_descr undefined ltr-before"><div class="xs"></div></div></div></div>');
});

<div class="leno-tab">
	<span class="item">最热</span>
	<span class="item active">最新</span>
	<span class="item">最新</span>
</div>
<script>
$('.leno-tab .item').click(function() {
	$('.leno-tab .item').removeClass('active');
	$(this).addClass('active');
});
</script>

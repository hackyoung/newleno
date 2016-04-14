<extend name="Layout.two_col">
	<fragment name="one">
        <button id="hello" class="leno-btn">test</button>
<script>
$(document).ready(function() {
    console.log($('#hello'));
    $('#hello').click(function() {
        leno.confirm('hello world', {ok: '确定', cancel: '放弃'}, function(e) {
            if(e) {
                leno.alert('成功');
            } else {
                leno.alert('失败');
            }
        });
    });
});
</script>
	</fragment>
	<fragment name="two">
	</fragment>
</extend>

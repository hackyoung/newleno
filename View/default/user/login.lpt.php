<extend name="Layout.default">
	<fragment name="body">
		<div class="user body">
			<div class="user show">
				<view name="Element.user.login" />
				<a href="/user/register">没有帐号？</a>
				<a href="">忘记密码</a>
			</div>
		</div>
	</fragment>
</extends>
<script>
new layer({node: $('.user.show'), id: 'login', css: 'empty'});
</script>

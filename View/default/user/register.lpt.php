<extend name="Layout.default">
	<fragment name="body">
		<div class="user body">
			<div class="user show">
				<view name="Element.user.register" />
				<a href="/user/login">已有帐号？</a>
			</div>
		</div>
	</fragment>
</extends>
<script>
new layer({node: $('.user.show'), id: 'register', css: 'empty'});
</script>

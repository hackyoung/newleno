<extend name="Layout.default">
	<fragment name="body">
		<div class="body">
			<div class="form log">
				<header>
					<a class="focus" href="#login">登录</a>
					<a href="#register">注册</a>
				</header>
				<form id="login">
					<input class="leno-input" placeholder="电子邮件/用户名" type="username" />
					<input class="leno-input" placeholder="6-32位字母数字符号" type="password" />
					<button class="leno-btn leno-btn-blue" style="width:100%">登录</button>
				</form>
				<form id="register">
					<input class="leno-input" placeholder="电子邮件/用户名" type="username" />
					<input class="leno-input" placeholder="6-32位字母数字符号" type="password" />
					<input class="leno-input" placeholder="6-32位字母数字符号" type="password" />
					<button class="leno-btn leno-btn-blue" style="width:100%">注册</button>
				</form>
			</div>
		</div>
		<script>
$(document).ready(function() {
	$('.form>header>a').click(function() {
		var id = $(this).attr('href');
		$('.form form').fadeOut('normal', function() {
			$(id).fadeIn();
		});
	});
});
		</script>
	</fragment>
</extends>

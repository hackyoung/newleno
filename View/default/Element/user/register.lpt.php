<div id="register" class="leno-form log" href="/user/register" go="/user" method="put">
	<div class="input-line">
		<div class="leno-input-group">
			<label class="zmdi zmdi-account"></label>
			<input type="username" class="leno-input"  data-regexp="^\w+@\w+\.\w+$" data-msg="请输入电子邮件" placeholder="输入电子邮件" />
		</div>
	</div>
	<div class="input-line">
		<div class="leno-input-group">
			<label class="zmdi zmdi-lock"></label>
			<input type="password" class="leno-input" data-regexp="^.{6,32}$" data-msg="请输入6-32位密码" placeholder="输入6-32位密码" />
		</div>
	</div>
	<div class="input-line">
		<div class="leno-input-group">
			<label class="zmdi zmdi-lock"></label>
			<input type="password" class="leno-input" data-regexp="^.{6,32}$" data-msg="请输入6-32位密码" placeholder="确认密码" />
		</div>
	</div>
	<div class="input-line">
		<button class="leno-btn leno-btn-success" data-id="submit">提交</button>
	</div>
</div>

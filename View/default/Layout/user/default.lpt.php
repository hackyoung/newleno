<style>
.left {
	width: 200px;
	border-right: 1px solid #eee;
}
.right {
	width: calc(100% - 200px);
}
.row-1 {
	border-bottom: 1px solid #eee;
	height: 200px;
}
.user .row-1.profile {
	display: flex;
	display: -webkit-flex;
	align-items: center;
	justify-content: center;
	text-align: center;
}

.user .row-1 .info {
	height: 167px;
}

.row-1 img {
	width: 120px;
	height: 120px;
}
.user .row-2 ul li {
	padding: 5px 0px;
	list-style: none;
}
</style>
<extend name="Layout.one_col">
	<fragment name="one">
		<div class="leno-piece-common-none">
			<div class="leno-piece tc-container user">
				<div class="tc-cell left">
					<div class="row-1 profile">
						<div>
							<img src="https://avatars2.githubusercontent.com/u/3030341?v=3&s=200" />
							<div>
								hackyoung
							</div>
						</div>
					</div>
					<div class="row-2">
						<ul>
							<li><a href="">消息</a></li>
							<li><a href="">与我相关</a></li>
							<li><a href="">发布的任务</a></li>
							<li><a href="">认领的任务</a></li>
							<li><a href="">经验</a></li>
							<li><a href="">文章</a></li>
							<li><a href="">团队</a></li>
							<li><a href="">修改密码</a></li>
						</ul>
					</div>
				</div>
				<div class="tc-cell right">
					<div class="row-1">
						<div class="info">
							hello world
						</div>
						<div class="leno-piece-btn-group">
							<div class="item">
								<button class="leno-btn">
									任务
									<span class="zmdi zmdi-plus"></span>
								</button>
							</div>
							<div class="item">
								<button class="leno-btn">
									文章
									<span class="zmdi zmdi-plus"></span>
								</button>
							</div>
							<div class="item">
								<button class="leno-btn">
									经验
									<span class="zmdi zmdi-plus"></span>
								</button>
							</div>
						</div>
					</div>
					<div class="row-2">
						<fragment name="user_content" />
					</div>
				</div>
			</div>
		</div>
	</fragment>
</extend>

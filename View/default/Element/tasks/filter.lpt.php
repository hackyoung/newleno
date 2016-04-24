<?php $l = ['PHP', 'Python', 'perl', 'Java', 'C/C++', 'Javascript']; ?>
<?php $ll = array_merge($l, $l);?>
<?php $ll = array_merge($ll, $ll);?>
<?php $ll = array_merge($ll, $ll);?>
<?php $ll = array_merge($ll, $ll);?>
<?php $ll = array_merge($ll, $ll);?>
<?php $ll = array_merge($ll, $ll);?>
<div class="tc-container tasks-filter">
	<div class="tc-cell">
		<div id="111" class="leno-dropdown" data-type="click">
			<div class="leno-piece" data-toggle="dropdown">分类<span class="zmdi zmdi-caret-down"></span></div>
			<div class="leno-dropdown-menu select-menu">
				<input class="leno-input" placeholder="输入关键字过滤" />
				<div>
					<llist name="ll" id="lb">
					<div class="tag">{$lb}</div>
					</llist>
				</div>
			</div>
		</div>
		<div>
			<span class="label">热门分类</span>
			<llist name="l" id="la">
			<div class="tag">{$la}</div>
			</llist>
		</div>
	</div>
	<div class="tc-cell">
		<div id="222" class="leno-dropdown" data-type="click">
			<div class="leno-piece" data-toggle="dropdown">技术<span class="zmdi zmdi-caret-down"></span></div>
			<div class="leno-dropdown-menu select-menu">
				<input class="leno-input" placeholder="输入关键字过滤" />
				<div>
					<llist name="ll" id="lb">
					<div class="tag">{$lb}</div>
					</llist>
				</div>
			</div>
		</div>
		<div>
			<span class="label">热门技术</span>
			<llist name="l" id="la">
			<div class="tag">{$la}</div>
			</llist>
		</div>
	</div>
	<div class="tc-cell">
		<div id="333" class="leno-dropdown" data-type="click">
			<div class="leno-piece" data-toggle="dropdown">预算<span class="zmdi zmdi-caret-down"></span></div>
			<div class="leno-dropdown-menu select-menu">
				<div style="text-align: center;">
				<input class="flat-input"  />---<input class="flat-input" /><a href="">确定</a>
				</div>
				<div>
				<?php $ss = [['begin'=>'500', 'end'=>'1000'], ['begin'=>'1000', 'end' => '1500']];?>
					<llist name="ss" id="s">
					<div class="tag">{$s.begin}---{$s.end}</div>
					</llist>
				</div>
			</div>
		</div>
		<div>
			<span class="label">热门预算</span>
			<llist name="l" id="la">
			<div class="tag">{$la}</div>
			</llist>
		</div>
	</div>
</div>

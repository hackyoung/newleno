<extend name="Layout.one_col">
    <fragment name="one">
        <div class="leno-piece-common editor">
            <div class="input-line">
                <input name="title" class="leno-input" placeholder="请输入标题" />
            </div>
            <div class="input-line">
                <textarea class="leno-input" placeholder="在这里输入描述"></textarea>
            </div>
            <div class="input-line">
                <div id="editor">在这里输入需求</div>
            </div>
            <div class="input-line">
                <label>技术</label><a name="add-tag">添加</a>
                <div>
                    <span class="tag">PHP</span>
                    <span class="tag">Javascript</span>
                    <span class="tag">HTML5</span>
                    <span class="tag">JAVA</span>
                    <span class="tag">C/C++</span>
                    <span class="tag">Python</span>
                </div>
            </div>
			<div class="input-line">
				<label>分类</label><a name="">没有你需要的分类？</a>
				<div>
				</div>
			</div>
            <div class="input-line">
                <label>工期</label>
                <input class="flat-input" style="width: 60px" />天
                <input class="flat-input" style="width: 60px" />小时
            </div>
            <div class="input-line">
                <label>估价</label>
                <input class="flat-input" style="width: 100px"/>元
            </div>
            <div class="input-line">
                <button class="leno-btn leno-btn-blue">发布</button>
                <button class="leno-btn leno-btn-blue">草稿</button>
            </div>
        </div>
    </fragment>
</extend>
<div id="select-tag">
    <div class="lw-toolbox" style="text-align: center;">
        <input class="leno-input" placeholder="输入过滤" />
    </div>
    <div>
    <?php $iii = [1, 2,3,4,5,67,8,6,5,4,4,4,3,2,4,2, 3,4,3,32,3,32,3]; ?>
        <llist name="iii" id="i">
            <span class="tag">PHP</span>
            <span class="tag">Javascript</span>
            <span class="tag">HTML5</span>
            <span class="tag">JAVA</span>
            <span class="tag">C/C++</span>
            <span class="tag">Python</span>
        </llist>
    </div>
</div>
<script>
new leno.editor({
    id: 'editor'
});
var selectTag = layer.win({
    id: "select-tag",
    hide: true,
    title: '选择完成项目需要的技术',
    node: $('#select-tag')
});

$('[name=add-tag]').click(function() {
    selectTag.show();
    return false;
});
</script>

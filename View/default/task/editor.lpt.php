<extend name="Layout.one_col">
    <fragment name="one">
        <style>
        .editor label {
            width: 100px;
            display: inline-block;
        }
        </style>
        <div class="leno-piece-common editor">
            <div class="input-line">
                <input class="leno-input" placeholder="请输入标题" />
            </div>
            <div class="input-line">
                <label>技术</label>
            </div>
            <div class="input-line">
                <label>工期</label>
                <input class="leno-input" style="width: 60px" />天
                <input class="leno-input" style="width: 60px" />小时
            </div>
            <div class="input-line">
                <label>估价</label>
                <input class="leno-input" style="width: 100px"/>元
            </div>
            <div class="input-line">
                <label>描述</label>
                <textarea class="leno-input"></textarea>
            </div>
            <div class="input-line">
                <label>需求</label>
                <div id="editor">
                </div>
            </div>
            <div class="input-line">
                <button class="leno-btn leno-btn-blue">发布</button>
                <button class="leno-btn leno-btn-blue">草稿</button>
            </div>
        </div>
    </fragment>
</extend>
<script>
$(document).ready(function() {
    new leno.editor({
        id: 'editor'
    });
});
</script>

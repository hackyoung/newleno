<extend name="Layout.one_col">
    <fragment name="one">
        <div class="leno-piece-common editor">
            <div class="input-line">
                <input class="leno-input" placeholder="请输入标题" />
            </div>
            <div class="input-line">
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

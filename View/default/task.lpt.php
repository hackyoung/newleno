<extend name="Layout.two_col">
	<fragment name="one">
        <div class="leno-piece-common-none">
            <div class="leno-piece" style="padding-bottom: 30px">
                <div class="leno-piece-btn-group">
                    <div class="item">
                        <button class="leno-btn"><span class="zmdi zmdi-thumb-up"></span>(1000)</button>
                    </div>
                    <div class="item">
                        <button class="leno-btn"><span class="zmdi zmdi-account"></span>(1000)</button>
                    </div>
                    <div class="item">
                        <button class="leno-btn" title="share"><span class="zmdi zmdi-share"></span>(1000)</button>
                    </div>
                </div>
                <div class="leno-piece-common-none">
                    <h1>hello world</h1>
                    <span class="time">2015-05-05 00:00:00</span>
                    <p>
                        hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world
                    </p>
                    <div style="text-align: center; padding-bottom: 20px">
                        <button name="to-bidding" class="leno-btn leno-btn-success">add to bid</button>
                    </div>
                </div>
				<div class="hr"></div>
				<div class="leno-piece-common-none">
					<view name="Element.comment" />
				</div>
				<div class="leno-piece-common-none">
					<view name="Element.comment" />
				</div>
				<div class="leno-piece-common-none">
					<view name="Element.comment" />
				</div>
				<div class="leno-piece-common-none">
					<view name="Element.comment" />
				</div>
            </div>
        </div>
	</fragment>
	<fragment name="two">
		<div class="leno-piece-common-none">
			<view name="Element.recommend" />
			<view name="Element.recommend" />
		</div>
	</fragment>
</extend>
<div name="hello-bidding-form" style="padding: 10px">
	<view name="Element.task.bidding" />
</div>
<script>
layer.modal({
	id: "hello-bidding-form",
	title: "参与竞价",
	node: $('[name=hello-bidding-form]'),
	width: 400,
	hide: true
});

$('[name=to-bidding]').click(function() {
	layer.get('hello-bidding-form').show();
});
</script>

<extend name="Layout.two_col">
    <fragment name="one">
		<div class="leno-piece-common-none">
			<view name="Element.tasks.filter" />
<!--
			<view name="Element.tasks.tab" />
-->
		</div>
        <llist name="list" id="l">
        <div class="leno-piece-common">
            <view name="Element.item.task" />
        </div>
        </llist>
    </fragment>
    <fragment name="two">
		<div class="leno-piece-common-none">
			<view name="Element.recommend" />
			<view name="Element.recommend" />
			<view name="Element.recommend" />
		</div>
    </fragment>
</extend>

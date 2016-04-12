<extend name="Layout.two_col">
    <fragment name="one">
        <llist name="list" id="l">
        <div class="leno-piece-common">
            <view name="Element.item.task" />
        </div>
        </llist>
    </fragment>
    <fragment name="two">
		<view name="Element.recommend" />
		<view name="Element.recommend" />
		<view name="Element.recommend" />
    </fragment>
</extend>
<script>
/*
$(document).ready(function() {
    var iu = new ImageUploader({
        id: "hello_world",
        position: layer.center
    });
    var l = layer.get('hello_world').content;
    l.css('transition', 'all 0.5s ease-in');
    l.css('-moz-transition', 'all 0.5s ease-in');
    l.css('-webkit-transition', 'all 0.5s ease-in');
    var position = 1;
    setInterval(function() {
        layer.get('hello_world').setPosition(position);
        position = (position + 1)%10;
    }, 500);
});
 */
</script>

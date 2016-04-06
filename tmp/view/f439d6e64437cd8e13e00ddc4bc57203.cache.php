<style>
.glb-header {
    background-color: #ccc;
    border-bottom: 1px solid #ddd;
    height: 80px;
}

.no-decaration-ul {
    display: inline-block;
    padding: 0px;
    margin: 0px;
    position: absolute;
}

.no-decaration-ul>li {
    list-style: none;
    display: inline-block;
    vertical-align: text-top;
}

.menu>li, .person>li {
    line-height: 80px;
    height: 100%;
    padding: 0px 20px;
}

.menu>.item:hover {
    background-color: #ddd;
    cursor: pointer;
}

.menu .search {
    transition: all 0.2s ease-in;
    -o-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    -webkit-transition: all 0.2s ease-in;
}
.menu>li {
    vertical-align: middle;
}

.menu .search:active,
.menu .search:focus {
    width: 300px;
}

.menu {
    left: 100px;
}

.person {
    right: 100px;
}

.person>li:first-child {
    border-radius: 80px;
    width: 80px;
    height: 80px;
    padding: 0px;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1) inset;
    -moz-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1) inset;
    -webkit-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1) inset;
    border: 1px solid #999;
    overflow: hidden;
}

.person img {
    width: 74px;
    height: 74px;
    border-radius: 74px;
    background-color: white;
    margin-left: 2px;
    margin-top: 2px;
}

</style>
<header class="glb-header">
    <ul class="no-decaration-ul menu">
        <li class="item">找助攻</li>
        <li class="item">找案子</li>
        <li>
            <input type="text" class="leno-input search" placeholder="输入关键字搜索" />
        </li>
    </ul>
    <ul class="no-decaration-ul person">
        <li><img src="" /></li>
        <li>hackyoung@163.com</li>
    </ul>
</header>

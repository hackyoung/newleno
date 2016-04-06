<style>
.glb-header {
    background-color: #eee;
    height: 51px;
    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.3);
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
    line-height: 50px;
    height: 100%;
    padding: 0px 20px;
}

.menu>.item:hover,
.menu>.item.active {
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
    vertical-align: text-top;
}

.menu .search:active,
.menu .search:focus {
    width: 300px;
}

.menu {
    left: 10%;
}

.person {
    right: 10%;
}

.content {
    width: 80%;
    margin-left: calc(10% + 20px);
}

.person>li:first-child {
    margin-top: 1px;
    border-radius: 50px;
    width: 50px;
    height: 50px;
    padding: 0px;
    box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.3) inset;
    -moz-box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.3) inset;
    -webkit-box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.3) inset;
    border: 1px solid #999;
    overflow: hidden;
}

.person img {
    width: 42px;
    height: 42px;
    border-radius: 42px;
    background-color: white;
    margin-left: 3px;
    margin-top: 3px;
}

/*tc*/
.tc-container {
    display: table;
    width: 100%;
}

.tc-one,
.tc-two {
    display: table-cell;
}

.tc-one {
    width: 70%;
}

/*tc end*/
</style>
<header class="glb-header">
    <div class="wrapper">
        <ul class="no-decaration-ul menu">
            <li class="item active">找助攻</li>
            <li class="item">找案子</li>
            <li>
                <input type="text" class="leno-input search" placeholder="输入关键字搜索" />
            </li>
        </ul>
        <ul class="no-decaration-ul person">
            <li id="user-info" data-top="false" data-type="hover" data-css="black-profile" class="leno-dropdown">
                <img src="https://avatars2.githubusercontent.com/u/3030341?v=3&s=40" data-toggle="leno-dropdown" />
                <div class="leno-dropdown-menu">
                    hello world
                </div>
            </li>
            <li>hackyoung@163.com</li>
        </ul>
    </div>
</header>

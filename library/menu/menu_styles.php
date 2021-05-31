<style>

.menu_icon{ width: 30px; height: 35px; display: table; position: relative; margin:5px 0px; -webkit-tap-highlight-color: rgba(0,0,0,0); }
.menu_icon>span{ display: block;	position: absolute; height: 4px; width: 100%; background: #000000; border-radius: 0px;	opacity: 1;	left: 0; transform: rotate(0deg) translate(0%,-50%); -webkit-transition:all 200ms ease-in-out; -moz-transition:all 200ms ease-in-out; -o-transition:all 200ms ease-in-out; transition:all 200ms ease-in-out; }
#nav{ position:relative; z-index:9; }
#nav>ul {list-style:none; margin:0; padding:0;margin-top:2px;}
#nav > a {display:none;}
#nav li {position:relative; margin:0; padding:0; display: inline-block; text-align: center;background:rgba(255,255,255,0.7);}
#nav li a{ display: block; cursor:pointer;-webkit-tap-highlight-color: rgba(0,0,0,0);box-sizing: border-box; -webkit-transition:all 300ms cubic-bezier(0,.5,3,1);	-moz-transition:all 300ms cubic-bezier(0,.5,.3,1);	-o-transition:all 300ms cubic-bezier(0,.5,.3,1); transition:all 300ms cubic-bezier(0,.5,.3,1); }

/* second level */
#nav li ul{	position: absolute; padding:0; display: none; overflow: hidden; z-index: 1; width: 100%; }
#nav li:hover ul{	/*display:block; show with jquery*/	left: 0;	right: 0; }
#nav li ul li{display: block;}
#nav li ul li a{ display: block;-webkit-tap-highlight-color: rgba(0,0,0,0); -webkit-transition:all 300ms cubic-bezier(0,.5,3,1);	-moz-transition:all 300ms cubic-bezier(0,.5,.3,1);	-o-transition:all 300ms cubic-bezier(0,.5,.3,1); transition:all 300ms cubic-bezier(0,.5,.3,1); }
.clearfix::after{	content: ''; display: table; clear: both; }
#nav{position:initial;}
#nav:not( :target ) > a:first-of-type, #nav:target > a:last-of-type{	display: block; }
/* first level */
#nav > ul{ display: none; position: absolute; z-index:99999999999; left: 0; right: 0; }
#nav:target > ul, #nav > ul > li{display: block;}
/* second level */
#nav li ul{position: static;} 
.menu_icon > span:nth-child(1){ top:25%; }
.menu_icon > span:nth-child(2){ top:50%;width:50%;}
.menu_icon > span:nth-child(3){ top:50%;width:50%;}
.menu_icon > span:nth-child(4){ top:75%; }
.menu_icon.open span:nth-child(1), .menu_icon.open span:nth-child(4){ width:0px;	left: 50%; opacity: 0; }
.menu_icon.open span:nth-child(2){ transform: rotate(45deg); }
.menu_icon.open span:nth-child(3){ transform: rotate(-45deg); }
.menu_icon{	display:none; }
#nav>ul, #nav:target > ul{	display:none; }  

@media(max-width:680px){
    .menu_icon>span{ display: block;	position: absolute; height: 4px;	width: 100%; background: #000000; border-radius: 0px;	opacity: 1;	left: 0;	transform: rotate(0deg) translate(0%,-50%); -webkit-transition:all 200ms ease-in-out; -moz-transition:all 200ms ease-in-out; -o-transition:all 200ms ease-in-out; transition:all 200ms ease-in-out; }
}

</style>


@charset "utf-8";
@font-face {
    font-family: 'Museo500Regular';
    src: url('{$BASE_PATH}Museo500-Regular-webfont.eot');
    src: url('{$BASE_PATH}Museo500-Regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$BASE_PATH}Museo500-Regular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'Museo300Regular';
    src: url('{$BASE_PATH}Museo300-Regular-webfont.eot');
    src: url('{$BASE_PATH}Museo300-Regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$BASE_PATH}Museo300-Regular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

html {
  min-height: 100%;
}

body {
	margin-left: 0px;
	margin-top: 8px;
	margin-right: 0px;
	margin-bottom: 46px;
    font-family: "Museo500Regular","Times New Roman",Times,serif;
    font-style: normal;
    font-size: 12pt;
    letter-spacing: 0.3px;
    background-color: #d4d9f7;
    background: linear-gradient(to bottom, #d4d9f7 0%, #abafea 31%, #999ee8 100%);
}

body,td,th {
  font-family: "Museo500Regular","Times New Roman",Times,serif;
  font-style: normal;
  font-size: 12pt;
  color: #000000;
  letter-spacing: 0.3px;
}
/* 
@media all and (min-width: 820px)  {
#PM-Wrapper {
  	width: 800px;
}
}

@media all and (min-width: 1220px) {
#PM-Wrapper {
  	width: 1200px;
}
}
*/
#PM-Wrapper {
  	width: 1200px;
    min-width: 1200px;
    max-width: 1200px;
  	margin: 0 auto;
	border: 1px solid;
	border-color: #888888;
	text-align: left;
	box-shadow: 2px 2px 8px #333;
	border-radius: 9px;
	padding-left: 3px;
	padding-right: 3px;
	padding-top: 3px;
	padding-bottom: 3px;
	background-color: rgb(249, 249, 249);
}

#PM-Header {
    width: 100%;
    height: 82px;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    overflow: hidden;
    background: #dee6e8; /* Old browsers */
    background: radial-gradient(ellipse at 50% 100%, rgba(236,242,240,1) 0%,rgba(236,242,240,0.5) 50%,rgba(255,255,255,0) 100%), radial-gradient(circle at 50% 85%, #dee6e8 0%,#c6ced1 80%,#b8cacc 100%);
}

#PM-Menubar {
    padding: 0pt;
    vertical-align: top;
    background-color: rgb(82, 114, 161);
    width: 100%;
    height: 29px;
    border: solid #A0A0A4;
    border-width: 1px 0;
}

#PM-Content {
    width: 100%;
    display: table;
    font-family: "Museo500Regular","Times New Roman",Times,serif;
    font-style: normal;
    font-size: 12pt;
    letter-spacing: 0.3px;
    vertical-align: top;
/*    animation: fadeEffect 0.5s; */
}

#PM-Content-Body {
    width: 100%;
    display: table-cell;
    vertical-align: top;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 8px;
    padding-bottom: 8px;
}

#PM-Content-Sidebar {
    min-width: 270px;
    width: 270px;
    height: 100%;
    display: table-cell;
    padding: 8px 10px 10px;
    vertical-align: top;
}

#PM-Content-Sidebar a, #PM-Content-Sidebar a:visited, #PM-Content-Sidebar a:hover {
    color: #00E;
}

@keyframes fadeEffect {
    from { opacity: 0; }
    to { opacity: 1; }
}

.fake-table {

}

.fake-table-row:nth-of-type(even) {
background: linear-gradient(to right, rgba(240,240,240,1) 50%,rgba(255,255,255,0) 100%);
}

.fake-table-row-search-plugin {
    width: 325px;
    height: 24px;
    display: inline-block;
    text-align: left;
    vertical-align: top;
    align: left;
    margin-left: 20px;
    margin-right: 20px;
    padding: 4px 8px;
    text-decoration: none;
    color: black;
}

.fake-table-row-search-plugin:hover {
    color: #004B97;
}

h1 {
  font-family: "Museo300Regular","Times New Roman",Times,serif;
  font-size: 20.5pt;
  color: #000066;
  letter-spacing: 0.3px;
}

h2.faq {
  background-color: #e0e0ff;
}

blockquote {
  background-color: #ffffcc;
  font-family: "Museo500Regular","Times New Roman",Times,serif;
  -moz-box-shadow: 1px 1px 2px #000;
  box-shadow: 1px 1px 2px #000;
  margin: 16px;
  padding: 4px;
}

pre {
  font-family: "Courier New",Courier,monospace;
  font-size: 11pt;
  }

  .alignleft {
	float:left;
	text-align:left;
	margin-right:10px;
}
.alignright {
	float:right;
	text-align:right;
	margin-left:10px;
}
.aligncenter {
	display:block;
	margin-left:auto;
	margin-right:auto;
}

hr {
display: none;
}

.dllink_green {
  border: 1px solid rgb(0, 153, 0); 
  padding: 14px; 
  background-color: rgb(153, 255, 153); 
  font-family: "Museo500Regular",Arial,Helvetica,sans-serif; 
  color: black; 
  text-decoration: none; 
  border-radius: 9px; 
}

.dllink_blue {
  border: 1px solid rgb(0, 0, 153); 
  padding: 14px; 
  background-color: rgb(153, 153, 255); 
  font-family: "Museo500Regular",Arial,Helvetica,sans-serif; 
  color: black; 
  text-decoration: none; 
  border-radius: 9px; 
}

/* pull-down mainmenu css */
.mainmenu {
position:relative;
z-index:998;
	float: left;
	width: 100%;
	padding: 0;
}
.mainmenu ul {
	float: left;
	width: 100%;
	list-style: none;
	line-height: 1;
	color:#FFFFFF;
	background: #5272A1;
	padding: 0;
	border: solid #A0A0A4;
	border-width: 1px 0;
	margin: 0 0 0 0;
	margin-top: -1px;
   filter:alpha(opacity=97);
   -moz-opacity:0.98;
   -khtml-opacity: 0.98;
   opacity: 0.98;
}

.mainmenu a, .mainmenu a:visited {
	display: block;
   font-family: "Museo500Regular","Times New Roman",Times, serif;
   font-size:11.5pt;
   font-weight:500;
   font-style:normal;
   text-decoration:none;
	color: #FFFFFF;
	text-decoration: none;
	padding: 7px 16px;
	letter-spacing: 0.4px;
	opacity: 0.99;

}
.mainmenu ul ul a {
	width:100%;
	height:100%;
}
.mainmenu ul a {
	width:1%;
}


.mainmenu li {
	float: left;
	margin:0;
	padding: 0;
	/* width: 8em; */
}

.mainmenu ul li { float:left; position:relative; }
.mainmenu ul li a { white-space:nowrap; }
	
.mainmenu li ul {
	position: absolute;
	left: -999em;
	height: auto;
	width:15em;	
	
	background: #5272A1;
	font-weight: normal;
	border-width: 1px;
	margin: 0;
}

.mainmenu li li {
	width:15em ;
}

.mainmenu li li a{
	width:13em ;
}

.mainmenu li ul  {
	margin: 0;
}
.mainmenu li ul ul {
	margin: -1.5em 0 0 13.0em;
}
.ul_ch, 
.mainmenu li:hover ul ul,
.mainmenu li li:hover ul ul,
.mainmenu li li li:hover ul ul,
.mainmenu li li li li:hover ul ul,
.mainmenu li li li li li:hover ul ul
{
	left: -999em;
}
.mainmenu li:hover ul,
.mainmenu li li:hover ul,
.mainmenu li li li:hover ul,
.mainmenu li li li li:hover ul,
.mainmenu li li li li li:hover ul
{
	left: auto;
}
.mainmenu li:hover>ul.ul_ch   
{
	left: auto;
}

.mainmenu li:hover {
	background: #004B97;
}

.mainmenu li:hover a,.mainmenu li:hover a:visited,.mainmenu li:hover a:hover,.mainmenu li a:hover {
	color:#FFFBF0;
}
.mainmenu li:hover li a, .mainmenu li li:hover li a, 
.mainmenu li li li:hover li a, .mainmenu li li li li:hover li a,
.mainmenu li:hover li a:visited, .mainmenu li li:hover li a:visited, 
.mainmenu li li li:hover li a:visited, .mainmenu li li li li:hover li a:visited
{
	color:#FFFFFF;
}
.mainmenu li li:hover, .mainmenu li li li:hover, 
.mainmenu li li li li:hover , .mainmenu li li li li li:hover , .mainmenu li li li li li li:hover 
{
	background: #004B97;

}
.mainmenu li li:hover a,.mainmenu li li li:hover a, 
.mainmenu li li li li:hover a, .mainmenu li li li li li:hover a
{
	color: #FFFBF0; 
}

.mainmenu ul ul a, .mainmenu ul ul a:visited,
.mainmenu li li a, .mainmenu li li a:visited
{
	color: #FFFFFF;
}
.mainmenu ul ul a:hover,
.mainmenu li:hover li:hover a,.mainmenu li:hover li:hover a:visited ,
.mainmenu li:hover li:hover li:hover a,.mainmenu li:hover li:hover li:hover a:visited,
.mainmenu li:hover li:hover li:hover li:hover a,.mainmenu li:hover li:hover li:hover li:hover a:visited ,
.mainmenu li:hover li:hover li:hover li:hover li:hover a,.mainmenu li:hover li:hover li:hover li:hover li:hover a:visited,
.mainmenu li:hover li:hover li:hover li:hover li:hover li:hover a,.mainmenu li:hover li:hover li:hover li:hover li:hover li:hover a:visited {
	color: #FFFBF0;
}
.mainmenu li:hover li:hover li a,.mainmenu li:hover li:hover li a:visited ,
.mainmenu li:hover li:hover li:hover li a,.mainmenu li:hover li:hover li:hover li a:visited,
.mainmenu li:hover li:hover li:hover li:hover li a,.mainmenu li:hover li:hover li:hover li:hover li a:visited,
.mainmenu li:hover li:hover li:hover li:hover li:hover li a,.mainmenu li:hover li:hover li:hover li:hover li:hover li a:visited {
	color: #FFFFFF;
}


/* end of mainmenu css - change*/

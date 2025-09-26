<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Sen&display=swap');

.ipProcess{
	background:#eee;
	width:100%;
	border-radius:5px;
	padding:15px;
	margin-bottom:15px;
	}
.ipProcess h5 {
    background: #0C9;
    border-radius: 5px;
    padding: 15px;
    margin: 0 0 10px 0;
    color: #fff;
    font-size: 15px;
}
.ipProcess textarea {
    padding: 15px;
    border: none;
    border-radius: 5PX;
    width: 100%;
    min-height: 110px;
}

.inInputs.ipBtnS:hover {

    background: #CC3;
}

.feedAdd:hover{
	text-decoration:none;
  }
 .feedAdd:hover span {
	background:#CC3;
  }

.containerMax{
	max-width:400px; 
	margin:0 auto;
	width:100%;
	}
.containerIps{
	width:100%;
	}
body{
	background:#F0F2F5;
    /*font-family: 'Nunito Sans', sans-serif !important;*/
    font-family: 'Sen', sans-serif !important;
	}
.ipHeader{
	background:#fff;
	}
.containerIp {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
	max-width:800px;
	width:100%;	
}
 
.ipHomeBack{
	background:url({{asset("jp/banner.jpg")}});
	background-attachment:fixed; 
	background-size:100%; 
	height:100vh;
	background-size:cover;
	background-position:center center;
	}
.pad100{
	padding:30px;
	}
.ipSerchForm {
    background: rgba(255,255,255,.9);
    margin: 15px 0;
    box-shadow: 0 1px 2px #ccc;
	border-radius:10px;
}
.ipHeader {
    background: rgba(255,255,255,.9);
    border-radius: 0;
}
.ipHeader a {
    color:#555;
	font-size:15px;
}
.ipH3Head{
	margin:0;
	margin-bottom:20px;	
	color:#333;
	border-bottom:1px solid #999;
	padding-bottom:15px;
	}
.inInputs {
    width: 100%;
	border-left:none;
	border-top:none;
	border-right:none;
    border-bottom:1px solid rgba(0,0,0,.2);
	color: #000 !important;
    padding: 10px;
    margin-bottom: 10px;
    background: no-repeat;
    border-radius: 5px;
	 }
.nav > li > a:focus, .nav > li > a:hover{
	background:#0C9 !important;
	color:#fff !important;	
	}
.active{
	background:#0C9 !important;
	color:#fff !important;	
}
.ipBtnS {
    background: #0C9;
    margin-top: 15px;
    color: #fff !important;
    display: block;
}
.ipNavbar-brand {
    float: left;
    height: 50px;
    padding: 15px 0px;
    font-size: 25px !important;
    line-height: 20px;
	color:#0C9 !important;
}
.ipNavbar-brand span {
	color:#555 !important;
	}
.mobileNav{
	display:none;
	}
@media only screen and (max-width: 768px){
body{
	padding:15px;
	}
.pad100 {
    padding: 15px;
}
.nav.navbar-nav.navbar-right {
    display: none;
    
}
.navbar-header {
    text-align: center;
}
.ipNavbar-brand {
    display: block;
    text-align: center;
    float: none;
    border-radius: 5px;
    overflow: hidden;
}
.navbar.ipHeader {
    border-radius: 10px;
	margin-bottom:0px;
}
.mobileNav {
    display: block;
    background: #00CC99;
    margin: 15px 0;
    box-shadow: 0 1px 2px #ccc;
    border-radius: 10px;
    position: sticky;
    bottom: 0;
    z-index: 999;
	padding:15px 0;
}

.mobileNav a {
    display: inline-block;
    width: 24%;
    text-align: center;
    font-size: 10px;
	color:#fff;
}
.mobileNav a:hover {
    text-decoration:none;
	color:rgba(0,0,0,.5);
}

.mobileNav a .glyphicon{
	font-size:13px !important;
	display:block;
	margin-bottom:-5px;
	}

}



 .feedAdd {
    display: block;
    background: #eee;
    padding: 0px;
        padding-left: 0px;
    margin-bottom: 10px;
    color: #555;
    font-size: 15px;
    line-height: 41px;
    padding-left: 15px;
    border: 2px solid #eee;
    border-radius: 7px;
    position:relative;
}
.feedAdd span {
    display: block;
    width: 50px;
    float: right;
    background: #0C9;
    text-align: center;
    color: #fff;
    line-height: 40px;
    font-size: 35px;
    border-radius: 5px;
    position:absolute;
    top:0px;
    right:1px;
}
/*Loader Start*/
  
  .loader {
     border: 4px solid #f3f3f3;
    border-radius: 50%;
    border-top: 4px solid #3498db;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    margin: auto;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/*Loader End*/
.hrProf{
    position:relative;
}
.edtProBtn{
    position:absolute;top:0;right:10px
}
</style>
<style>
    /* Custom Css */
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@300;400&display=swap');
body {
  font-family: 'Raleway', sans-serif!important;
  color: #444444;
  background:white;
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


.employee-description p{
    font-size: 14px;
    line-height: 1.4;
    margin: 1px;
}
.employee-description p span{
    font-weight:600;
}
.profile-container{
    box-shadow: 0 0 3px 0 black;
    padding: 17px 0px;
    border-radius: 3px;
}
.profile-container-index{
    box-shadow: 0 0 3px 0 black;
    padding: 5px 5px 1px 5px;
    border-radius: 3px;
    margin: 5px;
    width: 100%;
    height: 270px;
}
.profile-container-index img{
    width:100%;
    height:80%;
    margin-bottom:10px;
    back
}
.profile-text-designation{
    font-size: 10px;
    font-weight: 600;
    line-height: 0.1;
}
.profile-text-name{
    font-size: 12px;
    font-weight: 600;
    line-height: 0.1;
    margin-top: 10px;
    margin-bottom: 23px;
}
.profile-container-inner{
   box-shadow: 0 0 3px 0 black;
    padding: 20px 0px;
    border-radius: 3px;
    background-color: white;
    margin: auto;
}
@media(max-width:767px){
    .profile-container{
    margin:0px 5px;
    }   
}
.profile-tag{
    color:black!important;
}
.title-text{
    margin-bottom:35px;
}
.title-text span{
    border-bottom:2px solid black;
}
#hero {
  width: 100%;
  height: 60vh;
  background: url("{{asset("website/assets/img/hero-bg.jpg")}}") center center;
  background-size: cover;
  position: relative;
  margin-top: 70px;
  padding: 0;
}
#banner {
  width: 100%;
  height: 300px;
  background: url("{{asset("website/assets/img/hero-bg.jpg")}}") center center;
  background-size: cover;
  position: relative;
  margin-top: 70px;
  text-align:center;
  padding: 0;  
}
.banner-container{
    width: 100%;
    height: 100%;
    align-items: center;    
    background-color: rgba(0,0,0,.5);
    color: white;
    padding:125px 0px;
}
@media (max-width:767px){
    #banner {
  width: 100%;
  height: 200px;
  background: url("{{asset("website/assets/img/hero-bg.jpg")}}") center center;
  background-size: cover;
  position: relative;
  margin-top: 70px;
  text-align:center;
  padding: 0;
  background-color:rgba(0,0,0,.5);
    }
    .banner-container{
    width: 100%;
    height: 100%;
    align-items: center;    
    background-color: rgba(0,0,0,.5);
    color: white;
    padding:80px 0px;
}
}
.feedback-container{
    box-shadow: 0 0 2px 0;
    padding: 10px;
    background-color: white;
    margin: 13px 5px -7px 15px;
}
.feedback-container p{
    font-size:14px;
}
.profile-form-container{
    background: white;
    box-shadow: 0 0 2px 0 black;
    padding: 14px 10px 10px 10px;
}
.form-control::placeholder{
    color:lightgrey;
}
.error{
    color:red;
}
.success-alert, .failed-alert{
    color:white;
    position: fixed;
    right: 0px;
    z-index:100;
    box-shadow: 0 0 30px 0 black;
    border:none;

}
.success-alert{
    background-color:green;
}
.failed-alert{
    background-color:red;
}
.modal-headers{
    padding: 7px 0 2px 10px;
    border-bottom: 2px solid rgba(155,155,155, 0.1);
    margin: 0 10px 0 10px;  
    font-family: 'Raleway', sans-serif!important;
}
.see-all{
    font-size: 15px;
    background: black;
    color: white;
    padding: 10px;
}
.consume-contribute-list{
    position: absolute;
    top: -55px;
    left: -28px;
}
.consume-contribute-list li{
    background: black;
    color: white;
    padding: 7px;
    border-radius: 4px;
    float:left;
}
}

</style>
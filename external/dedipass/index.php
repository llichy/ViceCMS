<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("../../global.php");
?>
<!DOCTYPE html>
<html class="no-js" ng-app="payment" ng-controller="Ctrl" ng-cloak>
	<head>
		<meta http-equiv="X-Frame-Options" content="ALLOWALL">
		<meta charset="utf-8">
		<title>Dedipass Payment</title>
		<meta name="viewport" content="width=device-width">
		<style type="text/css">
			/* Default */
*,*:before,*:after{
	-webkit-box-sizing:border-box;
	-khtml-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-ms-box-sizing:border-box;
	box-sizing:border-box;
	-ms-interpolation-mode:bicubic;
	image-rendering:-webkit-optimize-contrast;
	image-rendering:pixelated;
}

*:not(.news-article)>div:not(.float-left):not(.float-right):after{
	content:"";
	display:block;
	clear:both;
}

html{
	height:100%;
}

body{
	background-color:#3B3B3B;
	display:-webkit-flex;
	display:-ms-flexbox;
	display:flex;
	-webkit-flex-direction:column;
	-ms-flex-direction:column;
	flex-direction:column;
	font-family:"Ubuntu", Verdana, Arial, sans-serif;
	font-size:16px;
	color:#7ecaee;
	line-height:1.4;
	margin:0;
	min-width:320px;
	min-height:100%;
}

body.hotel--visible{
	overflow:hidden;
	background-color: #9ed6f4;
}

.noselect{
	-webkit-touch-callout:none;
	-webkit-user-select:none;
	-khtml-user-select:none;
	-moz-user-select:none;
	-ms-user-select:none;
	user-select:none;
}

img{
	-ms-interpolation-mode:bicubic;
	image-rendering:-webkit-optimize-contrast;
	image-rendering:pixelated;
}

hr{
	height:0;
	clear:both;
}

hr.basic{
	border:0;
	-webkit-box-shadow:0 1px 0 rgba(65, 169, 230, 0.6);
	box-shadow:0 1px 0 rgba(65, 169, 230, 0.6);
	border-bottom:1px solid rgba(0, 0, 0, 0.6);
	margin:12px 0;
}

hr.rounded{
	border-width:0 0 8px;
	clear:both;
	margin:1.35em auto;
	max-width:100%;
	border-image:url("data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 2 1\"><circle fill=\"hsla(0, 0%, 0%, 0.3)\" cx=\"1\" cy=\"0.3\" r=\"0.3\"/></svg>") 0 0 100% 0 repeat repeat;
}

a{
	color:#fff;
	cursor:pointer;
	outline:0;
	text-decoration:none;
}

a:hover{
	text-decoration:underline;
}

p{
	margin:.75em 0;
	line-height:1.4;
}

p:last-child{
	margin-bottom:0;
}

.float-left{
	float:left;
}

.float-right{
	float:right;
}

.empty-results:before{
	background-image:url(../images/frank-unsure.png);
	width:64px;
	height:89px;
	display:block;
	content:"";
	margin-left:12px;
	float:right;
}

.empty-results:after{
	content:"";
	display:block;
	clear:both;
}

.align-right{
	display:inline-block;
	float:right;
	margin:12px 0 12px 24px;
}

.align-left{
	display:inline-block;
	float:left;
	margin:12px 0;
}

.textalign-left{
	text-align:left;
}

.textalign-center{
	text-align:center;
}

.textalign-right{
	text-align:right;
}

.hidden{
	display:none;
}

/* H */
h1, h2, h3, h4, h5, h6{
	color:#fff;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-weight:400;
	margin:0.6em 0;
	line-height:1.2;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
}

h1, h2, h3, h4, h5{
	text-transform:uppercase;
}

h1{
	font-size:36px;
}

h2{
	font-size:32px;
}

h3{
	font-size:16px;
}

h4{
	font-size:20px;
}

h5, h6{
	font-size:16px;
}

h1:first-child, h2:first-child, h3:first-child, h4:first-child, h5:first-child, h6:first-child, p:first-child{
	margin-top:0;
}

/* Table */
table.default-table{
	width:100%;
	margin:0;
	border-spacing:0;
}

table.default-table>thead>tr>td{
	font-weight:bold;
}

table.default-table>tbody>tr:nth-child(even)>td{
	background-color:rgba(44, 66, 83, 0.15);
}

table.default-table>tbody>tr:nth-child(odd)>td{
	background-color:rgba(0, 0, 0, 0.15);
}

table.default-table tr>td{
	padding:6px 15px;
}

/* Form */
label{
	cursor:pointer;
}

.form-left{
	float:none;
	width:33%;
}

.main-column .form-left{
	width:50%;
}

.form-fieldset{
	margin:24px 0;
	padding:0 12px;
}

.dialog .form-fieldset{
	padding-left:0;
	padding-right:0;
}

.form-fieldset-box{
	background-color:#3B3B3B;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	padding:12px;
}

.form-fieldset-box+.form-fieldset-box{
	margin-top:-23px;
}

.form-fieldset-box--top{
	-webkit-border-bottom-left-radius:0;
	-webkit-border-bottom-right-radius:0;
	-moz-border-bottom-left-radius:0;
	-moz-border-bottom-right-radius:0;
	border-bottom-left-radius:0;
	border-bottom-right-radius:0;
}

.form-fieldset-box--bottom{
	-webkit-border-top-left-radius:0;
	-webkit-border-top-right-radius:0;
	-moz-border-top-left-radius:0;
	-moz-border-top-right-radius:0;
	border-top-left-radius:0;
	border-top-right-radius:0;
}

.form-fieldset>:first-child{
	margin-top:0;
}

.form-label{
	color:#fff;
}

.form-label-checkbox,
.form-label-radiobutton{
	color:#7ecaee;
	display:block;
	padding-left:27px;
	padding-right:3px;
	position:relative;
}

.form-field{
	position:relative;
}

.form-fieldset>*{
	margin:12px 0 0;
}

.form-fieldset>:not(.form-field):not(.form-input):not(.form-select){
	padding-left:3px;
	padding-right:3px;
}

.form-helper{
	margin:12px 0 0;
	padding-left:3px;
	padding-right:3px;
	display:block;
}

.form-input,
.form-select{
	-webkit-box-shadow:inset 0 2px 0 0 #9ebecc;
	box-shadow:inset 0 2px 0 0 #9ebecc;
	line-height:1.2;
	padding:5px 12px;
	width:100%;
	font-family:"Ubuntu", Verdana, Arial, sans-serif;
	font-size:16px;
	outline:0 none;
}

.form-input{
	background-color:#DCDCDC;   \\\3B3B3B
	border:3px solid #666666;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	color:#444;
}

textarea.form-input{
	resize:vertical;
	min-height:100px;
}

.form-input:focus{
	background-color:#fff;
	border-color:#9F9F9F;
}

.form-input.invalid{
	border-color:#903352;
}

.form-input.invalid:focus{
	border-color:#ae1a50;
}

.form-checkbox,
.form-radiobutton{
	height:1.3em;
	left:3px;
	position:absolute;
	top:0;
	padding:0;
}

.form-footer{
	margin-top:24px;
	position:relative;
}

.form-footer.align-center .button{
	margin:0 auto;
}

.form-popover{
	-webkit-filter:drop-shadow(0 4px 0 rgba(0, 0, 0, 0.3));
	filter:drop-shadow(0 4px 0 rgba(0, 0, 0, 0.3));
	margin-left:24px;
	padding:12px;
	color:#fff;
	width:calc(100% + 12px);
	position:absolute;
	top:-6px;
	left:100%;
	bottom:auto;
	display:none;
	z-index:5;
}

.form-popover:after{
	border-bottom:8px solid transparent;
	border-left:0;
	border-right:8px solid transparent;
	border-top:8px solid transparent;
	position:absolute;
	left:-8px;
	top:15px;
	display:block;
	content:"";
}

.form-popover.right-position{
	left:auto;
	right:100%;
	margin-left:0;
	margin-right:24px;
}

.form-popover.right-position:after{
	border-left:8px solid transparent;
	border-right:0;
	left:auto;
	right:-8px;
}

.form-popover.form-popover-error{
	background-color:#b00049;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
}

.form-popover.form-popover-error:after{
	border-right-color:#b00049;
}

.form-popover.right-position.form-popover-error:after{
	border-right-color:transparent;
	border-left-color:#b00049;
}

/* Buttons */
button:not(.mfp-close):not(.mce-close):not([tabindex]),
input[type="submit"],
.button,
.button.green-button.button{
	-webkit-box-shadow:0 3px 0 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 3px 0 1px rgba(0, 0, 0, 0.3);
	background-color:#00813e;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	border:2px solid #8eda55;
	line-height:1.2;
	text-align:center;
	color:#fff;
	font-family:"Ubuntu", Verdana, Arial, sans-serif;
	font-size:16px;
	padding:12px 24px;
	margin-bottom:4px;
	text-transform:uppercase;
	display:block;
	cursor:pointer;
	text-decoration:none;
	outline:0 none;
	position:relative;
}

button:not(.mfp-close):not(.mce-close):not([tabindex]):hover,
input[type="submit"]:hover,
.button:hover,
.button.green-button:hover{
	background-color:#00ab54;
	border-color:#b9f373;
	text-decoration:none;
}

button:not(.mfp-close):not(.mce-close):not([tabindex]):not(:disabled):active,
input[type="submit"]:not(:disabled):active,
.button:not(:disabled):active,
.button.green-button:not(:disabled):active{
	-webkit-box-shadow:0 1px 0 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 1px rgba(0, 0, 0, 0.3);
	background-color:#006743;
	border-color:#5abb37;
	-webkit-transform:translate(0, 2px);
	transform:translate(0, 2px);
}

button:not(.mfp-close):not(.mce-close):not([tabindex]):disabled,
input[type="submit"]:disabled,
.button:disabled,
.button.green-button:disabled{
	background-color:#006743;
	border-color:#5abb37;
	opacity:0.4;
	cursor:not-allowed;
}

.button.blue-button{
	background-color:#70706F !important;
	border-color:#868786 !important;
}

.button.blue-button:hover{
	background-color:#868786 !important;
	border-color:#70706F !important;
}

.button.blue-button:active,
.button.blue-button:disabled{
	background-color:#084d74 !important;
	border-color:#1e7b9e !important;
}

.button.red-button{
	background-color:#c0174e !important;
	border-color:#f37387 !important;
}

.button.red-button:hover{
	background-color:#f9586d !important;
	border-color:#ff9598 !important;
}

.button.red-button:active,
.button.red-button:disabled{
	background-color:#820022 !important;
	border-color:#b73e56 !important;
}

.button.yellow-button{
	background-color:#ffb900 !important;
	border-color:#ffea00 !important;
	color:#000 !important;
}

.button.yellow-button:hover{
	background-color:#ffd400 !important;
	border-color:#fffd70 !important;
}

.button.yellow-button:active,
.button.yellow-button:disabled{
	background-color:#f89400 !important;
	border-color:#ffce37 !important;
}

.button.facebook-connect{
	padding-left:44px;
}

.button.facebook-connect:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-351px -287px;
	width:26px;
	height:26px;
	margin-top:-13px;
	position:absolute;
	top:50%;
	left:12px;
	display:block;
	content:"";
}

.hotel-button{
	-webkit-filter:drop-shadow(-1px 4px 0 rgba(0, 0, 0, 0.3));
	filter:drop-shadow(-1px 4px 0 rgba(0, 0, 0, 0.3));
	background-color:#ffb900;
	-webkit-border-radius:5px 0 0 5px;
	-moz-border-radius:5px 0 0 5px;
	border-radius:5px 0 0 5px;
	display:inline-block;
	line-height:1.2;
	text-align:center;
	border-width:2px 1px 2px 2px;
	border-style:solid;
	border-color:#ffea00;
	color:#000;
	margin-bottom:4px;
	text-transform:uppercase;
	position:relative;
	margin-right:20px;
	margin-top:-3px;
	padding:6px 12px 6px 24px;
	text-decoration:none;
}

.hotel-button:hover{
	background-color:#ffd400;
	border-color:#fffd70;
	text-decoration:none;
}

.hotel-button:active{
	-webkit-filter:drop-shadow(-1px 2px 0 rgba(0, 0, 0, 0.3));
	filter:drop-shadow(-1px 2px 0 rgba(0, 0, 0, 0.3));
	-webkit-transform:translate(0, 2px);
	transform:translate(0, 2px);
}

.hotel-button:active,
.hotel-button:disabled{
	background-color:#f89400;
	border-color:#ffce37;
}

.hotel-button:active,
.hotel-button:hover{
	border-bottom-style:solid;
	border-bottom-width:2px;
}

.hotel-button:before,
.hotel-button:after{
	border-style:solid;
	position:absolute;
	display:block;
	content:"";
}

.hotel-button:before{
	border-width:21px;
	border-color:transparent transparent transparent #ffea00;
	right:-43px;
	top:-2px;
}

.hotel-button:hover:before{
	border-color:transparent transparent transparent #fffd70;
}

.hotel-button:active:before,
.hotel-button:disabled:before{
	border-color:transparent transparent transparent #ffce37;
}

.hotel-button:after{
	border-width:19px;
	border-color:transparent transparent transparent #ffb900;
	right:-38px;
	top:0;
}

.hotel-button:hover:after{
	border-color:transparent transparent transparent #ffd400;
}

.hotel-button:active:after,
.hotel-button:disabled:after{
	border-color:transparent transparent transparent #f89400;
}

.hotel-button .hotel-button-text{
	position:relative;
	padding-right:27px;
	text-align:right;
	line-height:26px;
}

.hotel-button .hotel-button-text:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-415px -387px;
	width:21px;
	height:26px;
	margin-top:-13px;
	position:absolute;
	top:50%;
	right:0;
	display:block;
	content:"";
}

/* Page loader */
#page-loader{
	background-color:#0c3a65;
	width:100%;
	height:100%;
	z-index:1250;
	position:fixed;
	top:0;
	left:0;
	opacity:0.9;
	overflow:hidden;
	display:none;
}

#page-loader:before{
	background-image:url(/assets/images/sprite.ggf8f6.png);
	background-position:-299px -200px;
	width:68px;
	height:68px;
	animation:spin 1s linear infinite;
	position:absolute;
	top:50%;
	left:50%;
	margin:-34px 0 0 -34px;
	display:block;
	content:"";
}

@keyframes spin{
	0%{
		-webkit-transform:rotate(0deg);
		transform:rotate(0deg);
	}
	100%{
		-webkit-transform:rotate(360deg);
		transform:rotate(360deg);
	}
}

/* Alert */
.alert-top-center{
	width:calc(100% - 24px);
	position:fixed;
	top:12px;
	left:12px;
	right:12px;
	z-index:1200;
	pointer-events:none;
}

.alert{
	-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	cursor:pointer;
	display:table;
	margin:0 auto 12px;
	padding:12px 12px 16px;
	position:relative;
	width:100%;
	max-width:620px;
	pointer-events:all;
}

.alert.alert-inline{
	display:block;
	max-width:100%;
	cursor:default;
}

.alert.alert-inline a{
	text-decoration:underline;
}

.alert.alert-success{
	background-color:#00b14e;
}

.alert.alert-error{
	background-color:#b00049;
}

.alert.alert-warning{
	background-color:#d38e09;
}

.alert:not(.alert-inline):before{
	-webkitbox-shadow:0 3px 0 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 3px 0 1px rgba(0, 0, 0, 0.3);
	background-color:#fff;
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	width:50px;
	height:50px;
	margin-top:12px;
	position:absolute;
	top:0;
	left:12px;
	display:block;
	content:"";
}

.alert:not(.alert-inline):after{
	background-image:url(../images/sprite.ggf8f6.png);
	height:27px;
	margin-top:12px;
	position:absolute;
	top:11.5px;
	left:12px;
	display:block;
	content:"";
}

.alert.alert-error:not(.alert-inline):after{
	background-position:-332px -347px;
	width:25px;
	margin-left:12px;
}

.alert.alert-success:not(.alert-inline):after {
	background-position:-391px -387px;
	width:22px;
	margin-left:14px;
}

.alert .alert-title{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:32px;
	color:#fff;
	font-weight:400;
	text-shadow:0 1px rgba(0,0,0,.3);
	margin:0 0 .6em;
	padding:0 24px 0 74px;
	line-height:1.2;
	text-transform:uppercase;
}

.alert.alert-inline .alert-title{
	display:block;
	padding:0;
}

.alert .alert-message{
	color:#fff;
	height:50px;
	display:table-cell;
	vertical-align:middle;
	padding:0 24px 0 74px;
}

.alert.alert-inline .alert-message{
	display:block;
	padding:0;
	height:auto;
}

/* Hotel */
#hotel-container{
	background-image:url(../images/backgrounds/hotel-loading.png);
	background-position:center;
	background-repeat:no-repeat;
	background-color:#0e151c;
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	left:-9999px;
	z-index:600;
}

.hotel--visible #hotel-container{
	left:0;
}

#hotel-container .client-buttons{
	position:absolute;
	top:12px;
	left:12px;
	z-index:630;
}

#hotel-container .client-buttons button{
	background-color:#ffb900;
	border-color:#ffea00;
	display:block;
	float:left;
	padding:6px 12px;
	color:#000;
	font-size:12px;
	line-height:1.2;
	margin-bottom:4px;
	text-align:center;
	float:left;
}

#hotel-container .client-buttons button:hover{
	background-color:#ffd400;
	border-color:#fffd70;
}

#hotel-container .client-buttons button:active{
	background-color:#f89400;
	border-color:#ffce37;
	-webkit-transform:translate(0px, 2px);
	transform:translate(0px, 2px);
}

#hotel-container .client-buttons button .client-icon{
	background-image:url(../images/sprite.ggf8f6.png);
	display:inline-block;
	font-style:normal;
	float:left;
}

#hotel-container .client-buttons button .client-icon.client-close-icon{
	background-position:-511px -24px;
	width:16px;
	height:16px;
}

#hotel-container .client-buttons button .client-icon.client-fullscreen-icon{
	background-position:-511px -58px;
	width:15px;
	height:14px;
}

#hotel-container .client-buttons button .client-icon.client-fullscreen-icon-back{
	background-position:-511px -42px;
	width:15px;
	height:14px;
}

#hotel-container .client-buttons button .client-icon.staff-panel-icon{
	background-position:-507px -75px;
	width:20px;
	height:22px;
}

#hotel-container .client-buttons button .client-icon.hide{
	display:none;
}

#hotel-container .client-buttons button.client-close{
	-webkit-filter:drop-shadow(-1px 4px 0 rgba(0, 0, 0, 0.3));
	filter:drop-shadow(-1px 4px 0 rgba(0, 0, 0, 0.3));
	-webkit-box-shadow:none;
	box-shadow:none;
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border-radius:0;
	border-width:2px 2px 2px 1px;
	display:inline-block;
	margin-left:14px;
	margin-right:4px;
	padding:5px 6px;
	position:relative;
}

#hotel-container .client-buttons button.client-close:active{
	-webkit-filter:drop-shadow(-1px 2px 0 rgba(0, 0, 0, 0.3));
	filter:drop-shadow(-1px 2px 0 rgba(0, 0, 0, 0.3));
}

#hotel-container .client-buttons button.client-close .client-close-expand{
	float:left;
	overflow:hidden;
	width:0;
	text-align:left;
	-webkit-transition:width 0.15s ease-out 0s;
	transition:width 0.15s ease-out 0s;
}

#hotel-container .client-buttons button.client-close .client-close-expand span{
	padding-left:6px;
}

#hotel-container .client-buttons button.client-close:hover .client-close-expand{
	width:33px;
}

#hotel-container .client-buttons button.client-close:before,
#hotel-container .client-buttons button.client-close:after{
	border-style:solid;
	content:"";
	display:block;
	position:absolute;
}

#hotel-container .client-buttons button.client-close:before{
	border-color:transparent #ffea00 transparent transparent;
	border-width:15px;
	left:-31px;
	top:-2px;
}

#hotel-container .client-buttons button.client-close:hover:before{
	border-color:transparent #fffd70 transparent transparent;
}

#hotel-container .client-buttons button.client-close:active:before{
	border-color:transparent #ffce37 transparent transparent;
}

#hotel-container .client-buttons button.client-close:after{
	border-color:transparent #ffb900 transparent transparent;
	border-width:13px;
	left:-26px;
	top:0;
}

#hotel-container .client-buttons button.client-close:hover:after{
	border-color:transparent #ffd400 transparent transparent;
}

#hotel-container .client-buttons button.client-close:active:after{
	border-color:transparent #f89400 transparent transparent;
}

#hotel-container .client-buttons button.client-fullscreen,
#hotel-container.hotel-admin .client-buttons button.staff-panel{
	-webkit-box-shadow:0 3px 0 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 3px 0 1px rgba(0, 0, 0, 0.3);
	-webkit-border-radius:0 5px 5px 0;
	-moz-border-radius:0 5px 5px 0;
	border-radius:0 5px 5px 0;
	padding-left:6px;
	padding-right:6px;
	margin-right:4px;
}

#hotel-container.hotel-admin .client-buttons button.client-fullscreen{
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border-radius:0;
}

#hotel-container .client-buttons button.client-fullscreen:active{
	-webkit-box-shadow:0 1px 0 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 1px rgba(0, 0, 0, 0.3);
}

#hotel-container.hotel-admin .client-buttons button.staff-panel{
	margin-right:0;
	padding-top:2px;
	padding-bottom:2px;
}

#hotel-container .client-frame{
	background-color:#000;
	width:100%;
	height:100%;
	position:absolute;
	top:0;
	left:0;
	z-index:610;
	display:block;
	border:0 none;
}

/* Disconnected */
body.disconnected-page{
	background:linear-gradient(135deg, #15507c, #0c3a65) no-repeat fixed;
}

.disconnected-page.disconnected-page-inline{
	background-color:rgba(0, 0, 0, 0.85);
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
	z-index:999;
	display:none;
}

.disconnected-page .disconnected-content{
	width:250px;
	text-align:center;
	position:absolute;
	top:50%;
	left:50%;
	-webkit-transform:translate(-50%, -50%);
	transform:translate(-50%, -50%);
}

.disconnected-page .disconnected-content .button{
	display:inline-block;
}

/* Login dialog */
.login-form-fieldset{
	margin:36px 0 0;
	padding:0;
	width:100%;
}

.login-form-helper{
	text-align:right;
	font-size:14px;
}

.login-form-button{
	margin-top:36px;
	width:100%;
}

.login-form-social,
.login-form-register{
	position:relative;
	margin-top:36px;
	padding-top:36px;
	text-align:center;
}

.login-form-social:after,
.login-form-register:after{
	border-top:1px solid #2a9cde;
	margin:0 12px;
	position:absolute;
	top:0;
	left:0;
	width:calc(100% - 24px);
	display:block;
	content:"";
}

.login-form-social .facebook-connect{
	width:100%;
	padding:12px 24px 12px 44px;
}

/* Pin code */
#pincode-show{
	font-size:40px;
	height:40px;
	color:#fff;
	text-align:center;
	overflow:hidden;
	margin-bottom:12px;
}

/* Registration page */
body.registration-hotel-page{
	background-image:url(../images/backgrounds/black-linear.png);
	background-repeat:repeat-x;
	background-position:center top;
}

.registration-hotel-page .registration-header{
	height:100px;
	position:relative;
}

.registration-hotel-page .registration-header .header-logo{
	background-image:url(../images/header-logo.png);
	width:190px;
	height:68px;
	display:block;
	position:absolute;
	left:40px;
	top:50%;
	margin-top:-25px;
}

.registration-hotel-page .registration-header .header-title{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:36px;
	line-height:100px;
	color:#fff;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
	text-align:center;
	text-transform:uppercase;
}

.registration-hotel-page .registration-content{
	max-width:1000px;
	width:100%;
	margin:0 auto;
	position:relative;
}

.registration-hotel-page .registration-content .promotion-column{
	background-color:rgba(0, 0, 0, 0.3);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	width:60%;
	padding:20px;
	position:absolute;
	top:50%;
	-webkit-transform:translate(0, -50%);
	transform:translate(0, -50%);
	font-size:13px;
	color:#fff;
}

.registration-hotel-page .registration-content .promotion-column .promotion-title{
	font-size:26px;
	color:#7ecaee;
	font-weight:bold;
	margin:20px 0 15px;
}

.registration-hotel-page .registration-content .configure-column{
	width:35%;
	float:right;
}

.registration-hotel-page .registration-content .configure-column .configure-title{
	font-size:26px;
	color:#7ecaee;
}

.registration-hotel-page .registration-content .configure-column .configure-choosename{
	font-size:13px;
}

.registration-hotel-page .registration-content .configure-column .configure-gender{
	padding-top:20px;
	font-size:24px;
	font-weight:500;
	color:#a7c5a7;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .random-look{
	background-image:url(../images/random-look.png);
	width:50px;
	height:53px;
	display:block;
	float:right;
	margin-top:-10px;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender{
	position:relative;
	padding-left:30px;
	color:#a7c5a7;
	text-decoration:none;
	font-style:italic;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender input{
	display:none;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender:not(.gender--active){
	opacity:0.5;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender:before{
	background-image:url(../images/sprite-gender.png?2);
	width:17px;
	height:23px;
	position:absolute;
	top:3px;
	left:4px;
	display:block;
	content:"";
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender.gender-male:before{
	background-position:-34px 0;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender.gender-male.gender--active:before{
	background-position:0 0;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender.gender-female{
	margin-left:40px;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender.gender-female:before{
	background-position:-51px 0;
}

.registration-hotel-page .registration-content .configure-column .configure-gender .gender.gender-female.gender--active:before{
	background-position:-17px 0;
}

.registration-hotel-page .registration-content .configure-column .configure-preview{
	background-image:url(../images/registration-look.png);
	background-repeat:no-repeat;
	background-position:center;
	width:100%;
	height:284px;
	text-align:center;
	padding-top:2px;
	position:relative;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random{
	background-repeat:no-repeat;
	width:100%;
	height:284px;
	position:absolute;
	top:0;
	left:0;
	z-index:2;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random1{
	background-image:url(../images/sprite-random.png);
	background-position:center 0;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random2{
	background-image:url(../images/sprite-random.png);
	background-position:center -284px;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random3{
	background-image:url(../images/sprite-random.png);
	background-position:center -568px;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random4{
	background-image:url(../images/sprite-random.png);
	background-position:center -852px;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random5{
	background-image:url(../images/sprite-random.png);
	background-position:center -1136px;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random6{
	background-image:url(../images/sprite-random.png);
	background-position:center -1420px;
}

.registration-hotel-page .registration-content .configure-column .configure-preview .preview-random.random7{
	background-image:url(../images/sprite-random.png);
	background-position:center -1704px;
}

.registration-hotel-page .registration-content .configure-column .configure-text{
	font-weight:bold;
	color:#fff;
	font-size:13px;
}

.registration-hotel-page .registration-content .configure-column .configure-submit{
	padding-top:20px;
}

/* Maintenance */
#maintenance-notification{
	-webkit-box-shadow:0 -7px 0 rgba(0, 0, 0, 0.07) inset, 0 5px 0 rgba(255, 255, 255, 0.1) inset, 0 1px 0 4px rgba(0, 0, 0, 0.3);
	box-shadow:0 -7px 0 rgba(0, 0, 0, 0.07) inset, 0 5px 0 rgba(255, 255, 255, 0.1) inset, 0 1px 0 4px rgba(0, 0, 0, 0.3);
	background-color:#b00000;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
	font-size:16px;
	color:#fff;
	text-shadow:0 1px 0 rgba(0, 0, 0, 0.3);
	padding:11px;
	text-align:center;
	position:fixed;
	bottom:10px;
	right:10px;
	z-index:100;
}

#maintenance-notification:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-462px -387px;
	width:21px;
	height:24px;
	display:block;
	content:"";
	float:left;
	margin-right:7px;
}

.maintenance-page .maintenance-main-container{
	-webkit-box-shadow:0 1px 2px #333;
	box-shadow:0 1px 2px #333;
	background-color:#0a6395;
	border:3px solid #2585bc;
	width:100%;
	max-width:750px;
	margin:50px auto;
	padding:30px;
}

.maintenance-page .maintenance-main-container h1{
	margin-top:0;
}

.maintenance-page .maintenance-main-container .admin-container{
	background-image:url(../images/error.png);
	width:198px;
	height:180px;
	float:right;
	margin-left:15px;
}

.maintenance-page .maintenance-main-container .admin-container a.admin-button{
	display:block;
	width:33px;
	height:25px;
	position:relative;
	top:27px;
	left:147px;
}

/* Parts */
.site-content{
	background:linear-gradient(135deg, #666666, #484949) no-repeat fixed;
	-webkit-flex:1 0 auto;
	-ms-flex:1 0 auto;
	flex:1 0 auto;
	width:100%;
	overflow:hidden;
}

.site-footer{
	background-color:#3E3F3F;
	display:block;
	padding:12px 0;
}

.wrapper{
	margin:0 auto;
	max-width:1200px;
	padding:0 12px;
}

/* Sticky header */
.sticky-header{
	background-color:rgba(0, 0, 0, 0.5);
	height:80px;
	width:100%;
	position:fixed;
	top:0;
	left:0;
	z-index:500;
}

.sticky-header .sticky-wrapper .sticky-header-login-button{
	background:transparent;
	border:0 none;
	display:inline-block;
	text-align:center;
	padding:0;
	line-height:17px;
	position:absolute;
	right:12px;
	top:9px;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	text-transform:uppercase;
	color:#fff;
	text-decoration:none;
	display:none;
}

.sticky-header .sticky-wrapper .sticky-header-login-button:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-100px -487px;
	content:"";
	display:inline-block;
	width:17px;
	height:17px;
	margin-right:6px;
	position:relative;
	top:3px;
}

.sticky-header .sticky-wrapper .sticky-content{
	float:right;
	padding-top:9px;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__form{
	display:block;
	padding-right:12px;
	position:relative;
	float:left;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__form:after{
	border-left:1px solid #2a9cde;
	content:"";
	height:100%;
	position:absolute;
	right:-2px;
	top:0;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__form .form-fieldset{
	margin:0 12px 0 0;
	padding:0;
	float:left;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__form .form-fieldset .form-input{
	display:inline-block;
	margin-bottom:6px;
	width:230px;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__form .claim-password{
	font-size:14px;
	text-align:right;
	margin:0;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__form button{
	display:inline-block;
}

.sticky-header .sticky-wrapper .sticky-content .login-form__social{
	display:block;
	float:left;
	padding-left:15px;
}

/* Header */
.header-container{
	-webkit-box-shadow:0 1px 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 1px rgba(0, 0, 0, 0.3);
	background-color:#069;
	display:block;
	position:relative;
}

.header-container.profile-header{
	background-image:url(../images/backgrounds/profile.png);
	background-position:center bottom;
	background-size:100%;
	image-rendering:crisp-edges;
	image-rendering:-o-crisp-edges;
	image-rendering:-moz-crisp-edges;
	image-rendering:pixelated;
}

.header-container .header-hotel{
	margin-left:calc(100% / 2.17 - 553px);
	max-width:1200px;
	position:absolute;
	height:100%;
}

.header-container.profile-header .header-hotel{
	display:none;
}

.header-container .header-hotel:after{
	background-image:url(../images/backgrounds/hotel_nyear.png);
	width:849px;
	height:512px;
	position:absolute;
	left:-100px;
	bottom:70px;
	display:block;
	content:"";
}

.header-container .header-content-advert .advert-size-small{
	display:none;
}

.header-container .header-content .register-wrapper{
	padding:150px 12px 0 620px;
	height:359px;
}

.header-container .header-content .register-wrapper .register-banner{
	padding:0 12px 0 24px;
	width:100%;
	max-width:420px;
	margin:0 auto;
	position:relative;
	text-align:center;
}

.header-container .header-content .register-wrapper .register-banner .banner-logo{
	background-image:url(../images/header-logo.gif);
	width:190px;
	height:68px;
	margin:0 auto;
	display:none;
}

.header-container .header-content .register-wrapper .register-banner .banner-button{
	font-size:32px;
}

.header-container .header-wrapper{
	margin:0 auto;
	max-width:1200px;
	padding:0 12px;
	height:70px;
	position:relative;
	z-index:5;
}

.maintenance-page .header-container .header-wrapper{
	height:150px;
}

.header-container .header-wrapper a.header-logo{
	background-image:url(../images/header-logo.gif);
	width:190px;
	height:68px;
	display:block;
	position:relative;
	top:6px;
}

.maintenance-page .header-container .header-wrapper a.header-logo{
	top:40px;
}

.header-container .header-wrapper .header-aside{
	float:right;
	padding-top:16px;
}

.header-container .header-wrapper .header-aside .header-login-button{
	-webkit-box-shadow: 0 1px 0 2px rgba(0, 0, 0, 0.3);
	box-shadow: 0 1px 0 2px rgba(0, 0, 0, 0.3);
	background-color:#303030 !important;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	border-color:#267b91 !important;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	padding:5px 12px;
}

.header-container .header-wrapper .header-aside .header-login-button:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-100px -487px;
	content:"";
	display:inline-block;
	width:17px;
	height:17px;
	margin-right:10px;
	position:relative;
	top:2px;
}

.header-container .header-wrapper .header-aside .user-menu{
	width:240px;
	position:relative;
	margin-right:-12px;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header{
	padding:0 24px;
	width:100%;
	position:absolute;
	top:0;
	left:0;
	z-index:201;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle{
	height:40px;
	position:relative;
	display:block;
	text-decoration:none;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle .user-menu-name-wrapper{
	-webkit-box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	background-color:#2A2A2A;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	border:2px solid #7E7E7E;
	width:171px;
	padding:5px 39px 5px 12px;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:16px;
	color:#fff;
	text-transform:uppercase;
}

.header-container .header-wrapper .header-aside .user-menu.panel-notification:not(.user-menu--open) .user-menu-header a.user-menu-toggle .user-menu-name-wrapper:after{
	background-image:url(../images/sprite-mobile.png);
	background-position:-381px -454px;
	width:24px;
	height:24px;
	margin-top:-14px;
	position:absolute;
	top:50%;
	left:-30px;
	content:"";
	display:block;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle .user-menu-name-wrapper .user-menu-name{
	position:relative;
	padding-left:24px;
	line-height:22px;
	display:block;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:nowrap;
	text-align:right;
	text-transform:none;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle .user-menu-name-wrapper .user-menu-name:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-464px -458px;
	width:18px;
	height:18px;
	margin-top:-9px;
	position:absolute;
	top:50%;
	left:0;
	-webkit-transition:transform 0.3s;
	transition:transform 0.3s;
	content:"";
	display:block;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-header a.user-menu-toggle .user-menu-name-wrapper .user-menu-name:before{
	-webkit-transform:rotate(180deg);
	transform:rotate(180deg);
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle .user-menu-avatar{
	display:block;
	position:absolute;
	right:-6px;
	top:-13px;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle .user-menu-avatar:before{
	-webkit-box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	background-color:#565758;
	border:2px solid #999999;
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	width:50px;
	height:50px;
	position:absolute;
	top:6px;
	left:0;
	content:"";
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-header a.user-menu-toggle .user-menu-avatar img{
	position:relative;
	left:-1px;
}

.header-container .header-wrapper .header-aside .user-menu .user-menu-list{
	background-color:rgba(0, 0, 0, 0.9);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	z-index:200;
	width:100%;
	visibility:hidden;
	opacity:0;
	list-style:none;
	margin:0;
	padding:0;
	position:absolute;
	top:-16px;
	-webkit-transition:opacity 0.15s ease-in-out;
	transition:opacity 0.15s ease-in-out;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list{
	visibility:visible;
	opacity:1;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item{
	padding:1px 24px 0;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item:first-child{
	padding-top:70px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item:last-child{
	padding-bottom:12px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	color:#fff;
	text-transform:uppercase;
	line-height:22px;
	padding-top:6px;
	padding-bottom:6px;
	padding-left:27px;
	display:block;
	position:relative;
	text-decoration:none;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link:hover{
	color:#999;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link:active{
	color:#09c;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link:before{
	background-image:url(../images/sprite.ggf8f6.png);
	width:20px;
	height:20px;
	margin-top:-9px;
	position:absolute;
	top:50%;
	left:0;
	display:block;
	content:"";
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--profile:before{
	background-position:-379px -287px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--profile:hover:before{
	background-position:-20px -487px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--profile:active:before{
	background-position:0 -487px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--settings:before{
	background-position:-384px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--settings:hover:before{
	background-position:-364px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--settings:active:before{
	background-position:-344px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--help:before{
	background-position:-404px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--help:hover:before{
	background-position:-444px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--help:active:before{
	background-position:-424px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--logout:before{
	background-position:-304px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--logout:hover:before{
	background-position:-80px -487px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--logout:active:before{
	background-position:-324px -458px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--panel:before{
	background-position:-157px -487px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--panel:hover:before{
	background-position:-179px -487px;
}

.header-container .header-wrapper .header-aside .user-menu.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--panel:active:before{
	background-position:-201px -487px;
}

.header-container .header-wrapper .header-aside .user-menu.panel-notification.user-menu--open .user-menu-list .user-menu-item .user-menu-link.user-menu-link--panel:after{
	background-image:url(../images/sprite-mobile.png);
	background-position:-381px -454px;
	width:24px;
	height:24px;
	margin-top:-12px;
	position:absolute;
	top:50%;
	right:0;
	content:"";
	display:block;
}

.header-container .header-navigation{
	-webkit-box-shadow:0 1px 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 1px rgba(0, 0, 0, 0.3);
	background-color:rgba(255, 255, 255, 0.9);
	width:100%;
	height:70px;
	position:relative;
}

.header-container .header-navigation ul.navigation-menu{
	display:block;
	width:100%;
	height:70px;
	list-style:none;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item{
	display:block;
	text-align:left;
	padding:18px 48px 0 6px;
	float:left;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	text-transform:uppercase;
	font-size:24px;
	color:#036;
	white-space:nowrap;
	display:block;
	text-decoration:none;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link--active{
	color:#09c;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link:hover{
	color:#999;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link:active{
	color:#09c;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link:before{
	background-image: url(../images/sprite.ggf8f6.png);
	width:22px;
	height:22px;
	content:"";
	display:inline-block;
	margin-right:6px;
	position:relative;
	top:1px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__home:before{
	background-position:-314px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__home.navigation-link--active:before{
	background-position:-199px -163px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__home:hover:before{
	background-position:-410px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__home:active:before{
	background-position:-199px -163px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__community:before{
	background-position:-223px -163px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__community.navigation-link--active:before{
	background-position:-271px -163px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__community:hover:before{
	background-position:-247px -163px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__community:active:before{
	background-position:-271px -163px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__shop:before{
	background-position:-338px -434px;
	top:3px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__shop.navigation-link--active:before{
	background-position:-386px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__shop:hover:before{
	background-position:-362px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__shop:active:before{
	background-position:-386px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__help:before{
	background-position:-218px -434px;
	top:3px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__help.navigation-link--active:before{
	background-position:-266px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__help:hover:before{
	background-position:-242px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__help:active:before{
	background-position:-266px -434px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__games:before{
	background-position:0 -508px;
	/*top:3px;*/
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__games.navigation-link--active:before{
	background-position:-22px -508px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__games:hover:before{
	background-position:-44px -508px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item a.navigation-link.navigation-link__games:active:before{
	background-position:-22px -508px;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item.navigation-item--aside{
	float:right;
	padding-top:16px;
	padding-right:0;
}

.header-container .header-navigation ul.navigation-menu li.navigation-item.navigation-item--hotel{
	display:list-item;
}

.header-container .header-additional .profile-wrapper{
	padding-left:130px;
	min-height:150px;
	position:relative;
}

.header-container .header-additional .profile-wrapper .profile-header-avatar{
	display:block;
	margin:0 24px 0 16px;
	width:92px;
	height:0;
	padding-top:8px;
	position:relative;
	z-index:2;
}

.header-container .header-additional .profile-wrapper .profile-header-avatar:before{
	-webkit-box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	background-color:#02353c;
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	border:2px solid #267b91;
	position:absolute;
	top:27px;
	left:-16px;
	z-index:2;
	width:92px;
	height:92px;
	content:"";
}

.header-container .header-additional .profile-wrapper .profile-header-avatar img{
	position:relative;
	z-index:3;
}

.header-container .header-additional .profile-wrapper .profile-header-details{
	background-color:rgba(0, 0, 0, 0.5);
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	max-width:500px;
	min-width:500px;
	padding:3px 24px 9px 58px;
	width:100%;
	word-break:break-all;
	position:relative;
	top:27px;
	left:50px;
}

.header-container .header-additional .profile-wrapper .profile-header-details h1{
	margin:0;
	text-transform:none;
}

.header-container .header-additional .profile-wrapper .profile-header-details .profile-motto{
	font-family:"Ubuntu Habbo", "Ubuntu", Verdana, Arial, sans-serif;
	font-size:14px;
	line-height:1.4;
	display:block;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:nowrap;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
}

/* Navigation tabs */
.nav-tabs{
	-webkit-box-shadow:0 1px 1px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 1px rgba(0, 0, 0, 0.3);
	background-color:#333334;
	display:block;
	text-transform:uppercase;
}

.nav-tabs .tabs-title{
	font-size:36px;
	margin-top:0;
	margin-bottom:0;
	padding-top:12px;
}

.nav-tabs .tabs-menu-toggle{
	-ms-flex-align:center;
	align-items:center;
	color:#fff;
	height: 50px;
	-ms-flex-pack:center;
	justify-content:center;
	display:none;
	cursor:pointer;
}

.nav-tabs .tabs-menu-toggle .tabs-menu-toggle-title{
	position:relative;
	padding-right:24px;
	text-align:right;
	line-height:22px;
}

.nav-tabs .tabs-menu-toggle .tabs-menu-toggle-title:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-464px -458px;
	width:18px;
	height:18px;
	margin-top:-9px;
	position:absolute;
	top:50%;
	right:0;
	-webkit-transition:transform 0.3s;
	transition:transform 0.3s;
	content:"";
	display:block;
}

.nav-tabs .tabs-menu-toggle .tabs-menu-toggle-title.tabs-menu-toggle-title--active:before{
	-webkit-transform:rotate(180deg);
	transform:rotate(180deg);
}

.nav-tabs .tabs-menu-container{
	display:none;
}

.nav-tabs .tabs-menu-container.tabs-menu-container--active{
	display:block;
}

.nav-tabs ul.tabs-menu{
	width:100%;
	list-style:none;
}

.nav-tabs ul.tabs-menu li.tabs-item{
	display:block;
	text-align:left;
	float:left;
}

.nav-tabs ul.tabs-menu li.tabs-item:not(:last-child):after{
	background-color:#888888;
	content:"";
	display:inline-block;
	height:1em;
	margin-left:20px;
	margin-right:24px;
	vertical-align:middle;
	width:2px;
}

.nav-tabs ul.tabs-menu li.tabs-item a.tabs-link{
	text-decoration:none;
	color:#fff;
	display:inline-block;
	line-height:50px;
}

.nav-tabs ul.tabs-menu li.tabs-item a.tabs-link.tabs-link--active{
	color:#6796b1;
}

.nav-tabs ul.tabs-menu li.tabs-item a.tabs-link:hover{
	color:#406180;
}

.nav-tabs ul.tabs-menu li.tabs-item a.tabs-link:active{
	color:#6796b1;
}

/* Page template */
.wrapper-header{
	-webkit-box-shadow:0 0 2px rgba(0, 0, 0, 0.5);
	box-shadow:0 0 2px rgba(0, 0, 0, 0.5);
	position:relative;
	background-color:#069;
}

.wrapper-header .header-content{
	max-width:850px;
	padding:110px 0;
	margin:0 auto;
	position:relative;
}

.wrapper-header .header-content:before{
	background-image:url(../images/teaser_stories_channels.png);
	width:243px;
	height:295px;
	position:absolute;
	left:-255px;
	top:50%;
	margin-top:-147px;
	display:block;
	content:"";
}

.wrapper-header .header-content .header-title{
	-webkit-box-shadow:0 1px 0 #2a9cde;
	box-shadow:0 1px 0 #909090;
	margin-top:0;
	border-bottom:1px solid #0c3a65;
	position:relative;
	padding-bottom:12px;
}

.wrapper-content{
	margin-top:24px;
	margin-bottom:24px;
}

.main-column{
	float:left;
	width:calc(100% - 304px);
	padding-right:24px;
}

.main-column.main-column-min{
	width:70%;
}

.aside-column{
	clear:right;
	float:right;
	width:304px;
}

.aside{
	width:30%;
}

.aside-box{
	background-color:#8B8B8B;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	padding:24px;
	overflow:hidden;
	margin-bottom:24px;
}

.aside-box h3:first-child,
.aside-box h4:first-child{
	background-color:#303030;
	margin:-24px -24px 12px;
	padding:6px 24px;
	text-shadow:0 1px #000;
}

.aside-box:last-child{
	margin-bottom:0;
}

.advert-box{
	padding-top:22px;
	margin-bottom:24px;
}

.advert-box.leaderboard,
.advert-box.small-leaderboard{
	padding-top:28px;
	margin-bottom:2px;
}

.advert-box .advert-content{
	background-color:#858585;
	border:2px solid #B5B6B6;
	margin:0 auto;
	position:relative;
	line-height:0;
	width:304px;
	height:254px;
}

.advert-box.leaderboard .advert-content{
	width:732px;
	height:94px;
}

.advert-box.small-leaderboard .advert-content{
	width:324px;
	height:54px;
}

.advert-box .advert-content:before{
	background-color:#AFAFAF;
	-webkit-border-radius:5px 5px 0 0;
	-moz-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;
	font-size:12px;
	color:#fff;
	line-height:1;
	padding:6px 12px;
	position:absolute;
	top:-24px;
	left:-2px;
	content:attr(box-title);
}

.section{
	background-color:#505050;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	overflow:hidden;
	padding:24px;
}

.section .section-title{
	text-transform:none;
}

.aside-list{
	margin:0 0 0 7px;
	padding:0;
}

/* Row & Column */
.row:after{
	content:"";
	clear:both;
	display:block;
}

.row .form-fieldset{
	margin-top:0;
	margin-bottom:0;
}

.row .col-2{
	width:50%;
	float:left;
}

.row .col-3{
	width:33%;
	float:left;
}

.row .col-2:nth-child(1),
.row .col-3:nth-child(1),
.row .col-3:nth-child(2){
	padding-right:10px;
}

.row .col-2:nth-child(2),
.row .col-3:nth-child(3),
.row .col-3:nth-child(2){
	padding-left:10px;
}

/* Registration */
.registration-page,
.registration-page .registration-form{
	position:relative;
}

.registration-page:before{
	background-image:url(../images/teaser_registration.png);
	width:546px;
	height:465px;
	position:absolute;
	top:0;
	right:0;
	display:block;
	content:"";
}

.registration-page .registration-form-social-wrapper{
	margin-top:0;
	position:absolute;
	right:-100%;
	width:100%;
}

.registration-page .registration-form-social-wrapper .registration-form-social{
	background-color:rgba(0, 0, 0, 0.5);
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	display:inline-block;
	padding:12px;
	margin-left:48px;
}

.registration-page .registration-form-social-wrapper .registration-form-social .registration-form-connect{
	padding-left:12px;
}

.registration-page .registration-form-social-wrapper .registration-form-social .facebook-connect{
	width:100%;
}

.registration-page .registration-form-safety{
	padding:0 12px;
}

.registration-page .registration-form-button{
	width:100%;
}

.registration-page .registration-form-purchases{
	font-size:12px;
	margin:24px 0;
	padding:0 12px;
}

.registration-page .birthday-day,
.registration-page .birthday-year{
	display:inline-block;
	margin:0;
	width:27%;
}

.registration-page .birthday-month{
	display:inline-block;
	margin:0 12px;
	width:calc(43% - 24px);
}

/* Articles */
ul.news-categories-list{
	display:inline;
	font-size:0;
	margin:0;
	padding:0;
	list-style:none;
}

ul.news-categories-list li.news-category-item{
	display:inline-block;
}

ul.news-categories-list li.news-category-item a{
	background-color:#103960;
	-webkit-border-radius:6px;
	-moz-border-radius:6px;
	border-radius:6px;
	font-size:16px;
	display:inline-block;
	margin:0 6px 6px 0;
	padding:3px 6px;
	text-decoration:none;
}

ul.news-categories-list li.news-category-item.news-category-item--active a{
	background-color:#0b6395;
}

ul.news-categories-list li.news-category-item a:hover{
	background-color:#0074a6;
}

.articles-container .article-container{
	margin:24px 0;
	min-height:120px;
	padding-left:132px;
	position:relative;
	float:left;
	width:calc(50% - 12px);
}

.articles-container.articles-list .article-container{
	float:none;
	margin:24px 0;
	width:100%;
}

.articles-container:not(.articles-list) .article-container:first-child{
	float:none;
	margin:0 0 24px;
	padding:0;
	width:100%;
	height:300px;
	color:#fff;
}

.articles-container:not(.articles-list) .article-container:nth-child(even){
	margin-right:24px;
	clear:both;
}

.articles-container:not(.articles-list) .article-container:nth-child(n+2):nth-child(-n+3){
	margin-top:0;
}

.articles-container .article-container .article-link{
	display:block;
}

.articles-container:not(.articles-list) .article-container:first-child .article-banner{
	-webkit-box-shadow:3px 3px rgba(0, 0, 0, 0.3);
	box-shadow:3px 3px rgba(0, 0, 0, 0.3);
	width:100%;
	height:300px;
	max-width:759px;
	margin:0 0 12px;
	overflow:hidden;
	position:absolute;
}

.articles-container .article-container .article-banner .article-images{
	-webkit-box-shadow:3px 3px rgba(0, 0, 0, 0.3);
	box-shadow:3px 3px rgba(0, 0, 0, 0.3);
	width:120px;
	height:120px;
	overflow:hidden;
	position:absolute;
	top:0;
	left:0;
}

.articles-container:not(.articles-list) .article-container:first-child .article-banner .article-images{
	-webkit-box-shadow:none;
	box-shadow:none;
	width:100%;
	height:300px;
}

.articles-container:not(.articles-list) .article-container:not(:first-child) .article-banner .article-images .news-image-featured{
	display:none;
}

.articles-container:not(.articles-list) .article-container:first-child .article-banner .article-images .news-image-thumbnail{
	display:none;
}

.articles-container.articles-list .article-container .article-banner .article-images .news-image-featured{
	display:none;
}

.articles-container .article-container .article-title{
	text-decoration:none;
}

.articles-container .article-container .article-title h2{
	font-size:24px;
	margin:0;
}

.articles-container:not(.articles-list) .article-container:first-child .article-title h2{
	font-size:36px;
	line-height:1;
}

.articles-container .article-container .article-info{
	font-size:14px;
	line-height:1.4;
	color:#999;
	font-style:italic;
}

.articles-container .article-container .article-info .article-date{
	display:inline-block;
}

.articles-container .article-container .article-info .article-date:not(:last-child):after{
	content:" | ";
	font-style:normal;
	float:right;
	margin:0 3px 0 5px;
}

.articles-container .article-container .article-info ul.article-categories{
	display:inline;
	font-size:0;
	list-style:none;
	margin:0;
	padding:0;
}

.articles-container .article-container .article-info ul.article-categories li.article-category{
	display:inline;
}

.articles-container .article-container .article-info ul.article-categories li.article-category:not(:last-child):after{
	font-size:14px;
	content:", ";
}

.articles-container .article-container .article-info ul.article-categories li.article-category a{
	font-size:14px;
}

.articles-container .article-container .article-summary{
	font-size:14px;
	line-height:1.4;
	margin-top:0.75em;
}

.articles-container:not(.articles-list) .article-container:first-child .article-title,
.articles-container:not(.articles-list) .article-container:first-child .article-summary,
.articles-container:not(.articles-list) .article-container:first-child .article-info{
	margin:0;
	max-width:370px;
	padding:12px 0 0 24px;
	position:relative;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
}

.articles-container:not(.articles-list) .article-container:first-child .article-title{
	padding-top:24px;
}

.simple-navigation{
	text-align:center;
	padding-top:24px;
}

.articles-navigation .articles-more,
.articles-navigation .articles-next,
.articles-navigation .articles-previous,
.articles-navigation .articles-first,
.articles-navigation .articles-last,
.simple-navigation .navigation-item{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:20px;
	font-weight:400;
	line-height:28px;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
	text-transform:uppercase;
	text-decoration:none;
	margin:0;
	position:relative;
	display:inline-block;
}

.articles-navigation .articles-more:before,
.articles-navigation .articles-next:before,
.articles-navigation .articles-previous:before,
.articles-navigation .articles-first:before,
.articles-navigation .articles-last:before{
	background-image:url(../images/sprite.ggf8f6.png);
	display:block;
	content:"";
	height:22px;
	margin-top:-11px;
	position:absolute;
	top:50%;
}

.articles-navigation .articles-more{
	float:right;
	padding-right:29px;
	text-align:right;
}

.articles-navigation .articles-last{
	padding-right:29px;
	text-align:right;
}

.articles-navigation .articles-more:before,
.articles-navigation .articles-last:before{
	background-position:-255px -138px;
	width:23px;
	right:0;
}

.articles-navigation .articles-next{
	float:right;
	padding-right:22px;
	text-align:right;
}

.simple-navigation .articles-next{
	float:none;
}

.articles-navigation .articles-next:before{
	background-position:-511px 0;
	width:16px;
	right:0;
}

.articles-navigation .articles-first{
	padding-left:29px;
	text-align:left;
}

.articles-navigation .articles-first:before{
	background-position:-491px -388px;
	width:23px;
	left:0;
}

.articles-navigation .articles-previous{
	float:left;
	padding-left:22px;
	text-align:left;
}

.simple-navigation .articles-previous{
	float:none;
}

.articles-navigation .articles-previous:before{
	background-position:-280px -138px;
	width:16px;
	left:0;
}

.simple-navigation .navigation-item{
	padding:0 3px;
}

.news-article,
.news-footer{
	max-width:759px;
}

.news-article{
	padding:35px 24px 0;
}

.news-footer .news-box{
	float:left;
	width:calc(50% - 12px);
	margin-top:24px;
}

.news-footer .news-box:first-child{
	margin-right:24px;
}

.news-footer .news-box ul{
	list-style:none;
	margin:0;
	padding:0;
}

.news-footer .news-box ul .news-box-item{
	margin-top:6px;
}

.news-footer .news-box ul .news-box-item .news-box-date{
	color:#999;
}

/* Photos */
.cards-container .card-container{
	margin-bottom:12px;
	padding:0 6px;
	float:left;
	width:25%;
}

.cards-container .card-container:nth-child(4n+1){
	clear:left;
}

.cards-container .card-container .card,
.ranking-container{
	-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	background-color:#0b6395;
	border:3px solid#2685bc;
	margin:0 auto;
	max-width:282px;
}

.ranking-container{
	max-width:100%;
}

.cards-container .card-container .card .card-content{
	height:276px;
	position:relative;
}

.videos-container .card-container .card .card-content{
	height:176px;
	position:relative;
}

.cards-container .card-container .card .card-content .card-link{
	display:block;
	height:100%;
	margin:0 auto;
	position:relative;
}

.cards-container .card-container .card .card-content .card-link .card-photo{
	background-position:center;
	background-repeat:no-repeat;
	width:100%;
	height:100%;
}

.videos-container .card-container .card .card-content .card-link .card-delete{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-456px -434px;
	position:absolute;
	top:5px;
	right:5px;
	z-index:2;
	width:20px;
	height:20px;
	display:block;
}

.cards-container .card-container .card .card-content .card-meta{
	background-color:rgba(0, 0, 0, 0.5);
	padding:6px;
	width:100%;
	position:absolute;
	left:0;
	bottom:0;
	font-size:14px;
	color:#fff;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
}

.cards-container .card-container .card .card-content .card-meta .card-date{
	line-height:24px;
}

.cards-container .card-container .card .card-creator,
.ranking-container .ranking-user{
	display:block;
	position:relative;
	border-top:1px solid #2685bc;
	padding:6px 12px;
	text-decoration:none;
}

.ranking-container .ranking-user:nth-child(even){
	background-color:#0d73ad;
}

.ranking-container .ranking-user .ranking-user-status{
	width:27px;
	height:39px;
	position:absolute;
	top:25px;
	right:15px;
}

.ranking-container .ranking-user .ranking-user-status.offline{
	background-image:url(../images/offline_big.png);
}

.ranking-container .ranking-user .ranking-user-status.online{
	background-image:url(../images/online_big.gif);
}

.ranking-container .ranking-user .ranking-user-position{
	width:40px;
	height:40px;
	position:absolute;
	top:25px;
	right:60px;
}

.ranking-container .ranking-user .ranking-user-position.first{
	background-image:url(../images/top_gold.png);
}

.ranking-container .ranking-user .ranking-user-position.second{
	background-image:url(../images/top_silver.png);
}

.ranking-container .ranking-user .ranking-user-position.third{
	background-image:url(../images/top_bronze.png);
}

.cards-container .card-container .card .card-creator .card-creator-profile,
.room-page .room-content .room-content-left .room-owner-user .room-owner-user-avatar,
.ranking-container .ranking-user .ranking-user-profile{
	display:block;
	position:relative;
	height:75px;
	text-decoration:none;
}

.ranking-container .ranking-user.ranking-valentines .ranking-user-profile{
	height:157px;
}

.cards-container .card-container .card .card-creator .card-creator-profile:before,
.room-page .room-content .room-content-left .room-owner-user .room-owner-user-avatar:before,
.ranking-container .ranking-user:not(.ranking-valentines) .ranking-user-profile:before{
	-webkit-box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	background-color:#02353c;
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	border:2px solid #267b91;
	width:50px;
	height:50px;
	position:absolute;
	top:12px;
	left:2px;
	display:block;
	content:"";
}

.cards-container .card-container .card .card-creator .card-creator-profile .habbo-imager,
.room-page .room-content .room-content-left .room-owner-user .habbo-imager,
.ranking-container .ranking-user .ranking-user-profile .habbo-imager{
	float:left;
	width:50px;
	height:100%;
}

.ranking-container .ranking-user.ranking-valentines .ranking-user-profile .habbo-imager{
	width:133px;
}

.cards-container .card-container .card .card-creator .card-creator-profile .habbo-imager img,
.room-page .room-content .room-content-left .room-owner-user .habbo-imager img,
.ranking-container .ranking-user:not(.ranking-valentines) .ranking-user-profile .habbo-imager img{
	position:relative;
	top:5px;
}

.cards-container .card-container .card .card-creator .card-creator-profile h6,
.room-page .room-content .room-content-left .room-owner-user h6,
.ranking-container .ranking-user .ranking-user-profile h4,
.ranking-container .ranking-user .ranking-user-profile h6{
	padding-left:15px;
	line-height:75px;
	margin:0;
	text-overflow:ellipsis;
	white-space:nowrap;
	overflow:hidden;
}

.ranking-container .ranking-user .ranking-user-profile h4{
	line-height:normal;
	padding-top:14px;
	text-transform:none;
}

.ranking-container .ranking-user .ranking-user-profile h6{
	line-height:normal;
	margin-top:5px;
}

.ranking-container .ranking-user.ranking-valentines .ranking-user-profile .valentines-names{
	line-height:normal;
	margin:62px 0 0 15px;
	float:left;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-weight:400;
	font-size:25px;
	color:#fff;
}

.ranking-container .ranking-user.ranking-valentines .ranking-user-profile .valentines-score{
	line-height:normal;
	margin:55px 15px 0 0;
	float:right;
	font-size:40px;
	color:#fff;
}

/* Shop */
.inventory-grid{
	margin:-12px 0 0 -24px;
	list-style:none;
	padding:0;
}

.inventory-grid .inventory-item{
	width:50%;
	float:left;
}

.inventory-grid .inventory-item:nth-child(2n+1){
	clear:left;
}

.inventory-grid .inventory-item .inventory-item-preview{
	margin-left:24px;
	-webkit-user-select:none;
	-moz-user-select:none;
	-ms-user-select:none;
	user-select:none;
}

.inventory-grid .inventory-item .inventory-item-preview .item-container{
	-webkit-box-shadow:0 11px rgba(255, 255, 255, 0.5) inset, 0 0 0 6px #7bc6ea inset, 0 5px rgba(0, 0, 0, 0.2);
	box-shadow:0 11px rgba(255, 255, 255, 0.5) inset, 0 0 0 6px #7bc6ea inset, 0 5px rgba(0, 0, 0, 0.2);
	background-color:#528fb4;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	border:2px solid #000;
	color:#000;
	cursor:pointer;
	margin:12px 0;
	min-height:125px;
	min-width:210px;
	padding:6px;
	position:relative;
}

.inventory-grid .inventory-item .inventory-item-preview .item-container:hover,
.inventory-grid .inventory-item.expanded .inventory-item-preview .item-container{
	-webkit-box-shadow:0 11px rgba(255, 255, 255, 0.5) inset, 0 0 0 6px #fff inset, 0 5px rgba(0, 0, 0, 0.2);
	box-shadow:0 11px rgba(255, 255, 255, 0.5) inset, 0 0 0 6px #fff inset, 0 5px rgba(0, 0, 0, 0.2);
	background-color:#7bc6ea;
}

.inventory-grid .inventory-item.item-no-description .inventory-item-preview .item-container:active{
	-webkit-box-shadow:0 11px rgba(255, 255, 255, 0.5) inset, 0 0 0 6px #5ab3de inset, 0 3px rgba(0, 0, 0, 0.2);
	box-shadow:0 11px rgba(255, 255, 255, 0.5) inset, 0 0 0 6px #5ab3de inset, 0 3px rgba(0, 0, 0, 0.2);
	background-color:#4c7e9c;
	-webkit-transform:translate(0, 2px);
	transform:translate(0, 2px);
}

.inventory-grid .inventory-item .inventory-item-preview .item-container .item-body{
	margin-bottom:33.6px;
	overflow:hidden;
}

.inventory-grid .inventory-item .inventory-item-preview .item-container .item-icon{
	left:11px;
	position:absolute;
	z-index:1;
}

.inventory-grid .inventory-item .item-icon{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-299px 0;
	width:98px;
	height:98px;
}

.inventory-grid .inventory-item .item-icon.icon-1{
	background-position:-299px 0;
}

.inventory-grid .inventory-item .item-icon.icon-2{
	background-position:-199px 0;
}

.inventory-grid .inventory-item .item-icon.icon-3{
	background-position:-100px -287px;
}

.inventory-grid .inventory-item .item-icon.icon-4{
	background-position:-200px -287px;
}

.inventory-grid .inventory-item .item-icon.icon-5{
	background-position:-399px 0;
}

.inventory-grid .inventory-item .item-icon.icon-6{
	background-position:-399px -200px;
}

.inventory-grid .inventory-item .item-icon.icon-7{
	background-position:-399px -100px;
}

.inventory-grid .inventory-item .item-icon.icon-8{
	background-position:0 -287px;
}

.inventory-grid .inventory-item .item-icon.icon-9{
	background-position:0 -387px;
}

.inventory-grid .inventory-item .item-icon.icon-10{
	background-position:0 -187px;
}

.inventory-grid .inventory-item .item-icon.icon-11{
	background-position:-299px -100px;
}

.inventory-grid .inventory-item .inventory-item-preview .item-container .item-body .item-title{
	padding:6px 12px 0 115px;
	width:100%;
}

.inventory-grid .inventory-item .inventory-item-preview .item-container .item-body .item-title h3{
	color:inherit;
	display:table-cell;
	height:93px;
	text-shadow:none;
	text-transform:none;
	vertical-align:middle;
	width:100%;
}

.inventory-grid .inventory-item .inventory-item-preview .item-container .item-body .item-price{
	background-color:rgba(0, 0, 0, 0.2);
	bottom:6px;
	font-size:24px;
	font-weight:700;
	left:6px;
	position:absolute;
	right:6px;
	text-align:center;
	white-space:nowrap;
}

.inventory-grid .inventory-item:not(.item-no-description) .inventory-item-preview .item-container .item-body .item-price:after{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-464px -458px;
	content:"";
	display:block;
	width:18px;
	height:18px;
	margin-top:-9px;
	position:absolute;
	right:12px;
	top:50%;
	-webkit-transition:transform 0.3s ease 0s;
	transition:transform 0.3s ease 0s;
}

.inventory-grid .inventory-item:not(.item-no-description).expanded .inventory-item-preview .item-container .item-body .item-price:after{
	-webkit-transform:rotate(540deg);
	transform:rotate(540deg);
}

.inventory-grid .inventory-item .inventory-item-content{
	width:200%;
	overflow:hidden;
	display:none;
	padding:12px 12px 24px;
}

.inventory-grid .inventory-item:nth-child(2n+2) .inventory-item-content{
	margin-left:-100%;
}

.inventory-grid .inventory-item .inventory-item-content .item-icon{
	float:left;
	margin-right:12px;
}

.inventory-grid .inventory-item .inventory-item-content .item-details{
	overflow:hidden;
	padding-bottom:4px;
}

.inventory-grid .inventory-item .inventory-item-content .item-details .details-header{
	display:table;
}

.inventory-grid .inventory-item .inventory-item-content .item-details .details-header .details-title{
	margin:0 12px 0 1;
	width:100%;
	display:table-cell;
	height:auto;
	vertical-align:middle;
}

.inventory-grid .inventory-item .inventory-item-content .item-details .details-header .details-price{
	color:#fff;
	display:block;
	font-size:32px;
	line-height:1;
	vertical-align:top;
	white-space:nowrap;
	height:auto;
}

.purse-content{
	-webkit-box-shadow:0 1px 0 #2a9cde;
	box-shadow:0 1px 0 #2a9cde;
	border-bottom:1px solid #0c3a65;
	margin-bottom:12px;
}

.purse-content .purse-columns{
	margin:0 -12px 12px;
}

.purse-content .purse-columns .purse-column{
	float:left;
	width:50%;
}

.purse-content .purse-columns .purse-column:nth-child(2n+1){
	clear:left;
}

.purse-content .purse-columns .purse-column .purse-item{
	padding:6px 6px 6px 26px;
	white-space:nowrap;
	line-height:22px;
	position:relative;
}

.purse-content .purse-columns .purse-column .purse-item:before{
	background-image:url(../images/sprite.ggf8f6.png);
	width:20px;
	height:20px;
	margin-top:-10px;
	position:absolute;
	top:50%;
	left:0;
	content:"";
	display:block;
}

.purse-content .purse-columns .purse-column .purse-item.purse-item-diamonds:before{
	background-position:-434px -434px;
}

.purse-content .purse-columns .purse-column .purse-item.purse-item-club:before{
	background-position:-218px -458px;
}

.purse-footer{
	text-align:right;
}

.purse-footer .purse-link{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:20px;
	text-shadow:0 1px rgba(0,0,0,.3);
	color:#fff;
	font-weight:400;
	display:inline-block;
	margin:0;
	text-transform:uppercase;
	position:relative;
	padding-right:30px;
	text-align:right;
	line-height:28px;
	text-decoration:none;
}

.purse-footer .purse-link:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-324px -287px;
	width:26px;
	height:26px;
	content:"";
	display:block;
	margin-top:-13px;
	position:absolute;
	top:50%;
	right:0;
}

.payment-legal{
	font-size:12px;
	display:block;
	padding-bottom:12px;
	margin:12px 0;
}

#shopapi-container{
	background:linear-gradient(135deg, #15507c, #0c3a65) no-repeat fixed;
	background-color:#0c3a65;
	display:none;
	position:fixed;
	top:0;
	left:0;
	z-index:700;
	width:100%;
	height:100%;
}

#shopapi-container .shopapi-success:not(.visible),
#shopapi-container .shopapi-error:not(.visible){
	display:none;
}

.shopapi-center{
	padding:24px;
	text-align:center;
	position:absolute;
	top:50%;
	left:50%;
	-webkit-transform:translate(-50%, -50%);
	transform:translate(-50%, -50%);
}

.shopapi-center p{
	margin-bottom:36px;
}

/* Badges shop */
.badges-container .badge-container{
	background-color:rgba(65, 169, 230, 0.1);
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	display:table;
	width:100%;
	padding:10px;
	margin-top:12px;
}

.badges-container .badge-container .badge-image,
.badges-container .badge-container .badge-details,
.badges-container .badge-container .badge-price,
.badges-container .badge-container .badge-buy{
	display:table-cell;
	vertical-align:middle;
}

.badges-container .badge-container .badge-image{
	width:60px;
	font-size:0;
	padding-left:5px;
}

.badges-container .badge-container .badge-details p:first-child{
	margin-top:0;
	font-weight:bold;
}

.badges-container .badge-container .badge-price{
	width:140px;
}

.badges-container .badge-container .badge-buy{
	width:120px;
}

/* History shop */
.history-list-container .history-container{
	display:table;
	width:100%;
}

.history-list-container .history-container.history-head-container .history-date,
.history-list-container .history-container.history-head-container .history-description,
.history-list-container .history-container.history-head-container .history-cost{
	font-weight:bold;
}

.history-list-container .history-container:not(.history-head-container):nth-child(odd) .history-date,
.history-list-container .history-container:not(.history-head-container):nth-child(odd) .history-description,
.history-list-container .history-container:not(.history-head-container):nth-child(odd) .history-cost{
	background-color:#13486f;
}

.history-list-container .history-container:not(.history-head-container):nth-child(even) .history-date,
.history-list-container .history-container:not(.history-head-container):nth-child(even) .history-description,
.history-list-container .history-container:not(.history-head-container):nth-child(even) .history-cost{
	background-color:#113f62;
}

.history-list-container .history-container .history-date,
.history-list-container .history-container .history-description,
.history-list-container .history-container .history-cost{
	display:table-cell;
	vertical-align:middle;
	padding:6px 15px;
}

.history-list-container .history-container .history-date,
.history-list-container .history-container .history-cost{
	width:140px;
	text-align:center;
}

.history-list-container .history-container .history-cost{
	text-align:right;
}

/* Profile */
.profile-container{
	margin-left:-12px;
}

.profile-container .profile-card-wrapper{
	position:relative;
	float:left;
	width:50%;
}

.profile-container .profile-card-wrapper:nth-child(2n+1){
	clear:left;
}

.profile-container .profile-card-wrapper:not(:nth-child(2n+1)){
	clear:none;
}

.profile-container .profile-card-wrapper .profile-card-aligner{
	padding:0 0 12px 12px;
	position:relative;
	margin-top:140px;
}

.profile-container .profile-card-wrapper .profile-card-aligner:before{
	background-position:left bottom;
	background-repeat:no-repeat;
	display:block;
	width:100%;
	height:140px;
	position:absolute;
	top:-140px;
	left:0;
	content:"";
}

.profile-container .profile-card-wrapper.profile-card-wrapper-badges .profile-card-aligner:before{
	background-image:url(../images/teaser_profile_badges.png);
}

.profile-container .profile-card-wrapper.profile-card-wrapper-friends .profile-card-aligner:before{
	background-image:url(../images/teaser_profile_friends.png);
}

.profile-container .profile-card-wrapper.profile-card-wrapper-rooms .profile-card-aligner:before{
	background-image:url(../images/teaser_profile_rooms.png);
}

.profile-container .profile-card-wrapper.profile-card-wrapper-groups .profile-card-aligner:before{
	background-image:url(../images/teaser_profile_groups.png);
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card{
	-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	background-color:#0b6395;
	border:3px solid #2685bc;
	padding:12px 24px;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .profile-card-title{
	margin:0 0 12px;
	text-align:center;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul{
	list-style:none;
	margin:0;
	padding:0;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li{
	float:left;
	width:20%;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li:nth-child(5n+1){
	clear:left;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li:not(:nth-child(5n+1)){
	clear:none;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li a.item-content{
	text-decoration:none;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-icon{
	line-height:0;
	text-align:center;
}

.profile-container .profile-card-wrapper.profile-card-wrapper-badges .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-icon,
.profile-container .profile-card-wrapper.profile-card-wrapper-groups .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-icon{
	margin:0 auto;
	width:60px;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-icon.room-icon,
.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-icon .item-icon-aligner{
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	border:3px solid #2685bc;
	width:60px;
	height:60px;
	display:-ms-flexbox;
	display:flex;
	-ms-flex-align:center;
	align-items:center;
	-ms-flex-pack:center;
	justify-content:center;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-icon.room-icon{
	background-image:url(../images/profile_room_nopicture.png);
	background-position:center;
	background-repeat:no-repeat;
	width:90px;
	height:90px;
	margin:0 auto 16px;
	overflow:hidden;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-text .item-title{
	display:block;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:normal;
	color:#7ecaee;
	padding:0 6px;
	text-align:center;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-text .item-title.item-title-multi-line{
	height:57px;
	margin:24px 0 0;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-text .item-title.item-title-single-line{
	height:19px;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .item-list-grid ul li a.item-content .item-text .item-title{
	color:#fff;
}

.profile-container .profile-card-wrapper.profile-card-wrapper-friends .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-text .item-title{
	margin:6.2px 0;
}

.profile-container .profile-card-wrapper.profile-card-wrapper-rooms .profile-card-aligner .profile-card .item-list-grid ul li .item-content .item-text .item-title{
	margin:0 0 16.2px;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .profile-card-footer{
	border-top:1px solid #2a9cde;
	padding:12px 0 0;
	text-align:center;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .profile-card-footer a.profile-modal-link{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:20px;
	text-shadow:0 1px rgba(0,0,0,.3);
	color:#fff;
	text-transform:uppercase;
	font-weight:400;
	display:inline-block;
	margin:0;
	position:relative;
	padding-right:22px;
	text-align:right;
	line-height:28px;
	text-decoration:none;
}

.profile-container .profile-card-wrapper .profile-card-aligner .profile-card .profile-card-footer a.profile-modal-link:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-511px 0;
	width:16px;
	height:22px;
	margin-top:-11px;
	position:absolute;
	top:50%;
	right:0;
	display:block;
	content:"";
}

.profile-creations{
	margin-top:24px;
}

.profile-creations .profile-creations-title{
	overflow:hidden;
	text-align:left;
}

.profile-creations .profile-creations-title:after{
	background-color:#2685bc;
	position:relative;
	top:-2px;
	left:0.5em;
	width:100%;
	height:2px;
	vertical-align:middle;
	margin-right:-100%;
	display:inline-block;
	content:"";
}

.profile-creations .profile-photos-link{
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:20px;
	color:#fff;
	text-transform:uppercase;
	line-height:28px;
	text-shadow:0 1px rgba(0,0,0,.3);
	font-weight:400;
	display:inline-block;
	margin:12px 0 0;
	position:relative;
	padding-right:29px;
	text-align:right;
	float:right;
	text-decoration:none;
}

.profile-creations .profile-photos-link:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-255px -138px;
	width:23px;
	height:22px;
	margin-top:-11px;
	position:absolute;
	top:50%;
	right:0;
	display:block;
	content:"";
}

.profile-joined-container{
	margin:24px 0;
}

.profile-joined-container .profile-joined,
.profile-joined-container .profile-hearts{
	text-align:center;
}

.profile-joined-container .profile-hearts i{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-359px -347px;
	width:26px;
	height:24px;
	display:inline-block;
	font-style:normal;
}

.profile-joined-container .profile-hearts i:not(:last-of-type){
	margin-right:12px;
}

.profile-modal-items,
.furni-modal-items{
	margin:0;
	padding:0;
	list-style:none;
}

.profile-modal-items .item,
.furni-modal-items .item{
	display:block;
	position:relative;
}

.profile-modal-items .item:not(:last-child),
.furni-modal-items .item:not(:last-child){
	border-bottom:1px solid #2685bc;
}

.profile-modal-items .item .item-content,
.furni-modal-items .item .item-content{
	-ms-flex-align:center;
	align-items:center;
	display:-ms-flexbox;
	display:flex;
	padding:12px;
	text-decoration:none;
}

.profile-modal-items .item a.item-content:hover,
.furni-modal-items .item a.item-content:hover{
	background-color:#0074a6;
}

.profile-modal-items .item a.item-content:active,
.furni-modal-items .item a.item-content:active{
	background-color:#2685bc;
}

.profile-modal-items .item .item-icon,
.furni-modal-items .item .item-image{
	line-height:0;
	text-align:center;
}

.profile-modal-items .item-room .item-icon,
.furni-modal-items .item-furni .item-image{
	display:block;
	width:90px;
	height:90px;
}

.profile-modal-items .item-room .item-icon:before,{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-200px -187px;
	position:absolute;
	width:90px;
	height:90px;
	display:block;
	content:"";
}

.profile-modal-items .item-room .item-icon .room-icon,
.furni-modal-items .item-furni .item-image .furni-image{
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	border:3px solid #2685bc;
	overflow:hidden;
	width:90px;
	height:90px;
	position:relative;
}

.furni-modal-items .item-furni .item-image .furni-image{
	background-position:center;
	background-repeat:no-repeat;
}

.profile-modal-items .item-room .item-icon .room-icon{
	background-image:url(../images/profile_room_nopicture.png);
	background-position:center;
	background-repeat:no-repeat;
}

.profile-modal-items .item-room .item-icon .room-icon .room-icon-thumbnail{
	position:relative;
	top:-15px;
	left:-15px;
}

.profile-modal-items .item-badge .item-icon .item-icon-aligner{
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	border-radius:50%;
	border:3px solid #2685bc;
	width:60px;
	height:60px;
	display:-ms-flexbox;
	display:flex;
	-ms-flex-align:center;
	align-items:center;
	-ms-flex-pack:center;
	justify-content:center;
}

.profile-modal-items .item .item-text,
.furni-modal-items .item .item-text{
	padding-left:24px;
}

.profile-modal-items .item .item-text .item-title,
.furni-modal-items .item .item-text .item-title{
	font-family:"Ubuntu Habbo", "Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:20px;
	margin:0;
	word-break:break-all;
}

.profile-modal-items .item .item-text .item-description,
.furni-modal-items .item .item-text .item-description{
	font-size:16px;
	color:#7ecaee;
	margin:12px 0 0;
}

/* Room */
.room-page .room-thumbnail{
	-webkit-box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 0 2px rgba(0, 0, 0, 0.3);
	background-color:#01353c;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	border:2px solid #267b91;
	float:left;
	width:114px;
	height:114px;
	margin-bottom:12px;
	margin-right:0;
	position:relative;
}

.room-page .room-thumbnail:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:0 -75px;
	width:110px;
	height:110px;
	display:block;
	content:"";
}

.room-page .room-thumbnail .room-thumbnail-image{
	position:absolute;
	top:0;
	left:0;
}

.room-page .room-content{
	margin-left:134px;
}

.room-page .room-content .room-content-title{
	font-family:"Ubuntu Habbo", "Ubuntu Condensed", Verdana, Arial, sans-serif;
	text-transform:none;
}

.room-page .room-content .room-content-left{
	width:66%;
	float:left;
	clear:none;
}

.room-page .room-content .room-content-left .room-owner-user{
	display:block;
	position:relative;
	margin-bottom:12px;
	padding:0 12px;
}

.room-page .room-content .room-content-left .room-info{
	list-style:none;
	margin:0;
	padding:0;
	margin-bottom:12px;
}

.room-page .room-content .room-content-left .room-info .room-info-row{
	display:table-row;
}

.room-page .room-content .room-content-left .room-info .room-info-row .room-info-header,
.room-page .room-content .room-content-left .room-info .room-info-row .room-info-value{
	display:table-cell;
	padding-bottom:12px;
	margin-bottom:0;
}

.room-page .room-content .room-content-left .room-info .room-info-row .room-info-value{
	font-family:"Ubuntu Habbo", "Ubuntu", Verdana, Arial, sans-serif;
	vertical-align:top;
	padding-left:48px;
}

.room-page .room-content .room-content-left .room-enter-button{
	display:inline-block;
	padding-left:12px;
	padding-right:12px;
}

.room-page .room-content .room-content-left .room-enter-button .room-enter-button-text{
	position:relative;
	padding-right:27px;
}

.room-page .room-content .room-content-left .room-enter-button .room-enter-button-text:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-415px -387px;
	width:21px;
	height:26px;
	margin-top:-13px;
	position:absolute;
	top:50%;
	right:0;
	display:block;
	content:"";
}

.room-page .room-content .room-content-right{
	width:33%;
	float:left;
	clear:none;
	padding-top:12px;
}

/* Team */
.members-container .member-container{
	-webkit-box-shadow:0 1px 2px #333;
	box-shadow:0 1px 2px #333;
	background-color:#0a6395;
	border:3px solid #2585bc;
	width:24%;
	margin:0.5%;
	float:left;
	display:block;
	text-decoration:none;
	-webkit-transition:all 0.2s ease 0s;
	transition:all 0.2s ease 0s;
	position:relative;
}

.members-container .member-container:hover{
	opacity:0.6;
}

.members-container .member-container .avatar{
	width:64px;
	height:110px;
	margin:0 auto;
}

.members-container .member-container .status{
	width:50px;
	height:16px;
	position:absolute;
	top:10px;
	right:10px;
}

.members-container .member-container .status.online{
	background-image:url(../images/online.gif?3);
}

.members-container .member-container .status.offline{
	background-image:url(../images/offline.gif?3);
}

.members-container .member-container .username{
	font-family:"Ubuntu Condensed",Verdana,Arial,Tahoma;
	text-transform:uppercase;
	font-size:22px;
	color:#fff;
	text-shadow:0 1px 0 #333;
	text-align:center;
	margin-top:7px;
}

.members-container .member-container .function{
	margin-bottom:10px;
	text-align:center;
	font-size:13px;
	color:#7ecaee;
}

/* Support */
.ticket-message-container{
	margin:24px 0;
	display:table;
	width:100%;
}

.ticket-message-container .author-container,
.ticket-message-container .message-container{
	vertical-align:top;
	display:table-cell;
}

.ticket-message-container .author-container{
	width:130px;
	text-align:center;
}

.ticket-message-container .author-container .name{
	font-size:13px;
}

.ticket-message-container .message-container .content{
	background-color:rgba(0, 0, 0, 0.1);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	padding:12px 18px;
}

.ticket-message-container .message-container .posted-date{
	text-align:right;
	font-style:italic;
	font-size:13px;
	margin:6px 0 24px;
}

/* Rares */
.furnis-container .furni-container{
	margin-bottom:12px;
	padding:0 6px;
	float:left;
	width:25%;
}

.furnis-container .furni-container:nth-child(4n+1){
	clear:left;
}

.furnis-container .furni-container .furni{
	-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.3);
	background-color:#0b6395;
	border:3px solid#2685bc;
	margin:0 auto;
	max-width:282px;
	color:#fff;
	text-decoration:none;
	display:block;
}

.furnis-container .furni-container .furni .furni-content{
	background-image:url(../images/furni-tiles.png),url(../images/blue-background.png);
	background-position:center bottom 20px, center top;
	background-repeat:no-repeat, repeat-x;
	width:100%;
	height:250px;
	padding:10px;
	position:relative;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	color:#fff;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
}

.furnis-container .furni-container .furni .furni-content .furni-name{
	background-color:rgba(0, 23, 38, 0.5);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	width:100%;
	padding:5px 12px;
	font-size:20px;
	text-align:center;
	position:relative;
	z-index:5;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:nowrap;
	display:block;
}

.furnis-container .furni-container a.furni .furni-content .furni-name:before{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-498px -434px;
	width:18px;
	height:18px;
	display:block;
	content:"";
	position:absolute;
	top:10px;
	right:8px;
}

.furnis-container .furni-container .furni .furni-content .furni-image{
	background-position:center;
	background-repeat:no-repeat;
	position:absolute;
	top:0;
	left:0;
	z-index:1;
	width:100%;
	height:100%;
}

.furnis-container .furni-container .furni .furni-content .furni-type:before,
.furnis-container .furni-container .furni .furni-content .furni-copy:before{
	text-transform:uppercase;
	display:block;
	font-size:11px;
	color:#7ecaee;
}

.furnis-container .furni-container .furni .furni-content .furni-type{
	position:absolute;
	left:10px;
	bottom:6px;
	z-index:2;
}

.furnis-container .furni-container .furni .furni-content .furni-type:before{
	content:"Type";
}

.furnis-container .furni-container .furni .furni-content .furni-copy{
	position:absolute;
	right:10px;
	bottom:6px;
	z-index:3;
	text-align:right;
}

.furnis-container .furni-container .furni .furni-content .furni-copy:before{
	content:"Exemplaires";
}

/* Users icons */
.user-icon{
	display:inline-block;
	margin:-4px 0 0 4px;
	position:relative;
	top:2px;
}

.user-icon:before{
	background-image:url(../images/sprite.ggf8f6.png);
	display:inline-block;
	content:"";
}

.user-icon.view:before{
	background-position:-298px -269px;
	width:21px;
	height:13px;
}

/* Panel */
.panel-wrapper .aside-box{
	padding-bottom:0;
}

.panel-wrapper .aside-box>a{
	background-color:#0e3955;
	margin:-24px -24px 2px;
	padding:6px 24px;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:24px;
	font-weight:400;
	color:#fff;
	position:relative;
	cursor:pointer;
	display:block;
	line-height:1.2;
	text-shadow:0 1px rgba(0, 0, 0, 0.3);
	text-transform:uppercase;
	text-decoration:none;
}

.panel-wrapper .aside-box.panel-notification>a:after{
	background-image:url(../images/sprite-mobile.png);
	background-position:-381px -454px;
	width:24px;
	height:24px;
	margin-top:-12px;
	position:absolute;
	top:50%;
	right:50px;
	content:"";
	display:block;
}

.panel-wrapper .dropdown--open>a{
	background-color:#0d2f45;
}

.panel-wrapper .dropdown-box>a:after{
	background-image:url(../images/sprite.ggf8f6.png);
	background-position:-464px -458px;
	width:18px;
	height:18px;
	margin-top:-9px;
	position:absolute;
	top:50%;
	right:24px;
	-webkit-transition:transform 0.3s;
	transition:transform 0.3s;
	content:"";
	display:block;
}

.panel-wrapper .dropdown-box.dropdown--open>a:after{
	-webkit-transform:rotate(-180deg);
	transform:rotate(-180deg);
}

.panel-wrapper .dropdown-box .dropdown-content{
	display:none;
}

.panel-wrapper .dropdown-box .dropdown-content ul{
	margin:12px 0;
	padding:0;
	list-style:none;
}

.panel-wrapper .dropdown-box .dropdown-content ul>li{
	margin:0 -12px;
}

.panel-wrapper .dropdown-box .dropdown-content ul>li>a{
	background-color:rgba(0, 0, 0, 0.08);
	display:block;
	padding:4px 12px;
	text-shadow:0 1px 0 rgba(0, 0, 0, 0.3);
}

.panel-wrapper .dropdown-box .dropdown-content ul>li:nth-child(even)>a{
	background-color:rgba(0, 0, 0, 0.03);
}

.panel-wrapper .dropdown-box .dropdown-content ul>li:hover>a{
	text-decoration:underline;
}

/* Panel - Hotel alert */
.alert-dropdown-container{
	display:block;
}

.alert-dropdown-container:not(:first-child){
	margin-top:15px;
}

.alert-dropdown-container .dropdown-title{
	background-color:rgba(0, 0, 0, 0.2);
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
	font-family:"Ubuntu Condensed", Verdana, Arial, sans-serif;
	font-size:18px;
	color:#fff;
	text-transform:uppercase;
	padding:5px 10px;
	display:block;
}

.alert-dropdown-container .dropdown-input,
.alert-dropdown-container .dropdown-content{
	display:none;
}

.alert-dropdown-container input:checked+.dropdown-content{
	display:block;
}

.alert-dropdown-container .dropdown-content{
	padding:15px 10px 10px;
}

.alert-dropdown-container .dropdown-content .form-fieldset:first-child{
	margin-top:0;
}

/* Panel - Catalog */
.panel-wrapper ol{
	margin:0;
	padding:0;
	list-style:none;
}

.panel-wrapper ol.serialization,
.panel-wrapper ol.catalogfurnis-head{
	margin-top:18px;
}

.panel-wrapper ol.serialization li{
	cursor:move;
}

.panel-wrapper ol.serialization>li:not(.placeholder),
.panel-wrapper ol.catalogfurnis-head>li{
	background-color:#103960;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	padding:6px 12px;
	margin-top:6px;
}

.panel-wrapper ol.serialization>li li:not(.placeholder){
	border-top:1px dotted rgba(0, 0, 0, 0.2);
}

.panel-wrapper ol.serialization li.placeholder{
	background-color:rgba(0, 0, 0, 0.05);
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	border:3px dotted rgba(0, 0, 0, 0.1);
	padding:6px 12px;
	margin-top:6px;
	height:42px;
	position:relative;
}

.panel-wrapper ol.serialization>li ol{
	padding-left:20px;
}

.panel-wrapper ol.serialization>li li.placeholder{
	height:24px;
}

.panel-wrapper ol.serialization li.placeholder:before{
    border-color: transparent -moz-use-text-color transparent #fff;
    border-style: solid none solid solid;
    border-width: 7px medium 7px 7px;
    content:"";
    width:0;
    height:0;
    margin-top:-7px;
    position:absolute;
    top:-6px;
    left:-11px;
}

.panel-wrapper ol.serialization .dragged{
	opacity:0.5;
	position:absolute;
	top:0;
	z-index:2000;
}

.panel-wrapper ol.serialization li .icon-image{
	background-position:center;
	background-repeat:no-repeat;
	float:left;
	width:19px;
	height:22px;
	margin-right:6px;
}

.panel-wrapper ol li .icon,
.panel-wrapper .panel-icon{
	display:inline-block;
	margin:-4px 0 0 4px;
	position:relative;
	top:6px;
}

.panel-wrapper ol li .icon.icon-hidden{
	display:none;
}

.panel-wrapper ol li .icon:before,
.panel-wrapper .panel-icon:before{
	background-image:url(../images/sprite.ggf8f6.png);
	width:16px;
	height:20px;
	display:inline-block;
	content:"";
}

.panel-wrapper ol li .icon.invisible:before,
.panel-wrapper .panel-icon.invisible:before{
	background-position:-484px -458px;
}

.panel-wrapper ol li .icon.locked:before,
.panel-wrapper .panel-icon.locked:before{
	background-position:-501px -458px;
}

.panel-wrapper ol li .icon.edit:before,
.panel-wrapper .panel-icon.edit:before{
	background-position:-241px -486px;
}

.panel-wrapper ol li .icon.furnis:before,
.panel-wrapper .panel-icon.furnis:before{
	background-position:-260px -486px;
}

.panel-wrapper ol li .icon.fix:before,
.panel-wrapper .panel-icon.fix:before{
	background-position:-395px -486px;
}

.panel-wrapper .panel-icon.questions:before{
	background-position:-414px -486px;
}

.panel-wrapper .panel-icon.answers:before{
	background-position:-433px -486px;
}

.panel-wrapper .panel-icon.search:before{
	background-position:-452px -486px;
}

.panel-wrapper .panel-icon.valid:before{
	background-position:-471px -486px;
}

.panel-wrapper ol li .icon.delete:before,
.panel-wrapper .panel-icon.delete:before{
	background-position:-222px -486px;
}

.panel-wrapper ol li .icon.credits:before,
.panel-wrapper .panel-icon.credits:before{
	background-position:-279px -486px;
}

.panel-wrapper ol li .icon.duckets:before,
.panel-wrapper .panel-icon.duckets:before{
	background-position:-302px -486px;
}

.panel-wrapper ol li .icon.diamonds:before,
.panel-wrapper .panel-icon.diamonds:before{
	background-position:-434px -434px;
}

.panel-wrapper ol li .icon.amount:before,
.panel-wrapper .panel-icon.amount:before{
	background-position:-325px -486px;
}

.panel-wrapper ol li .icon.club:before,
.panel-wrapper .panel-icon.club:before{
	background-position:-218px -458px;
}

.panel-wrapper ol li .icon.limited1:before,
.panel-wrapper .panel-icon.limited1:before{
	background-position:-348px -486px;
}

.panel-wrapper ol li .icon.limited2:before,
.panel-wrapper .panel-icon.limited2:before{
	background-position:-371px -486px;
}

.panel-wrapper ol li .icon.credits,
.panel-wrapper ol li .icon.duckets,
.panel-wrapper ol li .icon.diamonds,
.panel-wrapper ol li .icon.amount,
.panel-wrapper ol li .icon.club,
.panel-wrapper ol li .icon.limited1,
.panel-wrapper ol li .icon.limited2,
.panel-wrapper .panel-icon.credits,
.panel-wrapper .panel-icon.duckets,
.panel-wrapper .panel-icon.diamonds,
.panel-wrapper .panel-icon.amount,
.panel-wrapper .panel-icon.club,
.panel-wrapper .panel-icon.limited1,
.panel-wrapper .panel-icon.limited2{
	margin-left:0;
}

.panel-wrapper ol li .icon.credits:before,
.panel-wrapper ol li .icon.duckets:before,
.panel-wrapper ol li .icon.diamonds:before,
.panel-wrapper ol li .icon.amount:before,
.panel-wrapper ol li .icon.club:before,
.panel-wrapper ol li .icon.limited1:before,
.panel-wrapper ol li .icon.limited2:before,
.panel-wrapper .panel-icon.credits:before,
.panel-wrapper .panel-icon.duckets:before,
.panel-wrapper .panel-icon.diamonds:before,
.panel-wrapper .panel-icon.amount:before,
.panel-wrapper .panel-icon.club:before,
.panel-wrapper .panel-icon.limited1:before,
.panel-wrapper .panel-icon.limited2:before{
	width:21px;
	height:21px;
}

/* Panel - Articles */
.article-webpromos-container{
	max-height:300px;
	overflow-y:auto;
}

.article-webpromos-container .article-webpromo{
	background-repeat:no-repeat;
	background-position:right center;
	background-size:cover;
	width:18.6%;
	height:60px;
	margin:5px;
	float:left;
	cursor:pointer;
}

.article-webpromo-upload-preview{
	background-color:rgba(0, 0, 0, 0.1);
	width:759px;
	height:300px;
	overflow:hidden;
	position:relative;
	margin:0 auto;
}

.article-webpromo-upload-preview .preview-thumbnail-selector{
	-webkit-box-shadow:0 0 0 2px #000, 0 0 0 2px rgba(255, 255, 255, 0.2) inset;
	box-shadow:0 0 0 2px #000, 0 0 0 2px rgba(255, 255, 255, 0.2) inset;
	background-color:rgba(0, 0, 0, 0.3);
	width:120px;
	height:120px;
	position:absolute;
	top:0;
	left:0;
	z-index:2;
	cursor:move;
	display:none;
	color:#fff;
}

.article-webpromo-upload-preview .preview-thumbnail-selector:before{
	content:"DÃ©placer la miniature";
	display:block;
	text-align:center;
	padding:36px 10px 0;
}

/* Footer */
.footer-wrapper .footer-logo{
	float:left;
	padding:22px 12px 12px 0;
}

.footer-wrapper .footer-logo a{
	background-image:url(../images/header-logo.gif);
	width:190px;
	height:68px;
	font-size:0;
	display:block;
}

.footer-wrapper .footer-content{
	float:left;
	padding:12px 0 12px 12px;
}

.footer-wrapper .footer-content ul.footer-nav{
	font-size:0;
	list-style:none;
	margin:0;
	padding:0;
}

.footer-wrapper .footer-content ul.footer-nav li.footer-nav-item{
	font-size:14px;
	line-height:1.4;
	color:#a1b5c8;
	display:inline;
}

.footer-wrapper .footer-content ul.footer-nav li.footer-nav-item:not(:last-child):after{
	content:"\2044";
	display:inline-block;
	margin:0 12px 0 10px;
}

.footer-wrapper .footer-content ul.footer-nav li.footer-nav-item a{
	color:inherit;
	white-space:nowrap;
}

.footer-wrapper .footer-content .footer-copyright {
	font-size:12px;
	color:#425c73;
}

/* Page not found */
.not-found-content{
	text-align:center;
}

.not-found-content:before{
	content:url(../images/frank-looking.png);
	display:block;
	margin:0 auto 12px;
	width:132px;
	height:115px;
}

/* Xmas */
#xmasflakes-container{
	position:fixed;
	top:0;
	left:0;
	right:0;
	z-index:550;
	cursor:default;
}

/* Xmas lottery */
#lottery-container{
	background-image:url(../images/xmas16/lottery-ticket.png?2);
	width:600px;
	height:303px;
	margin:0 auto;
	padding:28px 0 0 16px;
}

#lottery-container .ticket-num{
	background-image:url(../images/xmas16/ticket-num.png?3);
	width:51px;
	height:53px;
	margin:15px 10px;
	font-size:24px;
	font-weight:bold;
	color:#053757;
	text-align:center;
	padding-top:9px;
	cursor:pointer;
	float:left;
}

#lottery-container .ticket-num.selected{
	background-position:-51px 0;
}
		</style>
		<link rel="stylesheet" href="/externalapi/dedipass/styles/global.css?v=<?php echo time(); ?>" type="text/css" />
		<style>{{cssDemo}}</style>
	</head>
	<body>
		<div class="container">
			
			<div ng-if="!solutionsC[countryIso].length" id="countryChoice">
				<h3>{{'FROM_WHICH_COUNTRY_WOULD_YOU_LIKE_TO_PAY' | translate}}</h3>
				<div class="panel-group panel-group-countries">
					<div class="panel panel-default panel-solution" ng-repeat="country in countries | orderBy:country.name" ng-if="country.iso !== 'all'">
						<div class="panel-heading panel-heading-solution">
							<h4 class="panel-title"><a href="javascript:;" ng-click="setCountry(country.iso, country.name);">{{country.name}}</a></h4>
						</div>
					</div>
					<div class="panel panel-default panel-solution" ng-if="solutionsC[countryIso].length">
						<div class="panel-heading panel-heading-solution">
							<h4 class="panel-title"><a href="javascript:;" ng-click="setCountry('all', 'Other');">Other</a></h4>
						</div>
					</div>
				</div>
			</div>
			<style type="text/css">
			
</style>
			<!--<h3 id="howDoYouWantToPay">{{'HOW_DO_YOU_WANT_TO_PAY' | translate}}</h3>-->
			<div ng-if="globalLoading" class="global-loading">
				<div class="loading-image"></div>
				<div class="loading-text">Chargement des offres en cours...</div>
			</div>
			<div class="step1" ng-if="solutionsC[countryIso].length">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div ng-repeat="solution in solutionsC[countryIso]" class="panel panel-default panel-solution">
						<div class="panel-heading panel-heading-solution" role="tab" id="heading-{{solution.slug}}">
							<h3 class="panel-title">
								<a class="solution" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse-{{solution.slug}}" aria-expanded="true" aria-controls="collapse-{{solution.slug}}">
									<ng-include src="'solutions/' + solution.slug + '.html'"></ng-include>
									{{solution.slug | translate}}
									<div class="pull-right pull-right-caret">
										<svg style="vertical-align: -3px;" version="1.1" class="caret-menu" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 width="451.847px" height="451.847px" fill="#fff" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
											 xml:space="preserve">
											<g>
												<path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
													c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
													c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
											</g>
										</svg>
									</div>
								</a>
							</h3>
						</div>
						<div id="collapse-{{solution.slug}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{solution.slug}}">
							<div class="panel-body">
								<div class="offers" ng-if="productType === 'virtualcurrency'">
									<div ng-repeat="rate in rates | orderBy:vcPriceOrder:false" class="offer text-center panel panel-default solution-{{rate.solution_slug}} country-{{rate.country.iso}}" ng-if="(countryIso == rate.country.iso || rate.country.iso == 'all') && rate.solution_slug == solution.slug" ng-click="selectRate(rate.rate)">
										<div class="buy-description">{{rate.user_earns}} {{rate.virtual_currency_name}}</div>
										<a href="javascript:;" class="buy-button button green-button">{{rate.user_price}} {{rate.user_currency.replace('EUR', '&euro;')}}</a>
									</div>
								</div>
								<div ng-if="productType !== 'virtualcurrency'">
									<div ng-repeat="rate in rates | orderBy:'-user_price':false" class="text-center solution-{{rate.solution_slug}} country-{{rate.country.iso}} payment-information" ng-if="(countryIso == rate.country.iso || rate.country.iso == 'all') && rate.solution_slug == solution.slug">
										<p><b>{{'to_pay_by_' + rate.solution_slug | translate}}</b></p>
						
										<div ng-if="rate.solution_slug == 'sms' && rate.country.iso == 'fr'">
											<div class="keyword">{{rate.keyword}}</div> {{'TO' | translate}} <div class="shortcode">{{rate.shortcode}} <img src="images/smsasterix.png" style="width: 16px;vertical-align: 0px;margin-left: 3px;"></div>
											<p><small ng-bind-html="rate.mention_trusted"></small></p>
											<img src="images/smsplus.png" style="width: 100px;margin-bottom: 10px;">
										</div>

										<div ng-if="rate.solution_slug == 'sms' && rate.country.iso == 'be'">
											<div class="keyword">{{rate.keyword}}</div> {{'TO' | translate}} 
											<div class="shortcode-be-container"><div class="shortcode-be"><div><b>{{rate.shortcode}}</b><small>{{rate.user_price}} EUR / ACHAT</small></div></div></div>
										</div>

										<div ng-if="rate.solution_slug == 'sms' && rate.country.iso != 'fr' && rate.country.iso != 'be'">
											<div class="keyword">{{rate.keyword}}</div> {{'TO' | translate}} <div class="shortcode">{{rate.shortcode}}</div>
											<p><small ng-bind-html="rate.mention_trusted"></small></p>
										</div>

										<div ng-if="rate.solution_slug == 'audiotel' && rate.country.iso == 'fr'">
											<div class="audiotel-fr" style="margin-bottom: 10px;">
												{{rate.phone}}
												<small ng-bind-html="rate.mention_trusted"></small>
											</div>
										</div>

										<div ng-if="rate.solution_slug == 'audiotel' && rate.country.iso != 'fr'">
											<div class="phone" style="margin-top: -5px">{{rate.phone}}</div>
											<p><small ng-bind-html="rate.mention_trusted"></small></p>
										</div>

										<p ng-if="rate.link && rate.link.length > 0">
											<a href="javascript:;" ng-click="openModal(rate.link)" class="btn btn-primary btn-buy">{{'BUY_AN_ACCESS_CODE_BY' | translate}} {{rate.solution_slug | translate}} {{'FOR' | translate}} {{rate.user_price}} {{rate.user_currency.replace('EUR', '&euro;')}}</a>
										</p>

										<p>
											<b>{{'USE_YOUR_ACCESS_CODE_CLASSIC' | translate}}</b>
										</p>
										<form ng-submit="validate2(rate.rate);">
											<div ng-if="productType === 'virtualcurrency'" class="result result-true-{{rate.rate}} alert alert-success">
												{{'THANKS_FOR_YOUR_PURCHASE' | translate}}
											</div>
											<div class="result result-false-{{rate.rate}} alert alert-danger alert-error">
												{{'YOUR_ACCESS_CODE_IS_INCORRECT' | translate}}
											</div>
											<div class="input-group" style="max-width: 250px;margin: 0 auto;">
												<input type="hidden" value="{{rate.rate}}">
												<input type="text" class="form-control code code-{{rate.rate}} input-code" placeholder="{{'ACCESS_CODE' | translate}}...">
												<span class="input-group-btn">
													<button ng-class="{'disabled': loading}" class="btn btn-primary validation-button" type="submit">{{'OK' | translate}}</button>
												</span>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="step2">
				<div ng-repeat="rate in rates" class="text-center offer-more offer-more-{{rate.rate}} payment-information">
					<div style="margin-bottom:24px;">
						<div style="float:right;font-size:36px;color:#fff;">{{rate.user_price}} {{rate.user_currency.replace('EUR', '&euro;')}}</div>
						<h3>{{rate.user_earns}} {{rate.virtual_currency_name}} - {{rate.solution_slug | translate}}</h3>
					</div>
					<p>
						{{'to_pay_by_' + rate.solution_slug | translate}}
						<span ng-if="rate.solution_slug == 'paysafecard'">
							<br>{{'IF_YOU_DONT_HAVE_A_PAYSAFECARD_PREPAID_CARD_YOU_CAN' | translate}} <a href="https://www.paysafecard.com/fr-fr/acheter/trouver-des-points-de-vente/points-de-vente/" target="_blank">{{'FIND_A_RETAILER_HERE' | translate}}</a>
						</span>
						<span ng-if="rate.solution_slug == 'neosurf'">
							<br>{{'IF_YOU_DONT_HAVE_A_NEOSURF_PREPAID_CARD_YOU_CAN' | translate}} <a href="http://www.neosurf.com/fr_FR/application/findcard" target="_blank">{{'FIND_A_RETAILER_HERE' | translate}}</a>
						</span>
					</p>
					
					<div class="sms-container" ng-if="rate.solution_slug == 'sms' && rate.country.iso == 'fr'">
						<div class="keyword">{{rate.keyword}}</div> {{'TO' | translate}} <div class="shortcode">{{rate.shortcode}} <img src="images/smsasterix.png" style="width: 16px;vertical-align: 0px;margin-left: 3px;"></div>
						<p><small ng-bind-html="rate.mention_trusted"></small></p>
						<img src="images/smsplus.png" style="width: 100px;margin-bottom: 10px;">
					</div>

					<div class="sms-container" ng-if="rate.solution_slug == 'sms' && rate.country.iso == 'be'">
						<div class="keyword">{{rate.keyword}}</div> {{'TO' | translate}} 
						<div class="shortcode-be-container"><div class="shortcode-be"><div><b>{{rate.shortcode}}</b><small>{{rate.user_price}} EUR / ACHAT</small></div></div></div>
					</div>

					<div class="sms-container" ng-if="rate.solution_slug == 'sms' && rate.country.iso != 'fr' && rate.country.iso != 'be'">
						<div class="keyword">{{rate.keyword}}</div> {{'TO' | translate}} <div class="shortcode">{{rate.shortcode}}</div>
						<p><small ng-bind-html="rate.mention_trusted"></small></p>
					</div>

					<div ng-if="rate.solution_slug == 'audiotel' && rate.country.iso == 'fr'">
						<div class="audiotel-fr" style="margin-bottom: 10px;">
							{{rate.phone}}
							<small ng-bind-html="rate.mention_trusted"></small>
						</div>
					</div>

					<div ng-if="rate.solution_slug == 'audiotel' && rate.country.iso != 'fr'">
						<div class="phone" style="margin-top: -5px">{{rate.phone}}</div>
						<p><small ng-bind-html="rate.mention_trusted"></small></p>
					</div>

					<p ng-if="rate.link && rate.link.length > 0">
						<a href="javascript:;" ng-click="openModal(rate.link)" class="btn btn-primary btn-buy">{{'BUY_AN_ACCESS_CODE_BY' | translate}} {{rate.solution_slug | translate}} {{'FOR' | translate}} {{rate.user_price}} {{rate.user_currency.replace('EUR', '&euro;')}}</a>
					</p>

					<p>
						{{'USE_YOUR_ACCESS_CODE_VIRTUAL_CURRENCY' | translate}} {{rate.virtual_currency_name}}
					</p>
					<form ng-submit="validate2(rate.rate);">
						<div ng-if="productType === 'virtualcurrency'" class="result result-true-{{rate.rate}} alert alert-success">
							{{'THANKS_FOR_YOUR_PURCHASE' | translate}}<!-- SHOW VIRTUALCURRENCY DEPENDING OF USED RATE AND NOT OF OPENED RATE....... {{'OF' | translate}} {{rate.user_earns}} {{rate.virtual_currency_name}}-->
						</div>
						<div class="result result-false-{{rate.rate}} alert alert-danger alert-error">
							{{'YOUR_ACCESS_CODE_IS_INCORRECT' | translate}}
						</div>
						<div class="access-code">
							<input type="hidden" value="{{rate.rate}}">
							<input type="hidden" class="user_price-{{rate.rate}}" value="{{rate.user_price}}">
							<div class="input-container">
								<input type="text" class="form-input form-control code code-{{rate.rate}} input-code" placeholder="{{'ACCESS_CODE' | translate}}...">
							</div>
							<button ng-class="{'disabled': loading}" class="btn btn-primary validation-button" type="submit">VALIDER</button>
						</div>
					</form>
				</div>
				<a href="javascript:;" class="back-to-link back-to-offer-button" ng-click="backToStep1()">Retourne consulter les offres</a>
			</div>
			<div class="footer flexbox">
				<div>
					<a href="https://dedipass.com" target="_blank"><img src="/external/dedipass/images/logo-provided.png" style="height: 37px;"></a>
				</div>
				<div class="text-right" style="padding-top: 8px">
				   <!-- <a href="javascript:;" class="btn btn-link">{{'I_HAVE_AN_ACCESS_CODE' | translate}}</a>-->
					<div class="btn-group dropup">
						<a href="javascript:;" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{'REGION' | translate}}: {{countryName}} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu international-dropdown">
							<li ng-repeat="country in countries | orderBy:country.name" ng-if="country.iso !== 'all'">
								<a href="javascript:;" ng-click="setCountry(country.iso, country.name);">{{country.name}}</a>
							</li>
						</ul>
					</div>
					<div class="btn-group dropup">
						<a href="javascript:;" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{'LANGUAGE' | translate}}: {{'LANG' | translate}} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu international-dropdown">
							<li><a href="javascript:;" ng-click="changeLanguage('en')">English</a></li>
							<li><a href="javascript:;" ng-click="changeLanguage('fr')">Fran&ccedil;ais</a></li>
							<li><a href="javascript:;" ng-click="changeLanguage('de')">Deutsch</a></li>
							<li><a href="javascript:;" ng-click="changeLanguage('es')">Español</a></li>
							<li><a href="javascript:;" ng-click="changeLanguage('it')">Italien</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<a href="http://dedipass.com/contact" target="_blank" class="btn btn-link">{{'HELP' | translate}}</a>
					</div>
				</div>
			</div>
		</div>

		<form id="codeForm" style="display: none" method="GET" target="_parent">
			<input type="text" id="codeFormInput" name="code">
			<input type="text" value="AUTORATE" name="rate">
			<input type="text" value="{{keyCss.replace('/', '')}}" name="key">
			<input type="text" value="{{custom}}" name="custom">
			<input type="submit">
		</form>


		<script type="text/ng-template" id="solutions/audiotel.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 width="348.077px" height="348.077px" fill="#fff" viewBox="0 0 348.077 348.077" style="enable-background:new 0 0 348.077 348.077;"
				 xml:space="preserve">
				<g>
					<path d="M340.273,275.083l-53.755-53.761c-10.707-10.664-28.438-10.34-39.518,0.744l-27.082,27.076
							c-1.711-0.943-3.482-1.928-5.344-2.973c-17.102-9.476-40.509-22.464-65.14-47.113c-24.704-24.701-37.704-48.144-47.209-65.257
							c-1.003-1.813-1.964-3.561-2.913-5.221l18.176-18.149l8.936-8.947c11.097-11.1,11.403-28.826,0.721-39.521L73.39,8.194
							C62.708-2.486,44.969-2.162,33.872,8.938l-15.15,15.237l0.414,0.411c-5.08,6.482-9.325,13.958-12.484,22.02
							C3.74,54.28,1.927,61.603,1.098,68.941C-6,127.785,20.89,181.564,93.866,254.541c100.875,100.868,182.167,93.248,185.674,92.876
							c7.638-0.913,14.958-2.738,22.397-5.627c7.992-3.122,15.463-7.361,21.941-12.43l0.331,0.294l15.348-15.029
							C350.631,303.527,350.95,285.795,340.273,275.083z"/>
				</g>
			</svg>
		</script>

		<script type="text/ng-template" id="solutions/sms.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="510px" height="510px" fill="#fff" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
					<g>
						<g id="textsms">
							<path d="M459,0H51C22.95,0,0,22.95,0,51v459l102-102h357c28.05,0,51-22.95,51-51V51C510,22.95,487.05,0,459,0z M178.5,229.5h-51
								v-51h51V229.5z M280.5,229.5h-51v-51h51V229.5z M382.5,229.5h-51v-51h51V229.5z"/>
						</g>
					</g>
				</svg>
		</script>

		<script type="text/ng-template" id="solutions/carte-bancaire.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 477.859 477.859" fill="#fff" style="enable-background:new 0 0 477.859 477.859;" xml:space="preserve">
				<g>
					<path d="M430.787,409.961H48.103C21.379,409.961,0,388.582,0,361.859V116
						c0-26.724,21.379-48.103,48.103-48.103h381.615c26.724,0,48.103,21.379,48.103,48.103v246.927
						C478.889,388.582,457.51,409.961,430.787,409.961z M48.103,99.966c-8.552,0-16.034,7.483-16.034,16.034v246.927
						c0,8.552,7.483,16.034,16.034,16.034h381.615c8.552,0,16.034-7.483,16.034-16.034V116c0-8.552-7.483-16.034-16.034-16.034H48.103z
						"/>
					<rect x="16.034" y="142.724" width="445.752" height="59.861"/>
					<circle cx="369.857" cy="310.549" r="35.275"/>
					<circle cx="322.823" cy="310.549" r="35.275"/>
					<path d="M180.653,253.895H76.964c-3.207,0-5.345-2.138-5.345-5.345c0-3.207,2.138-5.345,5.345-5.345
						h103.688c3.207,0,5.345,2.138,5.345,5.345C185.997,250.688,183.859,253.895,180.653,253.895z"/>
				</g>
			</svg>
		</script>

		<script type="text/ng-template" id="solutions/neosurf.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 513.32 513.32" fill="#fff" style="enable-background:new 0 0 513.32 513.32;" xml:space="preserve">
				<g>
					<g>
						<path d="M449.155,64.165H64.165C27.805,64.165,0,85.553,0,128.33h42.777c0-21.388,8.555-21.388,21.388-21.388h384.99
							c12.833,0,21.388,8.555,21.388,21.388v256.66c0,12.833-8.555,21.388-21.388,21.388H64.165c-12.833,0-21.388-10.694-21.388-21.388
							V213.883h384.99v-42.777H0V384.99c0,36.36,27.805,64.165,64.165,64.165h384.99c36.36,0,64.165-27.805,64.165-64.165V128.33
							C513.32,91.97,485.515,64.165,449.155,64.165z"/>
					</g>
				</g>
			</svg>
		</script>

		<script type="text/ng-template" id="solutions/internet-plus-mobile.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 31.444 31.444" fill="#fff" style="enable-background:new 0 0 31.444 31.444;" xml:space="preserve">
				<path d="M1.119,16.841c-0.619,0-1.111-0.508-1.111-1.127c0-0.619,0.492-1.111,1.111-1.111h13.475V1.127
					C14.595,0.508,15.103,0,15.722,0c0.619,0,1.111,0.508,1.111,1.127v13.476h13.475c0.619,0,1.127,0.492,1.127,1.111
					c0,0.619-0.508,1.127-1.127,1.127H16.833v13.476c0,0.619-0.492,1.127-1.111,1.127c-0.619,0-1.127-0.508-1.127-1.127V16.841H1.119z"
					/>
			</svg>
		</script>

		<script type="text/ng-template" id="solutions/paypal.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 18.263 18.263" fill="#fff" style="enable-background:new 0 0 18.263 18.263;" xml:space="preserve">
				<g>
					<path d="M17.601,4.398c-0.227-0.688-0.711-1.167-1.272-1.501c0.015,0.037,0.028,0.071,0.041,0.108
						c0.745,2.259,0.132,4.861-1.058,6.055c-1.428,1.436-3.559,2.428-5.118,2.428c-1.609,0-3.099,0-3.099,0s-0.914,0.145-1.154,1.25
						c-0.241,1.105-0.769,3.171-0.769,3.171s-0.117,0.962-1.128,0.962c-0.523,0-1.142,0-1.617,0c-0.03,0.145-0.051,0.252-0.062,0.312
						c-0.168,1.009,0.529,1.08,0.529,1.08s1.37,0,2.381,0s1.127-0.961,1.127-0.961s0.528-2.066,0.77-3.172s1.153-1.248,1.153-1.248
						s1.49,0,3.101,0c0.871,0,3.462-0.709,5.119-2.428C17.712,9.239,18.347,6.658,17.601,4.398z M4.403,15.164
						c0,0,0.529-2.066,0.77-3.173c0.241-1.104,1.152-1.248,1.152-1.248s1.49,0,3.102,0c1.68,0,3.837-1.088,5.118-2.428
						c1.163-1.218,1.802-3.798,1.057-6.058C14.857,0,11.373,0,11.373,0h-6.97C3.826,0,3.587,0.816,3.587,0.816
						S0.534,14.034,0.366,15.043c-0.168,1.01,0.529,1.082,0.529,1.082s1.37,0,2.38,0S4.403,15.164,4.403,15.164z M6.385,6.784
						c0.178-0.86,0.729-3.319,0.729-3.319S7.416,2.893,7.96,2.897c0.675,0.01,1.544,0.039,1.544,0.039s1.769,0.024,2.01,1.272
						c0.241,1.25-0.474,2.469-1.001,2.803c-0.528,0.332-1.148,0.65-1.839,0.65s-1.94,0-1.94,0S6.205,7.647,6.385,6.784z"/>
				</g>
			</svg>
		</script>

		<script type="text/ng-template" id="solutions/paysafecard.html">
			<svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 width="486.733px" height="486.733px" fill="#fff" viewBox="0 0 486.733 486.733" style="enable-background:new 0 0 486.733 486.733;"
				 xml:space="preserve">
				<g>
					<path d="M403.88,196.563h-9.484v-44.388c0-82.099-65.151-150.681-146.582-152.145c-2.225-0.04-6.671-0.04-8.895,0
					C157.486,1.494,92.336,70.076,92.336,152.175v44.388h-9.485c-14.616,0-26.538,15.082-26.538,33.709v222.632
					c0,18.606,11.922,33.829,26.539,33.829h321.028c14.616,0,26.539-15.223,26.539-33.829V230.272
					C430.419,211.646,418.497,196.563,403.88,196.563z M273.442,341.362v67.271c0,7.703-6.449,14.222-14.158,14.222H227.45
					c-7.71,0-14.159-6.519-14.159-14.222v-67.271c-7.477-7.36-11.83-17.537-11.83-28.795c0-21.334,16.491-39.666,37.459-40.513
					c2.222-0.09,6.673-0.09,8.895,0c20.968,0.847,37.459,19.179,37.459,40.513C285.272,323.825,280.919,334.002,273.442,341.362z
					 M331.886,196.563h-84.072h-8.895h-84.072v-44.388c0-48.905,39.744-89.342,88.519-89.342c48.775,0,88.521,40.437,88.521,89.342
					V196.563z"/>
				</g>
			</svg>
		</script>



		
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/angular-translate/2.9.0/angular-translate.min.js"></script>
		<script src="//paulsmith.github.io/angular-slugify/angular-slugify.js"></script>
		<script src="/external/dedipass/javascript/app.js?v=<?php echo time(); ?>"></script>
		<script src="/external/dedipass/javascript/main.js?v=<?php echo time(); ?>"></script>
	</body>
</html>
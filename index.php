<?php

	// Basic Variable
	$title = 'Welcome Dashboard';
	$m = 1;
	$sm = 1;
	$breadcrumb = '<li class="breadcrumb-item active" aria-current="page">'.$m.'</li>';
	// Call Key
	include('config/key.php');


	$query = $db->query("SELECT * FROM tbl_transaction");
	if ($query->num_rows > 0) {
		$transaction_tt = $query->num_rows;
	}


	// include header
	include('layout/header.php');
?>
<style type="text/css">

	.card {
	    position: relative;
	    display: flex;
	    flex-direction: column;
	    min-width: 0;
	    word-wrap: break-word;
	    background-color: #fff;
	    background-clip: border-box;
	    border: 1px solid #eee;
	    border-radius: .25rem
	}

	.card>hr {
	    margin-right: 0;
	    margin-left: 0
	}

	.card>.list-group:first-child .list-group-item:first-child {
	    border-top-left-radius: .25rem;
	    border-top-right-radius: .25rem
	}

	.card>.list-group:last-child .list-group-item:last-child {
	    border-bottom-right-radius: .25rem;
	    border-bottom-left-radius: .25rem
	}

	.card-body {
	    flex: 1 1 auto;
	    padding: 1.25rem
	}

	.card-title {
	    margin-bottom: .75rem
	}

	.card-subtitle {
	    margin-top: -.375rem
	}

	.card-subtitle,
	.card-text:last-child {
	    margin-bottom: 0
	}

	.card-link:hover {
	    text-decoration: none
	}

	.card-link+.card-link {
	    margin-left: 1.25rem
	}

	.card-header {
	    padding: .75rem 1.25rem;
	    margin-bottom: 0;
	    background-color: #fff;
	    border-bottom: 1px solid #eee
	}

	.card-header:first-child {
	    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
	}

	.card-header+.list-group .list-group-item:first-child {
	    border-top: 0
	}

	.card-footer {
	    padding: .75rem 1.25rem;
	    background-color: #fff;
	    border-top: 1px solid #eee
	}

	.card-footer:last-child {
	    border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px)
	}

	.card-header-tabs {
	    margin-bottom: -.75rem;
	    border-bottom: 0
	}

	.card-header-pills,
	.card-header-tabs {
	    margin-right: -.625rem;
	    margin-left: -.625rem
	}

	.card-img-overlay {
	    position: absolute;
	    top: 0;
	    right: 0;
	    bottom: 0;
	    left: 0;
	    padding: 1.25rem
	}

	.card-img {
	    width: 100%;
	    border-radius: calc(.25rem - 1px)
	}

	.card-img-top {
	    width: 100%;
	    border-top-left-radius: calc(.25rem - 1px);
	    border-top-right-radius: calc(.25rem - 1px)
	}

	.card-img-bottom {
	    width: 100%;
	    border-bottom-right-radius: calc(.25rem - 1px);
	    border-bottom-left-radius: calc(.25rem - 1px)
	}

	.card-deck {
	    display: flex;
	    flex-direction: column
	}

	.card-deck .card {
	    margin-bottom: 15px
	}

	@media (min-width:576px) {
	    .card-deck {
	        flex-flow: row wrap;
	        margin-right: -15px;
	        margin-left: -15px
	    }
	    .card-deck .card {
	        display: flex;
	        flex: 1 0 0%;
	        flex-direction: column;
	        margin-right: 15px;
	        margin-bottom: 0;
	        margin-left: 15px
	    }
	}

	.card-group {
	    display: flex;
	    flex-direction: column
	}

	.card-group>.card {
	    margin-bottom: 15px
	}

	@media (min-width:576px) {
	    .card-group {
	        flex-flow: row wrap
	    }
	    .card-group>.card {
	        flex: 1 0 0%;
	        margin-bottom: 0
	    }
	    .card-group>.card+.card {
	        margin-left: 0;
	        border-left: 0
	    }
	    .card-group>.card:first-child {
	        border-top-right-radius: 0;
	        border-bottom-right-radius: 0
	    }
	    .card-group>.card:first-child .card-header,
	    .card-group>.card:first-child .card-img-top {
	        border-top-right-radius: 0
	    }
	    .card-group>.card:first-child .card-footer,
	    .card-group>.card:first-child .card-img-bottom {
	        border-bottom-right-radius: 0
	    }
	    .card-group>.card:last-child {
	        border-top-left-radius: 0;
	        border-bottom-left-radius: 0
	    }
	    .card-group>.card:last-child .card-header,
	    .card-group>.card:last-child .card-img-top {
	        border-top-left-radius: 0
	    }
	    .card-group>.card:last-child .card-footer,
	    .card-group>.card:last-child .card-img-bottom {
	        border-bottom-left-radius: 0
	    }
	    .card-group>.card:only-child {
	        border-radius: .25rem
	    }
	    .card-group>.card:only-child .card-header,
	    .card-group>.card:only-child .card-img-top {
	        border-top-left-radius: .25rem;
	        border-top-right-radius: .25rem
	    }
	    .card-group>.card:only-child .card-footer,
	    .card-group>.card:only-child .card-img-bottom {
	        border-bottom-right-radius: .25rem;
	        border-bottom-left-radius: .25rem
	    }
	    .card-group>.card:not(:first-child):not(:last-child):not(:only-child),
	    .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,
	    .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,
	    .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
	    .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top {
	        border-radius: 0
	    }
	}

	.card-columns .card {
	    margin-bottom: .75rem
	}

	@media (min-width:576px) {
	    .card-columns {
	        column-count: 3;
	        column-gap: 1.25rem
	    }
	    .card-columns .card {
	        display: inline-block;
	        width: 100%
	    }
	}

	.card-title,
	.card-title a,
	.footer-big h4,
	.footer-big h4 a,
	.footer-big h5,
	.footer-big h5 a,
	.footer-brand,
	.footer-brand a,
	.info-title,
	.info-title a,
	.media .media-heading,
	.media .media-heading a,
	.title,
	.title a {
	    color: #3c4858;
	    text-decoration: none
	}

	.card-blog .card-title {
	    font-weight: 700
	}

.card {
    border: 0;
    margin-bottom: 30px;
    margin-top: 30px;
    border-radius: 6px;
    color: #333;
    background: #fff;
    width: 100%;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12)
}

.card .card-category:not([class*=text-]) {
    color: #999
}

.card .card-category {
    margin-top: 10px
}

.card .card-category .material-icons {
    position: relative;
    top: 8px;
    line-height: 0
}

.card .form-check {
    margin-top: 5px
}

.card .card-title {
    margin-top: .625rem
}

.card .card-title:last-child {
    margin-bottom: 0
}

.card.no-shadow .card-header-image,
.card.no-shadow .card-header-image img {
    box-shadow: none!important
}

.card .card-body,
.card .card-footer {
    padding: .9375rem 1.875rem
}

.card .card-body+.card-footer {
    padding-top: 0;
    border: 0;
    border-radius: 6px
}

.card .card-footer {
    display: flex;
    align-items: center;
    background-color: transparent;
    border: 0
}

.card .card-footer .author,
.card .card-footer .stats {
    display: inline-flex
}

.card .card-footer .stats {
    color: #999
}

.card .card-footer .stats .material-icons {
    position: relative;
    top: -10px;
    margin-right: 3px;
    margin-left: 3px;
    font-size: 18px
}

.card.bmd-card-raised {
    box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2)
}

@media (min-width:992px) {
    .card.bmd-card-flat {
        box-shadow: none
    }
}

.card .card-header {
    border-bottom: none;
    background: transparent
}

.card .card-header .title {
    color: #fff
}

.card .card-header .nav-tabs {
    padding: 0
}

.card .card-header.card-header-image {
    position: relative;
    padding: 0;
    z-index: 1;
    margin-left: 15px;
    margin-right: 15px;
    margin-top: -30px;
    border-radius: 6px
}

.card .card-header.card-header-image img {
    width: 100%;
    border-radius: 6px;
    pointer-events: none;
    box-shadow: 0 5px 15px -8px rgba(0, 0, 0, .24), 0 8px 10px -5px rgba(0, 0, 0, .2)
}

.card .card-header.card-header-image .card-title {
    position: absolute;
    bottom: 15px;
    left: 15px;
    color: #fff;
    font-size: 1.125rem;
    text-shadow: 0 2px 5px rgba(33, 33, 33, .5)
}

.card .card-header.card-header-image .colored-shadow {
    transform: scale(.94);
    top: 12px;
    filter: blur(12px);
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    z-index: -1;
    transition: opacity .45s;
    opacity: 0
}

.card .card-header.card-header-image.no-shadow {
    box-shadow: none
}

.card .card-header.card-header-image.no-shadow.shadow-normal {
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2)
}

.card .card-header.card-header-image.no-shadow .colored-shadow {
    display: none!important
}

.card.bg-primary,
.card .card-header-primary .card-icon,
.card .card-header-primary .card-text,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card.card-rotate.bg-primary .back,
.card.card-rotate.bg-primary .front {
    background: linear-gradient(60deg, #ab47bc, #8e24aa)
}

.card.bg-info,
.card .card-header-info .card-icon,
.card .card-header-info .card-text,
.card .card-header-info:not(.card-header-icon):not(.card-header-text),
.card.card-rotate.bg-info .back,
.card.card-rotate.bg-info .front {
    background: linear-gradient(60deg, #26c6da, #00acc1)
}

.card.bg-success,
.card .card-header-success .card-icon,
.card .card-header-success .card-text,
.card .card-header-success:not(.card-header-icon):not(.card-header-text),
.card.card-rotate.bg-success .back,
.card.card-rotate.bg-success .front {
    background: linear-gradient(60deg, #66bb6a, #43a047)
}

.card.bg-warning,
.card .card-header-warning .card-icon,
.card .card-header-warning .card-text,
.card .card-header-warning:not(.card-header-icon):not(.card-header-text),
.card.card-rotate.bg-warning .back,
.card.card-rotate.bg-warning .front {
    background: linear-gradient(60deg, #ffa726, #fb8c00)
}

.card.bg-danger,
.card .card-header-danger .card-icon,
.card .card-header-danger .card-text,
.card .card-header-danger:not(.card-header-icon):not(.card-header-text),
.card.card-rotate.bg-danger .back,
.card.card-rotate.bg-danger .front {
    background: linear-gradient(60deg, #ef5350, #e53935)
}

.card.bg-rose,
.card .card-header-rose .card-icon,
.card .card-header-rose .card-text,
.card .card-header-rose:not(.card-header-icon):not(.card-header-text),
.card.card-rotate.bg-rose .back,
.card.card-rotate.bg-rose .front {
    background: linear-gradient(60deg, #ec407a, #d81b60)
}

.card .card-header-primary .card-icon,
.card .card-header-primary .card-text,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text) {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(156, 39, 176, .4)
}

.card .card-header-danger .card-icon,
.card .card-header-danger .card-text,
.card .card-header-danger:not(.card-header-icon):not(.card-header-text) {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(244, 67, 54, .4)
}

.card .card-header-rose .card-icon,
.card .card-header-rose .card-text,
.card .card-header-rose:not(.card-header-icon):not(.card-header-text) {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(233, 30, 99, .4)
}

.card .card-header-warning .card-icon,
.card .card-header-warning .card-text,
.card .card-header-warning:not(.card-header-icon):not(.card-header-text) {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(255, 152, 0, .4)
}

.card .card-header-info .card-icon,
.card .card-header-info .card-text,
.card .card-header-info:not(.card-header-icon):not(.card-header-text) {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(0, 188, 212, .4)
}

.card .card-header-success .card-icon,
.card .card-header-success .card-text,
.card .card-header-success:not(.card-header-icon):not(.card-header-text) {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(76, 175, 80, .4)
}

.card[class*=bg-],
.card[class*=bg-] .card-title,
.card[class*=bg-] .card-title a,
.card[class*=bg-] .icon i,
.card [class*=card-header-],
.card [class*=card-header-] .card-title,
.card [class*=card-header-] .card-title a,
.card [class*=card-header-] .icon i {
    color: #fff
}

.card[class*=bg-] .icon i,
.card [class*=card-header-] .icon i {
    border-color: hsla(0, 0%, 100%, .25)
}

.card[class*=bg-] .author a,
.card[class*=bg-] .card-category,
.card[class*=bg-] .card-description,
.card[class*=bg-] .stats,
.card [class*=card-header-] .author a,
.card [class*=card-header-] .card-category,
.card [class*=card-header-] .card-description,
.card [class*=card-header-] .stats {
    color: hsla(0, 0%, 100%, .8)
}

.card[class*=bg-] .author a:active,
.card[class*=bg-] .author a:focus,
.card[class*=bg-] .author a:hover,
.card [class*=card-header-] .author a:active,
.card [class*=card-header-] .author a:focus,
.card [class*=card-header-] .author a:hover {
    color: #fff
}

.card .author .avatar {
    width: 30px;
    height: 30px;
    overflow: hidden;
    border-radius: 50%;
    margin-right: 5px
}

.card .author a {
    color: #3c4858;
    text-decoration: none
}

.card .author a .ripple-container {
    display: none
}

.card .card-category-social .fa {
    font-size: 24px;
    position: relative;
    margin-top: -4px;
    top: 2px;
    margin-right: 5px
}

.card .card-category-social .material-icons {
    position: relative;
    top: 5px
}

.card[class*=bg-],
.card[class*=bg-] .card-body {
    border-radius: 6px
}

.card[class*=bg-] .card-body h1 small,
.card[class*=bg-] .card-body h2 small,
.card[class*=bg-] .card-body h3 small,
.card[class*=bg-] h1 small,
.card[class*=bg-] h2 small,
.card[class*=bg-] h3 small {
    color: hsla(0, 0%, 100%, .8)
}

.card .card-stats {
    background: transparent;
    display: flex
}

.card .card-stats .author,
.card .card-stats .stats {
    display: inline-flex
}

.card {
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .14)
}

.card .table tr:first-child td {
    border-top: none
}

.card .card-title {
    margin-top: 0;
    margin-bottom: 3px
}

.card .card-body {
    padding: .9375rem 20px;
    position: relative
}

.card .card-body .form-group {
    margin: 8px 0 0
}

.card .card-header {
    z-index: 3!important
}

.card .card-header .card-title {
    margin-bottom: 3px
}

.card .card-header .card-category {
    margin: 0
}

.card .card-header.card-header-text {
    display: inline-block
}

.card .card-header.card-header-text:after {
    content: "";
    display: table
}

.card .card-header.card-header-icon i,
.card .card-header.card-header-text i {
    width: 33px;
    height: 33px;
    text-align: center;
    line-height: 33px
}

.card .card-header.card-header-icon .card-title,
.card .card-header.card-header-text .card-title {
    margin-top: 15px;
    color: #3c4858
}

.card .card-header.card-header-icon h4,
.card .card-header.card-header-text h4 {
    font-weight: 300
}

.card .card-header.card-header-tabs .nav-tabs {
    background: transparent;
    padding: 0
}

.card .card-header.card-header-tabs .nav-tabs-title {
    float: left;
    padding: 10px 10px 10px 0;
    line-height: 24px
}

.card.card-plain .card-header.card-header-icon+.card-body .card-category,
.card.card-plain .card-header.card-header-icon+.card-body .card-title {
    margin-top: -20px
}

.card .card-actions {
    position: absolute;
    z-index: 1;
    top: -50px;
    width: calc(100% - 30px);
    left: 17px;
    right: 17px;
    text-align: center
}

.card .card-actions .card-header {
    padding: 0;
    min-height: 160px
}

.card .card-actions .btn {
    padding-left: 12px;
    padding-right: 12px
}

.card .card-actions .fix-broken-card {
    position: absolute;
    top: -65px
}

.card.card-chart .card-footer i:nth-child(1n+2) {
    width: 18px;
    text-align: center
}

.card.card-chart .card-category {
    margin: 0
}

.card .card-body+.card-footer,
.card .card-footer {
    padding: 0;
    padding-top: 10px;
    margin: 0 15px 10px;
    border-radius: 0;
    justify-content: space-between;
    align-items: center
}

.card .card-body+.card-footer h6,
.card .card-footer h6 {
    width: 100%
}

.card .card-body+.card-footer .stats,
.card .card-footer .stats {
    color: #999;
    font-size: 12px;
    line-height: 22px
}

.card .card-body+.card-footer .stats .card-category,
.card .card-footer .stats .card-category {
    padding-top: 7px;
    padding-bottom: 7px;
    margin: 0
}

.card .card-body+.card-footer .stats .material-icons,
.card .card-footer .stats .material-icons {
    position: relative;
    top: 4px;
    font-size: 16px
}

.card [class*=card-header-] {
    margin: 0 15px;
    padding: 0;
    position: relative
}

.card [class*=card-header-] .card-title+.card-category {
    color: hsla(0, 0%, 100%, .8)
}

.card [class*=card-header-] .card-title+.card-category a {
    color: #fff
}

.card [class*=card-header-]:not(.card-header-icon):not(.card-header-text):not(.card-header-image) {
    border-radius: 3px;
    margin-top: -20px;
    padding: 15px
}

.card [class*=card-header-] .card-icon,
.card [class*=card-header-] .card-text {
    border-radius: 3px;
    background-color: #999;
    padding: 15px;
    margin-top: -20px;
    margin-right: 15px;
    float: left
}

.card [class*=card-header-] .card-text {
    float: none;
    display: inline-block;
    margin-right: 0
}

.card [class*=card-header-] .card-text .card-title {
    color: #fff;
    margin-top: 0
}

.card [class*=card-header-] .ct-chart .card-title {
    color: #fff
}

.card [class*=card-header-] .ct-chart .card-category {
    margin-bottom: 0;
    color: hsla(0, 0%, 100%, .62)
}

.card [class*=card-header-] .ct-chart .ct-label {
    color: hsla(0, 0%, 100%, .7)
}

.card [class*=card-header-] .ct-chart .ct-grid {
    stroke: hsla(0, 0%, 100%, .2)
}

.card [class*=card-header-] .ct-chart .ct-series-a .ct-bar,
.card [class*=card-header-] .ct-chart .ct-series-a .ct-line,
.card [class*=card-header-] .ct-chart .ct-series-a .ct-point,
.card [class*=card-header-] .ct-chart .ct-series-a .ct-slice-donut {
    stroke: hsla(0, 0%, 100%, .8)
}

.card [class*=card-header-] .ct-chart .ct-series-a .ct-area,
.card [class*=card-header-] .ct-chart .ct-series-a .ct-slice-pie {
    fill: hsla(0, 0%, 100%, .4)
}

.card [class*=card-header-] .ct-chart .ct-series-a .ct-bar {
    stroke-width: 10px
}

.card [class*=card-header-] .ct-chart .ct-point {
    stroke-width: 10px;
    stroke-linecap: round
}

.card [class*=card-header-] .ct-chart .ct-line {
    fill: none;
    stroke-width: 4px
}

.card [data-header-animation=true] {
    transform: translateZ(0);
    transition: all .3s cubic-bezier(.34, 1.61, .7, 1)
}

.card:hover [data-header-animation=true] {
    transform: translate3d(0, -50px, 0)
}

.card .map {
    height: 280px;
    border-radius: 6px;
    margin-top: 15px
}

.card .map.map-big {
    height: 420px
}

.card .card-body.table-full-width {
    padding: 0
}

.card .card-plain .card-header-icon {
    margin-right: 15px!important
}

.table-sales {
    margin-top: 40px
}

.iframe-container {
    width: 100%
}

.iframe-container iframe {
    width: 100%;
    height: 500px;
    border: 0;
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2)
}

.card-wizard .nav.nav-pills .nav-item {
    margin: 0
}

.card-wizard .nav.nav-pills .nav-item .nav-link {
    padding: 6px 15px!important
}

.card-wizard .nav-pills:not(.flex-column) .nav-item+.nav-item:not(:first-child) {
    margin-left: 0
}

.card-wizard .nav-item .nav-link.active,
.card-wizard .nav-item .nav-link:focus,
.card-wizard .nav-item .nav-link:hover {
    background-color: inherit!important;
    box-shadow: none!important
}

.card-wizard .input-group-text {
    padding: 6px 15px 0!important
}

.card-wizard .card-footer {
    border-top: none!important
}

.card-chart .card-body+.card-footer,
.card-product .card-body+.card-footer {
    border-top: 1px solid #eee
}

.card-product .price {
    color: inherit
}

.card-collapse {
    margin-bottom: 15px
}

.card-collapse .card .card-header a[aria-expanded=true] {
    color: #e91e63
}

.card-signup .card-header {
    margin: -40px 20px 15px;
    padding: 20px 0;
    width: 100%
}

.card-signup .card-body {
    padding: 0 30px 0 10px
}

.card-signup .form-check {
    padding-top: 27px
}

.card-signup .form-check label {
    margin-left: 18px
}

.card-signup .form-check .form-check-sign {
    padding-right: 27px
}

.card-signup .social-line {
    margin-top: 1rem;
    text-align: center;
    padding: 0
}

.card-signup .social-line .btn {
    color: #fff;
    margin-left: 5px;
    margin-right: 5px
}

.card-plain {
    background: transparent;
    box-shadow: none
}

.card-plain .card-header:not(.card-avatar) {
    margin-left: 0;
    margin-right: 0
}

.card-plain .card-body {
    padding-left: 5px;
    padding-right: 5px
}

.card-plain .card-header-image {
    margin: 0!important;
    border-radius: 6px
}

.card-plain .card-header-image img {
    border-radius: 6px
}

.card-plain .card-footer {
    padding-left: 5px;
    padding-right: 5px;
    background-color: transparent
}

.card-plain .card-header:not(.card-avatar) .card-category,
.card-plain .card-header:not(.card-avatar) .card-description {
    color: #999
}

.card-stats .card-header.card-header-icon,
.card-stats .card-header.card-header-text {
    text-align: right
}

.card-stats .card-header .card-icon+.card-category,
.card-stats .card-header .card-icon+.card-title {
    padding-top: 10px
}

.card-stats .card-header.card-header-icon .card-category,
.card-stats .card-header.card-header-icon .card-title,
.card-stats .card-header.card-header-text .card-category,
.card-stats .card-header.card-header-text .card-title {
    margin: 0
}

.card-stats .card-header .card-category {
    margin-bottom: 0;
    margin-top: 0
}

.card-stats .card-header .card-category:not([class*=text-]) {
    color: #999;
    font-size: 14px
}

.card-stats .card-header+.card-footer {
    border-top: 1px solid #eee;
    margin-top: 20px
}

.card-stats .card-header.card-header-icon i {
    font-size: 36px;
    line-height: 56px;
    width: 56px;
    height: 56px;
    text-align: center
}

.card-stats .card-body {
    text-align: right
}

.card-profile,
.card-testimonial {
    margin-top: 30px;
    text-align: center
}

.card-profile .card-avatar,
.card-testimonial .card-avatar {
    margin: -50px auto 0;
    border-radius: 50%;
    overflow: hidden;
    padding: 0;
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2)
}

.card-profile .card-avatar+.card-body,
.card-testimonial .card-avatar+.card-body {
    margin-top: 15px
}

.card-profile .card-avatar img,
.card-testimonial .card-avatar img {
    width: 100%;
    height: auto
}

.card-profile .card-body+.card-footer,
.card-testimonial .card-body+.card-footer {
    margin-top: -15px
}

.card-profile .card-footer .btn.btn-just-icon,
.card-testimonial .card-footer .btn.btn-just-icon {
    font-size: 20px;
    padding: 12px;
    line-height: 1em
}

.card-plain.card-profile .card-avatar,
.card-plain.card-testimonial .card-avatar {
    margin-top: 0
}

.card-testimonial .card-avatar {
    max-width: 100px;
    max-height: 100px
}

.card-testimonial .card-footer {
    margin-top: 0;
    display: block
}

.card-testimonial .card-footer .card-avatar {
    margin-top: 10px;
    margin-bottom: -60px
}

.card-testimonial .card-description {
    font-style: italic
}

.card-testimonial .card-description+.card-title,
.card-testimonial .icon {
    margin-top: 30px
}

.card-testimonial .icon .material-icons {
    font-size: 40px
}

.card-profile .card-header:not([class*=card-header-]) {
    background: transparent
}

.card-profile .card-avatar {
    max-width: 130px;
    max-height: 130px
}

.card-blog {
    margin-top: 60px
}

.card-blog [class*=col-] .card-header-image img {
    width: 100%
}

.card-blog .carf-footer .stats .material-icons {
    font-size: 18px;
    position: relative;
    top: 4px;
    width: 19px
}

.card-product {
    margin-top: 30px
}

.card-product .btn-simple.btn-just-icon {
    padding: 0
}

.card-product .card-footer .price h4 {
    margin-bottom: 0
}

.card-product .card-footer .btn {
    margin: 0
}

.card-product .card-category,
.card-product .card-description,
.card-product .card-title {
    text-align: center
}

.card-product .category {
    margin-bottom: 0
}

.card-product .category~.card-title {
    margin-top: 0
}

.card-product .price {
    font-size: 18px;
    color: #9a9a9a
}

.card-product .price-old {
    text-decoration: line-through;
    font-size: 16px;
    color: #9a9a9a
}

.card-product .price-new {
    color: #f44336
}

.card-pricing {
    text-align: center
}

.card-pricing:after {
    background-color: rgba(0, 0, 0, .7)!important
}

.card-pricing .card-title {
    margin-top: 30px
}

.card-pricing .card-body {
    padding: 15px!important;
    margin: 0!important
}

.card-pricing .card-icon {
    padding: 10px 0 0
}

.card-pricing .card-icon i {
    font-size: 55px;
    border: 1px solid #e5e5e5;
    border-radius: 50%;
    width: 130px;
    line-height: 130px;
    height: 130px;
    color: #3c4858
}

.card-pricing .card-icon.icon-primary i {
    color: #9c27b0
}

.card-pricing .card-icon.icon-info i {
    color: #00bcd4
}

.card-pricing .card-icon.icon-success i {
    color: #4caf50
}

.card-pricing .card-icon.icon-warning i {
    color: #ff9800
}

.card-pricing .card-icon.icon-danger i {
    color: #f44336
}

.card-pricing .card-icon.icon-rose i {
    color: #e91e63
}

.card-pricing .card-icon.icon-white i {
    color: #fff
}

.card-pricing h1 small {
    font-size: 18px;
    display: inline-flex;
    height: 0
}

.card-pricing h1 small:first-child {
    position: relative;
    top: -17px;
    font-size: 26px
}

.card-pricing ul {
    list-style: none;
    padding: 0;
    max-width: 240px;
    margin: 10px auto
}

.card-pricing ul li {
    color: #999;
    text-align: center;
    padding: 12px 0;
    border-bottom: 1px solid hsla(0, 0%, 60%, .3)
}

.card-pricing ul li:last-child {
    border: 0
}

.card-pricing ul li b {
    color: #3c4858
}

.card-pricing ul li i {
    top: 6px;
    position: relative
}

.card-pricing.card-background ul li,
.card-pricing[class*=bg-] ul li {
    color: #fff;
    border-color: hsla(0, 0%, 100%, .3)
}

.card-pricing.card-background ul li b,
.card-pricing[class*=bg-] ul li b {
    color: #fff;
    font-weight: 700
}

.card-pricing.card-background .card-category,
.card-pricing.card-background [class*=text-],
.card-pricing[class*=bg-] .card-category,
.card-pricing[class*=bg-] [class*=text-] {
    color: #fff!important
}

.card-pricing .card-footer {
    z-index: 2
}

.card-collapse,
.card-collapse .card-header {
    box-shadow: none;
    background-color: transparent;
    border-radius: 0
}

.card-collapse {
    margin: 0
}

.card-collapse .card-header {
    border-bottom: 1px solid #ddd;
    padding: 25px 10px 5px 0;
    margin: 0;
    box-shadow: none!important;
    background: #fff
}

.card-collapse .card-header a {
    color: #3c4858;
    font-size: .9375rem;
    display: block
}

.card-collapse .card-header a:active,
.card-collapse .card-header a:hover,
.card-collapse .card-header a[aria-expanded=true] {
    color: #e91e63
}

.card-collapse .card-header a i {
    float: right;
    top: 4px;
    position: relative
}

.card-collapse .card-header a[aria-expanded=true] i {
    filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=2);
    transform: rotate(180deg)
}

.card-collapse .card-body {
    padding: 15px 0 5px
}

.card-form-horizontal .card-body {
    padding-left: 15px;
    padding-right: 15px
}

.card-form-horizontal .form-group .form-control,
.card-form-horizontal .input-group .form-control {
    margin-bottom: 0
}

.card-form-horizontal .btn,
.card-form-horizontal form {
    margin: 0
}

.card-form-horizontal .input-group .input-group-addon {
    padding-left: 0
}

.card-form-horizontal .bmd-form-group {
    padding-bottom: 0;
    padding-top: 0
}

.back-background,
.card-background,
.front-background {
    background-position: 50%;
    background-size: cover;
    text-align: center
}

.back-background .card-body,
.card-background .card-body,
.front-background .card-body {
    position: relative;
    z-index: 2;
    min-height: 280px;
    padding-top: 40px;
    padding-bottom: 40px;
    max-width: 440px;
    margin: 0 auto
}

.back-background .card-category,
.back-background .card-description,
.back-background small,
.card-background .card-category,
.card-background .card-description,
.card-background small,
.front-background .card-category,
.front-background .card-description,
.front-background small {
    color: hsla(0, 0%, 100%, .7)!important
}

.back-background .card-title,
.card-background .card-title,
.front-background .card-title {
    color: #fff;
    margin-top: 10px
}

.back-background:not(.card-pricing) .btn,
.card-background:not(.card-pricing) .btn,
.front-background:not(.card-pricing) .btn {
    margin-bottom: 0
}

.back-background:after,
.card-background:after,
.front-background:after {
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    content: "";
    background-color: rgba(0, 0, 0, .56);
    border-radius: 6px
}

.rotating-card-container {
    -o-perspective: 800px;
    -ms-perspective: 800px;
    perspective: 800px
}

.rotating-card-container .card-rotate {
    background: transparent;
    box-shadow: none
}

.rotating-card-container .card-rotate:after {
    display: none
}

.rotating-card-container .card {
    transition: all .8s cubic-bezier(.34, 1.45, .7, 1);
    transform-style: preserve-3d;
    position: relative
}

.rotating-card-container .card .back,
.rotating-card-container .card .front {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
    position: absolute;
    background-color: #fff;
    border-radius: 6px;
    top: 0;
    left: 0
}

.rotating-card-container .card .back,
.rotating-card-container .card .back .card-body,
.rotating-card-container .card .front,
.rotating-card-container .card .front .card-body {
    justify-content: center;
    align-content: center;
    display: -moz-flex;
    display: -ms-flexbox;
    display: -o-flex;
    display: flex;
    -moz-flex-direction: column;
    -ms-flex-direction: column;
    -o-flex-direction: column;
    flex-direction: column
}

.rotating-card-container .card .front {
    z-index: 2;
    position: relative
}

.rotating-card-container .card .back {
    transform: rotateY(180deg);
    z-index: 5;
    text-align: center;
    width: 100%;
    height: 100%
}

.rotating-card-container .card .back.back-background:after {
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    content: "";
    background-color: rgba(0, 0, 0, .56);
    border-radius: 6px
}

.rotating-card-container .card .back.back-background .card-body {
    position: relative;
    z-index: 2
}

.rotating-card-container .card .back .card-footer .btn {
    margin: 0
}

.rotating-card-container .card .back .card-body {
    padding-left: 15px;
    padding-right: 15px
}

.rotating-card-container.hover.manual-flip .card,
.rotating-card-container:not(.manual-flip):hover .card {
    transform: rotateY(180deg)
}

.card-profile .rotating-card-container .front {
    text-align: left
}

.back-background .card-body {
    min-height: auto;
    padding-top: 15px;
    padding-bottom: 15px
}

@media (-ms-high-contrast:none),
screen and (-ms-high-contrast:active) {
    .rotating-card-container .card .back,
    .rotating-card-container .card .front {
        backface-visibility: visible
    }
    .rotating-card-container .card .back {
        visibility: hidden;
        transition: visibility .3s cubic-bezier(.34, 1.45, .7, 1)
    }
    .rotating-card-container .card .front {
        z-index: 4
    }
    .rotating-card-container.manual-flip.hover .card .back,
    .rotating-card-container:not(.manual-flip):hover .card .back {
        z-index: 5;
        visibility: visible
    }
}

.card .card-body .col-form-label,
.card .card-body .label-on-right {
    padding: 17px 5px 0 0;
    text-align: right
}

.card .card-body .col-form-label.label-checkbox,
.card .card-body .label-on-right.label-checkbox {
    padding-top: 13px
}

.card .card-body .label-on-right {
    text-align: left
}

.card .label-on-right code {
    padding: 2px 4px;
    font-size: 90%;
    color: #c7254e;
    background-color: #f9f2f4;
    border-radius: 4px
}

</style>

<div class="container-fluid">

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment_turned_in</i>
          </div>
          <p class="card-category">ការជូនដំណឹង</p>
          <h3 class="card-title">184</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-danger">warning</i>
            &nbsp;
            <a href="#">ប្រតិបត្តិការ</a>
          </div>
        </div>
      </div>
    </div>
  
  </div>

</div>
<?php
	// include footer
	include('layout/footer.php');
?>
/**
 * Created by qjy on 16-3-9.
 */
define(function(require, exports, module) {
    //var $ = require('jquery');
    ////=> http://path/to/libs/jquery/1.7.1/jquery.js
    //
    //var biz = require('app/biz');
    ////=> http://path/to/app/biz.js


    $(".submenu > a").click(function(e) {
        e.preventDefault();
        var $li = $(this).parent("li");
        var $ul = $(this).next("ul");

        if($li.hasClass("open")) {
            $ul.slideUp(350);
            $li.removeClass("open");
        } else {
            $(".nav > li > ul").slideUp(350);
            $(".nav > li").removeClass("open");
            $ul.slideDown(350);
            $li.addClass("open");
        }
    });
});
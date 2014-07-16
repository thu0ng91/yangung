(function() {

  (function($) {
    return $.fn.picSwitch = function(option) {
      var $pics, $self, $tabcon, $trigger, getpic, index, item, key, listNum, opt, picLen, scroll, tmp, _i, _j, _len, _len1;
      option = $.extend({
        position: [[105, 80, 132, 140], [279, 0, 236, 250], [563, 80, 132, 140]],
        showLen: 3,
        scrollLen: 1,
        timeOut: 6000,
        autoRun: true,
        callback: false
      }, option);
      $self = this;
      $pics = this.find('.clipbox .item');
      picLen = $pics.length;
      listNum = "";
      index = $self.data('index') || 0;
      getpic = function(index) {
        var ret;
        ret = [];
        while (ret.length < option.showLen) {
          if (index + ret.length >= $pics.length) {
            ret.push($pics.eq(index + ret.length - 1 - $pics.length));
          } else {
            ret.push($pics.eq(index + ret.length - 1));
          }
        }
        return ret;
      };
      tmp = getpic(index);
      for (key = _i = 0, _len = tmp.length; _i < _len; key = ++_i) {
        item = tmp[key];
        opt = option.position[key];
        if (key === 1) {
          item.css('zIndex', 2);
          item.addClass("current");
        }
        item.css({
          left: opt[0],
          top: opt[1],
          width: opt[2],
          height: opt[3]
        }).show();
      }
      /*[tabCon]
      */

      for (key = _j = 0, _len1 = $pics.length; _j < _len1; key = ++_j) {
        item = $pics[key];
        listNum += "<li></li>";
      }
      $tabcon = $("<ul class='tabCon'>" + listNum + "</ul>");
      $self.append($tabcon);
      $trigger = $tabcon.children("li");
      $trigger.eq(index).addClass("current");
      scroll = function(cmd, isClick) {
        var hover, item, key, tmp2, _k, _l, _len2, _len3, _len4, _m;
        hover = $self.data('hover') || false;
        if (hover && !isClick) {
          return;
        }
        index = $self.data('index') || 0;
        tmp = getpic(index);
        if (tmp[1].is(':animated')) {
          for (_k = 0, _len2 = tmp.length; _k < _len2; _k++) {
            item = tmp[_k];
            item.stop(true, true);
          }
        }
        index += cmd;
        if (index < 0) {
          index = picLen - 1;
        } else if (index > picLen) {
          index = 1;
        }
        $self.data('index', index);
        if (index >= picLen) {
          $trigger.eq(index - picLen).addClass("current");
          $trigger.eq(index - picLen).siblings().removeClass("current");
          $pics.eq(index - picLen).addClass("current");
          $pics.eq(index - picLen).siblings().removeClass("current");
        } else {
          $trigger.eq(index).addClass("current");
          $trigger.eq(index).siblings().removeClass("current");
          $pics.eq(index).addClass("current");
          $pics.eq(index).siblings().removeClass("current");
        }
        if (option.callback) {
          option.callback($self, 'change', index);
        }
        tmp2 = getpic(index);
        if (cmd === 1) {
          for (key = _l = 0, _len3 = tmp.length; _l < _len3; key = ++_l) {
            item = tmp[key];
            if (key === 0) {
              if ($pics.length > 3) {
                item.fadeOut(200);
              } else {
                item.css('zIndex', 1);
              }
            } else {
              opt = option.position[key - 1];
              item.css('zIndex', 2);
              if (key === 1) {
                item.css('zIndex', 1);
              }
              item.animate({
                left: opt[0],
                top: opt[1],
                width: opt[2],
                height: opt[3]
              }, 'swing');
            }
          }
          opt = option.position[key - 1];
          tmp2[tmp2.length - 1].css({
            left: opt[0] + parseInt(opt[2] / 2),
            top: opt[1] + parseInt(opt[3] / 2),
            width: 1,
            height: 1,
            zIndex: 1
          }).show().animate({
            left: opt[0],
            top: opt[1],
            width: opt[2],
            height: opt[3]
          }, 'swing');
        } else {
          for (key = _m = 0, _len4 = tmp.length; _m < _len4; key = ++_m) {
            item = tmp[key];
            if (key === tmp.length - 1) {
              if ($pics.length > 3) {
                item.fadeOut(200);
              } else {
                item.css('zIndex', 1);
              }
            } else {
              opt = option.position[key + 1];
              item.css('zIndex', 2);
              if (key === 1) {
                item.css('zIndex', 1);
              }
              item.animate({
                left: opt[0],
                top: opt[1],
                width: opt[2],
                height: opt[3]
              }, 'swing');
            }
          }
          opt = option.position[0];
          tmp2[0].css({
            left: opt[0] + parseInt(opt[2] / 2),
            top: opt[1] + parseInt(opt[3] / 2),
            width: 1,
            height: 1,
            zIndex: 1
          }).show().animate({
            left: opt[0],
            top: opt[1],
            width: opt[2],
            height: opt[3]
          }, 'swing');
        }
        return;
      };
      if (option.autoRun) {
        setInterval(function() {
          /*[向左滚]
          */
          scroll(option.scrollLen);
          /*[向右滚]
          */

          return;
        }, option.timeOut);
      }
      if (option.prev) {
        $self.find(option.prev).click(function() {
          scroll(-1, true);
          return;
        });
      }
      if (option.next) {
        $self.find(option.next).click(function() {
          scroll(+1, true);
          return;
        });
      }
      $pics.click(function() {
        index = $self.data('index') || 0;
        tmp = getpic(index);
        if (this === tmp[0].get(0)) {
          scroll(-1, true);
          return false;
        } else if (this === tmp[1].get(0) && option.callback) {
          return option.callback($self, 'click', index, this);
        } else if (this === tmp[2].get(0)) {
          scroll(+1, true);
          return false;
        }
      });
      $self.hover(function() {
        return $(this).data('hover', true);
      }, function() {
        $(this).data('hover', false);
        return;
      });
      return this;
    };
  })(jQuery);

  jQuery(function($) {
    var mobfound;
    mobfound = {};
    mobfound.pageName = $("#scriptArea").data("pageId");
    mobfound.init = function() {
      if (mobfound.pageName === "home-page") {
        $("#slides .con").suiTabs_slider({
          easing: "easeOutCirc",
          type: "auto",
          content: "#slides .tab_body li",
          effect: "slide",
          duration: 400,
          pause: 6000,
          width: 950,
          height: 423
        });
      }
      if (mobfound.pageName === "activity-page") {
        $(".activity-list li:last-child").addClass("last");
        $("#slides .item img").attr("unselectable", "on");
        $("#slides").picSwitch({
          position: [[72, 130, 420, 206], [128, 12, 652, 320], [436, 130, 420, 206]],
          showLen: 3,
          timeOut: 3000,
          autoRun: true,
          callback: mobfound.targetLink
        });
      }
      if (mobfound.pageName === "updated-page") {
        mobfound.logPositon();
      }
      return mobfound.globalModules();
    };
    mobfound.globalModules = function() {
      return $(window).bind("resize", function() {
        var cn;
        cn = $(".container");
        if ($(this).width() < 980) {
          return cn.css("width", "980");
        } else {
          return cn.css("width", "auto");
        }
      }).trigger("resize");
    };
    mobfound.backtop = function() {
      var $backToTopEle, $backToTopEleAb, $backToTopFun, $backToTopTxt;
      $backToTopTxt = "返回顶部";
      $backToTopEle = $("<div class=\"back-top\"></div>").appendTo($("body")).attr("title", $backToTopTxt).click(function() {
        window.scrollTo(0, 0);
        return false;
      });
      $backToTopEleAb = $("<div class=\"back-top-ab\"></div>").appendTo($("#main")).attr("title", $backToTopTxt).click(function() {
        window.scrollTo(0, 0);
        return false;
      });
      $backToTopFun = function() {
        var cpos, offsetTop, pgh, st, winh;
        st = $(document).scrollTop();
        winh = $(window).height();
        pgh = $("body").height();
        offsetTop = $backToTopEle.offset().top;
        cpos = pgh - $("#footer").height() - 75 - 11;
        if (st > 0 && (st + winh) < cpos) {
          $backToTopEle.show();
          $backToTopEleAb.hide();
        } else if (st > 0) {
          $backToTopEle.hide();
          $backToTopEleAb.show();
        } else {
          $backToTopEle.hide();
          $backToTopEleAb.hide();
        }
        if (!window.XMLHttpRequest) {
          return $backToTopEle.css("top", st + winh - 206);
        }
      };
      $(window).bind("scroll", $backToTopFun);
      return $(function() {
        return $backToTopFun();
      });
    };
    mobfound.targetLink = function(content, event, index, that) {
      return true;
    };
    mobfound.logPositon = function() {
      var $itemLt, $itemRt, $wrap, getItem, item, itemLen, key, tmp, tmp2, top, wrapHeight, _i, _len;
      $wrap = $(".updated-list");
      itemLen = $wrap.find(".item").length;
      $itemLt = $wrap.children(".col-1").children(".item");
      $itemRt = $wrap.children(".col-2").children(".item");
      wrapHeight = null;
      top = null;
      getItem = function(Litems, Ritems) {
        var item, key, ret, _i, _j, _len, _len1;
        ret = [];
        while (ret.length < itemLen) {
          for (key = _i = 0, _len = Litems.length; _i < _len; key = ++_i) {
            item = Litems[key];
            ret[key * 2] = $(item).addClass("even");
            ret[key * 2].top = $(item).find(".round").offset().top - 348 - 36;
          }
          for (key = _j = 0, _len1 = Ritems.length; _j < _len1; key = ++_j) {
            item = Ritems[key];
            ret[key * 2 + 1] = $(item).addClass("odd");
            ret[key * 2 + 1].top = ($(item).find(".round").offset().top) - 348 - 36;
          }
        }
        return ret;
      };
      tmp = getItem($itemLt, $itemRt);
      tmp2 = getItem($itemLt, $itemRt);
      for (key = _i = 0, _len = tmp.length; _i < _len; key = ++_i) {
        item = tmp[key];
        if (key === 0) {
          item.addClass("ord-1").find(".version").after("<em>最新</em>");
          item.css({
            top: 0,
            visibility: 'visible'
          });
        } else {
          top += tmp[key - 1].height() - 46;
          wrapHeight += tmp[key - 1].height() - 46;
          item.css({
            top: top,
            visibility: 'visible'
          });
        }
      }
      return $wrap.css({
        height: wrapHeight + tmp[key - 1].height() - 20
      });
    };
    return mobfound.init();
  });

}).call(this);
/*!
 * Bootstrap v3.3.7 (http://getbootstrap.com)
 * Copyright 2011-2018 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

/*!
 * Generated using the Bootstrap Customizer (https://getbootstrap.com/docs/3.3/customize/?id=3ba9eab9c3b2ad561568dda25968bfe3)
 * Config saved to config.json and https://gist.github.com/3ba9eab9c3b2ad561568dda25968bfe3
 */
if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery");
! function(t) {
    "use strict";
    var e = t.fn.jquery.split(" ")[0].split(".");
    if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
}(jQuery),
function(t) {
    "use strict";
    var e = function(e, i) {
        this.$element = t(e), this.$indicators = this.$element.find(".carousel-indicators"), this.options = i, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this))
    };

    function i(i) {
        return this.each(function() {
            var s = t(this),
                o = s.data("bs.carousel"),
                n = t.extend({}, e.DEFAULTS, s.data(), "object" == typeof i && i),
                a = "string" == typeof i ? i : n.slide;
            o || s.data("bs.carousel", o = new e(this, n)), "number" == typeof i ? o.to(i) : a ? o[a]() : n.interval && o.pause().cycle()
        })
    }
    e.VERSION = "3.3.7", e.TRANSITION_DURATION = 600, e.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0,
        keyboard: !0
    }, e.prototype.keydown = function(t) {
        if (!/input|textarea/i.test(t.target.tagName)) {
            switch (t.which) {
                case 37:
                    this.prev();
                    break;
                case 39:
                    this.next();
                    break;
                default:
                    return
            }
            t.preventDefault()
        }
    }, e.prototype.cycle = function(e) {
        return e || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this
    }, e.prototype.getItemIndex = function(t) {
        return this.$items = t.parent().children(".item"), this.$items.index(t || this.$active)
    }, e.prototype.getItemForDirection = function(t, e) {
        var i = this.getItemIndex(e);
        if (("prev" == t && 0 === i || "next" == t && i == this.$items.length - 1) && !this.options.wrap) return e;
        var s = (i + ("prev" == t ? -1 : 1)) % this.$items.length;
        return this.$items.eq(s)
    }, e.prototype.to = function(t) {
        var e = this,
            i = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        if (!(t > this.$items.length - 1 || t < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function() {
            e.to(t)
        }) : i == t ? this.pause().cycle() : this.slide(t > i ? "next" : "prev", this.$items.eq(t))
    }, e.prototype.pause = function(e) {
        return e || (this.paused = !0), this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
    }, e.prototype.next = function() {
        if (!this.sliding) return this.slide("next")
    }, e.prototype.prev = function() {
        if (!this.sliding) return this.slide("prev")
    }, e.prototype.slide = function(i, s) {
        var o = this.$element.find(".item.active"),
            n = s || this.getItemForDirection(i, o),
            a = this.interval,
            r = "next" == i ? "left" : "right",
            l = this;
        if (n.hasClass("active")) return this.sliding = !1;
        var h = n[0],
            d = t.Event("slide.bs.carousel", {
                relatedTarget: h,
                direction: r
            });
        if (this.$element.trigger(d), !d.isDefaultPrevented()) {
            if (this.sliding = !0, a && this.pause(), this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var p = t(this.$indicators.children()[this.getItemIndex(n)]);
                p && p.addClass("active")
            }
            var c = t.Event("slid.bs.carousel", {
                relatedTarget: h,
                direction: r
            });
            return t.support.transition && this.$element.hasClass("slide") ? (n.addClass(i), n[0].offsetWidth, o.addClass(r), n.addClass(r), o.one("bsTransitionEnd", function() {
                n.removeClass([i, r].join(" ")).addClass("active"), o.removeClass(["active", r].join(" ")), l.sliding = !1, setTimeout(function() {
                    l.$element.trigger(c)
                }, 0)
            }).emulateTransitionEnd(e.TRANSITION_DURATION)) : (o.removeClass("active"), n.addClass("active"), this.sliding = !1, this.$element.trigger(c)), a && this.cycle(), this
        }
    };
    var s = t.fn.carousel;
    t.fn.carousel = i, t.fn.carousel.Constructor = e, t.fn.carousel.noConflict = function() {
        return t.fn.carousel = s, this
    };
    var o = function(e) {
        var s, o = t(this),
            n = t(o.attr("data-target") || (s = o.attr("href")) && s.replace(/.*(?=#[^\s]+$)/, ""));
        if (n.hasClass("carousel")) {
            var a = t.extend({}, n.data(), o.data()),
                r = o.attr("data-slide-to");
            r && (a.interval = !1), i.call(n, a), r && n.data("bs.carousel").to(r), e.preventDefault()
        }
    };
    t(document).on("click.bs.carousel.data-api", "[data-slide]", o).on("click.bs.carousel.data-api", "[data-slide-to]", o), t(window).on("load", function() {
        t('[data-ride="carousel"]').each(function() {
            var e = t(this);
            i.call(e, e.data())
        })
    })
}(jQuery),
function(t) {
    "use strict";
    var e = function(e, i) {
        this.options = i, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function() {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };

    function i(i, s) {
        return this.each(function() {
            var o = t(this),
                n = o.data("bs.modal"),
                a = t.extend({}, e.DEFAULTS, o.data(), "object" == typeof i && i);
            n || o.data("bs.modal", n = new e(this, a)), "string" == typeof i ? n[i](s) : a.show && n.show(s)
        })
    }
    e.VERSION = "3.3.7", e.TRANSITION_DURATION = 300, e.BACKDROP_TRANSITION_DURATION = 150, e.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    }, e.prototype.toggle = function(t) {
        return this.isShown ? this.hide() : this.show(t)
    }, e.prototype.show = function(i) {
        var s = this,
            o = t.Event("show.bs.modal", {
                relatedTarget: i
            });
        this.$element.trigger(o), this.isShown || o.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function() {
            s.$element.one("mouseup.dismiss.bs.modal", function(e) {
                t(e.target).is(s.$element) && (s.ignoreBackdropClick = !0)
            })
        }), this.backdrop(function() {
            var o = t.support.transition && s.$element.hasClass("fade");
            s.$element.parent().length || s.$element.appendTo(s.$body), s.$element.show().scrollTop(0), s.adjustDialog(), o && s.$element[0].offsetWidth, s.$element.addClass("in"), s.enforceFocus();
            var n = t.Event("shown.bs.modal", {
                relatedTarget: i
            });
            o ? s.$dialog.one("bsTransitionEnd", function() {
                s.$element.trigger("focus").trigger(n)
            }).emulateTransitionEnd(e.TRANSITION_DURATION) : s.$element.trigger("focus").trigger(n)
        }))
    }, e.prototype.hide = function(i) {
        i && i.preventDefault(), i = t.Event("hide.bs.modal"), this.$element.trigger(i), this.isShown && !i.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(e.TRANSITION_DURATION) : this.hideModal())
    }, e.prototype.enforceFocus = function() {
        t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function(t) {
            document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
        }, this))
    }, e.prototype.escape = function() {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function(t) {
            27 == t.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    }, e.prototype.resize = function() {
        this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
    }, e.prototype.hideModal = function() {
        var t = this;
        this.$element.hide(), this.backdrop(function() {
            t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
        })
    }, e.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
    }, e.prototype.backdrop = function(i) {
        var s = this,
            o = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var n = t.support.transition && o;
            if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + o).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function(t) {
                    this.ignoreBackdropClick ? this.ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide())
                }, this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !i) return;
            n ? this.$backdrop.one("bsTransitionEnd", i).emulateTransitionEnd(e.BACKDROP_TRANSITION_DURATION) : i()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var a = function() {
                s.removeBackdrop(), i && i()
            };
            t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", a).emulateTransitionEnd(e.BACKDROP_TRANSITION_DURATION) : a()
        } else i && i()
    }, e.prototype.handleUpdate = function() {
        this.adjustDialog()
    }, e.prototype.adjustDialog = function() {
        var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
        })
    }, e.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: "",
            paddingRight: ""
        })
    }, e.prototype.checkScrollbar = function() {
        var t = window.innerWidth;
        if (!t) {
            var e = document.documentElement.getBoundingClientRect();
            t = e.right - Math.abs(e.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
    }, e.prototype.setScrollbar = function() {
        var t = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
    }, e.prototype.resetScrollbar = function() {
        this.$body.css("padding-right", this.originalBodyPad)
    }, e.prototype.measureScrollbar = function() {
        var t = document.createElement("div");
        t.className = "modal-scrollbar-measure", this.$body.append(t);
        var e = t.offsetWidth - t.clientWidth;
        return this.$body[0].removeChild(t), e
    };
    var s = t.fn.modal;
    t.fn.modal = i, t.fn.modal.Constructor = e, t.fn.modal.noConflict = function() {
        return t.fn.modal = s, this
    }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(e) {
        var s = t(this),
            o = s.attr("href"),
            n = t(s.attr("data-target") || o && o.replace(/.*(?=#[^\s]+$)/, "")),
            a = n.data("bs.modal") ? "toggle" : t.extend({
                remote: !/#/.test(o) && o
            }, n.data(), s.data());
        s.is("a") && e.preventDefault(), n.one("show.bs.modal", function(t) {
            t.isDefaultPrevented() || n.one("hidden.bs.modal", function() {
                s.is(":visible") && s.trigger("focus")
            })
        }), i.call(n, a, this)
    })
}(jQuery),
function(t) {
    "use strict";
    var e = function(t, e) {
        this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e)
    };
    e.VERSION = "3.3.7", e.TRANSITION_DURATION = 150, e.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {
            selector: "body",
            padding: 0
        }
    }, e.prototype.init = function(e, i, s) {
        if (this.enabled = !0, this.type = e, this.$element = t(i), this.options = this.getOptions(s), this.$viewport = this.options.viewport && t(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
                click: !1,
                hover: !1,
                focus: !1
            }, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
        for (var o = this.options.trigger.split(" "), n = o.length; n--;) {
            var a = o[n];
            if ("click" == a) this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this));
            else if ("manual" != a) {
                var r = "hover" == a ? "mouseenter" : "focusin",
                    l = "hover" == a ? "mouseleave" : "focusout";
                this.$element.on(r + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = t.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }, e.prototype.getDefaults = function() {
        return e.DEFAULTS
    }, e.prototype.getOptions = function(e) {
        return (e = t.extend({}, this.getDefaults(), this.$element.data(), e)).delay && "number" == typeof e.delay && (e.delay = {
            show: e.delay,
            hide: e.delay
        }), e
    }, e.prototype.getDelegateOptions = function() {
        var e = {},
            i = this.getDefaults();
        return this._options && t.each(this._options, function(t, s) {
            i[t] != s && (e[t] = s)
        }), e
    }, e.prototype.enter = function(e) {
        var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
        if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusin" == e.type ? "focus" : "hover"] = !0), i.tip().hasClass("in") || "in" == i.hoverState) i.hoverState = "in";
        else {
            if (clearTimeout(i.timeout), i.hoverState = "in", !i.options.delay || !i.options.delay.show) return i.show();
            i.timeout = setTimeout(function() {
                "in" == i.hoverState && i.show()
            }, i.options.delay.show)
        }
    }, e.prototype.isInStateTrue = function() {
        for (var t in this.inState)
            if (this.inState[t]) return !0;
        return !1
    }, e.prototype.leave = function(e) {
        var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
        if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusout" == e.type ? "focus" : "hover"] = !1), !i.isInStateTrue()) {
            if (clearTimeout(i.timeout), i.hoverState = "out", !i.options.delay || !i.options.delay.hide) return i.hide();
            i.timeout = setTimeout(function() {
                "out" == i.hoverState && i.hide()
            }, i.options.delay.hide)
        }
    }, e.prototype.show = function() {
        var i = t.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(i);
            var s = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (i.isDefaultPrevented() || !s) return;
            var o = this,
                n = this.tip(),
                a = this.getUID(this.type);
            this.setContent(), n.attr("id", a), this.$element.attr("aria-describedby", a), this.options.animation && n.addClass("fade");
            var r = "function" == typeof this.options.placement ? this.options.placement.call(this, n[0], this.$element[0]) : this.options.placement,
                l = /\s?auto?\s?/i,
                h = l.test(r);
            h && (r = r.replace(l, "") || "top"), n.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(r).data("bs." + this.type, this), this.options.container ? n.appendTo(this.options.container) : n.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
            var d = this.getPosition(),
                p = n[0].offsetWidth,
                c = n[0].offsetHeight;
            if (h) {
                var u = r,
                    f = this.getPosition(this.$viewport);
                r = "bottom" == r && d.bottom + c > f.bottom ? "top" : "top" == r && d.top - c < f.top ? "bottom" : "right" == r && d.right + p > f.width ? "left" : "left" == r && d.left - p < f.left ? "right" : r, n.removeClass(u).addClass(r)
            }
            var m = this.getCalculatedOffset(r, d, p, c);
            this.applyPlacement(m, r);
            var g = function() {
                var t = o.hoverState;
                o.$element.trigger("shown.bs." + o.type), o.hoverState = null, "out" == t && o.leave(o)
            };
            t.support.transition && this.$tip.hasClass("fade") ? n.one("bsTransitionEnd", g).emulateTransitionEnd(e.TRANSITION_DURATION) : g()
        }
    }, e.prototype.applyPlacement = function(e, i) {
        var s = this.tip(),
            o = s[0].offsetWidth,
            n = s[0].offsetHeight,
            a = parseInt(s.css("margin-top"), 10),
            r = parseInt(s.css("margin-left"), 10);
        isNaN(a) && (a = 0), isNaN(r) && (r = 0), e.top += a, e.left += r, t.offset.setOffset(s[0], t.extend({
            using: function(t) {
                s.css({
                    top: Math.round(t.top),
                    left: Math.round(t.left)
                })
            }
        }, e), 0), s.addClass("in");
        var l = s[0].offsetWidth,
            h = s[0].offsetHeight;
        "top" == i && h != n && (e.top = e.top + n - h);
        var d = this.getViewportAdjustedDelta(i, e, l, h);
        d.left ? e.left += d.left : e.top += d.top;
        var p = /top|bottom/.test(i),
            c = p ? 2 * d.left - o + l : 2 * d.top - n + h,
            u = p ? "offsetWidth" : "offsetHeight";
        s.offset(e), this.replaceArrow(c, s[0][u], p)
    }, e.prototype.replaceArrow = function(t, e, i) {
        this.arrow().css(i ? "left" : "top", 50 * (1 - t / e) + "%").css(i ? "top" : "left", "")
    }, e.prototype.setContent = function() {
        var t = this.tip(),
            e = this.getTitle();
        t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
    }, e.prototype.hide = function(i) {
        var s = this,
            o = t(this.$tip),
            n = t.Event("hide.bs." + this.type);

        function a() {
            "in" != s.hoverState && o.detach(), s.$element && s.$element.removeAttr("aria-describedby").trigger("hidden.bs." + s.type), i && i()
        }
        if (this.$element.trigger(n), !n.isDefaultPrevented()) return o.removeClass("in"), t.support.transition && o.hasClass("fade") ? o.one("bsTransitionEnd", a).emulateTransitionEnd(e.TRANSITION_DURATION) : a(), this.hoverState = null, this
    }, e.prototype.fixTitle = function() {
        var t = this.$element;
        (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
    }, e.prototype.hasContent = function() {
        return this.getTitle()
    }, e.prototype.getPosition = function(e) {
        var i = (e = e || this.$element)[0],
            s = "BODY" == i.tagName,
            o = i.getBoundingClientRect();
        null == o.width && (o = t.extend({}, o, {
            width: o.right - o.left,
            height: o.bottom - o.top
        }));
        var n = window.SVGElement && i instanceof window.SVGElement,
            a = s ? {
                top: 0,
                left: 0
            } : n ? null : e.offset(),
            r = {
                scroll: s ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()
            },
            l = s ? {
                width: t(window).width(),
                height: t(window).height()
            } : null;
        return t.extend({}, o, r, l, a)
    }, e.prototype.getCalculatedOffset = function(t, e, i, s) {
        return "bottom" == t ? {
            top: e.top + e.height,
            left: e.left + e.width / 2 - i / 2
        } : "top" == t ? {
            top: e.top - s,
            left: e.left + e.width / 2 - i / 2
        } : "left" == t ? {
            top: e.top + e.height / 2 - s / 2,
            left: e.left - i
        } : {
            top: e.top + e.height / 2 - s / 2,
            left: e.left + e.width
        }
    }, e.prototype.getViewportAdjustedDelta = function(t, e, i, s) {
        var o = {
            top: 0,
            left: 0
        };
        if (!this.$viewport) return o;
        var n = this.options.viewport && this.options.viewport.padding || 0,
            a = this.getPosition(this.$viewport);
        if (/right|left/.test(t)) {
            var r = e.top - n - a.scroll,
                l = e.top + n - a.scroll + s;
            r < a.top ? o.top = a.top - r : l > a.top + a.height && (o.top = a.top + a.height - l)
        } else {
            var h = e.left - n,
                d = e.left + n + i;
            h < a.left ? o.left = a.left - h : d > a.right && (o.left = a.left + a.width - d)
        }
        return o
    }, e.prototype.getTitle = function() {
        var t = this.$element,
            e = this.options;
        return t.attr("data-original-title") || ("function" == typeof e.title ? e.title.call(t[0]) : e.title)
    }, e.prototype.getUID = function(t) {
        do {
            t += ~~(1e6 * Math.random())
        } while (document.getElementById(t));
        return t
    }, e.prototype.tip = function() {
        if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
        return this.$tip
    }, e.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }, e.prototype.enable = function() {
        this.enabled = !0
    }, e.prototype.disable = function() {
        this.enabled = !1
    }, e.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    }, e.prototype.toggle = function(e) {
        var i = this;
        e && ((i = t(e.currentTarget).data("bs." + this.type)) || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i))), e ? (i.inState.click = !i.inState.click, i.isInStateTrue() ? i.enter(i) : i.leave(i)) : i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
    }, e.prototype.destroy = function() {
        var t = this;
        clearTimeout(this.timeout), this.hide(function() {
            t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null, t.$element = null
        })
    };
    var i = t.fn.tooltip;
    t.fn.tooltip = function(i) {
        return this.each(function() {
            var s = t(this),
                o = s.data("bs.tooltip"),
                n = "object" == typeof i && i;
            !o && /destroy|hide/.test(i) || (o || s.data("bs.tooltip", o = new e(this, n)), "string" == typeof i && o[i]())
        })
    }, t.fn.tooltip.Constructor = e, t.fn.tooltip.noConflict = function() {
        return t.fn.tooltip = i, this
    }
}(jQuery),
function(t) {
    "use strict";
    var e = function(i, s) {
        this.$element = t(i), this.options = t.extend({}, e.DEFAULTS, s), this.$trigger = t('[data-toggle="collapse"][href="#' + i.id + '"],[data-toggle="collapse"][data-target="#' + i.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
    };

    function i(e) {
        var i, s = e.attr("data-target") || (i = e.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, "");
        return t(s)
    }

    function s(i) {
        return this.each(function() {
            var s = t(this),
                o = s.data("bs.collapse"),
                n = t.extend({}, e.DEFAULTS, s.data(), "object" == typeof i && i);
            !o && n.toggle && /show|hide/.test(i) && (n.toggle = !1), o || s.data("bs.collapse", o = new e(this, n)), "string" == typeof i && o[i]()
        })
    }
    e.VERSION = "3.3.7", e.TRANSITION_DURATION = 350, e.DEFAULTS = {
        toggle: !0
    }, e.prototype.dimension = function() {
        return this.$element.hasClass("width") ? "width" : "height"
    }, e.prototype.show = function() {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var i, o = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
            if (!(o && o.length && (i = o.data("bs.collapse")) && i.transitioning)) {
                var n = t.Event("show.bs.collapse");
                if (this.$element.trigger(n), !n.isDefaultPrevented()) {
                    o && o.length && (s.call(o, "hide"), i || o.data("bs.collapse", null));
                    var a = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[a](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                    var r = function() {
                        this.$element.removeClass("collapsing").addClass("collapse in")[a](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                    };
                    if (!t.support.transition) return r.call(this);
                    var l = t.camelCase(["scroll", a].join("-"));
                    this.$element.one("bsTransitionEnd", t.proxy(r, this)).emulateTransitionEnd(e.TRANSITION_DURATION)[a](this.$element[0][l])
                }
            }
        }
    }, e.prototype.hide = function() {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var i = t.Event("hide.bs.collapse");
            if (this.$element.trigger(i), !i.isDefaultPrevented()) {
                var s = this.dimension();
                this.$element[s](this.$element[s]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                var o = function() {
                    this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                };
                if (!t.support.transition) return o.call(this);
                this.$element[s](0).one("bsTransitionEnd", t.proxy(o, this)).emulateTransitionEnd(e.TRANSITION_DURATION)
            }
        }
    }, e.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    }, e.prototype.getParent = function() {
        return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function(e, s) {
            var o = t(s);
            this.addAriaAndCollapsedClass(i(o), o)
        }, this)).end()
    }, e.prototype.addAriaAndCollapsedClass = function(t, e) {
        var i = t.hasClass("in");
        t.attr("aria-expanded", i), e.toggleClass("collapsed", !i).attr("aria-expanded", i)
    };
    var o = t.fn.collapse;
    t.fn.collapse = s, t.fn.collapse.Constructor = e, t.fn.collapse.noConflict = function() {
        return t.fn.collapse = o, this
    }, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(e) {
        var o = t(this);
        o.attr("data-target") || e.preventDefault();
        var n = i(o),
            a = n.data("bs.collapse") ? "toggle" : o.data();
        s.call(n, a)
    })
}(jQuery),
function(t) {
    "use strict";
    t.fn.emulateTransitionEnd = function(e) {
        var i = !1,
            s = this;
        t(this).one("bsTransitionEnd", function() {
            i = !0
        });
        return setTimeout(function() {
            i || t(s).trigger(t.support.transition.end)
        }, e), this
    }, t(function() {
        t.support.transition = function() {
            var t = document.createElement("bootstrap"),
                e = {
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "oTransitionEnd otransitionend",
                    transition: "transitionend"
                };
            for (var i in e)
                if (void 0 !== t.style[i]) return {
                    end: e[i]
                };
            return !1
        }(), t.support.transition && (t.event.special.bsTransitionEnd = {
            bindType: t.support.transition.end,
            delegateType: t.support.transition.end,
            handle: function(e) {
                if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
            }
        })
    })
}(jQuery);


/*!
 * jQuery UI Core 1.11.4
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/category/ui-core/
 */
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    function b(b, d) {
        var e, f, g, h = b.nodeName.toLowerCase();
        return "area" === h ? (e = b.parentNode, f = e.name, !(!b.href || !f || "map" !== e.nodeName.toLowerCase()) && (g = a("img[usemap='#" + f + "']")[0], !!g && c(g))) : (/^(input|select|textarea|button|object)$/.test(h) ? !b.disabled : "a" === h ? b.href || d : d) && c(b)
    }

    function c(b) {
        return a.expr.filters.visible(b) && !a(b).parents().addBack().filter(function() {
            return "hidden" === a.css(this, "visibility")
        }).length
    }
    a.ui = a.ui || {}, a.extend(a.ui, {
        version: "1.11.4",
        keyCode: {
            BACKSPACE: 8,
            COMMA: 188,
            DELETE: 46,
            DOWN: 40,
            END: 35,
            ENTER: 13,
            ESCAPE: 27,
            HOME: 36,
            LEFT: 37,
            PAGE_DOWN: 34,
            PAGE_UP: 33,
            PERIOD: 190,
            RIGHT: 39,
            SPACE: 32,
            TAB: 9,
            UP: 38
        }
    }), a.fn.extend({
        scrollParent: function(b) {
            var c = this.css("position"),
                d = "absolute" === c,
                e = b ? /(auto|scroll|hidden)/ : /(auto|scroll)/,
                f = this.parents().filter(function() {
                    var b = a(this);
                    return (!d || "static" !== b.css("position")) && e.test(b.css("overflow") + b.css("overflow-y") + b.css("overflow-x"))
                }).eq(0);
            return "fixed" !== c && f.length ? f : a(this[0].ownerDocument || document)
        },
        uniqueId: function() {
            var a = 0;
            return function() {
                return this.each(function() {
                    this.id || (this.id = "ui-id-" + ++a)
                })
            }
        }(),
        removeUniqueId: function() {
            return this.each(function() {
                /^ui-id-\d+$/.test(this.id) && a(this).removeAttr("id")
            })
        }
    }), a.extend(a.expr[":"], {
        data: a.expr.createPseudo ? a.expr.createPseudo(function(b) {
            return function(c) {
                return !!a.data(c, b)
            }
        }) : function(b, c, d) {
            return !!a.data(b, d[3])
        },
        focusable: function(c) {
            return b(c, !isNaN(a.attr(c, "tabindex")))
        },
        tabbable: function(c) {
            var d = a.attr(c, "tabindex"),
                e = isNaN(d);
            return (e || d >= 0) && b(c, !e)
        }
    }), a("<a>").outerWidth(1).jquery || a.each(["Width", "Height"], function(b, c) {
        function d(b, c, d, f) {
            return a.each(e, function() {
                c -= parseFloat(a.css(b, "padding" + this)) || 0, d && (c -= parseFloat(a.css(b, "border" + this + "Width")) || 0), f && (c -= parseFloat(a.css(b, "margin" + this)) || 0)
            }), c
        }
        var e = "Width" === c ? ["Left", "Right"] : ["Top", "Bottom"],
            f = c.toLowerCase(),
            g = {
                innerWidth: a.fn.innerWidth,
                innerHeight: a.fn.innerHeight,
                outerWidth: a.fn.outerWidth,
                outerHeight: a.fn.outerHeight
            };
        a.fn["inner" + c] = function(b) {
            return void 0 === b ? g["inner" + c].call(this) : this.each(function() {
                a(this).css(f, d(this, b) + "px")
            })
        }, a.fn["outer" + c] = function(b, e) {
            return "number" != typeof b ? g["outer" + c].call(this, b) : this.each(function() {
                a(this).css(f, d(this, b, !0, e) + "px")
            })
        }
    }), a.fn.addBack || (a.fn.addBack = function(a) {
        return this.add(null == a ? this.prevObject : this.prevObject.filter(a))
    }), a("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (a.fn.removeData = function(b) {
        return function(c) {
            return arguments.length ? b.call(this, a.camelCase(c)) : b.call(this)
        }
    }(a.fn.removeData)), a.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), a.fn.extend({
        focus: function(b) {
            return function(c, d) {
                return "number" == typeof c ? this.each(function() {
                    var b = this;
                    setTimeout(function() {
                        a(b).focus(), d && d.call(b)
                    }, c)
                }) : b.apply(this, arguments)
            }
        }(a.fn.focus),
        disableSelection: function() {
            var a = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
            return function() {
                return this.bind(a + ".ui-disableSelection", function(a) {
                    a.preventDefault()
                })
            }
        }(),
        enableSelection: function() {
            return this.unbind(".ui-disableSelection")
        },
        zIndex: function(b) {
            if (void 0 !== b) return this.css("zIndex", b);
            if (this.length)
                for (var c, d, e = a(this[0]); e.length && e[0] !== document;) {
                    if (c = e.css("position"), ("absolute" === c || "relative" === c || "fixed" === c) && (d = parseInt(e.css("zIndex"), 10), !isNaN(d) && 0 !== d)) return d;
                    e = e.parent()
                }
            return 0
        }
    }), a.ui.plugin = {
        add: function(b, c, d) {
            var e, f = a.ui[b].prototype;
            for (e in d) f.plugins[e] = f.plugins[e] || [], f.plugins[e].push([c, d[e]])
        },
        call: function(a, b, c, d) {
            var e, f = a.plugins[b];
            if (f && (d || a.element[0].parentNode && 11 !== a.element[0].parentNode.nodeType))
                for (e = 0; e < f.length; e++) a.options[f[e][0]] && f[e][1].apply(a.element, c)
        }
    }
});


var requestpost = {"ajaxurl":"https:\/\/meldestelle-kuhnle.de\/wp-admin\/admin-ajax.php","disable_autoslide":"","masonry":""};


jQuery(document).ready(function(r) {
    function n(t) {
        var e = r(t);
        e.prop("disabled") || e.closest(".form-group").addClass("is-focused")
    }

    function e(t) {
        var o = !1;
        (t.is(r.material.options.checkboxElements) || t.is(r.material.options.radioElements)) && (o = !0), t.closest("label").hover(function() {
            var t, e, a = r(this).find("input"),
                i = a.prop("disabled");
            o && (t = r(this), e = i, (t.hasClass("checkbox-inline") || t.hasClass("radio-inline") ? t : t.closest(".checkbox").length ? t.closest(".checkbox") : t.closest(".radio")).toggleClass("disabled", e)), i || n(a)
        }, function() {
            a(r(this).find("input"))
        })
    }

    function a(t) {
        r(t).closest(".form-group").removeClass("is-focused")
    }
    r.expr[":"].notmdproc = function(t) {
        return !r(t).data("mdproc")
    }, r.material = {
        options: {
            validate: !0,
            input: !0,
            ripples: !0,
            checkbox: !0,
            togglebutton: !0,
            radio: !0,
            arrive: !0,
            autofill: !1,
            withRipples: [".btn:not(.btn-link)", ".card-image", ".navbar a:not(.withoutripple)", ".dropdown-menu a", ".nav-tabs a:not(.withoutripple)", ".withripple", ".pagination li:not(.active):not(.disabled) a:not(.withoutripple)"].join(","),
            inputElements: "input.form-control, textarea.form-control, select.form-control",
            checkboxElements: ".checkbox > label > input[type=checkbox], label.checkbox-inline > input[type=checkbox]",
            togglebuttonElements: ".togglebutton > label > input[type=checkbox]",
            radioElements: ".radio > label > input[type=radio], label.radio-inline > input[type=radio]"
        },
        checkbox: function(t) {
            e(r(t || this.options.checkboxElements).filter(":notmdproc").data("mdproc", !0).after('<span class="checkbox-material"><span class="check"></span></span>'))
        },
        togglebutton: function(t) {
            e(r(t || this.options.togglebuttonElements).filter(":notmdproc").data("mdproc", !0).after('<span class="toggle"></span>'))
        },
        radio: function(t) {
            e(r(t || this.options.radioElements).filter(":notmdproc").data("mdproc", !0).after('<span class="circle"></span><span class="check"></span>'))
        },
        input: function(t) {
            r(t || this.options.inputElements).filter(":notmdproc").data("mdproc", !0).each(function() {
                var a = r(this),
                    i = a.closest(".form-group");
                if (0 !== i.length || "hidden" === a.attr("type") || a.attr("hidden") || a.parents(".pirate_forms").length || (a.wrap('<div class="form-group"></div>'), i = a.closest(".form-group")), 0 === i.length && "hidden" !== a.attr("type") && !a.attr("hidden") && a.parents(".pirate_forms").length) {
                    var t = a.prev();
                    "checkbox" === a.attr("type") && (t = a.next()), a.add(t).wrapAll('<div class="form-group label-floating"></div>'), i = a.closest(".form-group")
                }
                a.attr("data-hint") && (a.after('<p class="help-block">' + a.attr("data-hint") + "</p>"), a.removeAttr("data-hint"));
                if (r.each({
                        "input-lg": "form-group-lg",
                        "input-sm": "form-group-sm"
                    }, function(t, e) {
                        a.hasClass(t) && (a.removeClass(t), i.addClass(e))
                    }), a.hasClass("floating-label")) {
                    var e = a.attr("placeholder");
                    a.attr("placeholder", null).removeClass("floating-label");
                    var o = a.attr("id"),
                        n = "";
                    o && (n = 'for="' + o + '"'), i.addClass("label-floating"), a.after("<label " + n + 'class="control-label">' + e + "</label>")
                }
                null !== a.val() && "undefined" !== a.val() && "" !== a.val() || i.addClass("is-empty"), 0 < i.find("input[type=file]").length && i.addClass("is-fileinput")
            })
        },
        attachInputEventHandlers: function() {
            var i = this.options.validate;
            r(document).on("keydown paste", ".form-control", function(t) {
                var e;
                (void 0 === (e = t).which || "number" == typeof e.which && 0 < e.which && !e.ctrlKey && !e.metaKey && !e.altKey && 8 !== e.which && 9 !== e.which && 13 !== e.which && 16 !== e.which && 17 !== e.which && 20 !== e.which && 27 !== e.which) && r(this).closest(".form-group").removeClass("is-empty")
            }).on("keyup change", ".form-control", function() {
                var t = r(this),
                    e = t.closest(".form-group"),
                    a = void 0 === t[0].checkValidity || t[0].checkValidity();
                "" === t.val() ? e.addClass("is-empty") : e.removeClass("is-empty"), i && (a ? e.removeClass("has-error") : e.addClass("has-error"))
            }).on("focus", ".form-control, .form-group.is-fileinput", function() {
                n(this)
            }).on("blur", ".form-control, .form-group.is-fileinput", function() {
                a(this)
            }).on("change", ".form-group input", function() {
                var t = r(this);
                if ("file" !== t.attr("type")) {
                    var e = t.closest(".form-group");
                    t.val() ? e.removeClass("is-empty") : e.addClass("is-empty")
                }
            }).on("change", '.form-group.is-fileinput input[type="file"]', function() {
                var t = r(this).closest(".form-group"),
                    a = "";
                r.each(this.files, function(t, e) {
                    a += e.name + ", "
                }), (a = a.substring(0, a.length - 2)) ? t.removeClass("is-empty") : t.addClass("is-empty"), t.find("input.form-control[readonly]").val(a)
            })
        },
        ripples: function(t) {
            r(t || this.options.withRipples).ripples()
        },
        autofill: function() {
            var t = setInterval(function() {
                r("input[type!=checkbox]").each(function() {
                    var t = r(this);
                    t.val() && t.val() !== t.attr("value") && t.trigger("change")
                })
            }, 100);
            setTimeout(function() {
                clearInterval(t)
            }, 1e4)
        },
        attachAutofillEventHandlers: function() {
            var e;
            r(document).on("focus", "input", function() {
                var t = r(this).parents("form").find("input").not("[type=file]");
                e = setInterval(function() {
                    t.each(function() {
                        var t = r(this);
                        t.val() !== t.attr("value") && t.trigger("change")
                    })
                }, 100)
            }).on("blur", ".form-group input", function() {
                clearInterval(e)
            })
        },
        init: function(t) {
            this.options = r.extend({}, this.options, t);
            var e = r(document);
            r.fn.ripples && this.options.ripples && this.ripples(), this.options.input && (this.input(), this.attachInputEventHandlers()), this.options.checkbox && this.checkbox(), this.options.togglebutton && this.togglebutton(), this.options.radio && this.radio(), this.options.autofill && (this.autofill(), this.attachAutofillEventHandlers()), document.arrive && this.options.arrive && (r.fn.ripples && this.options.ripples && e.arrive(this.options.withRipples, function() {
                r.material.ripples(r(this))
            }), this.options.input && e.arrive(this.options.inputElements, function() {
                r.material.input(r(this))
            }), this.options.checkbox && e.arrive(this.options.checkboxElements, function() {
                r.material.checkbox(r(this))
            }), this.options.radio && e.arrive(this.options.radioElements, function() {
                r.material.radio(r(this))
            }), this.options.togglebutton && e.arrive(this.options.togglebuttonElements, function() {
                r.material.togglebutton(r(this))
            }))
        }
    }
}),
function(l) {
    l.hestiaFeatures = {
        initMasonry: function() {
            "undefined" != typeof requestpost && requestpost.masonry && l(".post-grid-display").masonry({
                itemSelector: ".card-no-width",
                columnWidth: ".card-no-width",
                percentPosition: !0
            })
        },
        initAnimations: function() {
            if ("undefined" != typeof AOS) {
                AOS.init({
                    offset: 250,
                    delay: 300,
                    duration: 900,
                    once: !0,
                    disable: "mobile"
                })
            }
        },
        initTooltips: function() {
            l('[data-toggle="tooltip"], [rel="tooltip"]').tooltip()
        }
    }, l.utilitiesFunctions = {
        debounce: function(i, o, n) {
            var r;
            return function() {
                var t = this,
                    e = arguments,
                    a = n && !r;
                clearTimeout(r), r = setTimeout(function() {
                    r = null, n || i.apply(t, e)
                }, o), a && i.apply(t, e)
            }
        },
        isElementInViewport: function(t) {
            var e = l(t),
                a = l(window).scrollTop(),
                i = a + l(window).height(),
                o = Math.round(e.offset().top),
                n = o + e.height();
            return o < i && a < n
        },
        verifyNavHeight: function() {
            return l(window).width() < 768 ? l(".navbar").outerHeight() : l(".navbar").outerHeight() - 15
        },
        getWidth: function() {
            return this.innerWidth ? this.innerWidth : document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body ? document.body.clientWidth : void 0
        },
        addControlLabel: function(t) {
            var e = t.attr("placeholder");
            t.removeAttr("placeholder"), l('<label class="control-label"> ' + e + " </label>").insertBefore(t)
        }
    }, l.hestia = {
        init: function() {
            this.navSearch(), this.getPortfolioModalData(), this.fixHeaderPadding(), this.headerSpacingFrontpage(), this.initCarousel(), this.initCarouselSwipe(), this.scrollToTop(), this.detectIos(), this.parallaxHeader(), this.addViewCart(), this.setSearchSizeInput(), this.setControlLabel(), this.styleDefaultSubscribeWidget(), this.fixElementorTemplates(), this.handleGutenbergAlignment()
        },
        fixElementorTemplates: function() {
            if (l(".elementor").length <= 0) return !1;
            var t = l(".navbar").outerHeight();
            return l(".elementor-template-full-width").css("margin-top", t), l(".page-template-template-fullwidth .main.classic-blog").css("margin-top", t), !1
        },
        navSearch: function() {
            l(".hestia-toggle-search").on("click", function() {
                var t = l(".nav-searching");
                l(".navbar").toggleClass("nav-searching"), t.find(".hestia-nav-search").addClass("is-focused"), t.find(".hestia-nav-search").find(".search-field").focus(), l(this).find("i").fadeOut(200, function() {
                    l(this).toggleClass("fa-search"), l(this).toggleClass("fa-times")
                }).fadeIn(200)
            })
        },
        getPortfolioModalData: function() {
            l("#portfolio").find('a[data-toggle="modal"]').on("click", function(t) {
                t.preventDefault();
                var e = l(this).data("pid");
                l.ajax({
                    url: requestpost.ajaxurl,
                    type: "post",
                    data: {
                        action: "hestia_get_portfolio_item_data",
                        pid: e
                    },
                    success: function(t) {
                        var e = l(".hestia-portfolio-modal");
                        e.find(".modal-content").html(t), e.on("hidden.bs.modal", function() {
                            l(this).find(".modal-content").html('<div class="portfolio-loading text-center"><i class="fa fa-3x fa-spin fa-circle-o-notch"></i></div>')
                        })
                    }
                })
            })
        },
        fixHeaderPadding: function() {
            var t = l(".navbar-fixed-top").outerHeight(),
                e = window.matchMedia("(max-width: 600px)");
            if (l("#wpadminbar").length && e.matches ? (l(".wrapper.classic-blog").find(".main").css("margin-top", t - 46), l(".carousel .item .container").css("padding-top", t + 50 - 46), l(".home.page.page-template-default .navbar").hasClass("no-slider") && l(".home.page.page-template-default .main").css("margin-top", t - 46)) : (l(".wrapper.classic-blog").find(".main").css("margin-top", t), l(".carousel .item .container").css("padding-top", t + 50), l(".home.page.page-template-default .navbar").hasClass("no-slider") && l(".home.page.page-template-default .main").css("margin-top", t)), 768 < l(window).width()) {
                l(".wrapper.classic-blog").length < 1 ? l(".pagebuilder-section").css("padding-top", t) : l(".pagebuilder-section").css("padding-top", 0), l(".fl-builder-edit .pagebuilder-section").css("padding-top", t + 40), l(".page-header.header-small .container").css("padding-top", t + 100);
                var a = l(".single-product .page-header.header-small").height(),
                    i = a + 100;
                l(".single-product .page-header.header-small .container").css("padding-top", a - i);
                var o = a - t - 172;
                l(".woocommerce.single-product .blog-post .col-md-12 > div[id^=product].product").css("margin-top", -o)
            } else l(".page-header.header-small .container , .woocommerce.single-product .blog-post .col-md-12 > div[id^=product].product").removeAttr("style");
            l(".no-content").length && l(".page-header.header-small").css("min-height", t + 230)
        },
        headerSpacingFrontpage: function() {
            if ((!this.inIframe() || !this.isMobileUA()) && 0 < l(".home .carousel").length) {
                var t = l(".page-header"),
                    e = l(window).width(),
                    a = l(window).height();
                768 < e ? t.css("min-height", .9 * a) : t.css("min-height", a)
            }
        },
        inIframe: function() {
            return window.self !== window.top
        },
        isMobileUA: function() {
            return navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i)
        },
        initCarousel: function() {
            var t = {
                interval: 1e4
            };
            void 0 !== requestpost.disable_autoslide && "1" === requestpost.disable_autoslide && (t.interval = !1), 0 !== l("body.rtl").length && (l(".carousel-control.left").click(function() {
                l(".carousel").carousel("next")
            }), l(".carousel-control.right").click(function() {
                l(".carousel").carousel("prev")
            })), l(".carousel").carousel(t)
        },
        initCarouselSwipe: function() {
            if ("undefined" != typeof Hammer) {
                var t = "swipeleft",
                    e = "swiperight";
                if (0 !== l("body.rtl").length && (t = "swiperight", e = "swipeleft"), 0 !== l("#carousel-hestia-generic").length) {
                    var a = document.getElementById("carousel-hestia-generic");
                    Hammer(a).on(t, function() {
                        l(".carousel").carousel("next")
                    }), Hammer(a).on(e, function() {
                        l(".carousel").carousel("prev")
                    })
                }
            }
        },
        scrollToTop: function() {
            var a = 0;
            l(window).on("scroll", function() {
                var t = window.pageYOffset,
                    e = l(".page-header").height();
                e < t && 0 === a && (l(".hestia-scroll-to-top").addClass("hestia-fade"), a = 1), t < e && 1 === a && (l(".hestia-scroll-to-top").removeClass("hestia-fade"), a = 0)
            }), l(".hestia-scroll-to-top").on("click", function() {
                window.scroll({
                    top: 0,
                    behavior: "smooth"
                })
            })
        },
        sidebarToggle: function() {
            if (!(l(".blog-sidebar-wrapper,.shop-sidebar-wrapper").length <= 0)) {
                var t = "left";
                0 !== l("body.rtl").length && (t = "right"), l(".hestia-sidebar-open").click(function() {
                    l(".sidebar-toggle-container").css(t, "0")
                }), l(".hestia-sidebar-close").click(function() {
                    l(".sidebar-toggle-container").css(t, "-100%")
                })
            }
        },
        detectIos: function() {
            (0 < l(".hestia-about").length || 0 < l(".hestia-ribbon").length) && (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream && l("body").addClass("is-ios"))
        },
        parallaxHeader: function() {
            if (!(0 < l(".elementor-location-header").length) && !(0 < l(".fl-theme-builder-header").length || l(window).width() < 768)) {
                var e = l('.page-header[data-parallax="active"]');
                0 !== e.length && l(window).on("scroll", function() {
                    if (l.utilitiesFunctions.isElementInViewport(e)) {
                        var t = l(window).scrollTop() / 3;
                        e.css({
                            transform: "translate3d(0," + t + "px,0)",
                            "-webkit-transform": "translate3d(0," + t + "px,0)",
                            "-ms-transform": "translate3d(0," + t + "px,0)",
                            "-o-transform": "translate3d(0," + t + "px,0)"
                        })
                    }
                })
            }
        },
        addViewCart: function() {
            l(document).on("DOMNodeInserted", ".added_to_cart", function() {
                l(this).parent().hasClass("hestia-view-cart-wrapper") || l(this).wrap('<div class="hestia-view-cart-wrapper"></div>')
            })
        },
        setSearchSizeInput: function() {
            0 < l(".hestia-top-bar").find("input[type=search]").length && l(".hestia-top-bar input[type=search]").each(function() {
                l(this).attr("size", l(this).parent().find(".control-label").text().replace(/ |…/g, "").length)
            })
        },
        setControlLabel: function() {
            var t = l(".search-form label");
            if (void 0 !== t) {
                var e = l(t).find(".search-field");
                "" === l(e).attr("value") ? l(t).addClass("label-floating is-empty") : l(t).addClass("label-floating"), l.utilitiesFunctions.addControlLabel(e)
            }
            var a = l(".woocommerce-product-search");
            if (void 0 !== a) {
                var i = l(a).find(".search-field");
                "" === l(i).attr("value") ? l(a).addClass("label-floating is-empty") : l(a).addClass("label-floating"), l.utilitiesFunctions.addControlLabel(i)
            }
            void 0 !== l(".contact_submit_wrap") && l(".pirate-forms-submit-button").addClass("btn btn-primary"), void 0 !== l(".form_captcha_wrap") && (l(".form_captcha_wrap").hasClass("col-sm-4") && l(".form_captcha_wrap").removeClass("col-sm-6"), l(".form_captcha_wrap").hasClass("col-lg-6") && l(".form_captcha_wrap").removeClass("col-lg-6"), l(".form_captcha_wrap").addClass("col-md-12")), void 0 !== l("form") && l("form").addClass("form-group"), void 0 !== l("input") && (void 0 !== l('input[type="text"]') && l('input[type="text"]').addClass("form-control"), void 0 !== l('input[type="email"]') && l('input[type="email"]').addClass("form-control"), void 0 !== l('input[type="url"]') && l('input[type="url"]').addClass("form-control"), void 0 !== l('input[type="password"]') && l('input[type="password"]').addClass("form-control"), void 0 !== l('input[type="tel"]') && l('input[type="tel"]').addClass("form-control"), void 0 !== l('input[type="search"]') && l('input[type="search"]').addClass("form-control"), void 0 !== l("input.select2-input") && l("input.select2-input").removeClass("form-control")), void 0 !== l("textarea") && l("textarea").addClass("form-control"), void 0 !== l(".form-control") && (l(".form-control").parent().addClass("form-group"), l(window).on("scroll", function() {
                l(".form-control").parent().addClass("form-group")
            }))
        },
        styleDefaultSubscribeWidget: function() {
            var t = l(".hestia-subscribe #sib_signup_form_1");
            t.find("p.sib-email-area").before('<span class="input-group-addon"><i class="fa fa-envelope"></i></span>'), t.find("p.sib-NAME-area").before('<span class="input-group-addon"><i class="fa fa-user"></i></span>'), t.find(".form-group").each(function() {
                l(this).addClass("is-empty")
            })
        },
        handleGutenbergAlignment: function() {
            var t = l("body");
            if (t.hasClass("page-template-template-pagebuilder-full-width") || t.hasClass("page-template-template-pagebuilder-blank")) return !1;
            var e = l(".alignfull"),
                a = l(".alignwide");
            if (!e.length && !a.length) return !1;
            var i = l(".main").innerWidth(),
                o = l(".blog-post > .container > article > .row > div").innerWidth(),
                n = 0,
                r = 0;
            !this.isMobile() && l("#secondary").length || (n = (i - o) / 2 + 15, r = (i - o) / 5), e.length && l(e).each(function(t, e) {
                l(e).css({
                    "margin-left": "-" + n + "px",
                    "margin-right": "-" + n + "px"
                })
            }), a.length && l(a).each(function(t, e) {
                l(e).css({
                    "margin-left": "-" + r + "px",
                    "margin-right": "-" + r + "px"
                })
            })
        },
        isMobile: function() {
            return window.innerWidth <= 991
        }
    }, l.navigation = {
        init: function() {
            this.toggleNavbarTransparency(), this.handleResponsiveDropdowns(), this.handleTouchDropdowns(), this.repositionDropdowns(), this.smoothScroll(), this.activeParentLink(), this.highlightMenu(), this.setBodyOverflow()
        },
        handleTouchDropdowns: function() {
            if (window.innerWidth < 991) return !1;
            var a = this;
            return l(".caret-wrap").on("touchstart", function(t) {
                t.preventDefault(), t.stopPropagation();
                var e = l(this).closest("li");
                l(e).hasClass("dropdown-submenu") && (l(e).siblings().removeClass("open").find("dropdown-submenu").removeClass("open"), l(e).siblings().find(".caret-open").removeClass("caret-open")), l(this).closest("li").parent().is(".nav") && a.clearDropdowns(), l(this).toggleClass("caret-open"), l(this).closest(".dropdown").toggleClass("open"), a.createOverlay()
            }), !1
        },
        createOverlay: function() {
            var t = l(".dropdown-helper-overlay");
            if (0 < t.length) return !1;
            var e = this;
            return (t = document.createElement("div")).setAttribute("class", "dropdown-helper-overlay"), l("#main-navigation").append(t), l(".dropdown-helper-overlay").on("touchstart click", function() {
                this.remove(), e.clearDropdowns()
            }), !1
        },
        clearDropdowns: function() {
            l(".dropdown.open").removeClass("open"), l(".caret-wrap.caret-open").removeClass("caret-open")
        },
        toggleNavbarTransparency: function() {
            var t = l(".navbar-color-on-scroll");
            if (0 !== t.length) {
                var e = !0,
                    a = 0;
                t.hasClass("header-with-topbar") && (a = 40), l(window).on("scroll", l.utilitiesFunctions.debounce(function() {
                    l(".home.page .navbar").hasClass("no-slider") || (l(document).scrollTop() > a ? e && (e = !1, t.removeClass("navbar-transparent"), t.addClass("navbar-not-transparent")) : e || (e = !0, t.addClass("navbar-transparent"), t.removeClass("navbar-not-transparent")))
                }, 17))
            }
        },
        handleResponsiveDropdowns: function() {
            if (768 < window.innerWidth) return !1;
            l(".navbar .dropdown > a .caret-wrap").on("click touchend", function(t) {
                var e = l(this);
                t.preventDefault(), t.stopPropagation(), l(e).toggleClass("caret-open"), l(e).parent().siblings().toggleClass("open")
            })
        },
        smoothScroll: function() {
            l('.navbar a[href*="#"], a.btn[href*="#"]').click(function() {
                if ("#" === l(this).attr("href")) return !1;
                if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname) {
                    var t = l(this.hash);
                    if ((t = t.length ? t : l("[name=" + this.hash.slice(1) + "]")).length) return l("html,body").animate({
                        scrollTop: t.offset().top - l.utilitiesFunctions.verifyNavHeight()
                    }, 1200), l(".navbar .navbar-collapse").hasClass("in") && l(".navbar .navbar-collapse.in").removeClass("in"), l("body").hasClass("menu-open") && (l("body").removeClass("menu-open"), l(".navbar-collapse").css("height", "0"), l(".navbar-toggle").attr("aria-expanded", "false")), !1
                }
            })
        },
        activeParentLink: function() {
            l(".navbar .dropdown > a").click(function() {
                return "#" === l(this).attr("href") || (location.href = this.href), !1
            })
        },
        highlightMenu: function() {
            l(window).on("scroll", function() {
                if (l("body").hasClass("home") && 751 <= l(window).width()) {
                    var n = l(window).scrollTop(),
                        r = l(".navbar").outerHeight(),
                        s = "no";
                    l("#carousel-hestia-generic, section").each(function() {
                        var t = "#" + l(this).attr("id"),
                            e = l(this).offset().top,
                            a = l(this).outerHeight(),
                            i = e - r,
                            o = e + a - r;
                        if (n + l.utilitiesFunctions.verifyNavHeight() >= i && n + l.utilitiesFunctions.verifyNavHeight() <= o) return s = "yes", l("nav .on-section").removeClass("on-section"), l('nav a[href$="' + t + '"]').parent("li").addClass("on-section"), !1;
                        "no" === s && l("nav .on-section").removeClass("on-section")
                    })
                }
            })
        },
        setBodyOverflow: function() {
            var t = l("#main-navigation");
            t.on("show.bs.collapse", function() {
                l("body").addClass("menu-open")
            }), t.on("hidden.bs.collapse", function() {
                l("body").removeClass("menu-open")
            })
        },
        repositionDropdowns: function() {
            var n = window.innerWidth;
            if (n <= 768) return !1;
            var t = l(".dropdown-menu");
            return 0 === t.length || l.each(t, function(t, e) {
                var a = l(e),
                    i = a.offset().left;
                /webkit.*mobile/i.test(navigator.userAgent) && (i -= window.scrollX);
                var o = a.outerWidth();
                n <= i + o && l(e).css("left", "-100%")
            }), !1
        }
    };
    var e = 0;
    l.hestiaNavBarScroll = {
        checkNavbarScrollPoint: function() {
            if (0 === l(".navbar-header").length) return !1;
            if (768 <= l.utilitiesFunctions.getWidth()) {
                if (void 0 !== l(".navbar-header").offset()) {
                    var t = l(".navbar-header").offset().top;
                    /webkit.*mobile/i.test(navigator.userAgent) && (t -= window.scrollY), e = t + l(".navbar-header").height()
                }
                0 === l(".hestia_left.header-with-topbar").length && 0 === l(".full-screen-menu.header-with-topbar").length || (e = 40)
            } else e = 0 !== l(".header-with-topbar").length ? 40 : 0
        },
        addScrollClass: function() {
            l(window).on("scroll", function() {
                l(document).scrollTop() >= e ? l(".navbar").addClass("navbar-scroll-point") : l(".navbar").removeClass("navbar-scroll-point")
            })
        }
    }
}(jQuery), jQuery(document).ready(function() {
    jQuery.material.init(), jQuery.hestia.init(), jQuery.navigation.init(), jQuery.hestiaFeatures.initAnimations(), jQuery.hestiaFeatures.initTooltips(), jQuery.hestiaNavBarScroll.checkNavbarScrollPoint(), jQuery.hestiaNavBarScroll.addScrollClass()
}), jQuery(window).load(function() {
    jQuery.hestiaFeatures.initMasonry(), jQuery.hestia.sidebarToggle()
}), jQuery(window).resize(function() {
    jQuery.hestiaFeatures.initMasonry(), jQuery.hestia.fixHeaderPadding(), jQuery.hestia.headerSpacingFrontpage(), jQuery.hestia.handleGutenbergAlignment(), jQuery.hestiaNavBarScroll.checkNavbarScrollPoint(), jQuery.navigation.repositionDropdowns()
});


var pirateFormsObject = {"errors":"","rest":{"submit":{"url":"https:\/\/meldestelle-kuhnle.de\/wp-json\/pirate-forms\/v1\/send_email\/"},"nonce":"ce44577758"}};


/* global jQuery */
/* global pirateFormsObject */

(function($, pf){

    $( document ).ready( function () {
        onDocumentReady();
    });

    $( window ).load( function () {
        onWindowLoad();
    });

    function onDocumentReady() {
        'use strict';

        // file upload behavior.
        $( '.pirate-forms-file-upload-button' ).on( 'click', function () {
            var $button = $( this );
            $button.parent().find( 'input[type=file]' ).on( 'change', function () {
                $button.parent().find( 'input[type=text]' ).val( $( this ).val() ).change();
            } );
            $button.parent().find( 'input[type=file]' ).focus().click();
        } );

        $( '.pirate-forms-file-upload-input' ).on( 'click', function () {
            $( this ).parent().find( '.pirate-forms-file-upload-button' ).trigger( 'click' );
        } );
        $( '.pirate-forms-file-upload-input' ).on( 'focus', function () {
            $( this ).blur();
        } );

        // show errors.
        var session_var = pf.errors;
        if( (typeof session_var !== 'undefined') && (session_var !== '') && (typeof $('#contact') !== 'undefined') && (typeof $('#contact').offset() !== 'undefined') ) {
            $('html, body').animate({
                scrollTop: $('#contact').offset().top
            }, 'slow');
        }
        
        // support ajax forms.
        $('.pirate-forms-submit-button-ajax').closest('form').submit(function(){
            var form = $(this);
            var formData = new FormData(form[0]);
            ajaxStart( form );

            // remove the dynamic containers.
            $('div.pirate-forms-ajax').remove();

            $.ajax({
                url: pf.rest.submit.url,
                data: formData,
                type: 'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function ( xhr ) {
                    xhr.setRequestHeader( 'X-WP-Nonce', pf.rest.nonce );
                },
                success: function(data){
                    //console.log("success");
                    //console.log(data);
                    form.find('input').val('');
                    form.find('select').val('');
                    form.find('input[type="checkbox"]').removeAttr('checked');
                    form.find('input[type="radio"]').removeAttr('checked');
                    var $time = new Date().getTime();

                    if(data.message){
                        form.closest('.pirate_forms_wrap').before('<div id="' + $time + '" class="pirate-forms-ajax pirate-forms-ajax-thankyou"></div>');
                        $('#' + $time).append(data.message);
                    }else if(data.redirect){
                        location.href = data.redirect;
                    }
                },
                error: function(data){
                    //console.log("no");
                    //console.log(data);
                    if(data.responseJSON){
                        var $time = new Date().getTime();
                        form.closest('.pirate_forms_wrap').prepend('<div id="' + $time + '" class="pirate-forms-ajax pirate-forms-ajax-errors"></div>');
                        $('#' + $time).append(data.responseJSON.error);
                    }
                },
                complete: function(){
                    ajaxStop( form );
                }
            });
            
            return false;
        });

    }
    
    function onWindowLoad() {
        'use strict';
        if ( $( '.pirate_forms_wrap' ).length ) {
            $( '.pirate_forms_wrap' ).each( function () {
                var formWidth = $( this ).innerWidth();
                var footerWidth = $( this ).find( '.pirate-forms-footer' ).innerWidth();
                if ( footerWidth > formWidth ) {
                    $( this ).find( '.contact_submit_wrap, .form_captcha_wrap, .pirateform_wrap_classes_spam_wrap' ).css( {'text-align' : 'left', 'display' : 'block' } );
                }
            } );
        }
    }

    function ajaxStart(element) {
        $(element).fadeTo( 'slow', 0.5 );
    }

    function ajaxStop(element) {
        $(element).fadeTo( 'fast', 1 );
    }

})(jQuery, pirateFormsObject);
